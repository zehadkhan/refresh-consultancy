<?php
$options = get_option( 'prefix_textiles_options' );
?>
<section class="hero-main">
	<div class="hero-slider-inner">
		<div class="owl-carousel">
			<?php
			if ( isset( $options['opt-group-about-slider-1'] ) && ! empty( $options['opt-group-about-slider-1'] ) ) {
				foreach ( $options['opt-group-about-slider-1'] as $item ) {
					?>
					<div class="item">
						<img src="<?php echo $item['opt-media-about-slider-img']['url']; ?>"
						     alt="Refresh Textiles"/>
                        <div class="bg-overlay"></div>
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
				<h3>No Data!</h3>
				<?php
			}
			?>
		</div>
	</div>
</section>
