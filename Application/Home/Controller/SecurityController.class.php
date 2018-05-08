<?php
namespace Home\Controller;
require "./vendor/autoload.php";

use Qcloud\Sms\SmsSingleSender;
use Qcloud\Sms\SmsMultiSender;
use Qcloud\Sms\SmsVoiceVerifyCodeSender;
use Qcloud\Sms\SmsVoicePromptSender;
use Qcloud\Sms\SmsStatusPuller;
use Qcloud\Sms\SmsMobileStatusPuller;
class SecurityController extends CommonController{
    public function index(){
        $tel = $_SESSION['tel'];
        $model = D('User');
        $info = $model->where("tel='$tel'")->find();
        $this->assign('mail',$info['mail']);
        $this->assign('payword',$info['payword']);
        $this->assign('info',$info);

        $article1 = D('Article');
        $article = $article1->limit(3)->order('time desc')->select();
        $this->assign('article',$article);

        $info_user = $model->field('id')->where("tel='$tel'")->find();
        $uid = $info_user['id'];
        $unread = D('Unread');
        $unread_new = $unread->where("user='$uid'")->find();
        $unread_news = $unread_new['art'];
        $this->assign('unread_news',$unread_news);

        $this->display();
    }


    public function setmail(){
        $tel = $_SESSION['tel'];
        $emailcode =I('post.emailcode');//验证码
        $mail = I('post.mail');
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
        $model = D('User');
        $info = $model->setmail($tel,$mail);
        if(!$info){
            $this->ajaxReturn(array('status'=>0,'msg'=>'设置失败'));
        }
        $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
    }

    public function setpay(){
        //设置转账密码
        $payword =I('post.payword');
        $payword2 = I('post.payword2');
        $tel =I('post.tel');//具体用户的手机号
        $telcode =I('post.telcode');//手机验证码
        //检查两次密码是否一致
//            echo $username;die;
        $tel2 = $_SESSION['tel'];
        if($tel != $tel2){
            $this->ajaxReturn(array('status'=>0,'msg'=>'请输入绑定手机号'));
        }
        if(!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,8}$/',$payword)){
            $this->ajaxReturn(array('status'=>0,'msg'=>'请输入6-8位数字英文组合密码'));
        }
        if($payword != $payword2){
            $this->ajaxReturn(array('status'=>0,'msg'=>'两次密码输入不一致'));
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
        $res = $model->setpay($payword,$tel);
        if(!$res){
            $this->ajaxReturn(array('status'=>0,'msg'=>'设置失败'));
        }
        $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));

    }

    public function editTel(){
        $telcode =I('post.telcode3');//手机验证码
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
        $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
    }
    public function editTel2(){
        $tel =I('post.tel4');//具体用户的手机号
        $tel_pass = session('tel');
        $telcode =I('post.telcode4');//手机验证码
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
        $res = $model->editTel($tel_pass,$tel);
        if(!$res){
            $this->ajaxReturn(array('status'=>0,'msg'=>$model->getError()));
        }
        $model1 = D('Wallet');
        $data = array(
            'username'=>$tel,
        );
        $model1->where("username='$tel_pass'")->save($data);
        session('user',null);
        session('tel',null);
        session('user_id',null);
        $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
    }

    public function sendcode()
    {
        //获取具体要发送的手机号
        $tel = I('post.tel');
        $tel2 = $_SESSION['tel'];
        if($tel != $tel2){
            $this->ajaxReturn(array('status'=>0,'msg'=>'输入绑定帐号手机号'));
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

    public function sendcode2()
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
}