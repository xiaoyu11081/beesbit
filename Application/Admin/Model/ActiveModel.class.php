<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 14:50
 */
namespace Admin\Model;
use Think\Model;
use Qcloud\Sms\SmsSingleSender;
use Qcloud\Sms\SmsMultiSender;
use Qcloud\Sms\SmsVoiceVerifyCodeSender;
use Qcloud\Sms\SmsVoicePromptSender;
use Qcloud\Sms\SmsStatusPuller;
use Qcloud\Sms\SmsMobileStatusPuller;
class ActiveModel extends Model{

    //查询出所有提现记录
    public function index(){
        $data=M('active')->join("LEFT JOIN bsd_user a on bsd_active.username=a.id")
            ->field('a.username,bsd_active.id,bsd_active.coin,bsd_active.address,bsd_active.num,
            bsd_active.time,bsd_active.status,bsd_active.cwcode,bsd_active.surplus')
            ->select();
        //处理数据正常显示而非科学计数法
        for($i=0;$i<count($data);$i++){
            $data[$i]['surplus']=sctonum($data[$i]['surplus'],15);
        }
        return $data;
    }

    //订单付款状态修改,get方式传递参数
    public function edit(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            //status修改为2后台已同意提现
            $data['status']=2;
            $rel=M('active')->where($where)->save($data);
            $data=M('active')->where($where)->find();
            //同时根据提现地址查询提现记录表,累加已提现金额
            $where1=array(
                'address'=>$data['address'],
                'coin'=>$data['coin'],
                'username'=>$data['username'],
            );
          $id = $data['username'];
            $rel1=M('wallet')->where($where1)->find();

            if($rel){
                      // 短信应用SDK AppID
                $appid = 1400080137; // 1400开头

        // 短信应用SDK AppKey
                $appkey = "be3bde69443e1eab3241025d30fb869c";

        // 需要发送短信的手机号码
        //        $phoneNumbers = ["18674096760", "12345678902", "12345678903"];

        // 短信模板ID，需要在短信应用中申请
                $templateId = 107876;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

        // 签名
                $smsSign = "必势得"; // NOTE:
                $ssender = new SmsSingleSender($appid, $appkey);


               
                $model = D('User');
                $tel_info = $model->where("id=$id")->find();
                $tel = $tel_info['tel'];

                    $params = [];
                    $result = $ssender->sendWithParam("86", $tel, $templateId,
                    $params, $smsSign, "", "");
            //        $res = sendTemplateSMS($tel,array($code,'5'),"1");
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    //订单财务确认,get方式传递参数
    public function cwedit(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            $data['cwcode']=2;
            $rel1=M('active')->where($where)->save($data);
            if($rel1){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //订单状态修改为未确认
    public function cancel(){
        if(IS_POST){
            $where['id']=trim(I('accountid'));
            $rel=M('active')->where($where)->find();
            $where1['username']=$rel['username'];
            $rel1=M('wallet')->where($where1)->find();
            $data1['num_payout']=$rel1['num_payout']-$rel['num'];
            $data['content']=I('contents');
            //status为1表示后台未确认付款,3是异常状态
            $data['status']=3;
            $data['cwcode']=3;
            if(M('active')->where($where)->save($data) && M('wallet')->where($where1)->save($data1)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}