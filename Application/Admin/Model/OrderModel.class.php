<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 14:50
 */
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model{

       //查询出所有后台订单信息，并返回给前台
    public function index(){
        return M('order')->join("LEFT JOIN bsd_user a on bsd_order.username=a.id")
            ->field('bsd_order.id,a.username,bsd_order.coin,bsd_order.power,bsd_order.price
            ,bsd_order.retype,bsd_order.code,bsd_order.paycode,bsd_order.orderid,bsd_order.cwcode,bsd_order.status')
            ->select();
    }

    //订单财务确认,get方式传递参数
    public function cwedit(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            $data['cwcode']=2;
            $rel1=M('order')->where($where)->save($data);
            if($rel1){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }



    //订单部署状态修改,get方式传递参数
    public function edit(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            $rel=M('order')->where($where)->find();
            //code为2表示后台已确认付款
            $data['code']=2;
            $rel1=M('order')->where($where)->save($data);
            //查询订单是否有父订单，有父订单还需要对父订单进行修改
            if($rel['fid']!=null){
                $where1['id']=$rel['fid'];
                $rel2=M('order')->where($where1)->find();
                $data2['day']=$rel2['day']+$rel['day'];
                $data2['end']=$rel['end'];
                $rel3=M('order')->where($where1)->data($data2)->save();
            }else{
                $rel3=true;
            }
            if($rel1 && $rel3){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //续费订单异常处理,父订单状态回归，续费订单删除
    public function edit1(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            $where1['id']=trim(I('fid'));
            $data=M('order')->where($where)->find();
            $data1=M('order')->where($where1)->find();
            $data2['day']=$data1['day']-$data['day'];
            $data2['end']=$data1['end']-$data['end']+$data['start'];
            if(M('order')->where($where1)->save($data2) && M('order')->where($where)->delete()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    //订单状态修改为未确认
    public function cancel(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            //code为1表示后台未确认付款
            $data['code']=1;
            if(M('order')->where($where)->save($data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function delete(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            $rel=M('order')->where($where)->delete();
            if($rel){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}