<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 11:16
 */
namespace Admin\Controller;

class SummationController extends CommonController{
    public function index(){
        $usersum=M('user')->count();
        $ordersum=M('order')->where("status='2' and code='2'")->count();
        $pricesum=M('order')->where("status='2' and code='2'")->sum('price');
        $walletsum=M('wallet')->where("coin='ETH'")->sum('num');
        $payout=M('wallet')->where("coin='ETH'")->sum('payout');
        $data=array(
            'usersum'=>$usersum,
            'ordersum'=>$ordersum,
            'pricesum'=>$pricesum,
            'walletsum'=>$walletsum,
            'payout'=>$payout
        );
       $this->assign('data',$data);
       $this->display('summation');
    }

}