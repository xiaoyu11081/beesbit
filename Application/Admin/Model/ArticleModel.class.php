<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 14:50
 */
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{

    protected $_validate = array(
        array('title','require','标题不能为空！'), //默认情况下用正则进行验证
        array('content','require','标题不能为空！'), //默认情况下用正则进行验证

    );

    //查询出所有公告信息，并返回给前台
    public function index(){
        return M('article')->select();
    }

    public function delete(){
        if(IS_GET){
            $where['id']=trim(I('id'));
            if(M('article')->where($where)->delete()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function add(){
        $data=array(
            'title'=>I('title'),
            'body'=>I('content'),
            'time'=>time()
        );
        if(M('article')->add($data)){
            return true;
        }else{
            return false;
        }
    }

}