<?php
namespace Home\Controller;
class RateController extends CommonController{
    public function rate(){
        // $host = "http://jisuhuilv.market.alicloudapi.com";
        // $path = "/exchange/convert";
        // $method = "GET";
        // $appcode = "1b25f56da1404a66b0d068f565e4207f";
        // $headers = array();
        // array_push($headers, "Authorization:APPCODE " . $appcode);
        // $querys = "amount=10&from=USD&to=CNY";
        // $bodys = "";
        // $url = $host . $path . "?" . $querys;

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($curl, CURLOPT_FAILONERROR, false);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HEADER, true);
        // if (1 == strpos("$".$host, "https://"))
        // {
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // }
        // $str = curl_exec($curl);
        // $array=explode('"', $str);
        // $rate = $array['33'];       //一美元换算成人民币
        $rate = 6.3638;
        $url_eth = "https://api.etherscan.io/api?module=stats&action=ethprice&apikey=TQC7XJHNVCAQBI8KHM5VYQXKBKKSN5KJQF";
        $str_eth = json_decode(http_request($url_eth),true);
        $ethusd = $str_eth['result']['ethusd'];     //1 eth 等于多少美元
        $cny = ($rate * $ethusd);
        // $cny = 6.3638;
        // echo $rate.'-'.$ethusd.'-'.$cny;die;

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
            $num = 0;
            $amount = 0;
            foreach ($data1 as $key=>$value) {
                $power = $value['power'];
                if(($time-$value['start'])>86400 && ($value['end']-$time)>86400){
                    //正常时间收益
                    $num +=round((($power * $shouyi) * ($wave/100)),9);
                    $amount += $num * $cny;

                    // $model1->execute("update bsd_wallet set amount=amount+'$amount' where username='$uid'");
                    // $model1->where("username='$uid'")->setInc('yesterday',$num);
                }elseif(($time-$value['start'])<86400){
                    //订单生效到第一次结算收益
                    $num +=round((((($power * $shouyi) * ($wave/100)) / 86400)*($time-$value['start'])),9);
                    $amount += $num * $cny;
                    // $model1->execute("update bsd_wallet set yesterday='$num' where username='$uid'");
                    // $model1->execute("update bsd_wallet set amount=amount+'$amount' where username='$uid'");
                    // $model1->where("username='$uid'")->setInc('yesterday',$num);
                }

            }
$model1->execute("update bsd_wallet set yesterday='$num' where username='$uid'");
$model1->execute("update bsd_wallet set amount=amount+'$amount' where username='$uid'");

        }

    }
}