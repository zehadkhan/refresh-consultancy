<?php
//Template Name: About
get_header();
?>
<?php
get_template_part( 'template-parts/about/heroslider-section' );
?>
<?php
$options = get_option( 'prefix_textiles_options' );
// var_dump($options);

// Use the value of $value outside the loop
//var_dump($value['about-titles-opt-text']);

?>
<section class="about-textiles-main">
    <div class="about-textiles-inner">
		<?php
		$value = ''; // Define the $value variable before the loop
		if ( isset( $options['opt-group-4'] ) && ! empty( $options['opt-group-4'] ) ) {
			foreach ( $options['opt-group-4'] as $item ) {
				$value = $item;
				?>
                <div class="about-inner-section-both">
                    <div class="about-textiles-left-txt">
                        <div class="about-textiles-header">
                            <h1><?php echo $value['about-titles-opt-text']; ?></h1>
                        </div>
                        <div class="about-textiles-text-middle">
                            <p><?php
								echo isset( $value['about-opt-editor'] ) && ! empty( $value['about-opt-editor'] ) ? $value['about-opt-editor'] : "No Text.";
								?></p>
                        </div>
                    </div>
                    <div class="about-textiles-right">
                        <div class="about-textiles-header-mobile">
                            <h1><?php echo $value['about-titles-opt-text']; ?></h1>
                        </div>
                        <img src="<?php echo $value['opt-media-about-right-img-single']['url']; ?>"
                             alt="">
                    </div>
                </div>
				<?php
			}
		}
		?>
    </div>
    <div class="about-textiles-bottom-cta-txt">
        <p>
            <span>
                <?php
                echo isset( $options['about-contact-top-opt-text'] ) && ! empty( $options['about-contact-top-opt-text'] ) ? $options['about-contact-top-opt-text'] : "No Text.";
                ?>
            </span>
        </p>
        <!--                            <div class="about-contact-form-btn">-->
        <!--                                <a href="--><?php //echo get_site_url() . '/contact'; ?><!--">Contact form</a>-->
        <!--                            </div>-->
    </div>
    <div class="about-contact-form-btn">
        <a href="<?php echo get_site_url() . '/contact'; ?>">Contact form</a>
    </div>
</section>

<?php
get_footer();
?>
