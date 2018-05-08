<?php
/**
  * 发送模板短信
  * @param to 手机号码集合,用英文逗号分开
  * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
  * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
  */
function sendTemplateSMS($to,$datas,$tempId)
{

	include_once("../sms/CCPRestSmsSDK.php");

	//主帐号,对应开官网发者主账号下的 ACCOUNT SID
	$accountSid= '8aaf07086010a0eb01602bb3e9000b29';

	//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
	$accountToken= '8807813ac3be4521bc33f5ec28a6de34';

	//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
	//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
	$appId='8a216da861f5a2570162033efca90527';

	//请求地址
	//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
	//生产环境（用户应用上线使用）：app.cloopen.com
	$serverIP='sandboxapp.cloopen.com';

	//请求端口，生产环境和沙盒环境一致
	$serverPort='8883';

	//REST版本号，在官网文档REST介绍中获得。
	$softVersion='2013-12-26';

    $rest = new \REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);

    $result = $rest->sendTemplateSMS($to,$datas,$tempId);
    if($result == NULL ) {
        return false;
    }
    if($result->statusCode!=0) {
        return false;
    }
    return true;
}

function sctonum($num, $double = 5){
    if(false !== stripos($num, "e")){
        $a = explode("e",strtolower($num));
        return bcmul($a[0], bcpow(10, $a[1], $double), $double);
    }else{
      return $num;
    }
}

function http_request($url, $data=null) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //禁止服务器端校检SSL证书

    if(!empty($data)) {

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //以文档流的形式返回数据
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

    $output = curl_exec($ch);

    curl_close($ch);

    return $output;
}

function yc_phone($str){
    $str=$str;
    $resstr=substr_replace($str,'****',3,4);
    return $resstr;
}

function NumToStr($num){
 if (stripos($num,'e')===false) return $num;
 $num = trim(preg_replace('/[=\'"]/','',$num,1),'"');
 $result = "";
 while ($num > 0){
  $v = $num - floor($num / 10)*10;
  $num = floor($num / 10);
  $result = $v . $result;
 }
 return $result; 
}

