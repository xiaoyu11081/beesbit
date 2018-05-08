<?php if (!defined('THINK_PATH')) exit();?><!--#include file="include/head.html"-->
<!DOCTYPE html>
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


<title>基本信息-币势得</title>
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <!--#include file="include/nav.html"-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="<?php echo U('Index/index');?>" target="_self">
    <svg class="icon icon-logo" aria-hidden="true">
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-logo"></use>
    </svg>
  </a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   <i class="fa fa-bars fa-fw fa-1x text-bishide" aria-hidden="true"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="基本信息">
        <a class="nav-link" href="<?php echo U('Personal/index');?>">
          <i class="fa fa-fw fa-address-card-o"></i>
          <span class="nav-link-text">基本信息</span>
        </a>
      </li>
      <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="提现记录">
        <a class="nav-link" href="<?php echo U('Account/index');?>">
          <i class="fa fa-fw fa-calculator"></i>
          <span class="nav-link-text">提现记录</span>
        </a>
      </li>
      <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="订单详情">
        <a class="nav-link" href="<?php echo U('Order/index');?>">
          <i class="fa fa-fw fa-book"></i>
          <span class="nav-link-text">订单详情</span>
        </a>
      </li>
      <!-- <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-wrench"></i>
          <span class="nav-link-text">收益明细</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">
          <li>
            <a href="navbar.html">Navbar</a>
          </li>
          <li>
            <a href="cards.html">Cards</a>
          </li>
        </ul>
      </li> -->
      <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="购买算力">
        <a  class="nav-link" href="<?php echo U('Personal/payment');?>">
          <i class="fa fa-fw fa-plus-square"></i>
          <span class="nav-link-text">购买算力</span>
        </a>
      </li>

      <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="我的推荐">
        <a class="nav-link" href="<?php echo U('Referee/index');?>">
          <i class="fa fa-fw fa-users"></i>
          <span class="nav-link-text">我的推荐</span>
        </a>
      </li>

      <!-- <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-sitemap"></i>
          <span class="nav-link-text">我的矿机</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti">
          <li>
            <a href="#">Second Level Item</a>
          </li>
          <li>
            <a href="#">Second Level Item</a>
          </li>
          <li>
            <a href="#">Second Level Item</a>
          </li>
          <li>
            <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
            <ul class="sidenav-third-level collapse" id="collapseMulti2">
              <li>
                <a href="#">Third Level Item</a>
              </li>
              <li>
                <a href="#">Third Level Item</a>
              </li>
              <li>
                <a href="#">Third Level Item</a>
              </li>
            </ul>
          </li>
        </ul>
      </li> -->
      <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="我的矿机">
        <a class="nav-link" href="<?php echo U('Personal/mills');?>">
          <i class="fa fa-fw fa-bar-chart-o"></i>
          <span class="nav-link-text">我的矿机</span>
        </a>
      </li>
      <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="订单详情">
        <a class="nav-link" href="<?php echo U('Security/index');?>">
          <i class="fa fa-fw fa-lock"></i>
          <span class="nav-link-text">安全中心</span>
        </a>
      </li>
      <li class="nav-item hvr-underline-from-left" data-toggle="tooltip" data-placement="right" title="客服信息">
        <a class="nav-link" href="<?php echo U('Customer/index');?>">
          <i class="fa fa-fw fa-user-circle"></i>
          <span class="nav-link-text">客服信息</span>
        </a>
      </li>
    </ul>

    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-caret-left"></i>
        </a>
      </li>
    </ul>



    <ul class="navbar-nav ml-auto">
      <li class="nav-item hidden-xs-down">
