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
                        <img src="<?php echo esc_url($work_img['url']); ?>" alt="<?php echo esc_attr($work_img['alt']); ?>" />
                        <p class="slider_text"><a href="<?php echo esc_url( $work_url); ?>" target="_blank" rel="noopener noreferrer">新規ウィンドウで開く</a></p>
                    </div>
                <?php endwhile; endif;?>
            </div>
        </div>
        <div class="work_about_box">
            <h1><?php the_title(); ?></h1>
            <?php
            $period = get_field('period');
            $target = get_field('target');
            $concept= get_field('concept');
            $branding= get_field('branding');
            $color_img= get_field('color_img');
            $tommana_font= get_field('tommana_font');
            $tommana_visual = get_field('tommana_visual');
            $tool = get_field('tool');
            $site_url = get_field('site_url');
            $page_nation = get_field('page_nation');
            $design_information = get_field('design_information');
                ?>
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
                                    <dt>ターゲット</dt>
                                    <dd><?php echo esc_html($target); ?></dd>
                                </div>
                                <div class="work_title_about_text">
                                    <dt>コンセプト</dt>
                                    <dd><?php echo esc_html($concept); ?></dd>
                                </div>
                                <div class="work_title_about_text">
                                    <dt>ブランディングイメージ</dt>
                                    <dd><?php echo esc_html($branding); ?></dd>
                                </div>
                                <div class="work_title_about_text">
                                    <dt>トーン＆マナー</dt>
                                    <dd>配色<div class="color"><img src="<?php echo esc_url($color_img['url']); ?>" alt="<?php echo esc_attr($color_img['alt']); ?>"></div></dd>
                                    <br>
                                    <dd>・フォント:<?php echo esc_html($tommana_font); ?></dd>
                                    <br>
                                    <dd>・ビジュアル:<?php echo esc_html($tommana_visual); ?>​</dd>
                                </div>
                                <div class="work_title_about_text">
                                    <dt>設計情報</dt>
                                    <dd><?php echo esc_html($design_information); ?></dd>
                                </div>
                                <div class="work_title_about_text">
                                    <dt>使用ツール</dt>
                                    <dd><?php echo esc_html($tool); ?></dd>
                                </div>
                                <div class="work_title_about_text">
                                    <dt>サイトURL</dt>
                                    <dd><?php echo esc_url($site_url); ?></dd>
                                </div>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
    </section>
    <div class="pageNation">
        <?php $page_nation ?>
    </div>
</section>
</main>
<?php get_footer(); ?>