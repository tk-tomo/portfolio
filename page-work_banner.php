<?php
/* 
Template Name:work_banner
*/
?>
<?php get_header(); ?>
                <!--           main           -->
        <main>
             <section class="container_fild">
                <section class="container">
                    <h2 class="work">Work</h2>
                    <!-- slider_section -->
                    <div id="slider" class="background">
                        <div class="work_position2 slider">
                        <?php if(have_rows('work_slick')):
                            while(have_rows('work_slick')): the_row();
                            $work_img = get_sub_field('work_img');
                            $work_txt = get_sub_field('work_txt');
                            ?>
                                <div>
                                    <img src="<?php echo esc_url($work_img['url']); ?>" alt="<?php echo esc_attr($work_img['alt']); ?>" />
                                    <p class="slider_text"><?php echo esc_html($work_txt);?></p>
                                </div>
                            <?php endwhile; endif;?>
                        </div>
                    </div>
                    <!-- work_about_text -->
                    <div class="work_about_box">
                    <?php $work_title = get_field('work_title');?>
                        <h1><?php echo esc_html($work_title); ?></h1>
                        <?php if(have_rows('banner_content_section')) :
                            while(have_rows('banner_content_section')) : the_row();
                            $tool = get_sub_field('tool');
                            $work_sub_title = get_sub_field('work_sub_title');
                            $concept= get_sub_field('concept');
                            $work_target= get_sub_field('work_target');
                            $page_nation = get_sub_field('page_nation');
                            ?>
                            <div class="work_about_section">
                            <ul class="work_about_section_flex">
                                <li class="work_about_title_box">
                                    <dl>
                                        <dt><h2>作品タイトル</h2></dt>
                                        <dd class="work_about_title"><?php echo esc_html($work_sub_title);?></dd>
                                    </dl>
                                </li>
                                <li class="work_title_about">
                                    <dl>
                                    <div class="work_title_about_text">
                                            <dt>ターゲット</dt>
                                            <dd><?php echo esc_html($work_target);?></dd>
                                        </div>
                                        <div class="work_title_about_text">
                                            <dt>コンセプト</dt>
                                            <dd><?php echo esc_html($concept);?></dd>
                                        </div>
                                        <div class="work_title_about_text">
                                            <dt>使用ツール</dt>
                                            <dd><?php echo esc_html($tool);?></dd>
                                        </div>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                        <?php endwhile; endif; ?>
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