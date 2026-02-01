<?php get_header(); ?>
    <main>
        <section class="container_fild news_container_fild">
            <div class="container news_container">
                <h2 class="news-title">NEWS</h2>
                <div class="thumbnail-img_box">
                    <?php 
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                    if(!$thumbnail_url){
                        $thumbnail = esc_url(get_template_directory_uri().'/assets/img/no_image.jpg');
                    }
                    ?>
                    <img src="<?php echo $thumbnail_url ?>" alt="<?php the_title_attribute(); ?>">
                </div>
                <p class="date"><?php echo esc_html(get_the_date('Y/m/d')); ?></p>
                <h3 class="news-title_txt"><?php the_title(); ?></h3>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>