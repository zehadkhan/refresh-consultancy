<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Refresh_Textiles
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<!--    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">-->
<!--    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="header-page" class="site-header-pr">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu([
                'container' => '',
                'menu' => 'main-menu',
                'menu_id' => 'main-menu',
                'items_wrap' => '<ul id="main-menu" class="menu-items">%3$s</ul>',
            ]);
            ?>
		</nav><!-- #site-navigation -->
        <div class="mobile-nav-main">
            <div class="mobile-nav-menu-inner">
                <a href="javascript:void(0);"> <i class="fa-solid fa-bars"></i></a>
            </div>
            <div class="mobile-menu-item-pr">
                <div class="site-branding">
		            <?php
		            the_custom_logo();
		            ?>
                    <div class="mobile-menu-close-btn">
                        <a href="javascript:void(0);"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                </div><!-- .site-branding -->
	            <?php
                wp_nav_menu([
                    'container' => '',
                    'menu' => 'main-menu',
                    'menu_id' => 'main-menu',
                    'items_wrap' => '<ul id="main-menu" class="menu-items mobile-menu menu-items-mobile">%3$s</ul>',
                    'fallback_cb' => false,
                ]);
	            ?>
            </div>

        </div>
	</header><!-- #masthead -->
</div>
