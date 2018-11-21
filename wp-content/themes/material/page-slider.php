<?php get_header(); ?>

<div id="main">

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col"></div>
        <div class="mdl-cell mdl-cell--8-col">

            <section id="content" role="main">
                
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <br><br><br><br><br><br><br><br>
                
                        <div class="text-slider">
                            <div><img src="<?php echo get_template_directory_uri(); ?>/img/slide1.jpg"></div>
                            <div><img src="<?php echo get_template_directory_uri(); ?>/img/slide2.jpg"></div>
                            <div><img src="<?php echo get_template_directory_uri(); ?>/img/slide1.jpg"></div>
                            <div><img src="<?php echo get_template_directory_uri(); ?>/img/slide2.jpg"></div>
                        </div>
                
                    <br><br><br><br>

                    <?php if ( ! post_password_required() ) comments_template( '', true ); ?>

                <?php endwhile; endif; ?>

            </section>  
        </div>
        <div class="mdl-cell mdl-cell--2-col"></div>
    </div>

</div>

<?php get_footer(); ?>