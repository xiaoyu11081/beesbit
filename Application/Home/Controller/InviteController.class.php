<?php
namespace Home\Controller;
class InviteController extends CommonController{
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
        $model_user = D('User');
        $data = $model_user->field('id,fid')->select();
        $data_wal = M('Wallet')->field('one,two,vip')->find();
        $one = $data_wal['one'];
        $two = $data_wal['two'];
        $vip = $data_wal['vip'];
        // echo $vip;die;
        foreach ($data as $k=>$v){
            $uid = $v['id'];
            $fid = intval($v['fid']);
            $time = time();
            // $shouyi = 0.000078;        //24小时收益
            $model = D('Order');
            $value = $model->where("username='$uid' AND $time<end AND start<$time AND status=2 AND retype=1 AND code=2")->group('id')->find();
            $info_one = M('User')->field('fid')->where("id=$fid")->find();
            // // echo '<pre>';
            // var_dump($info_one);
            $id_one = $info_one['fid'];
            // echo $id_one;die;
            $wave = rand(90,94);

                $power = $value['power'];
                if(($time-$value['start'])>900 && ($value['end']-$time)>900){
                    //正常时间收益
                    $num =round(((($power * $shouyi) * ($wave/100)) / 96),9) * $one;
                    $num_two = round(((($power * $shouyi) * ($wave/100)) / 96),9) * $two;
                    M('Wallet')->where("username='$uid'")->setInc('num_invite',$num);
                    M('Wallet')->where("username='$uid'")->setInc('num_inviteTwo',$num_two);

                $isvip = M('User')->field('level')->where("id=$fid")->find();
                if($info_one != null){
                    $isvip_one = M('User')->field('level')->where("id=$id_one")->find();
                }

                if($isvip != null){
                    if($isvip['level'] == '1'){
                    M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num*$vip);
                    }else{
                        M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num);
                    }
                }
                if($isvip_one != null){
                     if($isvip_one['level'] == '1'){
                        M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two*$vip);
                    }else{
                        M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two);
                    }
                }

                    // M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num);
                    //M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two);
                }elseif(($time-$value['start'])<900){
                    //订单生效到第一次结算收益
                    $num =round((((($power * $shouyi) * ($wave/100)) / 86400)*($time-$value['start'])),9) * $one;
                    $num_two =round((((($power * $shouyi) * ($wave/100)) / 86400)*($time-$value['start'])),9) * $two;
                    M('Wallet')->where("username='$uid'")->setInc('num_invite',$num);
                    M('Wallet')->where("username='$uid'")->setInc('num_inviteTwo',$num_two);
                $isvip = M('User')->field('level')->where("id=$fid")->find();
                if($info_one != null){
                    $isvip_one = M('User')->field('level')->where("id=$id_one")->find();
                }
                if($isvip != null){
                    if($isvip['level'] == '1'){
                    M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num*$vip);
                    }else{
                        M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num);
                    }
                }
                if($isvip_one != null){
                     if($isvip_one['level'] == '1'){
                        M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two*$vip);
                    }else{
                        M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two);
                    }
                }
                   //M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num);
                    //M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two);
                }elseif(($value['end']-$time)<900){
                //     //订单失效 剩余时间不够下次结算产生的收益
                //     $num =round((((($power * $shouyi) * ($wave/100)) / 86400)*(($value['end']-$time)+900)),9) * $one;
                //     $num_two =round((((($power * $shouyi) * ($wave/100)) / 86400)*(($value['end']-$time)+900)),9) * $two;
                //     M('Wallet')->where("username='$uid'")->setInc('num_invite',$num);
                //     M('Wallet')->where("username='$uid'")->setInc('num_inviteTwo',$num_two);
                // $isvip = M('User')->field('level')->where("id=$fid")->find();
                // $isvip_one = M('User')->field('level')->where("id=$id_one")->find();
                // if($isvip != null){
                //     if($isvip['level'] == '1'){
                //     M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num*$vip);
                //     }else{
                //         M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num);
                //     }
                // }
                // if($isvip_one != null){
                //      if($isvip_one['level'] == '1'){
                //         M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two*$vip);
                //     }else{
                //         M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two);
                //     }
                // }
                //    //M('Wallet')->where("username='$fid'")->setInc('num_inviteAll',$num);
                //    // M('Wallet')->where("username='$id_one'")->setInc('num_inviteAll',$num_two);
                }
        }
    }
}