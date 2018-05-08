jQuery(document).ready(function($) {
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
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><svg class="icon icon-gengduo" aria-hidden="true"><use xlink:href="#icon-gengduo"></use></svg></button>');
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
    } else {
      $('#header').removeClass('header-scrolled');
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
$('#wechat').popover({
  trigger: 'hover', //鼠标以上时触发弹出提示框
  html: true, //开启html 为true的话，data-content里就能放html代码了
  content: "<img src='img/bishide-img.png' width='100'>"
});
$('#weibo').popover({
  trigger: 'hover', //鼠标以上时触发弹出提示框
  html: true, //开启html 为true的话，data-content里就能放html代码了
  content: "<img src='img/bishide-img.png' width='100'>"
});
$(function() {
  var wid = $(window).width();
  if (wid < 768) {
    $(".navli").removeClass("hvr-underline-from-center");
  };
  if (wid < 768) {
    $("#mainNav").addClass("bg-white");
  }
});
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
  })
  rbtn.on("click", function() {
    $("#RinputAgreement").val("已确认同意算力协议");
    rinput.val("确认下单");
    rinput.attr("type", "submit");
  })
});
// $("#register-btn").on("click", function() {
//   var exitTime = now.getTime() + 5000;
//   while (true) {
//     if (now.getTime() > exitTime) {
//       window.location = 'index.html'
//     }
//   }
// });
