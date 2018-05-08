<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 14:50
 */
namespace Admin\Model;
use Think\Model;
class ViporderModel extends Model{

       //查询出所有后台订单信息，并返回给前台
    public function index(){
        return M('viporder')->join("LEFT JOIN bsd_user a on bsd_viporder.uid=a.id")
            ->field('bsd_viporder.id,a.username,bsd_viporder.price,bsd_viporder.type,bsd_viporder.code,bsd_viporder.paycode,bsd_viporder.orderid,bsd_viporder.cwcode,bsd_viporder.status')
            ->select();
    }

    //订单财务确认,get方式传递参数
    public function cwedit(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            $data['cwcode']=2;
            $rel1=M('viporder')->where($where)->save($data);
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
            $rel=M('viporder')->where($where)->find();
            //code为2表示后台已确认付款
            $data['code']=2;
            $data['starttime']=time();
            $data['endtime']=$data['starttime']+86400*365;
            $rel1=M('viporder')->where($where)->save($data);
            //将用户的等级提高为vip
            $data1['level']=1;
            $where1['id']=$rel['uid'];
            $rel2=M('user')->where($where1)->save($data1);
            if($rel1){
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
            if(M('viporder')->where($where)->save($data)){
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
            $rel=M('viporder')->where($where)->delete();
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