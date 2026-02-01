
$(function(){
  // function直下に入れる

     var color = $('.headerNav');

    
     $(window).scroll(function () {
        if ($(this).scrollTop() > window.innerHeight) {
           color.addClass("headerColor");
           
        } else {
           color.removeClass("headerColor");
        }
     });
});

$(".slide-items").slick({
  autoplay: true, // 自動再生
  autoplaySpeed: 4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
  infinite: true, // 無限スライド
  slidesToShow:5,
  arrows:true,
  appendArrows: '#js-slide__nav__inner',
  responsive: [
    {
      breakpoint: 768, // 399px以下のサイズに適用
      settings: {
        slidesToShow: 2,
      },
    },
  ],
  
});

// カテゴリホバー時の動き
// var parent = document.querySelectorAll(".has-sub");

//   var node = Array.prototype.slice.call(parent, 0);
//   const targetElement = document.querySelector('.sub');

//   node.forEach(function (element) {
//     element.addEventListener(
//       "mouseover",
//       function () {
//         element.querySelector(".sub").classList.add("active");
//         targetElement.style.transition = 'height 2s ease';
//         targetElement.style.height = targetElement.classList.contains('active') ? 'auto' : '0px';
//       },
//       false
//     );
//     element.addEventListener(
//       "mouseout",
//       function () {
//         element.querySelector(".sub").classList.remove("active");
//         targetElement.style.transition = 'height 2s ease';
//         targetElement.style.height = targetElement.classList.contains('active') ? 'auto' : '0px';
//       },
//       false
//     );
// });






// var parent = document.querySelectorAll(".hover-category");

//   var node = Array.prototype.slice.call(parent, 0);

//   node.forEach(function (element) {
//     element.addEventListener(
//       "mouseover",
//       function () {
//         element.querySelector(".sub").classList.add      ("active");
//       },
//       false
//     );
//     element.addEventListener(
//       "mouseout",
//       function () {
//         element.querySelector(".sub").classList.remove("active");
//       },
//       false
//     );
// });


// ハンバーガーメニュー
$(function(){
  const headerMove = $(".header_nav");
  $(window).on("load scroll", function () {
      if ($(this).scrollTop() > 200 && headerMove.hasClass("isFixed") == false) {
          // headerMove.css("display", "block");
          // headerMove.css({"top": "-80px"});
          headerMove.addClass("isFixed");
          headerMove.animate({"top": 0 }, 600);
      }
  
      else if ($(this).scrollTop() < 200 && headerMove.hasClass("isFixed") == true) {
          headerMove.removeClass("isFixed");
          headerMove.animate({"top": -80 }, 600);
          // headerMove.css("display", "none");
      }
  });
  });
  $(function() {
      $('.hamburger').click(function() {
      $(this).toggleClass('active');
      
      if ($(this).hasClass('active')) {
      $('.globalMenuSp').addClass('active');
      } else {
      $('.globalMenuSp').removeClass('active');
      } 
      
      });
      });
      //メニュー内を閉じておく
      $(function() {
      $('.globalMenuSp a[href]').click(function() {
      $('.globalMenuSp').removeClass('active');
      $('.hamburger').removeClass('active');
      
      });
      });

// サブの商品紹介の写真
//上部画像の設定
$('.gallery').slick({
	infinite: true, //スライドをループさせるかどうか。初期値はtrue。
	fade: true, //フェードの有効化
  arrows: false
});
//選択画像の設定
$('.choice-btn').slick({
	infinite: true, //スライドをループさせるかどうか。初期値はtrue。
	slidesToShow: 3, //表示させるスライドの数
	focusOnSelect: true, //フォーカスの有効化
	asNavFor: '.gallery', //連動させるスライドショーのクラス名
});
  
//下の選択画像をスライドさせずに連動して変更させる設定。
$('.gallery').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
	var index = nextSlide; //次のスライド番号
	//サムネイルのslick-currentを削除し次のスライド要素にslick-currentを追加
	$(".choice-btn .slick-slide").removeClass("slick-current").eq(index).addClass("slick-current");
});

// サブページ内のボタンの上下
(() => {
  //HTMLのid値を使って以下のDOM要素を取得
  const downbutton = document.getElementById('down');
  const upbutton = document.getElementById('up');
  const text = document.getElementById('textbox');
  // const reset = document.getElementById('reset');

  //ボタンが押されたらカウント減
  downbutton.addEventListener('click', (event) => {
  //0以下にはならないようにする
  if(text.value >= 1) {
    text.value--;
  }
  });

  //ボタンが押されたらカウント増
  upbutton.addEventListener('click', (event) => {
    text.value++;
  })

})();

// アコーディオン
$(function(){
  // .js-accordion_titleをクリックすると
  $('.js-accordion_title').click(function(){ 
    // クリックした次の要素を展開
    $(this).next('.js-accordion_inner').slideToggle();
    // 展開するときjs-accordion_titleクラスにopenクラスを追加してアイコンを回転
    $(this).toggleClass("open");
    
  });
});


// fvのサイズ
// 1.関数の定義
function setHeight() {
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
}

// 2.初期化
setHeight();

// 3.ブラウザのサイズが変更された時・画面の向きを変えた時に再計算する
window.addEventListener('resize', setHeight);









// const categoryLink = document.querySelector('.has-sub a');
// const targetElement = document.querySelector('.target-element');

// categoryLink.addEventListener('hover', function(event) {
//   event.preventDefault();

//   targetElement.classList.toggle('active');

  // トランジションの設定 (CSSで定義済みなので、ここでは不要)
  // targetElement.style.transition = 'height 0.5s ease';

  // 高さの変更 (CSSのtransitionに任せる)
  // targetElement.style.height = targetElement.classList.contains('active') ? 'auto' : '0px';
// });


