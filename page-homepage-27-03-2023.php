<?php
//Template Name: Refresh Textiles HomePage
get_header();
get_template_part( 'template-parts/nav/nav' );
?>
<?php
$options = get_option( 'prefix_textiles_options' );
?>
<?php get_template_part( 'template-parts/homepage/heroslider-section' ); ?>
    <section class="hero-bottom-main">
		<?php
		if ( isset( $options['opt-group-hero-bottom'] ) && ! empty( $options['opt-group-hero-bottom'] ) ) {
			foreach ( $options['opt-group-hero-bottom'] as $item ) {
				?>
                <div class="what-we-offer">
                    <h5><?php echo $item['opt-text-hero-bottom']; ?> </h5>
                </div>
                <div class="what-we-offer-description">
                    <p><?php echo $item['opt-textarea']; ?></p>
                </div>
                <div class="what-we-offer-button">
                    <a href="<?php echo get_site_url().'/about'?>">Read more</a>
                </div>
			<?php }
		} ?>
    </section>

    <section class="blog-card">
        <div class="blog-card-inner">
            <div class="card-content-group">
				<?php get_template_part( 'template-parts/textile-gallery/textiles_blog' ); ?>
            </div>
        </div>
    </section>


    <section class="feature-cards">
        <div class="feature-card-inner">
			<?php
			if ( isset( $options['opt-group-choose-us'] ) && ! empty( $options['opt-group-choose-us'] ) ) {
				foreach ( $options['opt-group-choose-us'] as $item ) {
					?>
                    <div class="feature-card-heading">
                        <div class="choose-us-text">
                            <h5><?php echo $item['opt-text-choose-area']; ?> </h5>
                        </div>
                        <div class="choose-us-description">
                            <p><?php echo $item['opt-textarea-opt-text-choose-area']; ?></p>
                        </div>
                    </div>
				<?php }
			} ?>


            <div class="feature-cards-group">
                <?php
                if ( isset( $options['opt-group-choose-us-single-image'] ) && ! empty( $options['opt-group-choose-us-single-image'] ) ) {
                foreach ( $options['opt-group-choose-us-single-image'] as $item ) {
                ?>
                    <a href="<?php echo $item['opt-card-url'] ?? ''; ?>">
                        <div class="card border-0" style="width: 18rem;">
                            <img src="<?php echo $item['opt-media-choose-us-single-img']['url']; ?>" class="card-img-top" alt="Refresh">
                            <div class="card-body">
                                <p class="card-text"><?php echo $item['opt-text'] ?? ''; ?> </p>
                            </div>
                        </div>
                    </a>
                <?php }
                } ?>
            </div>

        </div>
    </section>

    <section class="get-inside-manufacturing-video">
        <div class="manufacturing-video-inner">
            <div class="manufacturing-left-video">
				<?php
				if ( isset( $options['video-section-group'] ) ) {
					foreach ( $options['video-section-group'] as $item ) {
//						echo "<iframe width='560' height='315' src='{$item['opt-upload-video-5']}' frameborder='0' allowfullscreen></iframe>";
						?>
                        <iframe width="100%" height="100%"
                                src="<?= $item['opt-upload-video-5'] ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen=""></iframe>
					<?php }
				} ?>
            </div>
            <div class="manufacturing-right-texts">
                <h3 class="manufacturing-video-text">
					<?php if ( isset( $options['video-section-group'] ) ) {
						foreach ( $options['video-section-group'] as $item ) {
							echo $item['opt-textarea'];
						}
					} ?>
                </h3>
                <button type="button" class="btn btn-primary manufacturing-full-video-link" data-toggle="modal"
                        data-target="#exampleModal">
                    View the full video now
                </button>
				<?php echo get_template_part( 'template-parts/homepage/request-video-modal' ) ?>
            </div>
        </div>
    </section>

    <section class="faqs-main">
        <div class="faqs-inner">
            <div class="faqs-heading">
                <h3>Frequently asked questions</h3>
            </div>
            <div class="faqs-title-captions">
                <p>You may have questions about the process or technology.</p>
            </div>
            <div class="faqs-sub-title">
                <h4>Hopefully, we've got the answer!</h4>
            </div>

            <div class="faqs-accordion-area">
                <div class="accordion accordion-flush" id="accordionFlushExample">
					<?php
					$options = get_option( 'prefix_textiles_options' );

					$value = ''; // Define the $value variable before the loop
					if ( isset( $options['opt-group-accordion-ques'] ) && ! empty( $options['opt-group-accordion-ques'] ) ) {
						foreach ( $options['opt-group-accordion-ques'] as $item ) {
							$value = $item;
							?>
                            <div class="accordion-item border mb-4">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
										<?php echo $value['opt-text-faqs']; ?>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"><?php echo $value['opt-editor']; ?>
                                    </div>
                                </div>
                            </div>
							<?php
						}
					};
					?>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(window).on('load', function () {
            // Attach click event listener to accordion items
            $('#accordionFlushExample .accordion-item').each(function (index) {
                // Get ID of accordion header
                var headerId = $(this).find('.accordion-header').attr('id');
                // Concatenate index to ID
                var newHeaderId = headerId + '-' + (index + 1);
                // Update ID of accordion header
                $(this).find('.accordion-header').attr('id', newHeaderId);
                // Update aria-controls attribute of collapse element
                var collapseId = $(this).find('.accordion-collapse').attr('id');
                var newCollapseId = collapseId + '-' + (index + 1);
                $(this).find('.accordion-collapse').attr('id', newCollapseId);
                $(this).find('.accordion-button').attr('data-bs-target', '#' + newCollapseId).attr('aria-controls', newCollapseId);
            });
        });


    </script>

    <section class="contact-area-main">
        <p>If you would like more information, please fill in the contact form or send us an email.</p>
        <div class="contact-form-area-btn">
            <a href="<?php echo get_site_url().'/contact';?>">Contact form</a>
        </div>
    </section>


<?php
get_footer();
