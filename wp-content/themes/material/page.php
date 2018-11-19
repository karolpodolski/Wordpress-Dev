<?php get_header(); ?>

<div id="main">

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col"></div>
        <div class="mdl-cell mdl-cell--8-col">

            <section id="content" role="main">
                
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>

                        <section class="entry-content">

                            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                            <?php the_content(); ?>
                            <div class="entry-links"><?php wp_link_pages(); ?></div>

                        </section>

                    </article>

                    <?php if ( ! post_password_required() ) comments_template( '', true ); ?>

                <?php endwhile; endif; ?>

            </section>  
        </div>
        <div class="mdl-cell mdl-cell--2-col"></div>
    </div>

</div>

<?php get_footer(); ?>