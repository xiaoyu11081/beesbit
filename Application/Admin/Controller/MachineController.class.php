<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 11:16
 */
namespace Admin\Controller;

class MachineController extends CommonController{
    public function index(){
            $data=D('machine')->index();
            $this->assign('data',$data);
            $this->display('Mills');
    }

    public function delete(){
        $permission = $_SESSION['permission'];
        if($permission=='1' ||$permission=='2' ){
            $rel=D('machine')->delete();
            if($rel){
                $this->success('矿机信息已清空');
            }else{
                $this->error("矿机信息已空失败！");
            }
        }else{
            $this->error("无此权限！");
        }
    }
}