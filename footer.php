<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Refresh_Textiles
 */

?>

	<footer id="colophon" class="site-footer">
        <div class="footer-main">
            <div class="footer-logo">
                <a href="<?php echo get_site_url();?>"><?php if ( get_theme_mod( 'refreshplastics_footer_logo' ) ) : ?>
                        <img src="<?php echo esc_url( get_theme_mod( 'refreshplastics_footer_logo' ) ); ?>" alt="Footer Logo">
                    <?php endif; ?></a>
            </div>
            <div class="footer-menu">
                <h5>Menu</h5>
                <div class="footer-menu-items">
                    <ul class="footer-menu-group">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-menu',
                            'container' => 'nav',
                            'container_class' => 'footer-menu-inner',
                        ) );
                        ?>
                    </ul>
                </div>
            </div>

            <div class="footer-menu">
                <h5>Address</h5>
                <div class="footer-menu-items">
                    <ul class="footer-headoffice-group">
                        <li><b>Head Office</b></li>

                        <li style="margin-top: 5px;">World Trade Center Heerlen-Aachen</li>
                        <li>Vogt 21, 6422 RK Heerlen, Netherlands</li>
                        <li>Vogt 21, 52072 Aachen, Germany</li>
                    </ul>

                    <br>
                    <br>
                    <h5>Production Plant, Research & Development</h5>
                    <br>
                    <ul class="footer-production-group">
                        <li>Korpendu 11, 6269 BA Margraten, Netherlands</li>
                    </ul>
                </div>
            </div>

            <div class="footer-contact">
                <h5>Contact</h5>
                <ul class="footer-contact-group">
                    <li><a href="tel:+31 6 53481466">+31 6 53481466</a></li>
                    <li><a href="https://refreshplastics.com">www.refreshplastics.com</a></li>
                    <li><a href="mailto:info@refreshplastics.com">info@refreshplastics.com</a></li>
                </ul>
            </div>
        </div>
		<div class="site-info">
			<p>
                Copyright © 2023 – Refresh Plastics Group<sup>®</sup>
            </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
