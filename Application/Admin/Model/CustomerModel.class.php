<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 14:50
 */
namespace Admin\Model;
use Think\Model;
class CustomerModel extends Model{

    protected $_validate = array(
        array('name','require','姓名不能为空！'), //默认情况下用正则进行验证
        array('tel','require','电话不能为空！'), //默认情况下用正则进行验证
        array('qq','require','QQ不能为空！'), //默认情况下用正则进行验证
        array('email','require','邮件不能为空！'),//默认情况下用正则进行验证
    );

    //查询出所有后台订单信息，并返回给前台
    public function index(){
        return M('customer')->select();
    }

    public function add(){
        $data=array(
            'name'=>I('name'),
            'tel'=>I('tel'),
            'qq'=>I('qq'),
            'mail'=>I('mail'),
            'vip'=>1
        );
        if(M('customer')->add($data)){
            return true;
        }else{
            return false;
        }
    }


    public function delete(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            if(M('customer')->where($where)->delete()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}