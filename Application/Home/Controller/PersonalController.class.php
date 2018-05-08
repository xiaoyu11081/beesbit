<?php
    namespace Home\Controller;
    class PersonalController extends CommonController{
        public function index(){
            $tel = $_SESSION['tel'];
//            $model = D('User');
            $time = time();
            $this->assign('time',$time);
//            $info = $model->where("tel='$tel'")->find();
//            $this->assign('info',$info);
            $model_user = D('User');
            $info_user = $model_user->field('id,payword,mail')->where("tel='$tel'")->find();

            $uid = $info_user['id'];
            $model1 = D('Order');
            $order = $model1->where("username='$uid' AND status='2' AND end>$time AND retype='1' AND code='2'")->select();
            $this->assign('order',$order);

            // $url = "http://47.104.100.228/api/poolinfo";
            // $str = json_decode(http_request($url),true);
            // $str_balance = $str['Balance'];
            // $shouyi = sctonum($str_balance,10);
            // $this->assign('shouyi',$shouyi);

            $url = "https://api.etherscan.io/api?module=stats&action=ethprice&apikey=TQC7XJHNVCAQBI8KHM5VYQXKBKKSN5KJQF";
            $str = json_decode(http_request($url),true);
            $ethusd = $str['result']['ethusd'];
            $this->assign('ethusd',$ethusd);

            $model2 = D('Wallet');
            $wallet = $model2->where("username='$uid'")->find();

            if($info_user['payword'] == '' && $info_user['mail'] != '' && $wallet['address'] != ''){
                $set_status = '2';   //转账密码为空
            }elseif($info_user['mail'] == '' && $info_user['payword'] != '' && $wallet['address'] != ''){
                $set_status = '3';  //邮箱未绑定
            }elseif($info_user['payword'] == '' && $info_user['mail'] == '' && $wallet['address'] != ''){
                $set_status = '4';  //转账密码 邮箱都没设置
            }elseif($wallet['address'] == '' && $info_user['payword'] != '' && $info_user['mail'] != ''){
                $set_status = '5';  //地址未设置
            }elseif($info_user['payword'] == '' && $wallet['address'] == '' && $info_user['mail'] != ''){
                $set_status = '6';  //地址 转账密码未设置
            }elseif($wallet['address'] == '' && $info_user['mail'] == '' && $info_user['payword'] != ''){
                $set_status = '7';   //地址 邮箱未设置
            }elseif($info_user['mail'] == '' && $wallet['address'] == '' && $info_user['payword'] == ''){
                $set_status = '8'; //地址 邮箱 密码都未设置
            }
            // echo $set_status;die;
            $this->assign('set_status',$set_status);

            // var_dump($info_user);
            // echo $set_status;die;

            $ethusd_all = round(($ethusd * $wallet['num']),2);
            $this->assign('ethusd_all',$ethusd_all);

            $this->assign('wallet',$wallet);
            $this->assign('address',$wallet['address']);
            //$wallet1 = M('rate')->where("username='$uid'")->find();
           // $shouyi_ye=$wallet1['yesterday'];
//          $shouyi_ye = $wallet['number_ye']-$wallet['number_bf'];
            $this->assign('shouyi',$wallet['yesterday']);
            $article1 = D('Article');
            $article = $article1->limit(3)->order('time desc')->select();
            $this->assign('article',$article);

            $unread = D('Unread');
            $unread_new = $unread->where("user='$uid'")->find();
            $unread_news = $unread_new['art'];
            $this->assign('unread_news',$unread_news);

            $this->display();
        }

        public function unread(){
            $tel = $_SESSION['tel'];
            $model_user = D('User');
            $info_user = $model_user->field('id')->where("tel='$tel'")->find();
            $uid = $info_user['id'];
            $unread = D('Unread');
            $data['art'] = '1';
            $unread->where("user=$uid")->save($data);
        }

        public function payment(){
                $article1 = D('Article');
                $article = $article1->limit(3)->order('time desc')->select();
              //  $url = "http://47.104.100.228/api/poolinfo";
               // $str = json_decode(http_request($url),true);
              //  $str_balance = $str['Balance'];
              //  $shouyi = sctonum($str_balance,10);

          if($str == null){
      			$shouyi=0.00007949;
          }else{
            	$str_balance = $str['Balance'];
              	$shouyi = sctonum($str_balance,10);
          }


                $this->assign('shouyi',$shouyi);
                $this->assign('article',$article);

                $tel = $_SESSION['tel'];
                $model_user = D('User');
                $info_user = $model_user->field('id')->where("tel='$tel'")->find();
                $uid = $info_user['id'];
                $unread = D('Unread');
                $unread_new = $unread->where("user='$uid'")->find();
                $unread_news = $unread_new['art'];
                $this->assign('unread_news',$unread_news);

                $machinenum=M('machine')->where("username='0'")->count();
                $powernum=$machinenum*45;
                $this->assign('powernum',$powernum);
                $this->display();
        }


        //查询我的矿机详情
        public function mills(){

            $this->upmills();
            $uid = $_SESSION['user_id'];
            $model = M('machine');
            $data = $model->join("LEFT JOIN bsd_order a on bsd_machine.orderid=a.orderid ")
                ->where("bsd_machine.username='$uid' and a.code=2")
                ->field('bsd_machine.num,a.orderid,bsd_machine.status,bsd_machine.power')->select();

            foreach ($data as $key => &$value) {
                $wave = mt_rand(920,960);
                $value['power'] = round(($value['power'] * ($wave/1000)),2);
            }
            $this->assign('data',$data);
            $time = date("Y-m-d H:i",time());
            $this->assign('time',$time);
            $article1 = D('Article');
            $article = $article1->limit(3)->order('time desc')->select();
            $this->assign('article',$article);

            $unread = D('Unread');
            $unread_new = $unread->where("user='$uid'")->find();
            $unread_news = $unread_new['art'];
            $this->assign('unread_news',$unread_news);
            $this->display();
        }

        //过期信息
        public function upmills(){
            $uid = $_SESSION['user_id'];
            $machine = M('machine');
            $time=time();
            //通过订单号链表查询，根据过期订单信息，清除机器表中的过期信息
            $info=$machine->join("LEFT JOIN bsd_order a on bsd_machine.orderid=a.orderid ")
                ->where("bsd_machine.username='$uid'")
                ->where("a.end<='$time'")
                ->field('a.orderid,a.username,a.end')->group('a.orderid')
                ->select();
            $cancle1=array(
                'username'=>0,
                'orderid'=>null
            );

            for($i=0;$i<count($info);$i++){
                $where1=array(
                    'username'=>$info[$i]['username'],
                    'orderid'=>$info[$i]['orderid']
                );
                $machine->where($where1)->save($cancle1);
            }
        }

        public function setAddress(){
            $address = I('post.address');
            $payword_ads = I('post.payword_ads');
            $payword_address = md5(md5($payword_ads));
            $tel = $_SESSION['tel'];
            $model_user = D('User');
            $info_user = $model_user->field('id,payword')->where("tel='$tel'")->find();
            $uid = $info_user['id'];

            if($info_user['payword'] != $payword_address){
                $this->ajaxReturn(array('status'=>0,'msg'=>'提现密码错误'));
            }

            if(!$address){
                $this->ajaxReturn(array('status'=>0,'msg'=>'钱包地址为空'));
            }
            if((strlen($address) != 42) || (!preg_match("/^0x/",$address))){
                $this->ajaxReturn(array('status'=>0,'msg'=>'钱包地址形式不对'));
            }

            $model = D('Wallet');
            $info = $model->setAddress($uid,$address);
            if(!$info){
                $this->ajaxReturn(array('status'=>0,'msg'=>'设置失败'));
            }
            $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
        }

        public function setmail(){
            $tel = $_SESSION['tel'];
            $emailcode =I('post.emailcode');//验证码
            $mail = I('post.mail');
            //获取session中存储的验证码信息
            $data=session('emailcode');
            if(!$data){
                $this->ajaxReturn(array('status'=>0,'msg'=>'没有发送验证码'));
            }
            //判断验证码是否过期
            if($data['time']+$data['limit']<time()){
                $this->ajaxReturn(array('status'=>0,'msg'=>'验证码过期'));
            }
            if($data['code']!=$emailcode){
                $this->ajaxReturn(array('status'=>0,'msg'=>'验证码错误'));
            }
            $model = D('User');
            $info = $model->setmail($tel,$mail);
            if(!$info){
                $this->ajaxReturn(array('status'=>0,'msg'=>'设置失败(请勿重复绑定)'));
            }
            $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
        }

        public function setpay(){
            //设置转账密码
            $payword =I('post.payword');
            $payword2 = I('post.payword2');
            $tel =I('post.tel');//具体用户的手机号
            $telcode =I('post.telcode');//手机验证码
            //检查两次密码是否一致
//            echo $username;die;
            if($payword != $payword2){
                $this->ajaxReturn(array('status'=>0,'msg'=>'两次密码输入不一致'));
            }

            //检查目前提交的手机验证码跟发送的是否匹配
            if(!$telcode){
                $this->ajaxReturn(array('status'=>0,'msg'=>'没有输入手机验证码'));
            }
            //获取当前session中具体的信息
            $data=session('telcode');
            if(!$data){
                $this->ajaxReturn(array('status'=>0,'msg'=>'没有发送手机验证码'));
            }
            //判断验证码是否过期
            if($data['time']+$data['limit']<time()){
                $this->ajaxReturn(array('status'=>0,'msg'=>'手机验证码过期'));
            }
            if($data['code']!=$telcode){
                $this->ajaxReturn(array('status'=>0,'msg'=>'手机验证码错误'));
            }

            //实例化模型对象 调用方法入库
            $model =D('User');
            $res = $model->setpay($payword,$tel);
            if(!$res){
                $this->ajaxReturn(array('status'=>0,'msg'=>'设置失败'));
            }
            $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));

        }

        public function sendcode()
        {
            //获取具体要发送的手机号
            $tel = I('post.tel');

            if(!$tel){
                $this->ajaxReturn(array('status'=>0,'msg'=>'手机号错误'));
            }
            //根据手机号发送短信验证码
            $code = rand(100000,999999);//生成一个四位的验证码
            $res = sendTemplateSMS($tel,array($code,'5'),"1");
            if(!$res){
                $this->ajaxReturn(array('status'=>0,'msg'=>'发送验证码失败'));
            }
            //说明目前短信验证码发送成功 需要记录具体的验证码到session。
            //需要保证验证码有过期时间。关于过期时间 可以记录当前发送验证码的时间以及具体的有效时间
            $data=array(
                'code'=>$code,
                'time'=>time(),//指定当前的时间
                'limit'=>3000,//表示具体的过期时间
            );
            session('telcode',$data);
            $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
        }


    }