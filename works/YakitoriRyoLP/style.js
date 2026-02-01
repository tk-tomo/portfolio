$(".firstViweSlick").slick({
    autoplay: true, // 自動再生
    autoplaySpeed:4000, // 再生速度（ミリ秒設定） 1000ミリ秒=1秒
    infinite: true, // 無限スライド
    slidesToShow:1,
    arrows:true,
    appendArrows: '#js-slide__nav__inner',
    // responsive: [
    //   {
    //     breakpoint: 768, // 399px以下のサイズに適用
    //     settings: {
    //       slidesToShow: 2,
    //     },
    //   },
    // ],
    
  });
  $(function() {
    $('.slide').slick({
      autoplay: true,//自動でスライドさせる
      autoplaySpeed: 0,//次の画像に切り替えるまでの時間 今回の場合は0
      speed:8000,//画像が切り替わるまでの時間 今回の場合は難病で1枚分動くか
      cssEase: 'linear',//動きの種類は等速に
      arrows:false,//左右に出る矢印を非表示
      swipe: false,//スワイプ禁止
      pauseOnFocus: false,//フォーカスが合っても止めない
      pauseOnHover: false,//hoverしても止めない
      centerMode: true,//一枚目を中心に表示させる
      initialSlide: 3,//最初に表示させる要素の番号を指定
      variableWidth: true,//スライドの要素の幅をcssで設定できるようにする 
    });
});

// 　　　　　　　　　　コピペ

// $(function(){
//   $('.btn-trigger').on('click', function() {
//     $(this).toggleClass('active');
//     return false;
//   });
// });


// $(function() {
//   $('.btn-trigger').click(function() {
//       $(this).toggleClass('active');
//       $('.sp-menuList__content').toggleClass('active');
//   });
// });

// $(function() {
//   $('.btn-trigger').click(function() {
//   $(this).toggleClass('active');
  
//   if ($(this).hasClass('active')) {
//   $('.sp-menuList__content').addClass('active');
//   } else {
//   $('.sp-menuList__content').removeClass('active');
//   } 
  
//   });
//   });
  //メニュー内を閉じておく
  // $(function() {
  // $('.btn-trigger').click(function() {
  // $('.btn-trigger').removeClass('active');
  // $('.sp-menuList__content').removeClass('active');
  
  // });
  // });
  $(function() {
    $('.hamburger').click(function() {
    $(this).toggleClass('active');
    
    if ($(this).hasClass('active')) {
    $('.sp-menuList__content').addClass('active');
    } else {
    $('.sp-menuList__content').removeClass('active');
    } 
    
    });
    });
    //メニュー内を閉じておく
    $(function() {
    $('.sp-menuList__content').click(function() {
    $('.sp-menuList__content').removeClass('active');
    $('.hamburger').removeClass('active');
    
    });
    });