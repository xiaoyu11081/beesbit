<?php if (!defined('THINK_PATH')) exit();?><!--#include file="include/main-css.html"  -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="copyright" content="www.bishide.com" />
  <meta name="keywords" content="币势得, 云算力, 云挖矿,算力投资，币势得以太坊挖矿, 数字货币" />
  <meta name="description" content="币势得云算力平台是目前国内前列的云算力数字投资平台，我们为客户提供了一种轻松简单的挖矿手段 在购买算力之后我们完全帮您解决了后顾之忧">
  <!-- Favicons -->
  <link href="/bishide/wwwroot/Public/Home/img/favicon.png" rel="icon">
  <link href="/bishide/wwwroot/Public/Home/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.bootcss.com/hover.css/2.1.1/css/hover-min.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/css/sb-admin.css" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="/bishide/wwwroot/Public/Home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.bootcss.com/Buttons/2.0.0/css/buttons.min.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <!-- Main Stylesheet File -->
    <link href="/bishide/wwwroot/Public/Home/css/default.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/css/htmleaf-demo.css" rel="stylesheet">
  <link href="/bishide/wwwroot/Public/Home/css/style.css" rel="stylesheet">
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

<title>币势得算力云</title>

</head>

<body>

  <!--#include file="include/account-header.html"  -->
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


  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <!-- <ol class="carousel-indicators"></ol> -->

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active htmleaf-container">
            <div class="carousel-container">
              <div class="carousel-content">

                      <h1><b class="text-warning">B003期</b> 币势得算力仅剩</h1>
                      <h1 class="js-odoo"></h1>
                  <div class="container">
                      <input type="hidden" name="" value="<?php echo ($power["power"]); ?>" id="suanli">
                      <div class="row justify-content-around">
                          <?php if(!isset($_SESSION['user'])): ?><a href="<?php echo U('User/regist');?>" class="col-lg-5 btn btn-outline-light mb-3">立即注册</a>
                      <a href="<?php echo U('User/login');?>" class="col-lg-5 btn btn-outline-light mb-3">账号登录</a>
                      <?php else: ?>
                          
                      <a href="<?php echo U('Personal/index');?>" class="col-lg-5 btn btn-outline-light mb-3">我的个人中心</a><?php endif; ?>
                  </div>
                  </div>
                  </if>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>
  <!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>币势得</h3>
          <p class="text-left">币势得云算力平台是国内先进的云算力数字投资平台。我们拥有最专业的云算力解决方案：我们拥有强大的技术团队，确保云算力的稳定运行；我们会员的收益尤为显著！加入币势得会员，您可以在币势得享受更多优质服务。
          </p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp hvr-float-shadow">
            <div class="about-col">
              <div class="img">
                <img src="http://p83bf6y5o.bkt.clouddn.com/about-mission.jpg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#services">投资收益</a></h2>
              <p>
                投资云算力是一种简单直接、收益率较高的投资手段。您只需要在我们的个人中心里就能每天看到自己的实际收益。 
              </p>
              <p class="text-center col-md-10 offset-md-1">
                <a href="#services" class="btn btn-danger btn-block">了解算力套餐</a>
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp hvr-float-shadow" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="http://p83bf6y5o.bkt.clouddn.com/about-plan.jpg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#facts">硬件设备</a></h2>
              <p>
                我们拥有国内最优质的硬件资源，精心组建的优秀技术团队，足以保障您的算力时刻高效的运转。</p><br>
                <div class="text-center">
                  <p class="text-center col-md-10 offset-md-1">
                    <a href="#facts" class="btn btn-danger btn-block">了解云算力</a>
                  </p>
                </div>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp hvr-float-shadow" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="http://p83bf6y5o.bkt.clouddn.com/about-vision.jpg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#vs">自由灵活</a></h2>
              <p>
                我们的云算力储备充裕，您可以任意购买我们云算力储备范围内的算力，并且自由的选择云算力的运行时间，后期我们还有提供更多的云算力套餐。
                <div class="text-center">
                  <p class="text-center col-md-10 offset-md-1">
                    <a href="#vs" class="btn btn-danger btn-block">了解币势得优点</a>
                  </p>
                </div>
            </div>
          </div>



        </div>

      </div>
    </section>
    <!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>云算力套餐</h3>
          <p>&nbsp;</p>
        </header>

        <div class="row justify-content-between">

          <div class="col-lg-4 col-md-6 box wow fadeInUp" data-wow-duration="1.4s">
            <div class="card text-center">
              <div class="card-header bg-danger con"><div class="subscript">热销中</div>第B003期热销中</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">算力功率 45MH/S</li>
                <li class="list-group-item">算力租赁时限2年（24个月-720天）<i class="fa fa-fw mr-2 fa-exclamation-triangle text-warning" data-placement="right" data-toggle="tooltip" title="每年两天国家电网电力检修、每年三天矿场停机维护，两年共10天不可抗因素损耗"></i></li>
                <li class="list-group-item">算力租赁价格（CNY）5625/2年</li>
                <li class="list-group-item">
                    <?php if(isset($_SESSION['user'])): ?><a href="<?php echo U('Personal/payment');?>" class="btn btn-danger btn-block">立即部署算力</a>
                        <?php else: ?>
                        <a href="<?php echo U('User/login');?>" class="btn btn-danger btn-block">立即部署算力</a><?php endif; ?>
                </li>
                <li class="list-group-item text-right">
                      <a href="http://www.beesbit.com/Index/guide.html#services" class="card-link" target="_self">存在疑问？</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 box wow fadeInUp" data-wow-duration="1.4s">
            <div class="text-center">
              <div class="card-body text-left">
                <h5 class="card-title">ETH（以太坊）挖矿</h5>
                <p class="card-text">以太坊（Ethereum）是一个开源的有智能合约功能的公共区块链平台。通过其专用加密货币以太币（ETH）提供去中心化的虚拟机来处理点对点合约。以太坊未来将被发展成为大型区块链应用商店与平台，升值空间巨大。
                </p>
                <h5 class="card-title">合约时间</h5>
                <p class="card-text">本算力合约可运行2年。然而，如果以太坊（ETH）在合约期之前切换到权益证明，我们将配合您使用租赁的硬件来挖掘最赚钱的货币。
                </p>
                <!--
                <a href="#" class="btn btn-danger">立即续费</a> -->
              </div>
              <!-- <div>
                2 days ago
              </div> -->
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- #services -->

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>什么是云算力？</h3>
          <div class="col-lg-12 col-md-12 box wow fadeIn">
            <div class="text-center">
              <div class="card-body">
                <p class="card-text text-left">云算力指的是远程云算力中心产生的算力，您不需要将矿机放在家中，忍受因矿机产生的庞大的噪音和热量，也不需要担心您的设备很快过时。由于我们有着完善的技术团队，所以您也不需要担心因为软硬件问题导致的机器宕机。您只需要每天看着您的货币资产增加即可。
                </p>

                <div class="col-md-4 offset-md-4">
                    <?php if(isset($_SESSION['user'])): ?><a href="<?php echo U('Personal/payment');?>" class="btn btn-danger btn-block">立即部署算力</a>
                        <?php else: ?>
                        <a href="<?php echo U('User/login');?>" class="btn btn-danger btn-block">立即部署算力</a><?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </header>

        <div class="facts-img">
          <img src="http://p83bf6y5o.bkt.clouddn.com/image/png/model-img.png" width="600" class="img-fluid wow fadeIn" data-wow-delay="0.5" style=" visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        </div>

      </div>
    </section>
    <!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <!--==========================
      About Us Section
    ============================-->
    <section id="vs">

      <div class="container">
        <header class="section-header">
          <h3>为何币势得云算力是更佳的选择？</h3>
          <p></p>
        </header>

        <div class="row justify-content-between">

          <div class="col-md-4 col-sm-12 wow bounceInLeft mb-4">
            <ul class="list-group list-group-flush" id="bishide-list">
              <li class="list-group-item list-group-item-action text-center">
                <h4>
