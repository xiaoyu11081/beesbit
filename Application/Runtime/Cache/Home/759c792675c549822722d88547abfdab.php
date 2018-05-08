<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="/bishide/wwwroot/Public/Home/img/favicon.png" rel="icon">
  <meta name="copyright" content="www.bishide.com" />
  <meta name="keywords" content="币势得, 云算力, 云挖矿,算力投资，币势得以太坊挖矿, 数字货币" />
  <meta name="description" content="币势得云算力平台是目前国内前列的云算力数字投资平台，我们为客户提供了一种轻松简单的挖矿手段 在购买算力之后我们完全帮您解决了后顾之忧">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Custom fonts for this template-->
  <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="/bishide/wwwroot/Public/Home/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Bootstrap core CSS-->
  <link href="/bishide/wwwroot/Public/Home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="/bishide/wwwroot/Public/Home/css/sb-admin.css" rel="stylesheet">
  <link href="https://cdn.bootcss.com/hover.css/2.1.1/css/hover-min.css" rel="stylesheet">
  <link href="https://cdn.bootcss.com/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="https://cdn.bootcss.com/Buttons/2.0.0/css/buttons.min.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/css/style.css" rel="stylesheet">
  <!-- main -->
  <link rel="stylesheet" href="/bishide/wwwroot/Public/Home/css/login.css">
  <link rel="stylesheet" href="/bishide/wwwroot/Public/Home/css/accordion.css">
  <link rel="stylesheet" href="/bishide/wwwroot/Public/Home/css/base.css">
  <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?7f3e86804b6d35ba33bc48fb11868dd4";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>


<title>账号登录-币势得</title>
</head>

<body class="bg-dark">
  <!--==========================
    Header
  ============================-->
  <!--==========================
  Header
============================-->
<header id="header">
  <div class="container-fluid">

    <div id="logo" class="pull-left">
      <a href="<?php echo U('Index/index');?>" class="scrollto logo">
        <svg class="icon icon-logo" aria-hidden="true">
          <use xlink:href="#icon-logo-1"></use>
        </svg>
      </a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
    </div>

    <div id="nav-menu-container" class="container">
      <ul class="nav-menu">
        <li class="hvr-underline-from-center navli">
          <a href="<?php echo U('Index/index');?>">首页</a>
        </li>
        <li class="hvr-underline-from-center navli">
          <a href="<?php echo U('Index/guide');?>">服务指南</a>
        </li>

        <li class="hvr-underline-from-center navli">
          <a href="<?php echo U('Index/referrer');?>">推荐人计划</a>
        </li>
        <svg class="icon icon-ziyuan9" aria-hidden="true">
          <use xlink:href="#icon-ziyuan9"></use>
        </svg>

        <!-- <li>
          <a href="#services">产品介绍</a>
        </li> -->
      </ul>

      <ul class="nav-menu pull-right sf-js-enabled sf-arrows">
        <?php if(isset($_SESSION['user'])): ?><li class="menu-has-children">
              <a href="<?php echo U('Personal/index');?>" class="sf-with-ul">
                <i class="fa fa-user fa-fw hidden-md-down" aria-hidden="true"></i>用户 : <span id="tel"><?php echo (yc_phone($_SESSION['tel'])); ?></span></a>
              <ul>
                <li>
                  <a href="<?php echo U('Personal/index');?>">进入用户中心</a>
                </li>
                <li>
                  <a href="<?php echo U('User/logout');?>">退出登录</a>
                </li>
              </ul>
            </li>
          <?php else: ?>
            <li class="hvr-underline-from-center navli">
              <a href="<?php echo U('User/login');?>">登录</a>
            </li>
            <li class="hvr-underline-from-center navli">
              <a href="<?php echo U('User/regist');?>">注册</a>
            </li><?php endif; ?>


      </ul>
    </div>
    <!-- #nav-menu-container -->
  </div>
