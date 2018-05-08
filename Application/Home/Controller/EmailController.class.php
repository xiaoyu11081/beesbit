<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/9
 * Time: 9:59
 */
namespace Home\Controller;
require_once($_SERVER ['DOCUMENT_ROOT']."/Public/phpmailer/functions.php");
class EmailController extends CommonController {

////发送邮箱验证码
//    public function sendMail($to,$title,$content){
//
////引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
//        require_once($_SERVER ['DOCUMENT_ROOT']."/bishide/wwwroot/Public/phpmailer/class.phpmailer.php");
//        require_once($_SERVER ['DOCUMENT_ROOT']."/bishide/wwwroot/Public/phpmailer/class.smtp.php");
//
////实例化PHPMailer核心类
//        $mail = new PHPMailer();
//        $this->ajaxReturn(array('status'=>0,'msg'=>$mail));
////是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
//        $mail->SMTPDebug = 1;
//
////使用smtp鉴权方式发送邮件
//        $mail->isSMTP();
//
////smtp需要鉴权 这个必须是true
//        $mail->SMTPAuth=true;
//
////链接qq域名邮箱的服务器地址
//        $mail->Host = 'smtp.qq.com';
//
////设置使用ssl加密方式登录鉴权
//        $mail->SMTPSecure = 'ssl';
//
////设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
//        $mail->Port = 465;
//
////设置smtp的helo消息头 这个可有可无 内容任意
//// $mail->Helo = 'Hello smtp.qq.com Server';
//
////设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
//        $mail->Hostname = 'localhost';
//
////设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
//        $mail->CharSet = 'UTF-8';
//
////设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
//        $mail->FromName = '币势得';
//
////smtp登录的账号 这里填入字符串格式的qq号即可
//        $mail->Username ='285890140';
//
////smtp登录的密码 使用生成的授权码（就刚才叫你保存的最新的授权码）
//        $mail->Password = 'qqqioysbohdjbiig';
//
////设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
//        $mail->From = '285890140@qq.com';
//
////邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
//        $mail->isHTML(true);
//
////设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
//        $mail->addAddress($to,'邮箱验证码');
//
////添加多个收件人 则多次调用方法即可
//// $mail->addAddress('xxx@163.com','lsgo在线通知');
//
////添加该邮件的主题
//        $mail->Subject = $title;
//
////添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
//        $mail->Body = $content;
//
////为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
//// $mail->addAttachment('./d.jpg','mm.jpg');
////同样该方法可以多次调用 上传多个附件
//// $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');
//
//        $status = $mail->send();
//
////简单的判断与提示信息
//        if($status) {
//            return true;
//        }else{
//            return false;
//        }
//    }

    //过滤信息防止攻击
    public function test_input($data) {
//	    trim() 函数移除字符串两侧的空白字符或其他预定义字符。
        $data = trim($data);
        /*stripslashes() 函数删除由 addslashes() 函数添加的反斜杠。
           该函数可用于清理从数据库中或者从 HTML 表单中取回的数据。
             * */
        $data = stripslashes($data);
        /*
     *htmlspecialchars() 函数把预定义的字符转换为 HTML 实体。
预定义的字符是：
& （和号）成为 &
" （双引号）成为 "
' （单引号）成为 '
< （小于）成为 <
> （大于）成为 >
     * */
        $data = htmlspecialchars($data);
        return $data;
    }

    public function sendemail(){
        //获取具体要发送的邮箱
        $email = I('email');
        if (empty($email))
        {
            $this->ajaxReturn(array('status'=>0,'msg'=>'邮箱是必须的'));
        }
        else
        {
            //过滤信息
            $email =  $this->test_input($email);
            // 检测邮箱是否合法
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
            {
                $this->ajaxReturn(array('status'=>0,'msg'=>'邮箱格式不正确'));
            }
            //生成一个验证码
            $code = rand(100000,999999);
            $dada="币势得邮箱验证码：".$code;
            $flag = sendMail($email,'你有一条验证消息!',$dada);
            if($flag){
                //说明目前短信验证码发送成功 需要记录具体的验证码到session。
                //需要保证验证码有过期时间。关于过期时间 可以记录当前发送验证码的时间以及具体的有效时间
                $data=array(
                    'code'=>$code,
                    'time'=>time(),//指定当前的时间
                    'limit'=>3000,//表示具体的过期时间
                );
                session('emailcode',$data);
                $this->ajaxReturn(array('status'=>1,'msg'=>'ok'));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'发送失败，请稍后重试!'));
            }
        }
    }


}
