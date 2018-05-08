<?php
namespace Home\Controller;
class CustomerController extends CommonController{
    public function index(){
        $model = D('Customer');
        $info = $model->order('rand()')->find();
        $this->assign('info',$info);
        $article1 = D('Article');
        $article = $article1->limit(3)->order('time desc')->select();
        $this->assign('article',$article);

        $tel = $_SESSION['tel'];
        $model_user = D('User');
        $info_user = $model_user->field('id')->where("tel='$tel'")->find();
        $uid = $info_user['id'];
        $unread = D('Unread');
        $unread_new = $unread->where("user='$uid'")->find();
        $unread_news = $unread_new['art'];
        $this->assign('unread_news',$unread_news);

        $this->display();
    }
}