<?php if(($_SESSION['level']) == "1"): ?><a class="nav-link  mr-lg-5 button button-raised button-highlight button-pill text-light" title="成为高级会员,尊享更多收益" data-placement="bottom" data-toggle="tooltip">
          <i class="fa fa-fw fa-bookmark-o"></i>
          高级会员
        </a>
    <?php else: ?>
        <a class="nav-link  mr-lg-5 button button-raised button-pill" title="成为高级会员,尊享更多收益" data-placement="bottom" data-toggle="tooltip">
          <i class="fa fa-fw fa-bookmark-o"></i>
          普通会员
        </a><?php endif; ?>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-3" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-envelope"></i>
          <span class="d-lg-none">新消息

           <?php if(($unread_news) == "2"): ?><span class="badge badge-pill badge-danger">新消息</span><?php endif; ?>


          </span>
          <span class="indicator text-primary d-none d-lg-block">
          <?php if(($unread_news) == "2"): ?><span id="news"><i class="fa fa-fw fa-circle text-bishide"></i></span>
          <?php else: ?>
            <span id="news"></span><?php endif; ?>
          </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
          <h6 class="dropdown-header">新消息</h6>
          <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?><div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong><?php echo ($art["title"]); ?></strong>
              <span class="small float-right text-muted"><?php echo (date('Y-m-d',$art["time"])); ?></span>
              <div class="dropdown-message small"><?php echo ($art["body"]); ?></div>
            </a><?php endforeach; endif; else: echo "" ;endif; ?>
          <div class="dropdown-divider"></div>
          <!--<a class="dropdown-item small" href="#">View all messages</a>-->
        </div>
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-bell"></i>
          <span class="d-lg-none">Alerts
            <span class="badge badge-pill badge-warning">6 New</span>
          </span>
          <span class="indicator text-warning d-none d-lg-block">
            <i class="fa fa-fw fa-circle"></i>
          </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">最新动态</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <span class="text-success">
              <strong>
                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
            </span>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <span class="text-danger">
              <strong>
                <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
            </span>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <span class="text-success">
              <strong>
                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
            </span>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item small" href="#">View all alerts</a>
        </div>
      </li> -->

      <!-- <li class="nav-item">
        <form class="form-inline my-2 my-lg-0 mr-lg-2">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="搜索内容...">
            <span class="input-group-append">
              <button class="btn btn-danger" type="button">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </li> -->
      <li class="nav-item mr-lg-5">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-caret-left"></i>退出用户中心</a>
      </li>
    </ul>
  </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">确定退出用户中心?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">如果您结束了所有的操作可以点击退出</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
        <a class="btn btn-danger" href="<?php echo U('Index/index');?>">退出</a>
      </div>
    </div>
  </div>
