<?php
//Template Name: Blog detail
// Template Post Type: Textile Gallery
get_header();
get_template_part( 'template-parts/homepage/heroslider-section' );
?>
<section class="textile-gallery-single-main container row col-md-12">
    <h1>
		<?php echo get_the_title(); ?>
    </h1>
    <div class="single-post-inner">
        <img class="single-post-inner-img" src="<?php echo the_post_thumbnail_url(); ?>"  alt=" <?php echo get_the_title(); ?>"/>
        <div class="card-content">
            <p class="card-content-txt">
			    <?php
			    echo get_the_content();
                ?>
            </p>
        </div>
    </div>
</section>
<section class="contact-form-link col-md-10 m-auto text-center mb-5">
    <a style="color:#fff; background-color: #053C78;" class="btn btn-primary border-0 px-5 py-3" href="<?php echo get_site_url().'/contact'?>" role="button">Contact Us</a>
</section>
<?php
get_footer();
?>
