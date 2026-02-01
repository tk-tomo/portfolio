

//スクロールしたらクラス名を付与
document.addEventListener("DOMContentLoaded", () => {
  const objects = document.querySelectorAll('.anime-up');

  const cb = function(entries, observer) {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              entry.target.classList.add('displayed');
              observer.unobserve(entry.target);
          }
      });
  };

  const options = {
      root: null,
      rootMargin: "0px",
      threshold: 0
  };

  const io = new IntersectionObserver(cb, options);

  objects.forEach(object => {
      io.observe(object);
  });
});

//一文字ずつspanで囲む
const animationTargetElements = document.querySelectorAll(".anime-up");
for( let i =0; i < animationTargetElements.length; i++ ){
  const targetElement = animationTargetElements[i]
  texts = targetElement.textContent;
  textsArray = [];

  targetElement.textContent = "";


  for(let j =0; j < texts.split("").length; j++){
    textsArray.push('<span><span style="animation-delay: '+ ((j+12) * 0.03) +'s" >' + texts.split("")[j] + '<span></span>')
  }
  for(let k =0; k < textsArray.length; k++){
    targetElement.innerHTML += textsArray[k];
  }
}



// ホバー時の動き
$(function(){
  $(".ProductCard1").hover(
   function () {
   $(".c-product-productCard__bg1").addClass("c-product-productCard__bg--hover1");
   },
   function () {
   $(".c-product-productCard__bg1").removeClass("c-product-productCard__bg--hover1");
   }
  );
});
$(function(){
$(".ProductCard2").hover(
 function () {
 $(".c-product-productCard__bg2").addClass("c-product-productCard__bg--hover2");
 },
 function () {
 $(".c-product-productCard__bg2").removeClass("c-product-productCard__bg--hover2");
 }
);
});
$(function(){
$(".ProductCard3").hover(
function () {
$(".c-product-productCard__bg3").addClass("c-product-productCard__bg--hover3");
},
function () {
$(".c-product-productCard__bg3").removeClass("c-product-productCard__bg--hover3");
}
);
});


$(function() {
    $('.hamburger').click(function() {
    $(this).toggleClass('active');
    
    if ($(this).hasClass('active')) {
    $('.hamburger_open_content').addClass('active');
    } else {
    $('.hamburger_open_content').removeClass('active');
    } 
    });
    });
    $(".drawer__nav__link").click(function () {
      $(".hamburger_open_content").removeClass("active");
      $(".hamburger").removeClass("active");
    });
     // ページ内スクロール
  $('a[href^="#"]').click(function () {
    const speed = 600;
    let href = $(this).attr("href");
    let target = $(href == "#" || href == "" ? "html" : href);
    let position = target.offset().top;
    $("body,html").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
  // function

    //scroll_effect
$(window).scroll(function () {
  var scrollAnimationElm = document.querySelectorAll('.scroll_up');
  var scrollAnimationFunc = function () {
    for (var i = 0; i < scrollAnimationElm.length; i++) {
      var triggerMargin = 100;
      if (window.innerHeight > scrollAnimationElm[i].getBoundingClientRect().top + triggerMargin) {
        scrollAnimationElm[i].classList.add('on');
      }
    }
  }
  window.addEventListener('load', scrollAnimationFunc);
  window.addEventListener('scroll', scrollAnimationFunc);
});

    //メニュー内を閉じておく
    $(function() {
      $('.sp_CartCount_flex').click(function() {
      $('.hamburger_open_content').removeClass('active');
      $('.hamburger').removeClass('active');
      });
      });

     // アコーディオン
$(function(){
  // .js-accordion_titleをクリックすると
  $('.js-accordion_title').click(function(){ 
    // クリックした次の要素を展開
    $(this).next('.accordion_inner').slideToggle();
    // 展開するときjs-accordion_titleクラスにopenクラスを追加してアイコンを回転
    $(this).toggleClass("open");
    
  });
});



    var rellax = new Rellax('.js-rellax', {
        speed: -10,
        center: false,
        wrapper: null,
        round: true,
        vertical: true,
        horizontal: false
      });


  

    // スワイパー
    const mySwiper = new Swiper('.card02 .swiper', {
        slidesPerView: 'auto',
        spaceBetween: 16,
        grabCursor: true,
        pagination: {
          el: '.card02 .swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.card02 .swiper-button-next',
          prevEl: '.card02 .swiper-button-prev',
        },
        breakpoints: {
          1025: {
            spaceBetween: 32,
          }
        },
      });

// フェードイン
$(function(){
  $(".inview").on("inview", function (event, isInView) {
    if (isInView) {
      $(this).stop().addClass("is-show");
    }
  });
});



      // パララックス
      // $('.parallax-window').parallax({
      //   imageSrc: 'img/brand_vision.jpg',
      // });
      // スクロール量を取得する関数
      var images = document.querySelectorAll('.parallax-window');
new simpleParallax(images, {
	orientation: 'down',
	scale: 1.2,
	overflow: true,
	delay: 0,
	transition:cubic-bezier(0,0,0,1),
	customContainer: '.container',
	customWrapper: '.wrapper'
});


// リロード時
$(function() {
  // ウィンドウサイズ768px以下の場合、クラスを削除
  if (window.matchMedia( '(max-width: 768px)' ).matches) {
  $(function(){
    $('.parallax-window').removeClass('rellax');
  });
  //768px以上の場合なにもしない
    } else {
  };
});

// リサイズ時
$(window).resize(function(){
  let x = $(window).width();
  let y = 768;
  if (x <= y) {
    $('.parallax-window').removeClass('rellax');
  }
  else {
    $('.parallax-window').addClass('rellax');
  }
});




