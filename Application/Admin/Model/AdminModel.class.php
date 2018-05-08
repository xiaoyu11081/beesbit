<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $fields = array('id','username','password');
    protected $_validate = array(
        array('username','require','用户名必须填写'),
        array('username','','用户名重复',1,'unique'),
        array('password','require','密码必须填写'),
    );
    public function login($username,$password){
        $userinfo = $this->where("username='$username'")->find();
        if(!$userinfo){
            $this->error='用户名不存在';
            return false;
        }
        if($userinfo['password'] != $password){
            $this->error='密码错误';
            return false;
        }
        cookie('admin',$userinfo);
        session('admin_name',$userinfo['username']);
        session('permission',$userinfo['permission']);
        return true;
    }
}