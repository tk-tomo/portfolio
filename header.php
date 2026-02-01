<!DOCTYPE html>
<html lang="ja">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- 共通 -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/menu.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
        <!-- TOPページ -->
        <?php if (is_front_page()): ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/front-page.css">
        <?php endif; ?>
        <!-- お問合せ -->
        <?php if (is_page('contact')): ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact.css">
        <?php endif; ?>
          <!-- ニュース -->
        <?php if (is_singular('news')): ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single_news.css">
        <?php endif; ?>
        <!-- お問合せ確認 -->
        <?php if (is_page('contact_confirm')): ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact_confirm.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact.css">
        <?php endif; ?>
         <!-- 一覧ページ -->
         <?php if (is_archive('work')): ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/archive-work.css">
        <?php endif; ?>
         <!-- 作品投稿ページ -->
         <!-- <?php if (is_singular('work')): ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>'/assets/css/works.css'">
        <?php endif; ?> -->
        <!-- お問合せ完了 -->
        <?php if (is_page('contact_comp')): ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact_comp.css">
        <?php endif; ?>
        <?php if ( is_page_template(array('page-work_website.php','page-work_coder_works.php','page-work_poster.php','page-work_banner.php'))||is_singular('work')) : ?>
        <!-- slick -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">

        <!-- テンプレート専用CSS（キャッシュバスト付き） -->
        <link rel="stylesheet"
                href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/works.css?ver=<?php echo filemtime( get_stylesheet_directory() . '/assets/css/works.css' ); ?>">
        <?php endif; ?>
        <?php if (is_page('about')): ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/about.css">
        <?php endif; ?>
        <?php if (is_page('sinkyuu')): ?>
            <link rel="stylesheet"
                href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/works.css?ver=<?php echo filemtime( get_stylesheet_directory() . '/assets/css/works.css' ); ?>">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
        <?php endif; ?>
        <!--Googleフォント-->
        <!-- LATO --><!-- ROBOTO -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <!-- クラリティ -->
        <meta name="google-site-verification" content="IKYCZVMaheix92KnMjyglXCUe3VbVt8vEKaqswzj4gQ" />
        <!-- <script type="text/javascript">
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "q2eu8drmif");
        </script> -->
        <?php wp_head(); ?>
</head>
<body 
    <?php if (is_front_page()) { echo 'id="my-scrollreveal-body"'; }?>    
    <?php if(is_singular('news')): ?>
        id="news-page"
    <?php elseif(is_page('contact')): ?>
        id="contact-page"
    <?php elseif(is_page('contact_confirm')): ?>
        id="contact_confirm-page"
    <?php endif; ?>>
    <?php if (!is_front_page()):?>
    <header>
            <!--             nav            -->
            <nav class="pc_nav headerNav">
                <ul class="headerGm">
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="<?php echo home_url('/work/'); ?>">Works</a></li>
                    <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
                    <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                </ul>
            </nav>
              <!--こっちがSP用ナビゲーション-->
              <div class="hamburger sp_nav">
                <span></span>
                <span></span>
            </div>
            <nav class="globalMenuSp sp_nav">
                <div class="hamburgerName">
                    <p>
                        <!-- <a href="html/about.html">Kohigashi Tomorou</a><br>
                        <span>WEBdesigner / WEBcoder / WEBengineer</span> -->
                        <span>Portfolio</span><br>
                        <a href="<?php echo home_url(); ?>">Kohigashi Tomorou</a>
                    </p>
                </div>
                <ul>
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="<?php echo home_url('/work/'); ?>">Works</a></li>
                    <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
                    <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                </ul>
            </nav>
        </header>
    <?php endif; ?>
    <?php if(is_front_page()):?>
     <!-- トップに戻る -->
        <!-- <p id="page-top" class="sp_nav"><a href="#"><span><img src="img/icon/btnIcon.svg" alt=""></span>TOP</a></p> -->
        <!-- ローディング画面 -->
        <div id="loading"><div id="loading_text"></div></div>
        <header>
            <!--       nav      -->
                <nav class="headerNav pc_nav top-nav_pc">
                    <ul class="headerGm">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><a href="<?php echo home_url('/work/'); ?>">Works</a></li>
                        <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
                        <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                    </ul>
                </nav>
            <!--こっちがSP用ナビゲーション-->
            <div class="hamburger sp_nav">
                <span></span>
                <span></span>
            </div>
            <nav class="globalMenuSp sp_nav">
                <div class="hamburgerName">
                    <p>
                        <!-- <a href="<?php echo home_url(); ?>/about">Kohigashi Tomorou</a><br>
                        <span>WEBdesigner / WEBcoder / WEBengineer</span> -->
                        <span>Portfolio</span><br>
                        <a href="<?php echo home_url(); ?>">Kohigashi Tomorou</a>
                       
                    </p>
                </div>
                <ul>
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="<?php echo home_url('/work/'); ?>">Works</a></li>
                    <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
                    <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                </ul>
            </nav>
            <div class="h1Position">
                <h1>
                    <a href="<?php echo home_url('/about/'); ?>">
                        <picture>
                            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/top/sp-logo.svg" media="(max-width:768px)">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/top/pc-logo.svg" alt="pcロゴ">
                        </picture>
                    </a>
                </h1>
            </div>
        </header>
    <?php endif; ?>