</div>

  <div class="content-wrapper">
    <div class="container-fluid">
            <?php if(($set_status) == "2"): ?><div class="alert alert-warning alert-dismissible fade show alert-guide" role="alert">
                  <strong>尊敬的用户您好!</strong>您的账户目前存在安全风险，需设置
                  <a href="<?php echo U('Security/index');?>" class="text-primary text-weight">提现密码</a> ,
                  请立即前往设置！
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><?php endif; ?>
            <?php if(($set_status) == "3"): ?><div class="alert alert-warning alert-dismissible fade show alert-guide" role="alert">
                  <strong>尊敬的用户您好!</strong>您的账户目前存在安全风险，需设置
                  <a href="<?php echo U('Security/index');?>" class="text-primary text-weight">安全邮箱</a> ,
                  请立即前往设置！
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><?php endif; ?>
            <?php if(($set_status) == "4"): ?><div class="alert alert-warning alert-dismissible fade show alert-guide" role="alert">
                  <strong>尊敬的用户您好!</strong>您的账户目前存在安全风险，需设置
                  <a href="<?php echo U('Security/index');?>" class="text-primary text-weight">安全邮箱</a> ,
                  <a href="<?php echo U('Security/index');?>" class="text-primary text-weight">提现密码</a> ,
                  请立即前往设置！
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><?php endif; ?>
            <?php if(($set_status) == "5"): ?><div class="alert alert-warning alert-dismissible fade show alert-guide" role="alert">
                  <strong>尊敬的用户您好!</strong>您的账户目前存在安全风险，需设置
                  <a href="Withdraw-money.html" class="text-primary text-weight" data-toggle="modal" data-target="#bishideModal_address">钱包地址</a> ,
                  请立即前往设置！
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><?php endif; ?>
              <?php if(($set_status) == "6"): ?><div class="alert alert-warning alert-dismissible fade show alert-guide" role="alert">
                  <strong>尊敬的用户您好!</strong>您的账户目前存在安全风险，需设置
                  <a href="<?php echo U('Security/index');?>" class="text-primary text-weight">提现密码</a> ,
                  <a href="Withdraw-money.html" class="text-primary text-weight" data-toggle="modal" data-target="#bishideModal_address">钱包地址</a> ,
                  请立即前往设置！
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><?php endif; ?>
            <?php if(($set_status) == "7"): ?><div class="alert alert-warning alert-dismissible fade show alert-guide" role="alert">
                  <strong>尊敬的用户您好!</strong>您的账户目前存在安全风险，需设置
                  <a href="<?php echo U('Security/index');?>" class="text-primary text-weight">安全邮箱</a> ,
                  <a href="Withdraw-money.html" class="text-primary text-weight" data-toggle="modal" data-target="#bishideModal_address">钱包地址</a> ,
                  请立即前往设置！
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><?php endif; ?>
            <?php if(($set_status) == "8"): ?><div class="alert alert-warning alert-dismissible fade show alert-guide" role="alert">
                  <strong>尊敬的用户您好!</strong>您的账户目前存在安全风险，需设置
                  <a href="<?php echo U('Security/index');?>" class="text-primary text-weight">安全邮箱</a> ,
                  <a href="<?php echo U('Security/index');?>" class="text-primary text-weight">提现密码</a> ,
                  <a href="Withdraw-money.html" class="text-primary text-weight" data-toggle="modal" data-target="#bishideModal_address">钱包地址</a> ,
                  请立即前往设置！
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><?php endif; ?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo U('Personal/index');?>">个人中心</a>
        </li>
        <li class="breadcrumb-item active">基本信息</li>
      </ol>

      <div class="row mb-3">
        <div class="col-md-8">
          <div class="card">
          <div class="card-header">
            <i class="fa fa-bitcoin fa-fw"></i>收益概况</div>
          <div class="list-group">
            <div class="list-group-item pt-3">
              <div class="col-md-6 pull-left media mb-2">
                <svg class="icon icon-h" aria-hidden="true">
                  <use xlink:href="#icon-h"></use>
                </svg>
                <div class="media-body">
                  <h6> 昨日收益</h6>
                  <div class="text-bishide ">
                    <strong><?php echo $shouyi;?> ETH</strong>
                  </div>
                </div>
              </div>
              <div class="col-md-6 pull-right media mb-2">
                <svg class="icon icon-h" aria-hidden="true">
                  <use xlink:href="#icon-all"></use>
                </svg>
                <div class="media-body">
                  <h6>总收益<span class="pull-right badge-pill badge badge-light text-muted" data-toggle="tooltip" data-placement="bottom" title="当前：ETH总收益约等于<?php echo $ethusd_all;?> 美元">1ETH ≈ $ <?php echo $ethusd;?></span></h6>

                  <div class="text-bishide ">
                    <strong><?php echo $wallet['num'];?> ETH</strong>
                     <?php if($address != null ): ?><a href="<?php echo U('Account/withday');?>?wal=<?php echo $wallet['address'];?>" class="badge badge-pill badge-success ml-1 pull-right">提现</a>
                      <?php else: ?>
                      <a href="Withdraw-money.html" class="badge badge-pill badge-danger ml-1 pull-right" data-toggle="modal" data-target="#bishideModal_address" data-toggle="tooltip" data-placement="top" title="绑定钱包地址即可提现收益">绑定钱包提现</a><?php endif; ?>
                  </div>
                </div>
              </div>

            </div>
            <div class="list-group-item pt-3">
              <div class="col-md-6 pull-left media mb-2">
                <svg class="icon icon-h" aria-hidden="true">
                  <use xlink:href="#icon-pay"></use>
                </svg>
                <div class="media-body">
                  <h6>已提现金额
                  </h6>
                  <div class="text-bishide ">
                    <strong><?php echo $wallet['payout'];?> ETH</strong>
                  </div>

                </div>
              </div>
              <div class="col-md-6 pull-right media mb-2">
                <svg class="icon icon-h" aria-hidden="true">
                  <use xlink:href="#icon-yue"></use>
                </svg>
                <div class="media-body">
                  <h6>未提现金额</h6>
                  <div class="text-bishide ">
                    <strong><?php echo $wallet['num']-$wallet['payout'];?> ETH</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-10">
          <div class="card">
           <div class="card-header">
            <span class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              <i class="fa fa-credit-card"></i>
              钱包地址与提现
            </span>


          </div>
          <ul class="list-group">
            <li class="list-group-item disabled">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">ETH钱包地址</font>
                    </font>
                  </span>
                </div>
                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="<?php echo $wallet['address'];?>" readonly="readonly">
                <div class="input-group-append">
                  <button type="button" class="btn btn-danger mr-1" data-toggle="modal" data-target="#bishideModal_address">
                      修改
                  </button>
                  <?php if($address != null ): ?><button type="button" class="btn btn-danger" data-toggle="modal">
                          <a href="<?php echo U('Account/withday');?>?wal=<?php echo $wallet['address'];?>" style="color:#fff">提现</a>
                    </button><?php endif; ?>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <span class="text-bishide" data-placement="right" data-toggle="tooltip" title="普通提现必须满足至少0.1提取；算力租赁期满后，计算到小数点后四位的虚拟货币允许全部提现。每笔提现收取0.001的提现矿工转账费，非百分比收取，即提现1枚ETH收取0.001ETH，提现100枚ETH同样收取0.001ETH。提现可能需要24小时的到账时间，若24小时没有到账，请联系我们的工作人员。提现前，请务必确认您的提现地址正确，一旦提现地址错误，虚拟货币将无法找回。"><i class="fa fa-fw mr-2 fa-exclamation-triangle text-warning"></i>提现说明</span>
                  <a class="text-bishide pull-right" href="http://baijiahao.baidu.com/s?id=1593334868404805446&wfr=spider&for=pc&qq-pf-to=pcqq.discussion" target="_blank">
                    <i class="fa fa-chain fa-fw mr-1"></i>申请钱包地址</a>
              </li>
          </ul>
		</div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-3">
            <div class="card-header">
              <span>
                <i class="fa fa-diamond"></i>
                我的算力套餐
              </span>
            </div>
   <?php if(empty($order)): ?><div class="card-body text-center">
              <svg class="icon icon-dingdan" aria-hidden="true">
                <use xlink:href="#icon-ziyuan6"></use>
              </svg>
              <div class="card-text">
                <p class="text-muted">您没有已购买的算力套餐</p>
                <h4 class="text-bishide"><p>所有矿机已部署完毕 购买算力 立即获取收益！</p></h4>
              </div>
              <div class="card-text">
                <button type="button" class="btn btn-danger" style="width:12.8rem">
                  <a href="payment.html" class="text-white">立即部署算力</a>
                </button>
              </div>
            </div>
