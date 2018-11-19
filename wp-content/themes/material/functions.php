<?php

add_action( 'after_setup_theme', 'template_setup' );
function template_setup()
{
    load_theme_textdomain( 'telmpate', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
    register_nav_menus(
        array( 'main-menu' => __( 'Main Menu', 'telmpate' ) )
    );
}

//Making jQuery to load from Google Library
function replace_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'replace_jquery');

// Load JS & CSS
add_action( 'wp_enqueue_scripts', 'load_scripts' );
function load_scripts() {
    //wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), false, false );
    wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/functions.js', array(), false, true );
    wp_enqueue_style( 'style', get_template_directory_uri().'/style.css' );
}

add_action( 'comment_form_before', 'enqueue_comment_reply_script' );
function enqueue_comment_reply_script()
{
    if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'template_title' );
    function template_title( $title ) {
    if ( $title == '' ) {
        return '&rarr;';
    } else {
        return $title;
    }
}

add_filter( 'wp_title', 'filter_wp_title' );
function filter_wp_title( $title )
{
    return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'widgets_init' );
function widgets_init()
{
    register_sidebar( array (
        'name' => __( 'Sidebar Widget Area', 'blankslate' ),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

function custom_pings( $comment )
{
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
    <?php 
}

add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
    if ( !is_admin() ) {
        global $id;
        $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}