</header>
<!-- #header -->


  <!-- #header -->

  <div class="container mb-2">
    <div class="row align-items-center">
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card card-login">
          <div class="card-header text-bishide">欢迎登陆币势得！</div>
          <div class="card-body">
            <form>
              <div class="form-group">
                <label>手机号</label>
                <input autocomplete="off" class="form-control" id="tel" type="text" name="tel" aria-describedby="emailHelp" placeholder="填写手机号" tabindex="1" maxlength="11">
              </div>
              <div class="form-group">
                <label>密码</label>
                <input class="form-control" name="password" type="text" placeholder="填写密码" tabindex="2" onfocus="this.type='password'">
              </div>
              <label>图形验证</label>
              <div class="input-group mb-3">
                <input autocomplete="off" class="form-control mr-2" name="captcha" type="text" placeholder="填写验证码" tabindex="3"  maxlength="4">
                <div class="input-group-append">
                  <img src="<?php echo U('verify');?>" id="verify" width="150" height="40">
                </div>
              </div>

              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" tabindex="4">记住密码</label>
                </div>
              </div>
              <input class="btn btn-danger btn-block" type="submit" value="登录">
            </form>
            <div class="text-center">
              <a class="d-block small mt-3 pull-left" href="<?php echo U('User/regist');?>">注册账号</a>
              <a class="d-block small mt-3 pull-right" href="<?php echo U('User/forgot');?>">忘记密码?</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-12 mt-4 text-left text-bishide hidden-sm-down">
        <h5>欢迎来到币势得云算力</h5>
        <p>币势得云算力平台是目前国内前列的云算力数字投资平台</p>
      </div>
    </div>

  </div>

  <!--==========================
    Footer
  ============================-->
  <!-- <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>BizPage</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">Home</a>
              </li>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">About us</a>
              </li>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">Services</a>
              </li>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">Terms of service</a>
              </li>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">Privacy policy</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street
              <br> New York, NY 535022
              <br> United States
              <br>
              <strong>Phone:</strong> +1 5589 55488 55
              <br>
              <strong>Email:</strong> info@example.com
              <br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#" class="facebook">
                <i class="fa fa-facebook"></i>
              </a>
              <a href="#" class="instagram">
                <i class="fa fa-instagram"></i>
              </a>
              <a href="#" class="google-plus">
                <i class="fa fa-google-plus"></i>
              </a>
              <a href="#" class="linkedin">
                <i class="fa fa-linkedin"></i>
              </a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email">
              <input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <!-- <div class="container">
      <div class="copyright">
        &copy; Copyright
        <strong>BizPage</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Best
        <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade
      </div>
    </div> -->
  </footer>
  <!-- #footer -->

  <!-- Bootstrap core JavaScript-->

</body>
<!-- Bootstrap core JavaScript-->
<script src="/bishide/wwwroot/Public/Home/vendor/jquery/jquery.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="/bishide/wwwroot/Public/Home/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="/bishide/wwwroot/Public/Home/vendor/datatables/jquery.dataTables.js"></script>
<script src="/bishide/wwwroot/Public/Home/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/bishide/wwwroot/Public/Home/js/sb-admin.js"></script>
<!-- Custom scripts for this page-->
<script src="/bishide/wwwroot/Public/Home/js/sb-admin-datatables.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/js/personal.js" charset="utf-8"></script>
<script src="https://cdn.bootcss.com/Buttons/2.0.0/js/buttons.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap-slider/10.0.0/bootstrap-slider.js"></script>
<script src="http://at.alicdn.com/t/font_588435_4pfjbl7xrgwopqfr.js"></script>
<script src="https://cdn.bootcss.com/clipboard.js/2.0.0/clipboard.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/layer/layer.js"></script>
<script type="text/javascript" src="/bishide/wwwroot/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/bishide/wwwroot/Public/Home/js/jquery.cookie.js"></script>
<script>
    $('#messagesDropdown').click(function(){
        $.ajax({
            url:"<?php echo U('Personal/unread');?>",
            type:'text',
            success:function(msg){
            }
        });
        $('#news').text('');
    })
</script>
</html>
<script>
    //实现使用jQueryForm实现表单提交
    $('form').submit(function(){
        //具体实现使用jqueryForm的方式ajax提交
        $(this).ajaxSubmit({
            url:"<?php echo U('login');?>",//指定表单的提交地址
            type:'post',//表示具体的请求类型 post/get
            dataType:'json',//指定数据交互格式
            success:function(msg){
                if(msg.status==1){
                    //表示登录成功
                    location.href="<?php echo U('Personal/index');?>";
                }else{
                    layer.msg(msg.msg);
                }
            }
        });
        //阻止当前的表单默认的提交
        return false;
    });
    $('#verify').click(function(){
        var url = "<?php echo U('verify');?>"+"?date="+ new Date().getTime();
        $(this).attr('src',url);
    })

</script>