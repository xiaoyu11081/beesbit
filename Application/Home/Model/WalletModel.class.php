<?php
namespace Home\Model;
use Think\Model;

class WalletModel extends Model{
    protected $fields=array('id','username','coin','address','num');

    public function setAddress($tel,$address){
        $data=array(
            'username' => $tel,
            'coin' => 'ETH',
            'address' =>$address,
        );
        $info = $this->where("username='$tel'")->find();
        if(!$info){
            return $this->add($data);

        }
        return $this->where("username='$tel'")->save($data);
    }
}