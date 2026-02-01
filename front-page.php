<?php get_header(); ?>
<main>
  <div class="mainVisualArea">
    <div class="mainVisual">
      <picture>
        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/top/mainVijyualImgSp.jpg" media="(max-width:768px)">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/top/mainVijyualImg.jpg" alt="">
      </picture>
    </div>
    <picture>
      <source class="namePosition" srcset="<?php echo get_template_directory_uri(); ?>/assets/top/nameSp.svg" media="(max-width:768px)">
      <img class="namePosition" src="<?php echo get_template_directory_uri(); ?>/assets/top/name.svg" alt="">
    </picture>
    <span></span>
  </div>

  <article id="Principle" class="sectionMargin">
    <section class="container_fild">
      <section class="container">
        <div class="conseptFlex">
          <div class="flexLeft headingTemplate">
            <h2>About</h2>
            <p>私について</p>
          </div>
          <div class="flexRight">
            <h3 class="catchCopy">
              <span>目的に合わせて制作する。</span>
              <!-- <span>「らしさ」を、形にする。</span> -->
              <span></span>
            </h3>
            <p>
            閲覧いただきありがとうございます。小東知朗と申します。<br>
            ただ作るだけではなく、クライアントの目的や課題に合わせて、<br class="pc_nav">
            最適な形を考えながら制作することを大切にしています。
            <br>
            <br>
            単に制作するだけでなく、目的に応じてより良い形を考え、<br class="pc_nav">提案しながら関わる働き方を大切にしています。<br class="pc_nav">
            なぜこの構成なのか、どのような人が使うのか。<br class="pc_nav">そうした思考こそがクリエイティブ全般に共通する本質だと考えています。<br class="pc_nav">
            コーダーやエンジニアという立場に留まらず、<br class="pc_nav">自ら積極的に提案を続けていきます。
            </p>
            <div class="aboutBtn">
              <a href="<?php echo home_url('/about/'); ?>">
                <p>もっと詳しく見る</p>
                <div class="btn">
                  <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/btnIcon.svg" alt="">
                  </figure>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>
    </section>
  </article>

  <article class="news-container">
    <section class="container_field">
      <div>
        <div class="news__wrapper">
          <div class="news_title_box headingTemplate container">
            <div class="">
              <h2>News</h2>
              <p>ニュース</p>
            </div>
            <div id="js-slide__nav__inner"></div>
          </div>
          <div class="news-content_slick-box__wrapper">
            <div class="news-content_slick-box">
              <div class="news-content_slick">
                <?php
                  $q = new WP_Query(array(
                    'post_type'      => 'news',
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                  ));

                  if ($q->have_posts()):
                    while ($q->have_posts()): $q->the_post();

                      $thumb = get_the_post_thumbnail(null, 'large', array(
                        'alt' => esc_attr(get_the_title())
                      ));
                      if (!$thumb) {
                        $thumb = '<img src="' . esc_url(get_template_directory_uri() . '/images/no-image.jpg') . '" alt="">';
                      }

                      $terms = get_the_terms(get_the_ID(), 'news_cat');

                      $raw_excerpt = get_the_excerpt();
                      if (!$raw_excerpt) {
                        $raw_excerpt = wp_strip_all_tags(get_the_content());
                      }
                      $excerpt = mb_strlen($raw_excerpt) > 80
                        ? mb_substr($raw_excerpt, 0, 80) . '…'
                        : $raw_excerpt;
                ?>
                  <div class="news-content_slick-item">
                    <a href="<?php the_permalink(); ?>">
                      <?php echo $thumb; ?>
                      <span class="news-date_txt"><?php echo esc_html(get_the_date('Y/m/d')); ?></span>
                      <div class="news_category-ditail_box">
                        <?php if (!is_wp_error($terms) && !empty($terms)): ?>
                          <div class="news_category_txt__wrapper">
                            <?php foreach ($terms as $term): ?>
                              <span class="news-category_txt"><?php echo esc_html($term->name); ?></span>
                            <?php endforeach; ?>
                          </div>
                        <?php endif; ?>
                        <p class="news-ditail_txt"><?php echo esc_html($excerpt); ?></p>
                      </div>
                    </a>
                  </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>

  <article id="works" class="work-container">
    <section class="container_fild">
      <section class="container">
        <div class="headingTemplate">
          <h2>Work</h2>
          <p>作品</p>
        </div>
        <ul class="flex_section">
          <?php 
          $count = 0; // ★何件目かを数えるカウンターをリセット
          if (have_rows('work_list')):
            while (have_rows('work_list')): the_row();
              $count++; // ★ループが回るたびに1ずつ増やす

              // ★21件を超えたら、このループを強制終了する
              if ($count > 21) {
                break;
              }

              $category        = get_sub_field('category');
              $animation_delay = get_sub_field('animation_delay');
              $work_li_img     = get_sub_field('work_li_img');
              $work_title      = get_sub_field('work_title');
              $work_page_url   = get_sub_field('work_page_url');
              $work_award      = get_sub_field('work_award');
          ?>
          <?php 
          // 1. 作品URLから投稿IDを特定
          $target_id = url_to_postid($work_page_url); 
          $cat_class = '';

          if ($target_id) {
              // 2. その投稿に付いている「ポートフォリオタイプ」をすべて取得
              // これが single-work.php で管理しているカテゴリー情報そのものです
              $terms = get_the_terms($target_id, 'portfolio_type'); 
              
              if ($terms && !is_wp_error($terms)) {
                  // 3. スラッグ（code, web, graphic）を抜き出してクラス名にする
                  $cat_class = join(' ', wp_list_pluck($terms, 'slug'));
              }
          }
        ?>
            <li class="work_box inview-blur <?php echo esc_attr($cat_class); ?>" data-animation-delay="<?php echo esc_attr($animation_delay); ?>">
              <ul>
                <li class="work_content">
                  <a href="<?php echo esc_url($work_page_url); ?>">
                    <?php if ($work_li_img): ?>
                      <figure>
                        <img src="<?php echo esc_url($work_li_img['url']); ?>" alt="<?php echo esc_attr($work_li_img['alt']); ?>">
                      </figure>
                    <?php endif; ?>
                    <div>
                      <h3><?php echo esc_html($work_title); ?></h3>
                      <p>
                        <?php if ($work_award) { echo '<span class="gpText">入賞作品</span>/'; } ?>
                        <?php echo esc_html($category); ?>
                      </p>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          <?php endwhile; endif; ?>
        </ul>
        <a class="more_btn-box" href="./work"><p>MORE</p></a>
      </section>
    </section>
  </article>

  <article>
    <section class="container_fild templateMargin">
      <section class="container">
        <div class="ServiceFlex">
          <div class="headingTemplate flexLeft">
            <h2>Skills</h2>
            <p>技術</p>
          </div>
          <div class="flexRight">
            <ul>
              <li class="serviceList">
                <div><p>01</p></div>
                <div>
                  <h3>vs.codeを利用した<br class="sp_nav">WEBサイト構築</h3>
                  <p>HTML、SCSS、CSS、JS、PHP、Gulp、yarn-webpack、GitHub、WordPressを駆使してウェブサイトを構築しております。見た目の美しさだけでなく、クライアントに使用してもらえるかなど、情報設計や機能性といった部分にも配慮しております。</p>
                </div>
              </li>
              <li class="serviceList">
                <div><p>02</p></div>
                <div>
                  <h3>アプリを利用した<br class="sp_nav">グラッフィックデザイン</h3>
                  <p>
                    主にIllustrator、Photoshop、XD、Figmaを使用しております。<br>
                    IllustratorやPhotoshopでは、バナー・アイコン・写真加工などのグラフィック制作を行い、XDやFigmaではワイヤーフレームやUI設計を通して、デザインからコーディングへスムーズに移行できる環境を整えています。<br>
                    また、デザインデータはチーム内での共有や修正がしやすい形に整理し、効率的な制作進行を心がけています。
                  </p>
                </div>
              </li>
              <li class="serviceList">
                <div><p>03</p></div>
                <div>
                  <h3>WordPressを利用した<br class="sp_nav">WEBサイト構築</h3>
                  <p class="scrollBottom">
                    WordPressを用いた基本的なサイト構築はもちろん、テーマのカスタマイズやカスタムフィールドの実装、各種フォームの設定など幅広く対応いたします。<br>
                    デザインデータをもとにレスポンシブに最適化したコーディングを行い、管理画面から簡単に更新できる仕組みを設計します。<br>
                    また、SEO対策やセキュリティ設定、表示速度の調整など、運用を見据えた構築を心がけています。<br>
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </section>
  </article>
</main>
<?php get_footer(); ?>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  const header = document.querySelector('.top-nav_pc');
  if (!header) return;

  const trigger = 100; // スクロール量（px）

  window.addEventListener('scroll', () => {
    if (window.scrollY > trigger) {
      header.classList.add('header-active');
    } else {
      header.classList.remove('header-active');
    }
  });
});
</script>
