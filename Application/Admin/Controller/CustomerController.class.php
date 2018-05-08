<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 11:16
 */
namespace Admin\Controller;

class CustomerController extends CommonController{
    public function index(){

            $data=D('customer')->index();
            $this->assign('data',$data);
            $this->display('service');

    }

    public function add(){
        $permission = $_SESSION['permission'];
        if($permission=='1'||$permission=='5'){
            if (!D('customer')->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error("请确认填写完全");
            }else{
                $data=D('customer')->add();
                if($data){
                   $this->redirect('Customer/index');
                }else{
                    $this->error("添加失败");
                }
            }
        }else{
            $this->error("无此权限！");
        }

    }

    public function delete(){
        $permission = $_SESSION['permission'];
        if($permission=='1'||$permission=='5'){
            $data=D('customer')->delete();
            if($data){
                $this->success('删除成功');
            }else{
                $this->error("删除失败");
            }
        }else{
            $this->error("无此权限！");
        }
    }
}