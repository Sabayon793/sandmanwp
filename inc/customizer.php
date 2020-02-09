<?php
/**
 * sandmanWP Theme Customizer
 *
 * @package sandmanWP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themeslug_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function sandmanwp_customize_register( $wp_customize ) {

	    //Style Preset
		$wp_customize->add_section(
			'typography',
			array(
				'title' => __( 'Preset Styles', 'sandmanWP' ),
				//'description' => __( 'This is a section for the typography', 'sandmanWP' ),
				'priority' => 20,
			)
		);

 //Theme Option
 $wp_customize->add_setting( 'theme_option_setting', array(
	'default'   => 'default',
	'type'       => 'theme_mod',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'theme_option_setting', array(
	'label' => __( 'Theme Option', 'sandmanwp' ),
	'section'    => 'typography',
	'settings'   => 'theme_option_setting',
	'type'    => 'select',
	'choices' => array(
		'default' => 'Default',
		'cerulean' => 'Cerulean',
		'cosmo' => 'Cosmo',
		'cyborg' => 'Cyborg',
		'darkly' => 'Darkly',
		'flatly' => 'Flatly',
		'journal' => 'Journal',
		'litera' => 'Litera',
		'lumen' => 'Lumen',
		'lux' => 'Lux',
		'materia' => 'Materia',
		'minty' => 'Minty',
		'pulse' => 'Pulse',
		'sandstone' => 'Sandstone',
		'simplex' => 'Simplex',
		'sketchy' => 'Sketchy',
		'slate' => 'Slate',
		'solar' => 'Solar',
		'spacelab' => 'Spacelab',
		'superhero' => 'Superhero',
		'united' => 'United',
		'yeti' => 'Yeti',
	)
) ) );

$wp_customize->add_setting( 'preset_style_setting', array(
	'default'   => 'default',
	'type'       => 'theme_mod',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'preset_style_setting', array(
	'label' => __( 'Typography', 'sandmanwp' ),
	'section'    => 'typography',
	'settings'   => 'preset_style_setting',
	'type'    => 'select',
	'choices' => array(
		'default' => 'Default',
		'arbutusslab-opensans' => 'Arbutus Slab / Opensans',
		'montserrat-merriweather' => 'Montserrat / Merriweather',
		'montserrat-opensans' => 'Montserrat / Opensans',
		'oswald-muli' => 'Oswald / Muli',
		'poppins-lora' => 'Poppins / Lora',
		'poppins-poppins' => 'Poppins / Poppins',
		'roboto-roboto' => 'Roboto / Roboto',
		'robotoslab-roboto' => 'Roboto Slab / Roboto',
	)
) ) );


  /*Banner*/
  $wp_customize->add_section(
	'header_image',
	array(
		'title' => __( 'Header Banner', 'sandmanwp' ),
		'priority' => 30,
	)
);


$wp_customize->add_control(
	'header_img',
	array(
		'label' => __( 'Header Image', 'sandmanwp' ),
		'section' => 'header_images',
		'type' => 'text',
	)
);

$wp_customize->add_setting(
	'header_bg_color_setting',
	array(
		'default'     => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'header_bg_color',
		array(
			'label'      => __( 'Header Banner Background Color', 'sandmanwp' ),
			'section'    => 'header_image',
			'settings'   => 'header_bg_color_setting',
		) )
);

$wp_customize->add_setting( 'header_banner_title_setting', array(
	'default' => __( 'WP Bootstrap Framework', 'sandmanwp' ),
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
	'label' => __( 'Banner Title', 'sandmanwp' ),
	'section'    => 'header_image',
	'settings'   => 'header_banner_title_setting',
	'type' => 'text'
) ) );

$wp_customize->add_setting( 'header_banner_tagline_setting', array(
	'default' => __( 'To customize the contents of this header banner and other elements of your site go to Dashboard - Appearance - Customize','sandmanwp' ),
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_tagline_setting', array(
	'label' => __( 'Banner Tagline', 'sandmanwp' ),
	'section'    => 'header_image',
	'settings'   => 'header_banner_tagline_setting',
	'type' => 'text'
) ) );
$wp_customize->add_setting( 'header_banner_visibility', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'themeslug_sanitize_checkbox',
) );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_visibility', array(
	'settings' => 'header_banner_visibility',
	'label'    => __('Remove Header Banner', 'sandmanwp'),
	'section'    => 'header_image',
	'type'     => 'checkbox',
) ) );


//Site Name Text Color
$wp_customize->add_section(
	'site_name_text_color',
	array(
		'title' => __( 'Other Customizations', 'sandmanwp' ),
		//'description' => __( 'This is a section for the header banner Image.', 'sandmanwp' ),
		'priority' => 40,
	)
);
$wp_customize->add_section(
	'colors',
	array(
		'title' => __( 'Background Color', 'sandmanwp' ),
		//'description' => __( 'This is a section for the header banner Image.', 'sandmanwp' ),
		'priority' => 50,
		'panel' => 'styling_option_panel',
	)
);
$wp_customize->add_section(
	'background_image',
	array(
		'title' => __( 'Background Image', 'sandmanwp' ),
		//'description' => __( 'This is a section for the header banner Image.', 'sandmanwp' ),
		'priority' => 60,
		'panel' => 'styling_option_panel',
	)
);

// Bootstrap and Fontawesome Option
$wp_customize->add_setting( 'cdn_assets_setting', array(
	'default' => __( 'no','sandmanwp' ),
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
$wp_customize->add_control( 
	'cdn_assets',
	array(
		'label' => __( 'Use CDN for Assets', 'sandmanwp' ),
		'description' => __( 'All Bootstrap Assets and FontAwesome will be loaded in CDN.', 'sandmanwp' ),
		'section' => 'site_name_text_color',
		'settings' => 'cdn_assets_setting',
		'type'    => 'select',
		'choices' => array(
			'yes' => __( 'Yes' ),
			'no' => __( 'No' ),
		)
	)
);


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'background_image'  )->section = 'site_name_text_color';
    $wp_customize->get_control( 'background_color'  )->section = 'site_name_text_color';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'sandmanwp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'sandmanwp_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'sandmanwp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sandmanwp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sandmanwp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sandmanwp_customize_preview_js() {
	wp_enqueue_script( 'sandmanwp-customizer', get_template_directory_uri() . '/dist/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sandmanwp_customize_preview_js' );