<svg class="icon mr-2 icon-ziyuan5" aria-hidden="true">
                                  <use xlink:href="#icon-ziyuan5"></use>
                                </svg>币势得云算力特点</h4>
              </li>
              <li class="list-group-item list-group-item-action">只有购买时产生费用，无后续费用
                <i class="fa fa-check text-success pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">算力随时随刻产生收益
                <i class="fa fa-check text-success pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">没有电力成本
                <i class="fa fa-check text-success pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">短时间内即可收益
                <i class="fa fa-check text-success pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">算力24小时运行产生收益
                <i class="fa fa-check text-success pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">无制冷成本
                <i class="fa fa-check text-success pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">无噪音污染
                <i class="fa fa-check text-success pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">无其他风险
                <i class="fa fa-check text-success pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item justify-content-between">
                  <?php if(isset($_SESSION['user'])): ?><a href="<?php echo U('Personal/payment');?>" class="btn btn-danger btn-block">立即部署算力</a>
                      <?php else: ?>
                      <a href="<?php echo U('User/login');?>" class="btn btn-danger btn-block">立即部署算力</a><?php endif; ?>
              </li>
            </ul>
          </div>

          <div class="col-md-4 col-sm-12 wow bounceInRight mb-4">
            <ul class="list-group list-group-flush">
              <li class="list-group-item list-group-item-action text-center">
                <h4>自己购买矿机特点</h4>
              </li>
              <li class="list-group-item list-group-item-action">购买价格高，后续费用不可控
                <i class="fa fa-close text-danger pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">矿机必须开机才能产生收益
                <i class="fa fa-close text-danger pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">矿机收益不稳定
                <i class="fa fa-close text-danger pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">电力成本很高
                <i class="fa fa-close text-danger pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">运输就可能出现损耗
                <i class="fa fa-close text-danger pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">矿机损坏则无法获取收益
                <i class="fa fa-close text-danger pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">额外制冷成本
                <i class="fa fa-close text-danger pull-right mt-1 fa-fw"></i>
              </li>
              <li class="list-group-item list-group-item-action">噪音巨大，扰民且风险巨大
                <i class="fa fa-close text-danger pull-right mt-1 fa-fw"></i>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row vs-banner">
      </div>
    </section>
    <!-- #about -->

    <!-- #contact -->

  </main>

  <!--#include file="include/main-footer.html"  -->
  <!--==========================
  Footer
