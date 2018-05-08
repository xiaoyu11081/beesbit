<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 14:50
 */
namespace Admin\Model;
use Think\Model;
class MachineModel extends Model{

    //查询出所有后台订单信息，并返回给前台
    public function index(){
        return M('machine')
            ->join("LEFT JOIN bsd_user a on bsd_machine.username=a.id")
            ->field('bsd_machine.id,bsd_machine.num,bsd_machine.status,bsd_machine.orderid,bsd_machine.power,a.username')
            ->select();
    }

    public function delete(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            $data=array(
                'username'=>0,
                'orderid'=>null
            );
            $rel=M('machine')->where($where)->data($data)->save();
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