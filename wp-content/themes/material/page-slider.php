<?php get_header(); ?>

<div id="main">

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col"></div>
        <div class="mdl-cell mdl-cell--8-col">

            <section id="content" role="main">
                
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <br><br><br><br>
                
                        <div class="slider">
                            <div>slide1</div>
                            <div>slide2</div>
                            <div>slide3</div>
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