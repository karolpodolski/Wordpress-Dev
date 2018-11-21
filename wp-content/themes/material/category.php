<?php get_header(); ?>

<div id="main">

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col"></div>
        <div class="mdl-cell mdl-cell--8-col">

            <section id="content" role="main">

                <header class="header">
                    <h1 class="entry-title"><?php single_cat_title(); ?></h1>
                    <?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
                </header>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'entry' ); ?>
                <?php endwhile; endif; ?>

                <?php numeric_posts_nav(); ?>

            </section>
            
        </div>
        <div class="mdl-cell mdl-cell--2-col"></div>
    </div>

</div>

<?php get_footer(); ?>