$(function () {
    // 1. スクロール時のぼかしエフェクト
    $(window).scroll(function () {
        $('.inview-blur').each(function () {
            var elemPos = $(this).offset().top,
                scroll = $(window).scrollTop(),
                windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 150) {
                $(this).addClass('blur');
            }
        });
    });

    // 2. Slick スライダー
    $(".slider").slick({
        infinite: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        fade: true,
    });

    $(".news-content_slick").slick({
        autoplay: true,
        autoplaySpeed: 4000,
        infinite: true,
        slidesToShow: 5,
        arrows: true,
        appendArrows: '#js-slide__nav__inner',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToScroll: 1,
                    variableWidth: true,
                    swipe: true,
                },
            },
        ],
    });

    // 3. ヘッダー固定制御
    const headerMove = $(".header_nav");
    $(window).on("load scroll", function () {
        if ($(this).scrollTop() > 200 && headerMove.hasClass("isFixed") == false) {
            headerMove.addClass("isFixed");
            headerMove.animate({ "top": 0 }, 600);
        } else if ($(this).scrollTop() < 200 && headerMove.hasClass("isFixed") == true) {
            headerMove.removeClass("isFixed");
            headerMove.animate({ "top": -80 }, 600);
        }
    });

    // 4. ハンバーガーメニュー
    $('.hamburger').click(function () {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            $('.globalMenuSp').addClass('active');
        } else {
            $('.globalMenuSp').removeClass('active');
        }
    });

    $('.globalMenuSp a[href]').click(function () {
        $('.globalMenuSp').removeClass('active');
        $('.hamburger').removeClass('active');
    });

    // 5. ページトップボタン
    var pagetop = $('.pagetop');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 700) {
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });
    pagetop.click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500);
        return false;
    });

    // 6. ローディングアニメーション
    // HTML内に #loading_text が存在することを確認してください
    if ($('#loading_text').length) {
        let bar = new ProgressBar.Line('#loading_text', {
            easing: 'easeIn',
            duration: 1500,
            strokeWidth: 16,
            color: 'rgba(255,255,0,.3)',
            trailWidth: 16,
            trailColor: 'white',
            text: {
                style: {
                    position: 'absolute',
                    left: '50%',
                    top: '8%',
                    padding: '0',
                    margin: '-30px 0 0 0',
                    transform: 'translate(-50%,-50%)',
                    'font-size': '18px',
                    color: '#111111',
                },
                autoStyleContainer: false
            },
            step: function (state, bar) {
                bar.setText(Math.round(bar.value() * 100) + ' %');
            }
        });

        bar.animate(1.0, function () {
            $("#loading").delay(400).fadeOut(600);
        });
    }
});
// 7. CF7 ファイル名表示（追記した部分）
document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('change', function (e) {
        if (e.target && e.target.matches('.file-label input[type="file"]')) {
            const fileInput = e.target;
            const file = fileInput.files[0];
            const label = fileInput.closest('.file-label');
            const nameSpan = label.querySelector('.input-name');

            if (file) {
                nameSpan.textContent = file.name;
            } else {
                nameSpan.textContent = '選択されていません';
            }
        }
    });

    document.addEventListener('wpcf7mailsent', function () {
        const nameSpans = document.querySelectorAll('.file-label .input-name');
        nameSpans.forEach(function (span) {
            span.textContent = '選択されていません';
        });
    }, false);
});