============================-->
<script src="https://cdn.bootcss.com/popper.js/1.14.1/esm/popper.js"></script>
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-info">
          <h3><svg class="icon mr-2 icon-ziyuan5 mr-2" aria-hidden="true">
<use xlink:href="#icon-ziyuan5"></use></svg>币势得</h3>
          
			<?php if(!isset($_SESSION['user'])): ?><a href="<?php echo U('User/regist');?>" class="text-white btn btn-danger btn-block">立即注册</a>
            <a href="<?php echo U('User/login');?>" class="text-white btn btn-danger btn-block">账号登录</a><?php endif; ?>
          
        </div>

        <div class="col-lg-2 col-md-6 footer-links hidden-xs-down">
          <h4>报价</h4>
          <ul>
            <li>
              <a target="_blank" href="https://block.cc/">Block.cc</a>
            </li>
            <li>
              <a target="_blank" href="https://www.aicoin.net.cn/">AICOIN</a>
            </li>
            <li>
              <a target="_blank" href="https://www.feixiaohao.com/">非小号</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 footer-links hidden-xs-down">
          <h4>交易</h4>
          <ul>
            <li>
              <a target="_blank" href="https://www.huobi.pro">火币网</a>
            </li>
            <li>
              <a target="_blank" href="https://www.okex.cn">OKEX</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 footer-links hidden-xs-down">
          <h4>资讯</h4>
          <ul>
            <li>
              <a target="_blank" href="http://www.8btc.com">巴比特</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>联系我们</h4>

          <div class="social-links">
            <a class="btn">
              <i class="fa fa-phone"></i>
            </a>
              热线电话：<a href="tel:027-65523960">027-65523960</a>
            <br>
            <a id="bishide" tabindex="0" class="btn mt-1" role="button" data-toggle="hover" data-html="true">
              <i class="fa fa-qq"></i>
            </a>
            <span>
              QQ群号：597776431
            </span>
            <!-- <a id="wechat" style="background-image:url('app.png')" class="btn" data-toggle="popover" data-placement="right">
              <i class="fa fa-weixin"></i>
            </a>
            <a id="weibo" style="background-image:url('app.png')" class="btn" data-toggle="popover" data-placement="right">
              <i class="fa fa-weibo"></i>
            </a> -->

          </div>

        </div>

        <!-- <div class="col-lg-3 col-md-6 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
          <form action="" method="post">
            <input type="email" name="email">
            <input type="submit" value="Subscribe">
          </form>
        </div> -->

      </div>
    </div>
  </div>

  <div class="container-fluid position-relative pb-3">
    <div class="copyright">
      &copy; Copyright
      <strong class="text-bishide">币势得</strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
      -->
      <a>湖北必势得云计算技术有限公司</a>
    </div>
  </div>
</footer>
  <a href="#" class="back-to-top">
    <i class="fa fa-chevron-up"></i>
  </a>
  <!-- JavaScript Libraries -->
<script src="/bishide/wwwroot/Public/Home/lib/jquery/jquery.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/lib/jquery/jquery-migrate.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/lib/easing/easing.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/lib/superfish/superfish.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/lib/wow/wow.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/lib/counterup/counterup.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/lib/owlcarousel/owl.carousel.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="/bishide/wwwroot/Public/Home/contactform/contactform.js"></script>
<script src="http://at.alicdn.com/t/font_588435_4pfjbl7xrgwopqfr.js"></script>
<script src="https://cdn.bootcss.com/Buttons/2.0.0/js/buttons.min.js"></script>
<script src="https://cdn.bootcss.com/clipboard.js/2.0.0/clipboard.min.js"></script>
<!-- Template Main Javascript File -->
<script src="/bishide/wwwroot/Public/Home/js/jparticle.jquery.min.js"></script>
<script src="/bishide/wwwroot/Public/Home/js/odoo.js"></script>
<script src="/bishide/wwwroot/Public/Home/js/main.js"></script>



  <!--#include file="include/main-js.html"  -->
</body>

</html>
<script>
    var val = $("#suanli").val()
    console.log(val)
    odoo.default.value = val;
    odoo.default({
        el: '.js-odoo',
        value: val + 'MH/S'
    })
</script>