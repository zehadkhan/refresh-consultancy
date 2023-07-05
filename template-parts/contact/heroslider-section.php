<?php
$options = get_option( 'prefix_textiles_options' );
?>
<section class="hero-main">
	<div class="hero-slider-inner">
		<div class="owl-carousel">
			<?php
			if ( isset( $options['opt-group-contact-slider-1'] ) && ! empty( $options['opt-group-contact-slider-1'] ) ) {
				foreach ( $options['opt-group-contact-slider-1'] as $item ) {
					?>
					<div class="item">
						<img src="<?php echo $item['opt-media-contact-slider-img']['url']; ?>"
						     alt="Refresh Textiles"/>
						<div class="refresh-textiles-hero-image-text">
							<h1 class="hero-image-title"><?php echo $item['opt-text']; ?></h1>
							<div class="inner-text-hero">
								<p><?php echo $item['opt-textarea']; ?> </p>
							</div>
						</div>
					</div>
					<?php
				}
			} else {
				?>
				<div class="item">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/refresh-tex-hero-image1.jpg' ?>"
					     alt="Refresh Textiles"/>
					<div class="refresh-textiles-hero-image-text">
						<h1 class="hero-image-title">Refresh Textiles</h1>
						<div class="inner-text-hero">
							<p>The environment is plagued by world wide plastic pollution. But there’s more.<br>
								Another harmful contributor is textile production. Wouldn’t it be great to be able
								to
								produce and<br>
								buy textile that does not contribute to textile waste? </p>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
