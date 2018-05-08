<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 11:16
 */
namespace Admin\Controller;

class NewsController extends CommonController{
    public function index(){
            $data=D('article')->index();
            $this->assign('data',$data);
            $this->display('news');

    }

    public function delete(){
        $permission = $_SESSION['permission'];
        if($permission=='1'||$permission=='6'){
            $data=D('article')->delete();
            if($data){
               $this->redirect('News/index');
            }else{
                $this->error("公告删除失败");
            }
        }else{
            $this->error("无此权限！");
        }

    }

    public function edit(){
        $permission = $_SESSION['permission'];
        if($permission=='1'||$permission=='6'){
            $this->display('editor');
        }else{
            $this->error("无此权限！");
        }
    }

    //发布公告
    public function add(){
        $permission = $_SESSION['permission'];
        if($permission=='1'||$permission=='6'){
            if (!D('article')->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error("请确认填写完全");
            }else{
                // 验证通过 可以进行其他数据操作
                $data=D('article')->add();
                $model = D('Unread');
                $data_news['art']='2';
                $model->where("art='1'")->save($data_news);
                if($data){
                    $this->redirect('News/index');
                }else{
                    $this->error("公告发布失败");
                }
            }
        }else{
            $this->error("无此权限！");
        }
    }
}