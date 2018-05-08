jQuery(document).ready(function($) {
    $("#copy-1").on("click", function() {
        layer.tips("复制成功", "#copy-1");
    });
    $("#copy-2").on("click", function() {
        layer.tips("复制成功", "#copy-2");
    });
    var clipboard = new ClipboardJS('.copyBtn');
    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
    });
    // 推荐页面
    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
  
    var width_A = $(window).width();
  if (width_A < 900) {
    $(".htmleaf-container").jParticle({
      particlesNumber: 30,
      linkDist: 150,
      createLinkDist: 150,
      disableLinks: false,
      disableMouse: false,
      background: "",
      color: "rgba(255,255,255,0.08)",
      width: null,
      height: null,
      linksWidth: 1,
      particle: {
        color: "#fff",
        minSize: 2,
        maxSize: 4,
        speed: 25
      }
    });
  } else {
    $(".htmleaf-container").jParticle({
      particlesNumber: 150,
      linkDist: 150,
      createLinkDist: 150,
      disableLinks: false,
      disableMouse: false,
      background: "",
      color: "rgba(255,255,255,0.08)",
      width: null,
      height: null,
      linksWidth: 1,
      particle: {
        color: "#fff",
        minSize: 2,
        maxSize: 4,
        speed: 25
      }
    });
  }

  $("#zhang").on("click", function() {
    $("#bishideModal_newpw").modal("show");
  });
  $(".modal-dialog").addClass("modal-dialog-centered");
  $(".modal-dialog").modal("handleUpdate");
  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });
      // Initiate the wowjs animation library
  new WOW().init();
  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {
      opacity: 'show'
    },
    speed: 400
  });
  // Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('#header .container-fluid').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars fa-fw fa-1x" aria-hidden="true"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-fw fa-chevron-down"></i>');
    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });
    $(document).on('click', '#mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });
    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }
  // Smooth scroll for the menu and links with .scrollto classes
  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;
        if ($('#header').length) {
          top_space = $('#header').outerHeight();
          if (!$('#header').hasClass('header-fixed')) {
            top_space = top_space - 20;
          }
        }
        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');
        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });
  // Header scroll class
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
      $('.icon-logo').addClass('icon-logo-1').removeClass('icon-logo');
      $('#logo .scrollto').empty().append('<svg class="icon icon-logo" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-logo"></use></svg>');
    } else {
      $('#header').removeClass('header-scrolled');
      $('.icon-logo-1').addClass('icon-logo').removeClass('icon-logo-1');
      $('#logo .scrollto').empty().append('<svg class="icon icon-logo" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-logo-1"></use></svg>');
    }
  });
  // Intro carousel
  var introCarousel = $(".carousel");
  var introCarouselIndicators = $(".carousel-indicators");
  introCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
    (index === 0) ?
    introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "' class='active'></li>"):
      introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "'></li>");
  });
  $(".carousel").swipe({
    swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
      if (direction == 'left') $(this).carousel('next');
      if (direction == 'right') $(this).carousel('prev');
    },
    allowPageScroll: "vertical"
  });
  // Skills section
  $('#skills').waypoint(function() {
    $('.progress .progress-bar').each(function() {
      $(this).css("width", $(this).attr("aria-valuenow") + '%');
    });
  }, {
    offset: '80%'
  });
  // jQuery counterUp (used in Facts section)
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });
  // Porfolio isotope and filter
  var portfolioIsotope = $('.portfolio-container').isotope({
    itemSelector: '.portfolio-item',
    layoutMode: 'fitRows'
  });
  $('#portfolio-flters li').on('click', function() {
    $("#portfolio-flters li").removeClass('filter-active');
    $(this).addClass('filter-active');
    portfolioIsotope.isotope({
      filter: $(this).data('filter')
    });
  });
  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 2
      },
      768: {
        items: 4
      },
      900: {
        items: 6
      }
    }
  });
  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });
});
// 倒计时
var countdown = 60;

function settime(obj) {
  if (countdown == 0) {
    obj.removeAttribute("disabled");
    obj.value = "免费获取验证码";
    countdown = 60;
    return;
  } else {
    obj.setAttribute("disabled", true);
    obj.value = "重新发送(" + countdown + ")";
    countdown--;
  }
  setTimeout(function() {
    settime(obj)
  }, 1000)
}

