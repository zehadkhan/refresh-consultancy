<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Refresh_Textiles
 */

global $wp;
get_header();
?>

    <main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

//			get_template_part( 'template-parts/content', get_post_type() );

//			the_post_navigation(
//				array(
//					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'refresh-textiles' ) . '</span> <span class="nav-title">%title</span>',
//					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'refresh-textiles' ) . '</span> <span class="nav-title">%title</span>',
//				)
//			);

			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;
			?>
            <div class="col-md-12">
				<?php
				$p = get_post( get_the_ID() );
				?>
                <div class="blog-post-content">
                    <p class="the-title"><?php echo $p->post_title; ?></p>
                    <img src="<?= $p->the_post_thumbnail; ?>" alt="">
                </div>
            </div>
		<?php
		endwhile; // End of the loop.
		?>

    </main><!-- #main -->

<?php
//get_sidebar();
get_footer();
