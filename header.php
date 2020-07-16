<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <!-- Bootstrap core CSS -->
    <link href="<?php echo bloginfo( 'stylesheet_directory' );?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo( 'stylesheet_directory' );?>/style.css" rel="stylesheet">
    <link href="<?php echo bloginfo( 'stylesheet_directory' ); ?>/css/animate.css" rel="stylesheet">
    <!--<link href="<?php echo bloginfo( 'stylesheet_directory' ); ?>/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="<?php bloginfo( 'stylesheet_directory' );?>/js/jquery-3.3.1.slim.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--Header Start-->
<header class="fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-4  order-lg-1 order-md-1 order-sm-1 order-1 text-center logo">
                <a href="<?php echo translate_text(site_url(), site_url().'/about-us/');?>"><img src="<?php echo bloginfo( 'stylesheet_directory' );?>/images/logo.png" /></a>
            </div>
            <div class="top-menu col-xl-6 col-lg-5 col-md-2 col-sm-1 col-8  order-lg-2 order-md-3 order-sm-3 order-2 px-0 float-right d-flex justify-content-center">
                <?php
                    wp_nav_menu(
                        array(
                        'theme_location' => 'primary',
                        'menu_class' => 'primary-menu',
                        )
                    );
                ?>            
    
        </div>
            <div class="col-xl-4 col-lg-5 col-md-8 col-sm-9 col-12 order-lg-3 order-md-2 order-sm-2 order-3  social-lang d-flex justify-content-center">
                <ul class="social">
                    <li><a href="https://www.facebook.com/BioP%C3%A2tes-Nonna-Lina-112552890202274/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/biopatesnonnalina/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>

                <ul class="lang">

                <?php pll_the_languages(array('display_names_as' => 'slug')); ?>
                <?php 
                pll_languages_list($args);
                //pll_the_languages();?>    
                <!-- <li><a href="">Fr</a> | </li>
                    <li><a href="">En</a></li> -->
                </ul>

                <ul class="login-signup">
                    <!--If user login function-->
                    <?php if ( !is_user_logged_in() ) { ?>
                        <li>
                            <a href="<?php echo get_permalink(translate_text(619, 623)); ?>?action=register">
                            <?php echo translate_text('S’enregistrer', 'Register'); ?>
                            </a> | 
                        </li>
                        <li>
                            <a href="<?php echo get_permalink(translate_text(617, 625)); ?>?action=login">
                            <?php echo translate_text('Se connecter', 'Login'); ?>
                            </a>
                        </li>

                    <?php } else {   ?>
                        <li>
                            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>orders/">
                            <?php echo translate_text('Bienvenue ', 'Welocme! ') . wp_get_current_user()->user_login ; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </div>
</header>


<!--Header End-->
