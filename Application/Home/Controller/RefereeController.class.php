<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/3
 * Time: 19:21
 */
namespace Home\Controller;
use Think\Controller;
class RefereeController extends CommonController {
    public function index(){
        $uid = $_SESSION['user_id'];
        //查询邀请码 生成邀请链接
        $data=M('user')->where("id='$uid'")->field('bsdcode,level')->find();
        if($data['bsdcode']){
            $data['bsdcode']=$data['bsdcode']."1b2s3d"."_".rand(100,999);
            $this->assign('bsdcode',$data['bsdcode']);
        }
        $this->assign('viplevel',$data['level']);
        //根据UID查询被邀请人信息
        $time=time();
        //一级被邀请人查询
        $data1=M('user')->where("fid='$uid'")->field('id,username')->select();
        for($m=0;$m<count($data1);$m++){
            $data1[$m]['level']=1;
        }
        $data3=$data1;
        //二级被邀请人查询
        for($i=0;$i<count($data1);$i++){
            $uid=$data1[$i]['id'];
            $data2=M('user')->where("fid='$uid'")->field('id,username')->select();
            for($k=0;$k<count($data2);$k++){
                $data2[$k]['level']=2;
            }
            //合并数组，将所有关联用户合并到一个数组中
            $data3=array_merge($data3,$data2);
        }
        //查询关联用户奖励信息
        $sum1=0;
        for($c=0;$c<count($data3);$c++){
            $username=$data3[$c]['id'];
            if($data3[$c]['level']==1){
                $data4=M('wallet')->where("username='$username'")->field('num_invite')->find();
                $data3[$c]['invite']=$data4['num_invite'];
                $sum1+=$data4['num_invite'];
            }else{
                $data4=M('wallet')->where("username='$username'")->field('num_inviteTwo')->find();
                $data3[$c]['invite']=$data4['num_invitetwo'];
                $sum1+=$data4['num_invitetwo'];
            }
            // $sum+=$sum1;
        }
        $sum_e = sctonum($sum1,15);
        $this->assign('invitesum',$sum_e);
        $this->assign('level',$data['level']);
        $this->assign('data3',$data3);
        $this->display('recommend');
    }

    public function withday(){
        if(IS_GET){
            $model = D('Wallet');
            $uid = $_SESSION['user_id'];
            $info = $model->where("username='$uid'")->find();
            $sum_e = sctonum(($info['num_inviteall']-$info['num_payout']),15);
            // var_dump($info);die;
            $this->assign('sum_e',$sum_e);
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
            // if(!$wal){
            //     $this->ajaxReturn(array('status'=>3,'msg'=>'请先绑定钱包'));
            // }

            $model1 = D('Wallet');
            $info1 = $model1->where("username='$uid'")->find();
            $db_credit = sctonum(($info1['num_inviteall']-$info1['num_payout']),15);

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
            $model2 = D('Active');
            $time_old = ($time - 86400);
            $info_account = $model2->where("address='$wal' AND username='$uid' AND time>$time_old")->find();
           if($info_account){
               $this->ajaxReturn(array('status'=>0,'msg'=>'24小时只能提现一次'));
           }

            $info2 = $model2->add($data);
            if(!$info2){
                $this->ajaxReturn(array('status'=>0,'msg'=>$data));
            }
            $model1->execute("update bsd_wallet set num_payout = num_payout + '$credit' where username='$uid'");
            $this->ajaxReturn(array('status'=>1,'msg'=>'提现申请成功'));
        }
    }
}