<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 11:16
 */
namespace Admin\Controller;

class SuperController extends CommonController{
    public function index(){
        $permission = $_SESSION['permission'];
        if($permission=='1'){
            $data=M('admin')->select();

            $this->assign('data',$data);
            $this->display('super');
        }else{
            $this->error("无超级管理员权限！");
        }

    }

    public function lst(){
       $where['id']=I('id');
       $data=M('admin')->where($where)->select();
        $this->assign('data',$data);
        $this->display('edit');
    }


    public function delete(){
        $where['id']=I('id');
        $data=M('admin')->where($where)->delete();
        if($data!=false){
            $this->redirect('Super/index');
        }else{
            $this->error("删除失败！");
        }
    }

    public function edit(){
        if(IS_POST){
            $where['id']=I('id');
            if(I('password')!=null){
                $data=array(
                    'password'=>md5(I('password')),
                    'permission'=>I('permission')
                );
            }else{
                $data=array(
                    'permission'=>I('permission')
                );
            }
            $rel=M('admin')->where($where)->save($data);
            if($rel!==false){
               $this->redirect('Super/index');
            }else{
                $this->error("修改失败！");
            }
        }
    }

    public function add(){
        if(IS_POST){
            $username=I('username');
            $password=I('password');
            $info=M('admin')->where("username='$username'")->count();
            if($username!=null && $password!=null && $info!=1){
                $data=array(
                    'username'=>I('username'),
                    'password'=>md5(I('password')),
                    'permission'=>I('permission')
                );
                $rel=M('admin')->add($data);
                if($rel!=false){
                   $this->redirect('Super/index');
                }else{
                    $this->error("添加失败！");
                }
            }else{
                $this->error("管理员账号密码输入有误或管理员账号已存在！");
            }
           
        }
    }
}