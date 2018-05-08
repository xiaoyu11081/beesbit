<?php
namespace Home\Controller;
require "./vendor/autoload.php";

use Qcloud\Sms\SmsSingleSender;
use Qcloud\Sms\SmsMultiSender;
use Qcloud\Sms\SmsVoiceVerifyCodeSender;
use Qcloud\Sms\SmsVoicePromptSender;
use Qcloud\Sms\SmsStatusPuller;
use Qcloud\Sms\SmsMobileStatusPuller;
class MatureController extends CommonController {
    public function index(){
        $model = D('Order');
        $time = time() + 604800;
        $info = $model->field('username,orderid')->where("end<$time AND retype='1' AND code='2' AND status='2'")->select();
        // var_dump($info);die;
// 短信应用SDK AppID
        $appid = 1400080137; // 1400开头

// 短信应用SDK AppKey
        $appkey = "be3bde69443e1eab3241025d30fb869c";

// 需要发送短信的手机号码
//        $phoneNumbers = ["18674096760", "12345678902", "12345678903"];

// 短信模板ID，需要在短信应用中申请
        $templateId = 106834;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

// 签名
        $smsSign = "必势得"; // NOTE:
        $ssender = new SmsSingleSender($appid, $appkey);

        $model_user = D('User');
        foreach ($info as $key => $value) {
            $orderid = $value['orderid'];
            $uid = $value['username'];
            $info_user = $model_user->field('tel')->where("id=$uid")->find();
            $tel = $info_user['tel'];

            $params = [$orderid];
            $result = $ssender->sendWithParam("86", $tel, $templateId,
                $params, $smsSign, "", "");
    //        $res = sendTemplateSMS($tel,array($code,'5'),"1");
            if($result){
                echo '发送成功';
            }
        }

    }
}