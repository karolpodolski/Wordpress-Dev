<?php get_header(); ?>

<div id="main">

    <div class="mdl-grid index-slider">
        <div class="mdl-cell mdl-cell--2-col"></div>
        <div class="mdl-cell mdl-cell--8-col">
            <div class="centered">
                <div class="lead">
                    <h1>Quisque ultrices ac sapien</h1>
                    <p>Fusce dictum, justo sit amet feugiat tristique, lorem lorem rhoncus elit, nec cursus arcu arcu luctus ligula. </p>
                    <form class="search" action="#">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">Szukana fraza...</label>

                        </div>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Szukaj</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--2-col"></div>
    </div>

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col"></div>
        <div class="mdl-cell mdl-cell--8-col">

            <section id="content" class="index" role="main">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'entry' ); ?>

                <?php endwhile; endif; ?>

            </section>  
        </div>
        <div class="mdl-cell mdl-cell--2-col"></div>
    </div>
    
</div>

<?php get_footer(); ?>