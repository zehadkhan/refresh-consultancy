<?php

$args = array(
	'post_type'      => 'textile-gallery',
	'posts_per_page' => 5,
	'orderby'        => 'date',
	'order'          => 'DESC'
);

$loop = new WP_Query( $args );

if ( $loop->have_posts() ) :
	while ( $loop->have_posts() ) : $loop->the_post();
		// Display post content here
		if ( has_post_thumbnail() ) {

			?>
			<div class="card" onclick="javascript:location.href='<?php echo get_post_permalink();?>'">
				<img src="<?php echo the_post_thumbnail_url(); ?>"
				     alt="<?php echo get_the_title(); ?>">
				<div class="card-content">
					<h3>
						<?php echo get_the_title(); ?>
					</h3>
					<div class="blog-card-icon">
                            <span><img src="<?php echo get_template_directory_uri() . '/assets/images/arrow-down1.png' ?>"
                                       alt=""></span>
					</div>
					<p class="card-content-txt">
						<?php
						$content = get_the_content();
						$excerpt = wp_trim_words( $content, 7, '...' );
						echo $excerpt; ?>
					</p>
					<a href="<?php echo get_post_permalink();?>" class="button">
						Find out more
						<span class="material-symbols-outlined">→</span>
					</a>
				</div>
			</div>
			<?php
		}
	endwhile;
else :
	echo 'No posts found';
endif;
wp_reset_postdata();
?>
