<?php
namespace Home\Controller;
use Think\Controller;
//公共控制器
class TestoneController extends Controller {
    public function test(){
      $url = "http://47.104.100.228/api/poolinfo";
               $str = json_decode(http_request($url),true);
      var_dump($str);
      echo $str;die;
      
        $data1=array(
            'yesterday'=>0.184560439045
      );
//        $data2=array(
//            'yesterday'=>1.829704390308
//        );
//        $data3=array(
//            'yesterday'=>0.6589704358007
//        );
//      M('rate')->where("username=74")->save($data1);
        $data=M('rate')->select();
        dump($data);exit;
//        M('rate')->where("username=75")->save($data1);
 //       M('rate')->where("username=76")->save($data2);
//        M('rate')->where("username=77")->save($data3);
//       M('rate')->where("username=78")->save($data1);
 //       M('rate')->where("username=79")->save($data1);
 //      M('rate')->where("username=80")->save($data1);
 //       M('rate')->where("username=81")->save($data1);
 //      M('rate')->where("username=82")->save($data1);
 //       M('rate')->where("username=83")->save($data1);
//        M('rate')->where("username=84")->save($data1);
    }

    public function test1(){
        //$data=M('wallet')->select();
       // dump($data);exit;
    }
}