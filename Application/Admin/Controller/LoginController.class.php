<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function login(){
        if(IS_GET){
            $this->display();
        }else{
            $captcha = I('post.captcha');
            $verify = new \Think\Verify();
            $res = $verify->check($captcha);
            if(!$res){
                $this->error('验证码错误',U('Login/login'));
            }
            $username = I('post.username');
            $password = md5(I('post.password'));
            $model = D('Admin');
            $res = $model->login($username,$password);
            if(!$res){
                $this->error($model->getError(),U('Login/login'));
            }
            $this->redirect('Order/index');
        }
    }

    public function verify(){
        $config = array('length'=>4);
        $verify = new \Think\Verify($config);
        $verify -> entry();
    }
}