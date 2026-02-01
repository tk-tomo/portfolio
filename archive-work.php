<?php get_header(); ?>
<main id="archive-work_all">
<section class="container_fild">
    <section class="container">
        <h2 class="work">Work</h2>
       <ul class="archive-btn_box">
            <li class="archive-btn_box-item hover_active" data-filter="all">ALL</li>
            <li class="archive-btn_box-item" data-filter="code">CORDING</li>
            <li class="archive-btn_box-item" data-filter="web">WEB</li>
            <li class="archive-btn_box-item" data-filter="graphic">GRAPHIC</li>
        </ul>
        <ul class="flex_section">
             <?php 
             $top_id = 16;
             if (have_rows('work_list', $top_id)):
            while (have_rows('work_list', $top_id)): the_row();
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
    </section>
</main>
<?php get_footer(); ?>
<script>
document.querySelectorAll('.archive-btn_box-item').forEach(button => {
    button.addEventListener('click', () => {
        const filterValue = button.getAttribute('data-filter');
        
        // 1. ボタンの見た目（黒背景など）を切り替える
        document.querySelectorAll('.archive-btn_box-item').forEach(btn => btn.classList.remove('hover_active'));
        button.classList.add('hover_active');

        // 2. 作品の表示・非表示を切り替える
        document.querySelectorAll('.work_box').forEach(item => {
            if (filterValue === 'all' || item.classList.contains(filterValue)) {
                item.style.display = 'block'; // 一致したら表示
            } else {
                item.style.display = 'none';  // 一致しなけらば非表示
            }
        });
    });
});
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.filter-btn'); // ボタンのクラス名
  const items = document.querySelectorAll('.work_box');     // 作品カードのクラス名

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      // アクティブなボタンの見た目を切り替え
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterValue = btn.getAttribute('data-filter');

      items.forEach(item => {
        if (filterValue === 'all') {
          item.style.display = 'block'; // すべて表示
        } else if (item.classList.contains(filterValue)) {
          item.style.display = 'block'; // 一致するクラスがあれば表示
        } else {
          item.style.display = 'none';  // それ以外は非表示
        }
      });
    });
  });
});
</script>