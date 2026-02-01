<?php
/* 
Template Name:work_coder_works
*/
?>

<?php get_header(); ?>
<main>
<section class="container_fild">
    <section class="container">
        <h2 class="work">Work</h2>
        <div id="slider" class="background">
            <div class="work_position2 slider">
                <?php if(have_rows('work_slick')):
                while(have_rows('work_slick')): the_row();
                $work_img = get_sub_field('work_img');
                $work_url = get_sub_field('work_url');
                ?>
                <div>
                    <a href="<?php echo esc_url($work_url); ?>">
                        <img src="<?php echo esc_url($work_img['url']); ?>" alt="<?php echo esc_attr($work_img['alt']); ?>" />
                        <p class="slider_text"><a href="<?php echo esc_url( $work_url); ?>" target="_blank" rel="noopener noreferrer">新規ウィンドウで開く</a></p>
                    </a>
                </div>  
                <?php endwhile; endif;?>
            </div>
        </div>
        <div class="work_about_box">
            <?php
            $work_title = get_field('work_title');
            $period = get_field('period');
            $alignment_designer = get_field('alignment_designer');
            $tool = get_field('tool');
            $page_nation = get_field('page_nation');
                ?>
              <h1><?php echo esc_html($work_title); ?></h1>
                <div class="work_about_section">
                    <ul class="work_about_section_flex">
                        <li class="work_about_title_box">
                            <h2>企画概要</h2>
                        </li>
                        <li class="work_title_about">
                            <dl>
                                <div class="work_title_about_text">
                                    <dt>制作期間</dt>
                                    <dd><?php echo $period; ?></dd>
                                </div>
                                <div class="work_title_about_text">
                                    <dt>設計概要</dt>
                                    <dd><?php echo $alignment_designer; ?></dd>
                                </div>
                                <div class="work_title_about_text">
                                    <dt>使用ツール / コード</dt>
                                    <dd><?php echo esc_html($tool); ?></dd>
                                </div>
                                <div class="work_title_about_text url-mgb">
                                    <dt>サイトURL</dt>
                                    <?php if(have_rows('site_url_rows')): 
                                        while(have_rows('site_url_rows')):the_row();
                                        $site_url_txt = get_sub_field('site_url_txt');
                                        $site_url = get_sub_field('site_url');
                                        ?>
                                        <dd><a href="<?php echo esc_url($site_url); ?>" target="_blank" rel="noopener noreferrer" class="hover_yellow"><?php echo esc_html($site_url_txt); ?></a>
                                        </dd>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
    </section>
    <div class="pageNation">
    <?php
  // ▼▼▼ ここから TOP の並び順を見て Prev / Next / Top を作る ▼▼▼

  // 1) TOPページ（フロントページ）のIDを取得
  $front_page_id = get_option('page_on_front');
  // 例）$front_page_id = 2; // 「ポートフォリオTOP」のページIDを直書きでもOK

  $works = array();

  // 2) TOPページの「work_list」リピーターフィールドを全部読む
  if (have_rows('work_list', $front_page_id)) :
      while (have_rows('work_list', $front_page_id)) : the_row();
          $work_page_url = get_sub_field('work_page_url'); // 個別ページのURL
          $work_title    = get_sub_field('work_title');    // タイトル（必要なら使用）

          if (!$work_page_url) {
              continue; // URLが空ならスキップ
          }

          // URLから投稿IDを取得（固定ページでもOK）
          $work_post_id = url_to_postid($work_page_url);

          if (!$work_post_id) {
              continue; // 内部ページじゃない等でID取れない場合はスキップ
          }

          $works[] = array(
              'id'    => $work_post_id,
              'url'   => $work_page_url,
              'title' => $work_title,
          );
      endwhile;
  endif;

  // 3) 今表示している固定ページのID
  $current_id    = get_the_ID();
  $current_index = null;

  // 4) 並び順の中で「今のページ」が何番目かを探す
  foreach ($works as $index => $item) {
      if ((int) $item['id'] === (int) $current_id) {
          $current_index = $index;
          break;
      }
  }

  // 5) 前後の作品を取得
  $prev_item = $next_item = null;

  if ($current_index !== null) {
      if ($current_index > 0) {
          $prev_item = $works[$current_index - 1];
      }
      if ($current_index < count($works) - 1) {
          $next_item = $works[$current_index + 1];
      }
  }

  // 6) 先頭 / 最後かどうか & TOPページURL を用意
  $total_works   = count($works);
  $is_first_work = ($current_index === 0);
  $is_last_work  = ($current_index === $total_works - 1);
  $top_url       = get_permalink($front_page_id);
?>

<?php if ($prev_item || $is_first_work): ?>
  <div class="pageNation__prev">
    <p>
      <a href="<?php echo esc_url( $prev_item ? $prev_item['url'] : $top_url ); ?>">
        <?php echo $prev_item ? 'Prev' : 'TOP'; ?>
      </a>
    </p>
  </div>
<?php endif; ?>

<?php if ($next_item || $is_last_work): ?>
  <div class="pageNation__next">
    <p>
      <a href="<?php echo esc_url( $next_item ? $next_item['url'] : $top_url ); ?>">
        <?php echo $next_item ? 'Next' : 'TOP'; ?>
      </a>
    </p>
  </div>
<?php endif; ?>


</div>

</section>
</main>
<?php get_footer(); ?>