<?php else: ?>
          <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$or): $mod = ($i % 2 );++$i;?><div class="card-body">
              <div class="col-xl-12 col-sm-12 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                  <div class="card-header">
                    ETH算力套餐
                  </div>
                  <div class="card-body">
                    <div class="card-body-icon">

                    </div>
                    <div class="form-row">
                      <div class="col-md-3">
                        <strong class="mr-3">虚拟币种类</strong>ETH</div>
                      <div class="col-md-3">
                        <strong class="mr-3">总算力</strong><?php echo ($or["power"]); ?>
                        <span class="ml-2">MH/S</span>
                      </div>
                      <div class="col-md-3">
                        <strong class="mr-3">套餐开始时间</strong><?php echo (date('Y-m-d',$or["start"])); ?></div>
                      <div class="col-md-3">
                        <strong class="mr-3">套餐到期时间</strong><?php echo (date('Y-m-d',$or["end"])); ?></div>
                      <div class="col-md-6 mt-2">
                        <button type="button" class="btn btn-warning" style="width:12.8rem">
                          <a href="<?php echo U('Order/reorder');?>?id=<?php echo ($or["id"]); ?>">立即续费</a>
                        </button>
                      </div>
                    </div>

                  </div>
                  <a class="card-footer text-white clearfix" href="<?php echo U('payment');?>">
                    获取更多算力
                    <i class="fa fa-fw fa-rocket"></i>
                  </a>
                </div>
              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
          </div>
        </div>
      </div>

      <!-- Example DataTables Card-->
    </div>

    <!--#include file="include/footer.html"-->
    <footer class="sticky-footer">
  <div class="container">
    <div class="text-center">
      <b class="text-dark">Copyright © 币势得算力云 2018</b>
    </div>
  </div>
</footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->

    <div class="modal fade" id="bishideModal" tabindex="-1" role="dialog" aria-labelledby="bishideModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bishideModalLabel">确定退出个人中心?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">如果您结束了所有的操作可以点击退出</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
            <a class="btn btn-danger" href="<?php echo U('Index/index');?>">退出</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="bishideModal_paypassword" tabindex="-1" role="dialog" aria-labelledby="bishideModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">设置您的转账密码</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-paypassword mx-auto">
              <div class="card-body">
                <form id="form1" name="form1">
                  <div class="form-group">
                    <input class="form-control" id="tel" name="tel" type="text" aria-describedby="emailHelp" placeholder="输入注册手机号">
                  </div>
                  <div class="input-group mb-3">

                    <input type="text" class="form-control" name="telcode" placeholder="输入验证码" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <input type="button" class="btn-danger" value="获取验证码" id="sendcode" onclick="settime(this)">
                    </div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="payword" type="password" aria-describedby="emailHelp" placeholder="输入转账密码">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="payword2" type="password" aria-describedby="emailHelp" placeholder="确认转账密码">
                  </div>
                  <!--<a class="btn btn-danger btn-block" href="#">设置转账密码</a>-->
                  <input type="submit" class="btn btn-danger btn-block" value="设置转账密码">
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>




    <div class="modal fade" id="bishideModal_email" tabindex="-1" role="dialog" aria-labelledby="bishideModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">绑定您的邮箱地址</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-paypassword mx-auto">
              <div class="card-body">
                <form id="form2" name="form2">
                  <div class="form-group">
                    <input id="email" class="form-control" name="mail" type="text" aria-describedby="emailHelp" placeholder="输入邮箱地址">
                  </div>
                  <div class="input-group mb-3">

                    <input type="text" class="form-control" name="emailcode" placeholder="输入验证码" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <input type="button" class="btn-danger" id="sendcode2" value="获取验证码" onclick="settime(this)">
                    </div>
                  </div>

                  <!--<a class="btn btn-danger btn-block" href="#">设置邮箱地址</a>-->
                  <input type="submit" class="btn btn-danger btn-block" value="设置邮箱地址">
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="modal fade" id="bishideModal_address" tabindex="-1" role="dialog" aria-labelledby="bishideModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">绑定您的钱包地址</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              <strong>尊敬的用户您好！</strong> 请仔细查看并核对您的钱包地址
              <b class="text-bishide">绑定错误地址造成损失由您自己承担后果</b>。
            </div>
            <div class="card card-paypassword mx-auto">
              <div class="card-body">
                <form id="form3" name="form3">
                  <div class="form-group">
                    <input class="form-control" name="address" type="text" aria-describedby="emailHelp" placeholder="输入钱包地址"><br/>
                    <input class="form-control" name="payword_ads" type="password" aria-describedby="emailHelp" placeholder="输入提现密码">
                  </div>
                  <!--<a class="btn btn-danger btn-block" href="#">绑定</a>-->
                  <input type="submit" class="btn btn-danger btn-block" value="绑定">
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
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
    <!--#include file="include/script.html"-->

</html>
  <script>
      $('#form1').submit(function(){
          $(this).ajaxSubmit({
              url:"<?php echo U('setpay');?>",
              type:'post',
              dataType:'json',
              success:function(msg){
                  if(msg.status==1){
                      //表示提交注册成功
                      window.location.href = "<?php echo U('Personal/index');?>";
                  }else{
                      layer.msg(msg.msg);
                  }
              }
          });
          //阻止当前的表单默认的提交
          return false;
      });

      $('#form2').submit(function(){
          $(this).ajaxSubmit({
              url:"<?php echo U('setmail');?>",
              type:'post',
              dataType:'json',
              success:function(msg){
                  if(msg.status==1){
                      //表示提交注册成功
                      window.location.href = "<?php echo U('Personal/index');?>";
                  }else{
                      layer.msg(msg.msg);
                  }
              }
          });
          //阻止当前的表单默认的提交
          return false;
      });
      $('#form3').submit(function(){
          $(this).ajaxSubmit({
              url:"<?php echo U('setAddress');?>",
              type:'post',
              dataType:'json',
              success:function(msg){
                  if(msg.status==1){
                      //表示提交注册成功
                      window.location.href = "<?php echo U('Personal/index');?>";
                  }else{
                      layer.msg(msg.msg);
                  }
              }
          });
          //阻止当前的表单默认的提交
          return false;
      });


      //实现用户点击按钮发送验证
      $('#sendcode2').click(function(){
          //获取当前用户的输入的手机号
          var email = $('#email').val();
          $.ajax({
              url:"<?php echo U('Email/sendemail');?>",
              data:{email:email},
              type:'post',
              success:function(msg){
                  if(msg.status==0){
                      layer.msg(msg.msg);
                  }else if(msg.status ==1){
                      layer.msg('发送成功');
                  }
              }
          });
      });
      $('#sendcode').click(function(){
          //获取当前用户的输入的手机号
          var tel = $('#tel').val();
          $.ajax({
              url:"<?php echo U('sendcode');?>",
              data:{tel:tel},
              type:'post',
              success:function(msg){
                  if(msg.status==0){
                      layer.msg(msg.msg);
                  }else{
                      layer.msg('发送成功');
                  }
              }
          });
      });

  </script>