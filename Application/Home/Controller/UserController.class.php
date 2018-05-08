<?php
namespace Home\Controller;
require "./vendor/autoload.php";

use Qcloud\Sms\SmsSingleSender;
use Qcloud\Sms\SmsMultiSender;
use Qcloud\Sms\SmsVoiceVerifyCodeSender;
use Qcloud\Sms\SmsVoicePromptSender;
use Qcloud\Sms\SmsStatusPuller;
use Qcloud\Sms\SmsMobileStatusPuller;
class UserController extends CommonController {
	//根据指定的手机号进行短信验证码发送
	public function sendcode()
	{
		//获取具体要发送的手机号
		$tel = I('post.tel');

		if(!$tel){
			$this->ajaxReturn(array('status'=>0,'msg'=>'手机号错误'));
		}
		//根据手机号发送短信验证码
		$code = rand(100000,999999);//生成一个四位的验证码
        // 短信应用SDK AppID
        $appid = 1400080137; // 1400开头

// 短信应用SDK AppKey
        $appkey = "be3bde69443e1eab3241025d30fb869c";

// 需要发送短信的手机号码
//        $phoneNumbers = ["18674096760", "12345678902", "12345678903"];

// 短信模板ID，需要在短信应用中申请
        $templateId = 101606;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

// 签名
        $smsSign = "必势得"; // NOTE:
        $ssender = new SmsSingleSender($appid, $appkey);
        $params = [$code,"5"];
        $result = $ssender->sendWithParam("86", $tel, $templateId,
            $params, $smsSign, "", "");
//        $res = sendTemplateSMS($tel,array($code,'5'),"1");
		if(!$result){
			$this->ajaxReturn(array('status'=>0,'msg'=>'发送验证码失败'));
		}
		//说明目前短信验证码发送成功 需要记录具体的验证码到session。
		//需要保证验证码有过期时间。关于过期时间 可以记录当前发送验证码的时间以及具体的有效时间
		$data=array(
			'code'=>$code,
			'time'=>time(),//指定当前的时间
			'limit'=>3000,//表示具体的过期时间
		);
		session('telcode',$data);
		$this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
	}

    public function sendcode2()
    {
        //获取具体要发送的手机号
        $tel = I('post.tel');
        $model = D('User');
        $res = $model->where("tel='$tel'")->find();
        if($res){
            $this->ajaxReturn(array('status'=>0,'msg'=>'手机号已注册'));
        }
        if(!$tel){
            $this->ajaxReturn(array('status'=>0,'msg'=>'手机号错误'));
        }
        //根据手机号发送短信验证码
        $code = rand(100000,999999);//生成一个四位的验证码
        // 短信应用SDK AppID
        $appid = 1400080137; // 1400开头

// 短信应用SDK AppKey
        $appkey = "be3bde69443e1eab3241025d30fb869c";

// 需要发送短信的手机号码
//        $phoneNumbers = ["18674096760", "12345678902", "12345678903"];

// 短信模板ID，需要在短信应用中申请
        $templateId = 101606;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

// 签名
        $smsSign = "必势得"; // NOTE:
        $ssender = new SmsSingleSender($appid, $appkey);
        $params = [$code,"5"];
        $result = $ssender->sendWithParam("86", $tel, $templateId,
            $params, $smsSign, "", "");
//        $res = sendTemplateSMS($tel,array($code,'5'),"1");
        if(!$result){
            $this->ajaxReturn(array('status'=>0,'msg'=>'发送验证码失败'));
        }
        //说明目前短信验证码发送成功 需要记录具体的验证码到session。
        //需要保证验证码有过期时间。关于过期时间 可以记录当前发送验证码的时间以及具体的有效时间
        $data=array(
            'code'=>$code,
            'time'=>time(),//指定当前的时间
            'limit'=>3000,//表示具体的过期时间
        );
        session('telcode',$data);
        $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
    }

