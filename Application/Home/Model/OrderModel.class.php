<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/16
 * Time: 10:22
 */
namespace Home\Model;
use Think\Model;
class OrderModel extends Model{
    //新订单创建
    public function order(){
        $day = I('day');
        $end = time() + (86400 * $day * 365);
        //第几期,预留从数据库读取当前第几期
        $stages=3;
        $data=array(
            'orderid'=>"BSD".date(YmdHis).rand(100,999),    //订单号码 BSD+时间+随机数
            'username'=>session('user_id'),    //订单用户id
            'coin'=>trim(I('coin')),            //币种
            'power'=>trim(I('power')),          //算力
            'start'=>time(),                    //开始时间戳
            'day'=>$day,               //购买天数单位年
            'end'=>trim($end),
            'ordertime'=>date(YmdHis),      //订单时间
            'stages'=>$stages,                    //第几期
            'price'=>trim(I('price')),         //订单价格
            'status'=>1                         //订单状态,1是未支付，2已支付
        );
        return $this->checkstatus($data);

    }

    //订单续费数据库操作
    public function addorder($fid){
        $end=I('end');
        $day = I('day');
        //续费订单的结束时间戳+购买天数的时间戳=新的结束时间
        $newend=$end+(86400*$day*365);
        //第几期,预留从数据库读取当前第几期
        $stages=3;
        $data=array(
            'orderid'=>"BSD".date(YmdHis).rand(100,999),    //订单号码 COIN+时间
            'username'=>session('user_id'),    //订单用户
            'coin'=>trim(I('coin')),            //币种
            'power'=>trim(I('power')),          //算力
            'start'=>$end,                    //续费开始时间戳等于上一个订单的结束时间戳
            'day'=>$day,               //购买天数单位年
            'end'=>$newend,                //新的结束时间戳
            'ordertime'=>date(YmdHis),      //订单时间
            'stages'=>$stages,                    //第几期
            'price'=>trim(I('price')),         //订单价格
            'status'=>1,                        //订单状态,1是未支付，2已支付
            'retype'=>2,                         //订单种类,默认1是新单，2是续费单
             'fid'=>$fid
        );
        return $this->checkstatus($data);
    }


    //核查订单是否满足创建条件
    public function checkstatus($data){
        $where['status']=1;
        $where['username']=session('user_id');

        //1.查询该用户是否有未完成订单
        $data1=$this->where($where)->find();
        if($data1!=false){
            $info=false;
            return $data1['orderid'];
        }else{
            $info=true;
        }

        //2.查询是否续费订单，续费不需要新机器
        if($data['retype']==2){
            $info1=true;
        }else{
            //默认username字段为0是表示空
            $where['username']=0;
            //查询空余机器数量
            $result=M('machine')->where($where)->count();
            //获取当前订单所需 单位算力份数
            $ordernum=$data['power']/45;
            if($result>=$ordernum){
                $info1=true;
            }else{
                $info1=false;
                return "code001";
            }
        }

        //满足上述条件后且生成订单成功返回订单号
        if($info==true && info1==true &&$this->add($data)){
            return $data['orderid'];
        }else{
            return "code002";
        }
    }


    //订单查询,根据信息查询
    public function serchorder($data){
        $where['orderid']=$data;
        $data=M('order')->where($where)->select();
        if($data!=false){
            return $data;
        }else{
            return false;
        }
    }

    //更新订单信息，参数1.为订单号 2.为父id
    public function alreadypay($data,$fid){
        $where['orderid']=$data;
        //已支付状态为2
        $data1['status']='2';
        $rel=M('order')->where($where)->data($data1)->save();
        //查询订单种类进行后续操作
        $data=M('order')->where($where)->find();
        //retype默认值为1，表示新订单，续费订单的retype值为2
        if($data['retype']==1){
         $where1['username']=0;
         $ordernum=$data['power']/45;
         $data2=array(
             'orderid'=>$where['orderid'],
             'username'=>$data['username']
         );
        $info=M('machine')->where($where)->find();
         if(!$info){
             $rel1=M('machine')->where($where1)->limit($ordernum)->data($data2)->save();
         }else{
             $rel1=false;
         }
             if($rel1!==false){
                 return true;
             }else{
                 return false;
             }
        }else{
            return true;
        }
    }


        public function paycode(){
        $data['paycode']=trim(I('paycode'));
        $where['orderid']=I('orderid');
        $info=$this->where($where)->find();
        if($data['paycode']==$info['paycode']){
            return true;
        }else{
            return $this->where($where)->save($data);
        }
    }

}