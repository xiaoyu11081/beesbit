<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 14:50
 */
namespace Admin\Controller;
class OrderController extends CommonController{
    //后台订单详情页
    public function index(){
            $data=D('order')->index();
            $this->assign('data',$data);
            $this->display('personal');
    }


    public function excel(){
        $permission = $_SESSION['permission'];
        if($permission=='1' ||$permission=='2'||$permission=='3' ){
            $model = D('Order');
            $result = $model->join("LEFT JOIN bsd_user a on bsd_order.username=a.id")
                ->field('bsd_order.orderid,a.username,bsd_order.coin,bsd_order.power,bsd_order.price')
                ->select();

            $data = array('订单编号','用户名','币种','算力(MH/s)','价格(CNY)');
            array_unshift($result,$data);

            $excelHead = "";
            $title = "订单记录";   #文件命名
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
        if($permission=='1' ||$permission=='2' ){
            $rel=D('order')->cwedit();
            if($rel){
                $this->redirect('Order/index');
            }else{
                $this->error("订单状态修改失败！");
            }
        }else{
            $this->error("无此权限！");
        }

    }
  

    //订单状态修改
    public function edit(){
        $permission = $_SESSION['permission'];
        if($permission=='1' ||$permission=='3' ){
            $rel=D('order')->edit();
            if($rel){
               $this->redirect('Order/index');
            }else{
                $this->error("订单状态修改失败！");
            }
        }else{
            $this->error("无此权限！");
        }

    }



    //删除订单
    public function delete(){
        $permission = $_SESSION['permission'];
        if($permission=='1'){
            $rel=D('order')->delete();
            if($rel){
                $this->redirect('Order/index');
            }else{
                $this->error("订单删除失败！");
            }
        }else{
            $this->error("无此权限！");
        }
    }
}