	public function regist()
	{
		if(IS_GET){
		    $bsdcode=I('bsdcode');
		    if($bsdcode!=null){
		        $this->assign('data',$bsdcode);
            }
			$this->display();
		}else{
			$username =I('post.tel');
			$password =I('post.password');
			$password2 = I('post.password2');
			$tel =I('post.tel');//具体用户的手机号
			$telcode =I('post.telcode');//手机验证码
            //检查两次密码是否一致
//            echo $username;die;
            if($password != $password2){
                $this->ajaxReturn(array('status'=>0,'msg'=>'两次密码输入不一致'));
            }
            if(!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,}$/',$password)){
                $this->ajaxReturn(array('status'=>0,'msg'=>'请输入至少8位数字英文组合密码'));
            }
			//检查目前提交的手机验证码跟发送的是否匹配
			if(!$telcode){
				$this->ajaxReturn(array('status'=>0,'msg'=>'没有输入手机验证码'));
			}
			//获取当前session中具体的信息
			$data=session('telcode');
			if(!$data){
				$this->ajaxReturn(array('status'=>0,'msg'=>'没有发送手机验证码'));
			}
			//判断验证码是否过期
			if($data['time']+$data['limit']<time()){
				$this->ajaxReturn(array('status'=>0,'msg'=>'手机验证码过期'));
			}
			if($data['code']!=$telcode){
				$this->ajaxReturn(array('status'=>0,'msg'=>'手机验证码错误'));
			}

			//实例化模型对象 调用方法入库
			$model =D('User');
			$res = $model->regist($username,$password,$tel);
			if(!$res){
				$this->ajaxReturn(array('status'=>0,'msg'=>$model->getError()));
			}

			//获取注册填写邀请码,并写入用户信息
            $bsdcode1=$this->make_coupon_card();
            $bsdcode=I('post.bsdcode');
            $bsdcode=explode("1b2s3d",$bsdcode,2);
            $bsdcode=$bsdcode[0];
            if($bsdcode){
                $info=M('user')->where("bsdcode='$bsdcode'")->field('id')->find();
                $arr=array(
                    'bsdcode'=>$bsdcode1,
                    'fid'=>$info['id'],
                );
            }else{
                $arr=array(
                    'bsdcode'=>$bsdcode1
                );
            }

            M('user')->where("username='$username'")->save($arr);

            $info = $model->where("id=$res")->find();
            session('user',$info);
            session('tel',$info['tel']);
            session('user_id',$info['id']);
          
			$model1 = D('Wallet');
			$data = array(
			    'username'=>$res,
            );
			$model1->add($data);

            $model2 = D('Unread');
            $data2= array(
                'user'=>$res,
            );
            $model2->add($data2);

			$this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
		}
	}


     public function make_coupon_card() {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = //chr(123)// "{"
            substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);
        //.chr(125);// "}"
        return $uuid;
    }


    public function login()
	{
		if(IS_GET){
			$this->display();
		}else{
            $captcha = I('post.captcha');
            $verify = new \Think\Verify();
            $res = $verify->check($captcha);
            if(!$res){
                $this->ajaxReturn(array('status'=>0,'msg'=>'验证码错误'));
            }

			$tel =I('post.tel');
			$password =I('post.password');

			//实例化模型对象 调用方法入库
			$model =D('User');
			$res = $model->login($tel,$password);
			if(!$res){
				$this->ajaxReturn(array('status'=>0,'msg'=>$model->getError()));
			}
			$this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
		}
	}

	//找回密码
	public function forgot(){
	    if(IS_GET){
	        $this->display();
        }else{
//            $username =I('post.tel');
            $password =I('post.password');
            $password2 = I('post.password2');
            $tel =I('post.tel');//具体用户的手机号
            $telcode =I('post.telcode');//手机验证码
            //检查两次密码是否一致
            $captcha = I('post.captcha');
            $verify = new \Think\Verify();
            $res = $verify->check($captcha);
            if(!$res){
                $this->ajaxReturn(array('status'=>0,'msg'=>'验证码错误'));
            }

            if($password != $password2){
                $this->ajaxReturn(array('status'=>0,'msg'=>'两次密码输入不一致'));
            }
            if(!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,}$/',$password)){
                $this->ajaxReturn(array('status'=>0,'msg'=>'请输入至少8位数字英文组合密码'));
            }
            //检查目前提交的手机验证码跟发送的是否匹配
            if(!$telcode){
                $this->ajaxReturn(array('status'=>0,'msg'=>'没有输入手机验证码'));
            }
            //获取当前session中具体的信息
            $data=session('telcode');
            if(!$data){
                $this->ajaxReturn(array('status'=>0,'msg'=>'没有发送手机验证码'));
            }
            //判断验证码是否过期
            if($data['time']+$data['limit']<time()){
                $this->ajaxReturn(array('status'=>0,'msg'=>'手机验证码过期'));
            }
            if($data['code']!=$telcode){
                $this->ajaxReturn(array('status'=>0,'msg'=>'手机验证码错误'));
            }

            //实例化模型对象 调用方法入库
            $model =D('User');
            $res = $model->forgot($password,$tel);
            if(!$res){
                $this->ajaxReturn(array('status'=>0,'msg'=>'重置失败'));
            }
            $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
        }
    }

        //邮箱找回密码
    public function forgotemail(){
        if(IS_GET){
            $this->display();
        }else{
            $password =I('post.password');
            $password2 = I('post.password2');
            $email =I('post.tel');//具体用户的邮箱
            $emailcode =I('post.telcode');//邮箱验证码

            //检查是否输入所需信息
            if(!$emailcode){
                $this->ajaxReturn(array('status'=>0,'msg'=>'没有输入验证码'));
            }
            if(!$password){
                $this->ajaxReturn(array('status'=>0,'msg'=>'请输入新密码'));
            }
            if(!$password2){
                $this->ajaxReturn(array('status'=>0,'msg'=>'请输入新确认密码'));
            }
            if(!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,}$/',$password)){
                $this->ajaxReturn(array('status'=>0,'msg'=>'请输入至少8位数字英文组合密码'));
            }

            //获取session中存储的验证码信息
            $data=session('emailcode');
            if(!$data){
                $this->ajaxReturn(array('status'=>0,'msg'=>'没有发送验证码'));
            }
            //判断验证码是否过期
            if($data['time']+$data['limit']<time()){
                $this->ajaxReturn(array('status'=>0,'msg'=>'验证码过期'));
            }
            if($data['code']!=$emailcode){
                $this->ajaxReturn(array('status'=>0,'msg'=>'验证码错误'));
            }

            if($password != $password2){
                $this->ajaxReturn(array('status'=>0,'msg'=>'两次密码输入不一致'));
            }

            //实例化模型对象 调用方法入库
            $model =D('User');
            $res = $model->forgotemail($password,$email);
            if(!$res){
                $this->ajaxReturn(array('status'=>0,'msg'=>'重置失败,请确认绑定邮箱无误'));
            }
            $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
        }
    }

	public function logout()
	{
        session('user',null);
        session('tel',null);
        session('user_id',null);
		$this->redirect('/');
	}

    public function verify(){
        $config = array(
          'length'=>4,
          'useNoise'=>false,
          'useCurve'=>false,
        );
        $verify = new \Think\Verify($config);
        $verify -> entry();
    }
}