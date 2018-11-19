<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900&amp;subset=latin-ext" rel="stylesheet">
    
<!-- Material Design -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-deep_purple.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
<div class="mdl-layout mdl-js-layout">
    <div class="progress"></div>
    <header class="mdl-layout__header <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo 'transparent'; } ?>">
        <div class="mdl-layout-icon"></div>
        <div class="mdl-layout__header-row">
            <span class="mdl-layout__title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
            </span>
            <div class="mdl-layout-spacer"></div>
            <!--Menu glowne-->
            <nav class="mdl-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'items_wrap' => '' ) ); ?>
                <a class="mdl-navigation__link" href="#">Nav link 1</a>
                <a class="mdl-navigation__link" href="#">Nav link 2</a>
                <a class="mdl-navigation__link" href="#">Nav link 3</a>
            </nav>
        </div>
    </header>
    
    <!--Menu przyklejone-->
    <div class="mdl-layout__drawer">
        <span class="mdl-layout__title">Simple Layout</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="#">Nav link 1</a>
            <a class="mdl-navigation__link" href="#">Nav link 2</a>
            <a class="mdl-navigation__link" href="#">Nav link 3</a>
        </nav>
    </div>
    
    <main class="mdl-layout__content">
  

    
                
        
  