function settime(obj) {
  if (countdown == 0) {
    obj.removeAttribute("disabled");
    obj.value = "免费获取验证码";
    countdown = 60;
    return;
  } else {
    obj.setAttribute("disabled", true);
    obj.value = "重新发送(" + countdown + ")";
    countdown--;
  }
  setTimeout(function() {
    settime(obj)
  }, 1000)
}
// 鼠标以上时触发弹出提示框
// $('#wechat').popover({
//   trigger: 'hover', //鼠标以上时触发弹出提示框
//   html: true, //开启html 为true的话，data-content里就能放html代码了
//   content: "<img src='img/bishide-img.png' width='100'>"
// });
// $('#weibo').popover({
//   trigger: 'hover', //鼠标以上时触发弹出提示框
//   html: true, //开启html 为true的话，data-content里就能放html代码了
//   content: "<img src='img/bishide-img.png' width='100'>"
// });
// 鼠标以上时触发弹出提示框
$(function() {
  var wid = $(window).width();
  if (wid < 768) {
    $(".navli").removeClass("hvr-underline-from-center");
  };
  if (wid < 768) {
    $("#mainNav").addClass("bg-white");
  }
});
$(function() {
  var input = $("#link-payment");
  var rinput = $("#Rlink-payment");
  input.attr('disabled', 'disabled');
  rinput.attr('disabled', 'disabled');
})
$("#Agreement").scroll(function() {
  var scroH = $(this).scrollTop(); //滚动高度
  var viewH = $(this).height(); //可见高度
  var contentH = $(this).get(0).scrollHeight; //内容高度
  var btn = $("#btn-Agreement");
  var rbtn = $("#Rbtn-Agreement");
  var input = $("#link-payment");
  var rinput = $("#Rlink-payment");
  if (scroH / (contentH - viewH) >= 0.9) {
    $("#btn-Agreement").removeAttr("disabled");
    $("#Rbtn-Agreement").removeAttr("disabled");
  };
  btn.on("click", function() {
    $("#inputAgreement").val("已确认同意算力协议");
    input.val("确认下单");
    input.attr("type", "submit");
    input.removeAttr("disabled")
  })
  rbtn.on("click", function() {
    $("#RinputAgreement").val("已确认同意算力协议");
    rinput.val("确认下单");
    rinput.attr("type", "submit");
    rinput.removeAttr("disabled")
  })
});
$(document).ready(function() {
  var input = $(".input-group .hidden-xl-down");
  $("#day-select").change(function() {
    var val = $(this).val();
    input.attr("value", val);
  })
})
$('ul.nav-menu li a').each(function() {
  if ($($(this))[0].href == String(window.location))
    $(this).parent().addClass('active');
});
$('ul.navbar-nav li a').each(function() {
  if ($($(this))[0].href == String(window.location))
    $(this).parent().addClass('active');
});
//滑动效果
$(function() {
  //锚点跳转滑动效果
  $("a[href*='#'],area[href*='#']").not(".collapsed").click(function() {
    console.log(this.pathname)
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        $('html,body').animate({
            scrollTop: targetOffset
          },
          1000
        );
        return false;
      }
    }
  });
})
$('[data-toggle="tooltip"]').tooltip()
$('[data-toggle="popover"]').popover()
$("#bishide").popover({
  trigger: "hover",
  placement: "right",
  html: true,
  content: "<div><img src='http://13.229.126.83/Public/Home/img/bishide-img.png' width='175'></div><h6 class='text-center'>群号：597776431</h6>",
  title: "币势得服务器QQ交流群",
  delay: {
    "show": 200,
    "hide": 100
  },
});
//预读动画
//$(window).on("load", function() {
//  $("#preloader").delay(350).fadeOut();
//});
//修改定时按钮样式
$("input.btn-danger").addClass("btn");
$("#bishideModal_changepw a").on("click", function() {
  $("#bishideModal_changepw").hide();
  $(".modal-backdrop").remove();
})
//支付跳转
// $("#link-payment").on("click", function() {
//   window.open("confirm.html");
// });
//$("#email-find").css("display", "none");
//$("#email-link").on("click", function() {
//  $("#phone-find").css("display", "none");
//  $("#email-find").css("display", "block");
//});
//$("#phone-link").on("click", function() {
//  $("#email-find").css("display", "none");
//  $("#phone-find").css("display", "block");
//})
//
// // Page Loader
// $(window).load(function () {
//
//     "use strict";
// 	$('#loader').fadeOut();
// });
