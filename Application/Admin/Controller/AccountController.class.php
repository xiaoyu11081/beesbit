<?php
namespace Admin\Controller;
require "./vendor/autoload.php";

class AccountController extends CommonController{

    public function index(){
            $data=D('account')->index();
            // echo '<pre>';
            //dump($data);die;

            $this->assign('data',$data);
            $this->display('Withdrawals');

    }

    public function excel(){
        $permission = $_SESSION['permission'];
        if($permission=='1' ||$permission=='2'||$permission=='3' ){
            $model = D('Account');
            $result = $model->join("LEFT JOIN bsd_user a on bsd_account.username=a.id")
                ->field('a.username,bsd_account.coin,bsd_account.address,bsd_account.num,
            bsd_account.time')
                ->select();;

            foreach ($result as $key => $value) {
                $result[$key]['time'] = date('Y-m-d H:i:s',$value['time']);
            }
            $data = array('用户名','币种','提现地址','提现金额(ETH)','时间');
            array_unshift($result,$data);

            $excelHead = "";
            $title = "提现记录";   #文件命名
            $headtitle= "";
            $titlename = "";
            $filename = $title.".xls";

            $this->excelData($result,$titlename,$headtitle,$filename);
        }else{
            $this->error("无此权限！");
        }

    }

    //支付到账状态修改
    public function cwedit(){
        $permission = $_SESSION['permission'];
        if($permission=='1'||$permission=='3'){
            $rel=D('account')->cwedit();
            if($rel){
                $this->redirect('Account/index');
            }else{
                $this->error("订单状态修改失败！");
            }
        }else{
            $this->error("无此权限！");
        }

    }

    public function edit(){
        $permission = $_SESSION['permission'];
        if($permission=='1' ||$permission=='2'){
            $rel=D('account')->edit();
            if($rel){
                $this->redirect('Account/index');
            }else{
                $this->error("同意提现失败！");
            }
        }else{
            $this->error("无此权限！");
        }
    }

    //异常处理
    public function cancel(){
        $permission = $_SESSION['permission'];
        if($permission=='1'||$permission=='2'||$permission=='3'){
            $rel=D('account')->cancel();

            if($rel){
               $this->redirect('Account/index');
            }else{
                $this->error("提交处理失败！");
            }
        }else{
            $this->error("无此权限！");
        }

    }

}