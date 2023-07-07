<?php
add_action( 'wp_head', 'wp_strict_cross_origin_referrer' );


function my_dynamic_ajax_url() {
	wp_enqueue_script( 'my-ajax-dynamic-script', '/assets/js/jquery.js', array( 'jquery' ) );
	wp_localize_script( 'my-ajax-dynamic-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'my_dynamic_ajax_url' );


/**
 * Load custom CSS and JavaScript.
 */
add_action( 'wp_enqueue_scripts', 'wpdocs_my_enqueue_scripts' );
function wpdocs_my_enqueue_scripts(): void {
	// Enqueue my styles.

	wp_enqueue_style( 'wpdocs-datatables-bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' );
	wp_enqueue_style( 'wpdocs-css-animation-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );
	wp_enqueue_style( 'wpdocs-css-fontawesome-style', get_stylesheet_directory_uri() . '/assets/css/font-awesome-6.4.0.css' );
	wp_enqueue_style( 'rpg-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), time() );

	// Enqueue my scripts.
	wp_enqueue_script( 'fontawesome-js', get_template_directory_uri() . '/assets/js/font-awesome-6-4-min.js', array(), '6.4.0', true );
	wp_enqueue_script( 'wpdocs-datatables-bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js', array(), null, true );
//	wp_enqueue_script( 'wpdocs-datatables-jquery-cdn-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), null, true );
	wp_enqueue_script( 'wpdocs-jquery-datatables-script', 'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js', array(), null, true );
	wp_enqueue_script( 'rpg-custom-js', get_template_directory_uri() . '/assets/js/all.js', array( 'jquery' ), time() );
	wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/assets/js/jquery.js', array( 'jquery' ), time() );


	// Add filters to catch and modify the styles and scripts as they're loaded.
	add_filter( 'style_loader_tag', __NAMESPACE__ . '\wpdocs_my_add_sri', 10, 2 );
	add_filter( 'script_loader_tag', __NAMESPACE__ . '\wpdocs_my_add_sri', 10, 2 );
}

function enqueue_owl_carousel() {
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css' );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_owl_carousel' );
/**
 * Add SRI attributes based on defined script/style handles.
 */

function wpdocs_my_add_sri( $html, $handle ): string {
	switch ( $handle ) {
		case 'wpdocs-bootstrap-style':
			$html = str_replace( ' />', ' integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />', $html );
			break;
		case 'wpdocs-datatables-bootstrap-style':
			$html = str_replace( ' />', '  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />', $html );
			break;
		case 'wpdocs-bootstrap-bundle-script':
			$html = str_replace( '></script>', ' integrity="sha512-kBFfSXuTKZcABVouRYGnUo35KKa1FBrYgwG4PAx7Z2Heroknm0ca2Fm2TosdrrI356EDHMW383S3ISrwKcVPUw==" crossorigin="anonymous"></script>', $html );
			break;
		case 'wpdocs-datatables-bootstrap-script':
			$html = str_replace( '></script>', ' integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>', $html );
			break;
		case 'wpdocs-jquery-datatables-script':
			$html = str_replace( '></script>', ' integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script>', $html );
			break;
	}

	return $html;
}

function create_textile_gallery_post_type() {
	$labels = array(
		'name'          => __( 'Gallery' ),
		'singular_name' => __( 'Textile Gallery Item' )
	);

	$args = array(
		'labels'      => $labels,
		'public'      => true,
		'has_archive' => true,
		'supports'    => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'  => array( 'category', 'post_tag' ),
		'rewrite'     => array( 'slug' => 'consultancy' ), // Change the slug name here
	);

	register_post_type( 'textile-gallery', $args );
}

add_action( 'init', 'create_textile_gallery_post_type' );

function add_custom_text_field() {
	add_meta_box(
		'custom_text_field',
		'Custom Text Field',
		'display_custom_text_field',
		'textile_gallery',
		'normal',
		'default'
	);
}

function display_custom_text_field( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'custom_text_field_nonce' );
	$custom_text = get_post_meta( $post->ID, 'custom_text', true );
	?>
    <input type="text" name="custom_text" value="<?php echo esc_attr( $custom_text ); ?>">
	<?php
}

function save_custom_text_field( $post_id ) {
	if ( ! isset( $_POST['custom_text_field_nonce'] ) || ! wp_verify_nonce( $_POST['custom_text_field_nonce'], basename( __FILE__ ) ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['post_type'] ) && 'textile_gallery' == $_POST['post_type'] ) {
		if ( isset( $_POST['custom_text'] ) ) {
			update_post_meta( $post_id, 'custom_text', sanitize_text_field( $_POST['custom_text'] ) );
		}
	}
}

add_action( 'add_meta_boxes', 'add_custom_text_field' );
add_action( 'save_post', 'save_custom_text_field' );


//add_action( 'admin_init', function () {
//	echo "<script>
//    window.onload = function() {
//        const csfTxtByChange = document.querySelector('.csf-header-left h1 small');
//        csfTxtByChange.textContent = 'By Zehad Khan';
//        const USEbrbrbrUSE = document.querySelector('.USEbrbrbrUSE');
//        USEbrbrbrUSE.textContent = '<br>';
//    };
//</script>";
//}


add_action( 'wp_ajax_nopriv_rpg_mail_video_data_hook', 'rpg_video_mail_data_hook' );
add_action( 'wp_ajax_rpg_mail_video_data_hook', 'rpg_video_mail_data_hook');

function rpg_video_mail_data_hook() {
	// User posted variables
	$email = sanitize_text_field( $_POST['data']['email'] );

	// Validate required fields
	if ( empty( $email ) ) {
		echo "Please fill in all required fields.";
		die();
	}

	// Prepare email content
	$formcontent = "Email-Info: $email\n " .
	               "Subject : Get Full Video \n ";
	$recipient = "info@refreshplastics.com";
//    var_dump($recipient);
	$subject    = "New Mail From: $email\n";
	$mailheader = "From: $email \r\n";

	// Send email
	$resultmail = mail( $recipient, $subject, $formcontent, $mailheader );
	if ( ! $resultmail ) {
		echo "Error sending email.";
	} else {
		echo "Email sent successfully.";
	}
	die();
}



add_action( 'wp_ajax_rpg_mail_data_hook', 'rpg_mail_data_hook' );
add_action( 'wp_ajax_nopriv_rpg_mail_data_hook', 'rpg_mail_data_hook' );
/**
 * AJAX Call to dynamically update mail data
 *
 * @since 1.0.0
 *
 */
function rpg_mail_data_hook( $arg ) {
	// User posted variables
	$name    = sanitize_text_field( $_POST['data']['name'] );
	$email   = sanitize_text_field( $_POST['data']['email'] );
	$country = sanitize_text_field( $_POST['data']['country'] );
	$number  = sanitize_text_field( $_POST['data']['number'] );
	$message = sanitize_text_field( $_POST['data']['message'] );
	$topics  = $_POST['data']['topics'] ?? array();

	// Validate required fields
	if ( empty( $name ) || empty( $email ) ) {
		echo "Please fill in all required fields.";
		die();
	}

	// Prepare email content
	$formcontent = "Name: $name\n " .
	               "Email-Info: $email\n " .
	               "Country: $country\n " .
	               "Number: $number\n " .
	               "Message: $message\n ";

	if ( ! empty( $topics ) ) {
		$formcontent .= "Topics: " . implode( ", ", $topics ) . "\n";
	}

//	$recipient = isset($theMainMail) && !empty($theMainMail) ? $theMainMail : "info@refreshplastics.com";
	$recipient = "info@refreshplastics.com";
	$subject    = "New Mail From: $name\n";
	$mailheader = "From: $email \r\n";

	// Send email
	$resultmail = mail( $recipient, $subject, $formcontent, $mailheader );
	if ( ! $resultmail ) {
		echo "Error sending email.";
	} else {
		echo "Email sent successfully.";
	}
	die();
}

function refreshplastics_customize_register( $wp_customize ) {
    // Add a new section for footer logo
    $wp_customize->add_section( 'refreshplastics_footer_logo_section', array(
        'title' => 'Footer Logo',
        'priority' => 200,
    ) );

    // Add a setting for footer logo
    $wp_customize->add_setting( 'refreshplastics_footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    // Add a control for footer logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'refreshplastics_footer_logo', array(
        'label' => 'Upload Footer Logo',
        'section' => 'refreshplastics_footer_logo_section',
        'settings' => 'refreshplastics_footer_logo',
    ) ) );
}
add_action( 'customize_register', 'refreshplastics_customize_register' );


function refreshplastics_register_menus() {
    register_nav_menus( array(
        'footer-menu' => 'Footer Menu',
    ) );
}
add_action( 'after_setup_theme', 'refreshplastics_register_menus' );
