<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Refresh_Textiles
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 style="text-align: center; padding: 4em 1em" class="page-title"><?php esc_html_e( '404 -  Oops! That page can&rsquo;t be found.', 'refresh-textiles' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">


			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
