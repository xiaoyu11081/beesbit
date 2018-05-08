<?php
namespace Home\Controller;
class AccountController extends CommonController{
    public function index(){
        $time = date("Y-m-d H:i",time());
        $this->assign('time',$time);
        $tel = $_SESSION['tel'];

        $model_user = D('User');
        $info_user = $model_user->field('id')->where("tel='$tel'")->find();
        $uid = $info_user['id'];

        $model = D('account');
        $data = $model->where("username='$uid'")->order('time desc')->select();
        $model = D('active');
        $data1 = $model->where("username='$uid'")->order('time desc')->select();
        $data=array_merge($data,$data1);
        $this->assign('data',$data);

        $article1 = D('Article');
        $article = $article1->limit(3)->order('time desc')->select();
        $this->assign('article',$article);

        $unread = D('Unread');
        $unread_new = $unread->where("user='$uid'")->find();
        $unread_news = $unread_new['art'];
        $this->assign('unread_news',$unread_news);
        $this->display();
    }

    public function withday(){
        if(IS_GET){
            $wal = I('get.wal');
            $model = D('Wallet');
          $uid = $_SESSION['user_id'];
            $info = $model->where("username='$uid'")->find();
            $this->assign('info',$info);
            $article1 = D('Article');
            $article = $article1->limit(3)->order('time desc')->select();
            $this->assign('article',$article);
            $this->display();
        }else{
            $wal = I('post.wal');
            $payword = I('post.payword');
            $credit = I('post.credit');
            $tel = $_SESSION['tel'];
            $model = D('User');
            $info = $model->where("tel='$tel'")->find();

            $info_user = $model->field('id')->where("tel='$tel'")->find();
            $uid = $info_user['id'];

            $db_payword= md5(md5($payword));
            if($info['payword'] == ''){
                $this->ajaxReturn(array('status'=>4,'msg'=>'请先设置提现密码'));
            }
            if($db_payword != $info['payword']){
                $this->ajaxReturn(array('status'=>0,'msg'=>'提现密码错误'));
            }
            if(!$wal){
                $this->ajaxReturn(array('status'=>3,'msg'=>'请先绑定钱包'));
            }

            $model1 = D('Wallet');
            $info1 = $model1->where("username='$uid'")->find();
            $db_credit = $info1['num']-$info1['payout'];

            if($credit>$db_credit){
                $this->ajaxReturn(array('status'=>0,'msg'=>'提现额度不够'));
            }
            if($credit<=0 || (!preg_match("/^[0-9]+(.[0-9]{1,4})?$/",$credit))){
                $this->ajaxReturn(array('status'=>0,'msg'=>'输入金额错误'));
            }
            $time = time();
            $model_order = D('Order');
            $order_info = $model_order->where("end>$time AND username='$uid' AND status=2 AND retype =1 AND code =2")->find();
            if($order_info){
                if(0.1>$credit){
                    $this->ajaxReturn(array('status'=>0,'msg'=>'最少提取0.1'));
                }
            }
//            $data = $model1->where("username='$tel'")->setInc('payout',$credit);

            $data=array(
                'username'=>$uid,
                'address'=>$wal,
                'num'=>$credit,
                'time'=>time(),
                'surplus'=>$db_credit-$credit
            );
            $model2 = D('Account');
            $time_old = ($time - 86400);
            $info_account = $model2->where("address='$wal' AND username='$uid' AND time>$time_old")->find();
           if($info_account){
               $this->ajaxReturn(array('status'=>0,'msg'=>'24小时只能提现一次'));
           }

            $info2 = $model2->add($data);
            if(!$info2){
                $this->ajaxReturn(array('status'=>0,'msg'=>$data));
            }
        $model1->execute("update bsd_wallet set payout = payout + '$credit' where username='$uid'");
            $this->ajaxReturn(array('status'=>1,'msg'=>'提现申请成功'));
        }
    }
}