<?php
namespace Home\Controller;
class MoneyController extends CommonController{
    public function index(){
        //收益结算 定时任务 十五分钟结算一次
     $url = "http://47.104.100.228/api/poolinfo";
     $str = json_decode(http_request($url),true);
  //      $str_balance = $str['Balance'];
  //      $shouyi = sctonum($str_balance,10);
      if($str == null){
      			$shouyi=0.00007949;
        }else{
            	$str_balance = $str['Balance'];
              	$shouyi = sctonum($str_balance,10);
       }
      
     // $shouyi=0.00007949;
        // echo $shouyi;die;
        $model1 = D('Wallet');
        $data = $model1->field('username')->group('username')->select();
        foreach ($data as $k=>$v){
            $uid = $v['username'];

            $time = time();
            // $shouyi = 0.000078;        //24小时收益
            $model = D('Order');
            $data1 = $model->where("username='$uid' AND $time<end AND start<$time AND status=2 AND retype=1 AND code=2")->select();


            $wave = rand(90,94);
            foreach ($data1 as $key=>$value) {
                $power = $value['power'];
                if(($time-$value['start'])>900 && ($value['end']-$time)>900){
                    //正常时间收益
                    $num =round(((($power * $shouyi) * ($wave/100)) / 96),9);
                    $model1->where("username='$uid'")->setInc('num',$num);
                }elseif(($time-$value['start'])<900){
                    //订单生效到第一次结算收益
                    $num =round((((($power * $shouyi) * ($wave/100)) / 86400)*($time-$value['start'])),9);
                    $model1->where("username='$uid'")->setInc('num',$num);
                }elseif(($value['end']-$time)<900){
                    //订单失效 剩余时间不够下次结算产生的收益
                    $num =round((((($power * $shouyi) * ($wave/100)) / 86400)*(($value['end']-$time)+900)),9);
                    $model1->where("username='$uid'")->setInc('num',$num);
                }

            }



        }
    }
}