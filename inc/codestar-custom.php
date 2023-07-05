<?php


if ( class_exists( 'CSF' ) ) {

	//
// Set a unique slug-like ID
//
	$prefix = 'prefix_textiles_options';

	//
	// Create options
	CSF::createOptions( $prefix, array(
		'menu_title' => 'Refresh Textiles App Settings',
		'menu_slug'  => 'refresh-textiles-options',
	) );

	//
	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'Homepage',
		'fields' => array(
			// Hero Slider Section
			array(
				'id'     => 'opt-group-home-slider-1',
				'type'   => 'group',
				'title'  => 'Hero Slider Section',
				'fields' => array(
					array(
						'id'    => 'opt-text',
						'type'  => 'text',
						'title' => 'Text',
					),
					array(
						'id'    => 'opt-textarea',
						'type'  => 'textarea',
						'title' => 'Textarea',
					),
					array(
						'id'      => 'opt-media-hero-slider-img',
						'type'    => 'media',
						'title'   => 'Media with only image type <br> Size will be : 1920 X 872px as per auto ratio',
						'library' => 'image',
					),
				)
			),

			//	        Hero Bottom Text
			array(
				'id'      => 'opt-group-hero-bottom',
				'type'    => 'group',
				'title'   => 'Hero Bottom Text',
				'fields'  => array(
					array(
						'id'    => 'opt-text-hero-bottom',
						'type'  => 'text',
						'title' => 'Text',
					),
					array(
						'id'    => 'opt-textarea',
						'type'  => 'textarea',
						'title' => 'Textarea',
					),
				),
				'default' => array(
					array(
						'opt-text'     => 'Some text 1',
						'opt-switcher' => true,
						'opt-textarea' => 'Some textarea content 1',
					),
				)
			),

			//	        Choose Us Text
			array(
				'id'      => 'opt-group-choose-us',
				'type'    => 'group',
				'title'   => 'Choose Us Text',
				'fields'  => array(
					array(
						'id'    => 'opt-text-choose-area',
						'type'  => 'text',
						'title' => 'Text',
					),
					array(
						'id'    => 'opt-textarea-opt-text-choose-area',
						'type'  => 'textarea',
						'title' => 'Textarea',
					),
					array(
						'id'     => 'opt-chooseus-photo-group',
						'type'   => 'group',
						'title'  => 'Choose Photo',
						'fields' => array(
							array(
								'id'      => 'opt-media-gallery',
								'type'    => 'media',
								'title'   => 'Media with only image type',
								'library' => 'image',
							),
							array(
								'id'    => 'opt-text-choose-area',
								'type'  => 'text',
								'title' => 'Text',
							),
						)
					)
				),
				'default' => array(
					array(
						'opt-text'     => 'Some text 1',
						'opt-switcher' => true,
						'opt-textarea' => 'Some textarea content 1',
					),
				),

			),

            //          choose us bottom single photo area
            array(
                'id'     => 'opt-group-choose-us-single-image',
                'type'   => 'group',
                'title'  => 'Choose Us Photos',
                'fields' => array(
                    array(
                        'id'    => 'opt-text',
                        'type'  => 'text',
                        'title' => 'Text',
                    ),
                    array(
                        'id'    => 'opt-card-url',
                        'type'  => 'text',
                        'title' => 'Url',
                    ),
                    array(
                        'id'      => 'opt-media-choose-us-single-img',
                        'type'    => 'media',
                        'title'   => 'Media with only image type',
                        'library' => 'image',
                    ),

                )
            ),


            //	        Video Area
			array(
				'id'      => 'video-section-group',
				'type'    => 'group',
				'title'   => 'Video Area',
				'fields'  => array(
					array(
						'id'           => 'opt-upload-video-5',
						'type'         => 'upload',
						'title'        => 'Upload with only video type',
						'library'      => 'video',
						'button_title' => 'Upload Video',
					),
					array(
						'id'    => 'opt-textarea',
						'type'  => 'textarea',
						'title' => 'Textarea',
					),
				),
				'default' => array(
					array(
						'opt-text'     => 'Some text 1',
						'opt-switcher' => true,
						'opt-textarea' => 'Some textarea content 1',
					),
				)
			),

//	        Frequently asked questions
			array(
				'id'       => 'opt-group-accordion-ques',
				'type'     => 'group',
				'title'    => 'Frequently asked questions ',
				'subtitle' => 'WP Editor integrated for Ajax Call.',
				'fields'   => array(
					array(
						'id'    => 'opt-text-faqs',
						'type'  => 'text',
						'title' => 'Text',
					),
					array(
						'id'    => 'opt-editor',
						'type'  => 'wp_editor',
						'title' => 'WP Editor',
					),
				),
				'default'  => array(
					array(
						'opt-text'   => 'WP Editor 1',
						'opt-editor' => 'Editor content 1',
					),
				)
			),
		)
	) );

	//
	// Create a section
	CSF::createSection( $prefix, array(
		'title'  => 'About Page',
		'fields' => array(
			//About Hero Slider Section
			array(
				'id'     => 'opt-group-about-slider-1',
				'type'   => 'group',
				'title'  => 'About Slider Section',
				'fields' => array(
					array(
						'id'    => 'opt-text',
						'type'  => 'text',
						'title' => 'Text',
					),
					array(
						'id'    => 'opt-textarea',
						'type'  => 'textarea',
						'title' => 'Textarea',
					),
					array(
						'id'      => 'opt-media-about-slider-img',
						'type'    => 'media',
						'title'   => 'Media with only image type <br> Size will be : 1920 X 872px as per auto ratio',
						'library' => 'image',
					),
				)
			),
			// A textarea field
			array(
				'id'       => 'opt-group-4',
				'type'     => 'group',
				'title'    => 'Group with WP Editor',
				'subtitle' => 'WP Editor integrated for Ajax Call.',
				'fields'   => array(
					array(
						'id'    => 'about-titles-opt-text',
						'type'  => 'text',
						'title' => 'Title Text',
					),
					array(
						'id'            => 'about-opt-editor',
						'type'          => 'wp_editor',
						'title'         => 'Body Text Editor : <br> Note:  If you want to line Break please use Double<code class="USEbrbrbrUSE"></code><style>.USEbrbrbrUSE:after {content: "<br><br>";color: #ff0d0d;font-size: 18px;} </style>',
						'tinymce'       => true,
						'quicktags'     => true,
						'media_buttons' => true,
						'sanitize'      => false,
					),
					array(
						'id'      => 'opt-media-about-right-img-single',
						'type'    => 'media',
						'title'   => 'About Body Image',
						'library' => 'image',
					),
				),
				'default'  => array(
					array(
						'opt-text'   => 'WP Editor 1',
						'opt-editor' => 'Editor content 1',
					),
				),
			),
			array(
				'id'    => 'about-contact-top-opt-text',
				'type'  => 'text',
				'title' => 'Contact Button top text',
			),

		)
	) );


	// Create a section Contact
	CSF::createSection( $prefix, array(
		'title'  => 'Contact Page',
		'id'     => 'contact-page-content',
		'fields' => array(
			//Contact Hero Slider Section
			array(
				'id'     => 'opt-group-contact-slider-1',
				'type'   => 'group',
				'title'  => 'Contact Slider Section',
				'fields' => array(
					array(
						'id'    => 'opt-text',
						'type'  => 'text',
						'title' => 'Text',
					),
					array(
						'id'    => 'opt-textarea',
						'type'  => 'textarea',
						'title' => 'Textarea',
					),
					array(
						'id'      => 'opt-media-contact-slider-img',
						'type'    => 'media',
						'title'   => 'Media with only image type <br> Size will be : 1920 X 872px as per auto ratio',
						'library' => 'image',
					),
				)
			),
			// A textarea field
			array(
				'id'    => 'opt-textarea',
				'type'  => 'textarea',
				'title' => 'Simple Textarea',
			),

		)
	) );


	CSF::createSection( $prefix, array(
		'title'  => 'Contact Mail Set',
		'id'     => 'all-contact-page-email',
		'fields' => array(
			//Contact Email
			array(
				'id'    => 'opt-mail-set',
				'type'  => 'text',
				'title' => 'Mail Box',
			),
		)
	) );

}
