<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15
 * Time: 13:57
 */
namespace Home\Controller;
use Think\Controller;
class OrderController extends CommonController {
    //接受新订单信息，并存储在后台数据库中
    public function index(){
        if(IS_POST){
            $order=D('order');
            //存储订单信息,并返回 1.正确情况 订单号 2.错误情况 错误码
            $rel=$order->order();
            //根据返回信息判断
            $this->rescode($rel);
        }else{
            $time = date("Y-m-d H:i",time());
            $this->assign('time',$time);
            $uid = $_SESSION['user_id'];
            $model = D('Order');
            $time1 = time();
            $data = $model->where("username='$uid' AND end>$time1 ")->select();
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
    }//end index

    //订单创建成功后跳转订单确认页面
    public function orderconfirm(){
        $order=D('order');
        $orderid=I('orderid');
        //判断是否是旧订单,是的话即删除订单
        if(I('old')){
            $where['orderid']=$orderid;
            $data['status']=3;
            $rel=$order->where($where)->save($data);
            $this->redirect('Order/index');
            return;
        }else{
            $data=$order->serchorder($orderid);
            if($data!=false){
                $this->assign('data',$data);
                $this->display('confirm');
                return;
            }else{
                $this->error("创建订单失败，请重试!");
                return;
            }
        }

    }

    //订单续费
    public function reorder(){
        //如果获取得到get方式传递的订单fid则数据库生成订单，并进入支付，只有id没有fid则跳入续费订单购买
        $id=I('id');
        $fid=I('fid');
        if($id){
            $order=D('Order');
            $data=$order->where("id='$id'")->select();
            $data[0]['fid']=$id;
            $this->assign('data',$data);
            $article1 = D('Article');
            $article = $article1->limit(3)->order('time desc')->select();
            $this->assign('article',$article);
            $this->display('renew');
        }
        if($fid){
            $order=D('Order');
            $rel=$order->addorder($fid);
            //根据返回信息判断
            $this->rescode($rel);
        }
    }

    //订单返回状态判断
    public function rescode($code){
        switch ($code){
            case code001:
                $this->error("空闲矿机不足，请重新下单");
                break;

            case code002:
                $this->error("系统数据创建错误，请重试");
                break;

            default:
                $this->redirect('Order/orderconfirm', array('orderid' => $code));

        }
    }


    //订单信息展示列表
    public function orderlst(){
        //获取存在session中的用户名
        $username=session('user_id');
        $order=D('order');
        //根据用户名，获取用户所有订单信息
        $data=$order->serchorder($username);
        if($data!=false){
            $this->assign('data',$data);
            $this->display();
        }
    }//end orderlst

    //检查用户是否存在订单
    public function checkorder(){
        $order=D('order');
        //存储订单信息,并返回 1.正确情况 订单号 2.错误情况 错误码
        $rel=$order->order();
        //根据返回信息判断
        $this->rescode($rel);
    }


    public function paycode(){
        if(IS_POST){
            $order=D('order');
            $rel=$order->paycode();
            if($rel){
                $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
            }else{
                 $this->ajaxReturn(array('status'=>0,'msg'=>'订单回执号存储失败'));
            }
        }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>'系统或参数错误'));
        }
    }


}