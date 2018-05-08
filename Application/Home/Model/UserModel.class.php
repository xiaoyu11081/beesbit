<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	protected $fields=array('id','username','password','payword','salt','tel','mail','level','card','name');


	public function regist($username,$password,$tel)
	{


		$info = $this->where("tel = '$tel'")->find();
		if($info){
			$this->error='手机号重复';
			return false;
		}


		$salt=rand(100000,999999);

		$db_password= md5(md5($password).$salt);
		$data=array(
			'username'=>$username,
			'password' =>$db_password,
			'salt'=>$salt,
			'tel'=>$tel,

		);
		return $this->add($data);
	}

	public function editTel($tel_pass,$tel){
        if($tel_pass == $tel){
            $this->error='手机号与当前手机号重复';
            return false;
        }
        $info = $this->where("tel = '$tel'")->find();
        if($info){
            $this->error='新手机号已注册';
            return false;
        }
        $data=array(
            'username'=>$tel,
            'tel'=>$tel,
        );
        return $this->where("tel='$tel_pass'")->save($data);
    }

	public function forgot($password,$tel){
        $salt=rand(100000,999999);

        $db_password= md5(md5($password).$salt);
        $data=array(
            'password' =>$db_password,
            'salt'=>$salt,
        );
        return $this->where("tel='$tel'")->save($data);
    }


    public function forgotemail($password,$email){
        $salt=rand(100000,999999);
        $db_password= md5(md5($password).$salt);
        $data=array(
            'password' =>$db_password,
            'salt'=>$salt,
        );
        $rel=$this->where("mail='$email'")->save($data);
        if($rel){
            return true;
        }else{
            return false;
        }
    }

	public function login($tel,$password)
	{

		$info = $this->where("tel='$tel'")->find();
		if(!$info){
			$this->error='用户名不存在';
			return false;
		}


		$pwd = md5(md5($password).$info['salt']);
		if($pwd!=$info['password']){
			$this->error='密码不对';
			return false;
		}

		session('user',$info);
		session('tel',$info['tel']);
		session('user_id',$info['id']);
        session('level',$info['level']);
		return true;
	}

	public function setmail($tel,$mail){
        $data=array(
            'mail' =>$mail,
        );
        return $this->where("tel='$tel'")->save($data);
    }

	public function setpay($payword,$tel){
        $db_payword= md5(md5($payword));
        $data=array(
            'payword' =>$db_payword,
        );
        return $this->where("tel='$tel'")->save($data);
    }



}
?>