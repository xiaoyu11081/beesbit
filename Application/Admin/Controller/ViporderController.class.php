<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/7
 * Time: 9:36
 */
namespace Admin\Controller;

class ViporderController extends CommonController{
    public function index(){
        $data=D('viporder')->index();
        $this->assign('data',$data);
        $this->display('vip');
    }

    //支付到账状态修改
    public function cwedit(){
        $permission = $_SESSION['permission'];
        if($permission=='1' ||$permission=='2' ){
            $rel=D('viporder')->cwedit();
            if($rel){
                $this->redirect('Viporder/index');
            }else{
                $this->error("订单状态修改失败！");
            }
        }else{
            $this->error("无此权限！");
        }

    }


    //订单状态修改
    public function edit(){
        $permission = $_SESSION['permission'];
        if($permission=='1' ||$permission=='3' ){
            $rel=D('viporder')->edit();
            if($rel){
                $this->redirect('Viporder/index');
            }else{
                $this->error("订单状态修改失败！");
            }
        }else{
            $this->error("无此权限！");
        }

    }

}