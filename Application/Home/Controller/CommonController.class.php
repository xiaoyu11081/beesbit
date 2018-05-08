<?php
namespace Home\Controller;
use Think\Controller;
//公共控制器
class CommonController extends Controller {
	public function __construct()
	{
		parent::__construct();

	}

	//检查用户是否登录，如果没有登录直接跳转到登录页面进行登录
	public function checkLogin()
	{
		$user_id = session('user_id');
		if(!$user_id){
			//没有登录
			$this->error('请先登录',U('User/login'));
		}
	}
}