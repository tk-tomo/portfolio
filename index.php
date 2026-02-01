<?php get_header(); ?>
<?php 
if (have_posts()){
    while(have_posts()){
        the_post();
        get_template_part('template-parts/content'); 
    }
}else{
    echo'<p>コンテンツがありません</p>';
}
?>
<?php get_sidebar();?>
<?php get_footer(); ?>
