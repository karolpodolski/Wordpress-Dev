<?php get_header(); ?>

<div id="main">

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col"></div>
        <div class="mdl-cell mdl-cell--8-col">

            <section id="content" role="main">

                <header class="header">
                <?php the_post(); ?>
                <h1 class="entry-title author"><?php _e( 'Author Archives', 'blankslate' ); ?>: <?php the_author_link(); ?></h1>
                <?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
                <?php rewind_posts(); ?>
                </header>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'entry' ); ?>
                <?php endwhile; ?>

                <?php numeric_posts_nav(); ?>

            </section>
            
        </div>
        <div class="mdl-cell mdl-cell--2-col"></div>
    </div>

</div>

<?php get_footer(); ?>