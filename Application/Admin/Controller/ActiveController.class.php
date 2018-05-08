<?php
namespace Admin\Controller;
require "./vendor/autoload.php";

class ActiveController extends CommonController{

    public function index(){
            $data=D('active')->index();
            $this->assign('data',$data);
            $this->display('active');

    }

    public function excel(){
        $permission = $_SESSION['permission'];
        if($permission=='1' ||$permission=='2'||$permission=='3' ){
            $model = D('Active');
            $result = $model->join("LEFT JOIN bsd_user a on bsd_active.username=a.id")
                ->field('a.username,bsd_active.coin,bsd_active.address,bsd_active.num,
            bsd_active.time')
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
            $rel=D('active')->cwedit();
            if($rel){
                $this->redirect('Active/index');
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
            $rel=D('active')->edit();
            if($rel){
                $this->redirect('Active/index');
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
            $rel=D('active')->cancel();

            if($rel){
                $this->redirect('Active/index');
            }else{
                $this->error("提交处理失败！");
            }
        }else{
            $this->error("无此权限！");
        }

    }

}