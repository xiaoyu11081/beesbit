<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/4
 * Time: 17:09
 */
namespace Home\Controller;
use Think\Controller;
class VipController extends CommonController {
//跳转vip支付页面，并生成订单
    public function buyvip(){
        $uid = $_SESSION['user_id'];
        $data=M('viporder')->where("uid='$uid' && code=1 && status!=3 || uid='$uid' && cwcode=1 && status!=3")->find();
        //当不存在生效或者未支付的vip订单时，生成新订单
        if($data==null){
            $price=998;
            $status=1;
            $starttime=time();
            $endtime=$starttime+86400*365;
            $orderid="BSD_vip".date(YmdHis).rand(100,999);
            $data=array(
                'uid'=>$uid,
                'orderid'=>$orderid,
                'price'=>$price,
                'status'=>$status,
                'starttime'=>$starttime,
                'endtime'=>$endtime,
            );
            $rel=M('viporder')->add($data);
        }
        $this->assign('data',$data);
        $this->display('confirmVip');
    }

    //存储支付回执码
    public function paycode(){
        if(IS_POST){
            $data['paycode']=trim(I('paycode'));
            $where['orderid']=I('orderid');
            $info=M('viporder')->where($where)->find();
            if($data['paycode']==$info['paycode']){
                $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
            }else{
                $rel=M('viporder')->where($where)->save($data);
            }
            if($rel){
                $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'订单回执号存储失败'));
            }
        }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>'系统或参数错误'));
        }
    }

    //前台客户确认支付完成
    public function alpay(){
        if(IS_GET){
            $where['orderid']=I('orderid');
            $data['status']=2;
            $rel=M('viporder')->where($where)->save($data);
            if($rel!=false){
                $this->redirect('Referee/index');
            }else{
                return false;
            }
        }
    }

    //取消订单按钮
    public function cancle(){
        if(IS_GET){
            $where['orderid']=I('orderid');
            $data['status']=3;
            $rel=M('viporder')->where($where)->save($data);
            if($rel!=false){
                $this->redirect('Referee/index');
            }else{
                return false;
            }
        }
    }
}