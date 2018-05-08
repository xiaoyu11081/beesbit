<?php
namespace Home\Controller;

class IndexController extends CommonController {
    public function index(){
        //当每次访问主页，如果剩余算力的展示值大于真实值，会随机降低剩余算力的展示值。
        $i=rand(1,4);
        $power=M('machine')->where("username=888")->field('power')->find();
        $num=M('machine')->where("username=0")->count();
        $relpower=$num*45;
        if($i==2 && $power['power']>$relpower){
                $data['power']=$power['power']-45*rand(5,15);
                M('machine')->where("username=888")->save($data);
                $this->assign("power",$data);
        }else{
            $this->assign("power",$power);
        }
        $this->display();
    }

    public function referrer(){
        $uid = $_SESSION['user_id'];
        //查询邀请码 生成邀请链接
        $data=M('user')->where("id='$uid'")->field('bsdcode')->find();
        if($data['bsdcode']){
            $data['bsdcode']=$data['bsdcode']."1b2s3d"."_".rand(100,999);
            $this->assign('bsdcode',$data['bsdcode']);
        }

        $this->display('referrer');
    }
}