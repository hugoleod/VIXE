<?php
/**
 * Church Services: Customizer
 *
 * @package Church Services
 * @subpackage church_services
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function church_services_customize_register( $wp_customize ) {

	// Register the custom control type.
		$wp_customize->register_control_type( 'Church_Services_Toggle_Control' );

	//add home page setting pannel
	$wp_customize->add_panel( 'church_services_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home Page Settings', 'church-services' ),
	    'description' => __( 'Description of what this panel does.', 'church-services' ),
	) );


	//TP General Option
	$wp_customize->add_section('church_services_tp_general_settings',array(
        'title' => __('TP General Option', 'church-services'),
        'panel' => 'church_services_panel_id',
        'priority' => 10,
    ) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('church_services_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'church_services_sanitize_choices'
	));
	$wp_customize->add_control('church_services_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'church-services'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'church-services'),
        'section' => 'church_services_tp_general_settings',
        'choices' => array(
            'full' => __('Full','church-services'),
            'left' => __('Left','church-services'),
            'right' => __('Right','church-services'),
            'three-column' => __('Three Columns','church-services'),
            'four-column' => __('Four Columns','church-services'),
            'grid' => __('Grid Layout','church-services')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('church_services_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'church_services_sanitize_choices'
	));
	$wp_customize->add_control('church_services_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'church-services'),
        'description'   => __('This option work for pages.', 'church-services'),
        'section' => 'church_services_tp_general_settings',
        'choices' => array(
            'full' => __('Full','church-services'),
            'left' => __('Left','church-services'),
            'right' => __('Right','church-services')
        ),
	) );

	$wp_customize->add_setting('church_services_sticky',array(
		'default' => false,
		'sanitize_callback'	=> 'church_services_sanitize_checkbox'
	));
	$wp_customize->add_control('church_services_sticky',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Sticky Header','church-services'),
		'section' => 'church_services_tp_general_settings',
	));

	$wp_customize->add_setting( 'church_services_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_sticky', array(
		'label'       => esc_html__( 'Show Sticky Header', 'church-services' ),
		'section'     => 'church_services_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'church_services_sticky',
	) ) );

	$wp_customize->add_setting( 'church_services_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'church-services' ),
		'section'     => 'church_services_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'church_services_preloader_show_hide',
		) ) );


	//TP Blog Option
	$wp_customize->add_section('church_services_blog_option',array(
        'title' => __('TP Blog Option', 'church-services'),
        'panel' => 'church_services_panel_id',
        'priority' => 10,
    ) );

	$wp_customize->add_setting( 'church_services_remove_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_remove_date', array(
		'label'       => esc_html__( 'Show / Hide Date Option', 'church-services' ),
		'section'     => 'church_services_blog_option',
		'type'        => 'toggle',
		'settings'    => 'church_services_remove_date',
	) ) );


	$wp_customize->add_setting( 'church_services_remove_author', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_remove_author', array(
		'label'       => esc_html__( 'Show / Hide Author Option', 'church-services' ),
		'section'     => 'church_services_blog_option',
		'type'        => 'toggle',
		'settings'    => 'church_services_remove_author',
	) ) );


	$wp_customize->add_setting( 'church_services_remove_comments', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_remove_comments', array(
		'label'       => esc_html__( 'Show / Hide Comment Option', 'church-services' ),
		'section'     => 'church_services_blog_option',
		'type'        => 'toggle',
		'settings'    => 'church_services_remove_comments',
	) ) );


	$wp_customize->add_setting( 'church_services_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'church-services' ),
		'section'     => 'church_services_blog_option',
		'type'        => 'toggle',
		'settings'    => 'church_services_remove_tags',
	) ) );


 	$wp_customize->add_setting( 'church_services_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	 $wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'church-services' ),
		'section'     => 'church_services_blog_option',
		'type'        => 'toggle',
		'settings'    => 'church_services_remove_read_button',
	) ) );

    $wp_customize->add_setting('church_services_read_more_text',array(
		'default'=> __('Read More','church-services'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('church_services_read_more_text',array(
		'label'	=> __('Edit Button Text','church-services'),
		'section'=> 'church_services_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'church_services_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'church_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'church_services_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','church-services' ),
		'section'     => 'church_services_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top bar Section
	$wp_customize->add_section( 'church_services_topbar', array(
    	'title'      => __( 'Header Settings', 'church-services' ),
		'panel' => 'church_services_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting('church_services_header_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('church_services_header_button',array(
		'label'	=> __('Add Button Text','church-services'),
		'section'=> 'church_services_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('church_services_header_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('church_services_header_button_link',array(
		'label'	=> __('Add Button URL','church-services'),
		'section'=> 'church_services_topbar',
		'type'=> 'url'
	));


	//home page slider
	$wp_customize->add_section( 'church_services_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'church-services' ),
		'panel' => 'church_services_panel_id',
      'priority' => 10,
	) );


	$wp_customize->add_setting( 'church_services_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'church-services' ),
		'section'     => 'church_services_slider_section',
		'type'        => 'toggle',
		'settings'    => 'church_services_slider_arrows',
	) ) );

	$wp_customize->add_setting('church_services_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('church_services_slider_short_heading',array(
		'label'	=> __('Add short Heading','church-services'),
		'section'=> 'church_services_slider_section',
		'type'=> 'text'
	));

	for ( $church_services_count = 1; $church_services_count <= 4; $church_services_count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'church_services_slider_page' . $church_services_count, array(
			'default'           => '',
			'sanitize_callback' => 'church_services_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'church_services_slider_page' . $church_services_count, array(
			'label'    => __( 'Select Slide Image Page', 'church-services' ),
			'section'  => 'church_services_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'church_services_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'church-services' ),
		'section'     => 'church_services_slider_section',
		'type'        => 'toggle',
		'settings'    => 'church_services_slider_button',
	) ) );

	//About Section
	$wp_customize->add_section('church_services_about_section',array(
		'title'	=> __('About Section','church-services'),
		'panel' => 'church_services_panel_id',
	));

	$wp_customize->add_setting('church_services_about_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('church_services_about_short_heading',array(
		'label'	=> __('Add short Heading','church-services'),
		'section'=> 'church_services_about_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'church_services_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'church_services_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'church_services_about_page', array(
		'label'    => __( 'Select About Page', 'church-services' ),
		'section'  => 'church_services_about_section',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting('church_services_record_increament',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('church_services_record_increament',array(
		'label'	=> esc_html__('Record Box Increament','church-services'),
		'section'	=> 'church_services_about_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 3,
		),
	));

	$church_services_record = get_theme_mod('church_services_record_increament');

	for ($church_services_i=1; $church_services_i <= $church_services_record ; $church_services_i++) {


		$wp_customize->add_setting('church_services_record_box_number'.$church_services_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('church_services_record_box_number'.$church_services_i,array(
			'label'	=> esc_html__('Number ','church-services').$church_services_i,
			'section'	=> 'church_services_about_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('church_services_record_box_title'.$church_services_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('church_services_record_box_title'.$church_services_i,array(
			'label'	=> esc_html__('Title ','church-services').$church_services_i,
			'section'	=> 'church_services_about_section',
			'type'		=> 'text'
		));

	}

	//footer
	$wp_customize->add_section('church_services_footer_section',array(
		'title'	=> __('Footer Text','church-services'),
		'description'	=> __('Add copyright text.','church-services'),
		'panel' => 'church_services_panel_id'
	));

	$wp_customize->add_setting('church_services_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('church_services_footer_text',array(
		'label'	=> __('Copyright Text','church-services'),
		'section'	=> 'church_services_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';


	$wp_customize->add_setting( 'church_services_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'church-services' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'church_services_site_title_text',
	) ) );

	$wp_customize->add_setting( 'church_services_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'church-services' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'church_services_site_tagline_text',
	) ) );


    $wp_customize->add_setting('church_services_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'church_services_sanitize_number_absint'
	));
	 $wp_customize->add_control('church_services_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','church-services'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('church_services_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'church_services_sanitize_choices'
	));
   $wp_customize->add_control('church_services_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'church-services'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'church-services'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','church-services'),
            'Same Line' => __('Same Line','church-services')
        ),
	) );

	$wp_customize->add_setting('church_services_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'church_services_sanitize_number_absint'
	));
	$wp_customize->add_control('church_services_per_columns',array(
		'label'	=> __('Product Per Row','church-services'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('church_services_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'church_services_sanitize_number_absint'
	));
	$wp_customize->add_control('church_services_product_per_page',array(
		'label'	=> __('Product Per Page','church-services'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'church_services_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop page sidebar', 'church-services' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'church_services_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'church_services_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'church_services_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Church_Services_Toggle_Control( $wp_customize, 'church_services_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product page sidebar', 'church-services' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'church_services_single_product_sidebar',
	) ) );

}
add_action( 'customize_register', 'church_services_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Church Services 1.0
 * @see church_services_customize_register()
 *
 * @return void
 */
function church_services_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Church Services 1.0
 * @see church_services_customize_register()
 *
 * @return void
 */
function church_services_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'CHURCH_SERVICES_PRO_THEME_NAME' ) ) {
	define( 'CHURCH_SERVICES_PRO_THEME_NAME', esc_html__( 'Church Pro Theme', 'church-services' ));
}
if ( ! defined( 'CHURCH_SERVICES_PRO_THEME_URL' ) ) {
	define( 'CHURCH_SERVICES_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/church-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Church_Services_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Church_Services_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Church_Services_Customize_Section_Pro(
				$manager,
				'church_services_section_pro',
				array(
					'priority'   => 9,
					'title'    => CHURCH_SERVICES_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'church-services' ),
					'pro_url'  => esc_url( CHURCH_SERVICES_PRO_THEME_URL, 'church-services' ),
				)
			)
		);		
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'church-services-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'church-services-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Church_Services_Customize::get_instance();
