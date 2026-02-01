<?php if(is_front_page()):?>
    <footer>
        <section class="container_fild">
            <section class="container footerFlex">
                <div class="footerLeft">
                    <p>Kohigashi Tomorou</p>
                    <p><a href="">tk729110@gmail.com</a></p>
                    <ul class="footerGnav">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><a href="<?php echo home_url('/work/'); ?>">Works</a></li>
                        <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
                        <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                    </ul>
                    <!-- <ul class="footerSns">
                        <li><a href=""><img src="img/icon/instaIcon.svg" alt=""></a></li>
                        <li><a href=""><img src="img/icon/LineIcon.svg" alt=""></a></li>
                    </ul> -->
                </div>
                <div class="footerRight">
                    <small>All Rights Reserved 2025 ©︎ kohigashi tomorou</small>
                </div>
            </section>
        </section>
    </footer>
    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.1.0/progressbar.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/index.js"></script>
    <script> 
    </script>
    <?php wp_footer(); ?>
    </body>
</html>
<?php else: ?>
    <!--          footer        -->
<footer>
    <section class="container_fild">
        <section class="container footerFlex">
            <div class="footerLeft">
                <p>Kohigashi Tomorou</p>
                <p><a href="">tk729110@gmail.com</a></p>
                <ul class="footerGnav">
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="<?php echo home_url('/work/'); ?>">Works</a></li>
                    <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
                    <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                </ul>
                <ul class="footerSns">
                    <li><a href=""><img src="<?php echo get_template_directory_uri(); ?>assets/img/icon/instaIcon.svg" alt=""></a></li>
                </ul>
            </div>
            <div class="footerRight">
                <small>All Rights Reserved 2025 ©︎ kohigashi tomorou</small>
            </div>
        </section>
    </section>
</footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.1.0/progressbar.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/index.js"></script>
<?php wp_footer();?>
</body>
</html>
<?php endif; ?>
