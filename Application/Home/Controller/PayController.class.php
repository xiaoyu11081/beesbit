<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/16
 * Time: 17:28
 */
namespace Home\Controller;
use Think\Controller;
class PayController extends CommonController {
    //支付流程完成后失败跳转订单查询页。
    public function index(){
        $this->redirect('Order/index', '', 3, '支付失败请查看订单信息...');

    }
    //同步银联支付前台通知
    public function checkpay(){
        if(IS_POST){
            //获取银联前台通知数据并判断是否支付成功，以及订单号
            $respCode=I('respCode');
            $orderid=I('orderId');
            if($respCode=='00' || $respCode=='A6'){
                $this->redirect('Order/index','' , 2, '完成支付跳转中...');
            }else{
                $this->redirect('Order/index','' , 2, '失败支付跳转中...');
            }
        }else{
            $this->redirect('Order/index','' , 2, '非法操作跳转中...');
        }

    }

    //异步银联支付后台通知
    public function backcheck(){
        if(IS_GET){
            //获取银联后台通知数据并判断是否支付成功，以及订单号
//            $respCode=I('respCode');
//            $orderid=I('orderId');
            $respCode='00';
            $orderid=I('orderid');
            if($respCode=='00' || $respCode=='A6'){
                $pay=D('Order');
                //根据订单号，查询数据库获得此订单的fid，上级订单
                $where['orderid']=$orderid;
                $data=$pay->where($where)->find();
                //如果有上级订单fid为上级订单的id，如果无则是默认值null
                $fid=$data['fid'];
                //执行完成支付后的数据库操作
                $data1=M('machine')->where($where)->find();
                if(!$data1){
                    $data=$pay->alreadypay($orderid,$fid);
                }
                //跳转到订单详情页面
                $this->redirect('Order/index');
                return;
            }
        }

    }
}