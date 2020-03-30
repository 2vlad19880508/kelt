<?php
/**
 * Storefront Customizer Class
 *
 * @author   WooThemes
 * @package  storefront
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storefront_Customizer' ) ) :

	/**
	 * The Storefront Customizer class
	 */
	class Storefront_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'customize_register',              array( $this, 'customize_register' ), 10 );
			add_filter( 'body_class',                      array( $this, 'layout_class' ) );
			add_action( 'wp_enqueue_scripts',              array( $this, 'add_customizer_css' ), 130 );
			add_action( 'after_setup_theme',               array( $this, 'custom_header_setup' ) );
			add_action( 'customize_controls_print_styles', array( $this, 'customizer_custom_control_css' ) );
			add_action( 'customize_register',              array( $this, 'edit_default_customizer_settings' ), 99 );
			add_action( 'init',                            array( $this, 'default_theme_mod_values' ), 10 );
		}

		/**
		 * Returns an array of the desired default Storefront Options
		 *
		 * @return array
		 */
		public static function get_storefront_default_setting_values() {
			return apply_filters( 'storefront_setting_default_values', $args = array(
				'storefront_heading_color'               => '#333333',
				'storefront_text_color'                  => '#6d6d6d',
				'storefront_accent_color'                => '#96588a',
				'storefront_hero_heading_color'          => '#000000',
				'storefront_hero_text_color'             => '#000000',
				'storefront_header_background_color'     => '#ffffff',
				'storefront_header_text_color'           => '#404040',
				'storefront_header_link_color'           => '#333333',
				'storefront_footer_background_color'     => '#f0f0f0',
				'storefront_footer_heading_color'        => '#333333',
				'storefront_footer_text_color'           => '#6d6d6d',
				'storefront_footer_link_color'           => '#333333',
				'storefront_button_background_color'     => '#eeeeee',
				'storefront_button_text_color'           => '#333333',
				'storefront_button_alt_background_color' => '#333333',
				'storefront_button_alt_text_color'       => '#ffffff',
				'storefront_layout'                      => 'right',
				'storefront_sticky_add_to_cart'          => true,
				'storefront_product_pagination'          => true,
				'background_color'                       => 'ffffff',
			) );
		}

		/**
		 * Adds a value to each Storefront setting if one isn't already present.
		 *
		 * @uses get_storefront_default_setting_values()
		 */
		public function default_theme_mod_values() {
			foreach ( self::get_storefront_default_setting_values() as $mod => $val ) {
				add_filter( 'theme_mod_' . $mod, array( $this, 'get_theme_mod_value' ), 10 );
			}
		}

		/**
		 * Get theme mod value.
		 *
		 * @param string $value
		 * @return string
		 */
		public function get_theme_mod_value( $value ) {
			$key = substr( current_filter(), 10 );

			$set_theme_mods = get_theme_mods();

			if ( isset( $set_theme_mods[ $key ] ) ) {
				return $value;
			}

			$values = $this->get_storefront_default_setting_values();

			return isset( $values[ $key ] ) ? $values[ $key ] : $value;
		}

		/**
		 * Set Customizer setting defaults.
		 * These defaults need to be applied separately as child themes can filter storefront_setting_default_values
		 *
		 * @param  array $wp_customize the Customizer object.
		 * @uses   get_storefront_default_setting_values()
		 */
		public function edit_default_customizer_settings( $wp_customize ) {
			foreach ( self::get_storefront_default_setting_values() as $mod => $val ) {
				$wp_customize->get_setting( $mod )->default = $val;
			}
		}

		/**
		 * Setup the WordPress core custom header feature.
		 *
		 * @uses storefront_header_style()
		 * @uses storefront_admin_header_style()
		 * @uses storefront_admin_header_image()
		 */
		public function custom_header_setup() {
			add_theme_support( 'custom-header', apply_filters( 'storefront_custom_header_args', array(
				'default-image' => '',
				'header-text'   => false,
				'width'         => 1950,
				'height'        => 500,
				'flex-width'    => true,
				'flex-height'   => true,
			) ) );
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer along with several other settings.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @since  1.0.0
		 */
		public function customize_register( $wp_customize ) {

			// Move background color setting alongside background image.
			$wp_customize->get_control( 'background_color' )->section   = 'background_image';
			$wp_customize->get_control( 'background_color' )->priority  = 20;

			// Change background image section title & priority.
			$wp_customize->get_section( 'background_image' )->title     = __( 'Background', 'storefront' );
			$wp_customize->get_section( 'background_image' )->priority  = 30;

			// Change header image section title & priority.
			$wp_customize->get_section( 'header_image' )->title         = __( 'Header', 'storefront' );
			$wp_customize->get_section( 'header_image' )->priority      = 25;

			// Selective refresh.
			if ( function_exists( 'add_partial' ) ) {
				$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
				$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

				$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
					'selector'        => '.site-branding',
					'render_callback' => array( $this, 'get_site_logo' ),
				) );

				$wp_customize->selective_refresh->add_partial( 'blogname', array(
					'selector'        => '.site-title.beta a',
					'render_callback' => array( $this, 'get_site_name' ),
				) );

				$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'get_site_description' ),
				) );
			}

			/**
			 * Custom controls
			 */
			require_once dirname( __FILE__ ) . '/class-storefront-customizer-control-radio-image.php';
			require_once dirname( __FILE__ ) . '/class-storefront-customizer-control-arbitrary.php';

			if ( apply_filters( 'storefront_customizer_more', true ) ) {
				require_once dirname( __FILE__ ) . '/class-storefront-customizer-control-more.php';
			}

			/**
			 * Add the typography section
			 */
			$wp_customize->add_section( 'storefront_typography' , array(
				'title'      			=> __( 'Typography', 'storefront' ),
				'priority'   			=> 45,
			) );

			/**
			 * Heading color
			 */
			$wp_customize->add_setting( 'storefront_heading_color', array(
				'default'           	=> apply_filters( 'storefront_default_heading_color', '#484c51' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_heading_color', array(
				'label'	   				=> __( 'Heading color', 'storefront' ),
				'section'  				=> 'storefront_typography',
				'settings' 				=> 'storefront_heading_color',
				'priority' 				=> 20,
			) ) );

			/**
			 * Text Color
			 */
			$wp_customize->add_setting( 'storefront_text_color', array(
				'default'           	=> apply_filters( 'storefront_default_text_color', '#43454b' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_text_color', array(
				'label'					=> __( 'Text color', 'storefront' ),
				'section'				=> 'storefront_typography',
				'settings'				=> 'storefront_text_color',
				'priority'				=> 30,
			) ) );

			/**
			 * Accent Color
			 */
			$wp_customize->add_setting( 'storefront_accent_color', array(
				'default'           	=> apply_filters( 'storefront_default_accent_color', '#96588a' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_accent_color', array(
				'label'	   				=> __( 'Link / accent color', 'storefront' ),
				'section'  				=> 'storefront_typography',
				'settings' 				=> 'storefront_accent_color',
				'priority' 				=> 40,
			) ) );

			/**
			 * Hero Heading Color
			 */
			$wp_customize->add_setting( 'storefront_hero_heading_color', array(
				'default'           	=> apply_filters( 'storefront_default_hero_heading_color', '#000000' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_hero_heading_color', array(
				'label'	   				=> __( 'Hero heading color', 'storefront' ),
				'section'  				=> 'storefront_typography',
				'settings' 				=> 'storefront_hero_heading_color',
				'priority' 				=> 50,
				'active_callback'       => array( $this, 'is_homepage_template' ),
			) ) );

			/**
			 * Hero Text Color
			 */
			$wp_customize->add_setting( 'storefront_hero_text_color', array(
				'default'           	=> apply_filters( 'storefront_default_hero_text_color', '#000000' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_hero_text_color', array(
				'label'	   				=> __( 'Hero text color', 'storefront' ),
				'section'  				=> 'storefront_typography',
				'settings' 				=> 'storefront_hero_text_color',
				'priority' 				=> 60,
				'active_callback'       => array( $this, 'is_homepage_template' ),
			) ) );

			$wp_customize->add_control( new Arbitrary_Storefront_Control( $wp_customize, 'storefront_header_image_heading', array(
				'section'  				=> 'header_image',
				'type' 					=> 'heading',
				'label'					=> __( 'Header background image', 'storefront' ),
				'priority' 				=> 6,
			) ) );

			/**
			 * Header Background
			 */
			$wp_customize->add_setting( 'storefront_header_background_color', array(
				'default'           	=> apply_filters( 'storefront_default_header_background_color', '#2c2d33' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_header_background_color', array(
				'label'	   				=> __( 'Background color', 'storefront' ),
				'section'  				=> 'header_image',
				'settings' 				=> 'storefront_header_background_color',
				'priority' 				=> 15,
			) ) );

			/**
			 * Header text color
			 */
			$wp_customize->add_setting( 'storefront_header_text_color', array(
				'default'           	=> apply_filters( 'storefront_default_header_text_color', '#9aa0a7' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_header_text_color', array(
				'label'	   				=> __( 'Text color', 'storefront' ),
				'section'  				=> 'header_image',
				'settings' 				=> 'storefront_header_text_color',
				'priority' 				=> 20,
			) ) );

			/**
			 * Header link color
			 */
			$wp_customize->add_setting( 'storefront_header_link_color', array(
				'default'           	=> apply_filters( 'storefront_default_header_link_color', '#d5d9db' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_header_link_color', array(
				'label'	   				=> __( 'Link color', 'storefront' ),
				'section'  				=> 'header_image',
				'settings' 				=> 'storefront_header_link_color',
				'priority' 				=> 30,
			) ) );

			/**
			 * Footer section
			 */
			$wp_customize->add_section( 'storefront_footer' , array(
				'title'      			=> __( 'Footer', 'storefront' ),
				'priority'   			=> 28,
				'description' 			=> __( 'Customize the look & feel of your website footer.', 'storefront' ),
			) );

			/**
			 * Footer Background
			 */
			$wp_customize->add_setting( 'storefront_footer_background_color', array(
				'default'           	=> apply_filters( 'storefront_default_footer_background_color', '#f0f0f0' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_footer_background_color', array(
				'label'	   				=> __( 'Background color', 'storefront' ),
				'section'  				=> 'storefront_footer',
				'settings' 				=> 'storefront_footer_background_color',
				'priority'				=> 10,
			) ) );

			/**
			 * Footer heading color
			 */
			$wp_customize->add_setting( 'storefront_footer_heading_color', array(
				'default'           	=> apply_filters( 'storefront_default_footer_heading_color', '#494c50' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_footer_heading_color', array(
				'label'	   				=> __( 'Heading color', 'storefront' ),
				'section'  				=> 'storefront_footer',
				'settings' 				=> 'storefront_footer_heading_color',
				'priority'				=> 20,
			) ) );

			/**
			 * Footer text color
			 */
			$wp_customize->add_setting( 'storefront_footer_text_color', array(
				'default'           	=> apply_filters( 'storefront_default_footer_text_color', '#61656b' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_footer_text_color', array(
				'label'	   				=> __( 'Text color', 'storefront' ),
				'section'  				=> 'storefront_footer',
				'settings' 				=> 'storefront_footer_text_color',
				'priority'				=> 30,
			) ) );

			/**
			 * Footer link color
			 */
			$wp_customize->add_setting( 'storefront_footer_link_color', array(
				'default'           	=> apply_filters( 'storefront_default_footer_link_color', '#2c2d33' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_footer_link_color', array(
				'label'	   				=> __( 'Link color', 'storefront' ),
				'section'  				=> 'storefront_footer',
				'settings' 				=> 'storefront_footer_link_color',
				'priority'				=> 40,
			) ) );

			/**
			 * Buttons section
			 */
			$wp_customize->add_section( 'storefront_buttons' , array(
				'title'      			=> __( 'Buttons', 'storefront' ),
				'priority'   			=> 45,
				'description' 			=> __( 'Customize the look & feel of your website buttons.', 'storefront' ),
			) );

			/**
			 * Button background color
			 */
			$wp_customize->add_setting( 'storefront_button_background_color', array(
				'default'           	=> apply_filters( 'storefront_default_button_background_color', '#96588a' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_button_background_color', array(
				'label'	   				=> __( 'Background color', 'storefront' ),
				'section'  				=> 'storefront_buttons',
				'settings' 				=> 'storefront_button_background_color',
				'priority' 				=> 10,
			) ) );

			/**
			 * Button text color
			 */
			$wp_customize->add_setting( 'storefront_button_text_color', array(
				'default'           	=> apply_filters( 'storefront_default_button_text_color', '#ffffff' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_button_text_color', array(
				'label'	   				=> __( 'Text color', 'storefront' ),
				'section'  				=> 'storefront_buttons',
				'settings' 				=> 'storefront_button_text_color',
				'priority' 				=> 20,
			) ) );

			/**
			 * Button alt background color
			 */
			$wp_customize->add_setting( 'storefront_button_alt_background_color', array(
				'default'           	=> apply_filters( 'storefront_default_button_alt_background_color', '#2c2d33' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_button_alt_background_color', array(
				'label'	   				=> __( 'Alternate button background color', 'storefront' ),
				'section'  				=> 'storefront_buttons',
				'settings' 				=> 'storefront_button_alt_background_color',
				'priority' 				=> 30,
			) ) );

			/**
			 * Button alt text color
			 */
			$wp_customize->add_setting( 'storefront_button_alt_text_color', array(
				'default'           	=> apply_filters( 'storefront_default_button_alt_text_color', '#ffffff' ),
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_button_alt_text_color', array(
				'label'	   				=> __( 'Alternate button text color', 'storefront' ),
				'section'  				=> 'storefront_buttons',
				'settings' 				=> 'storefront_button_alt_text_color',
				'priority' 				=> 40,
			) ) );

			/**
			 * Layout
			 */
			$wp_customize->add_section( 'storefront_layout' , array(
				'title'      			=> __( 'Layout', 'storefront' ),
				'priority'   			=> 50,
			) );

			$wp_customize->add_setting( 'storefront_layout', array(
				'default'    			=> apply_filters( 'storefront_default_layout', $layout = is_rtl() ? 'left' : 'right' ),
				'sanitize_callback' 	=> 'storefront_sanitize_choices',
			) );

			$wp_customize->add_control( new Storefront_Custom_Radio_Image_Control( $wp_customize, 'storefront_layout', array(
				'settings'				=> 'storefront_layout',
				'section'				=> 'storefront_layout',
				'label'					=> __( 'General Layout', 'storefront' ),
				'priority'				=> 1,
				'choices'				=> array(
											'right' => get_template_directory_uri() . '/assets/images/customizer/controls/2cr.png',
											'left'  => get_template_directory_uri() . '/assets/images/customizer/controls/2cl.png',
				),
			) ) );

			/**
			 * Product Page
			 */
			$wp_customize->add_section( 'storefront_single_product_page' , array(
				'title'                 => __( 'Product Page', 'storefront' ),
				'priority'              => 60,
			) );

			$wp_customize->add_setting( 'storefront_product_pagination', array(
				'default'               => apply_filters( 'storefront_default_product_pagination', true ),
				'sanitize_callback'     => 'wp_validate_boolean',
			) );

			$wp_customize->add_setting( 'storefront_sticky_add_to_cart', array(
				'default'               => apply_filters( 'storefront_default_sticky_add_to_cart', true ),
				'sanitize_callback'     => 'wp_validate_boolean',
			) );

			$wp_customize->add_control( 'storefront_sticky_add_to_cart', array(
				'type'                  => 'checkbox',
				'section'               => 'storefront_single_product_page',
				'label'                 => __( 'Sticky Add-To-Cart', 'storefront' ),
				'description'           => __( 'A small content bar at the top of the browser window which includes relevant product information and an add-to-cart button. It slides into view once the standard add-to-cart button has scrolled out of view.', 'storefront' ),
				'priority' 				=> 10,
			) );

			$wp_customize->add_control( 'storefront_product_pagination', array(
				'type'                  => 'checkbox',
				'section'               => 'storefront_single_product_page',
				'label'                 => __( 'Product Pagination', 'storefront' ),
				'description'           => __( 'Displays next and previous links on product pages. A product thumbnail is displayed with the title revealed on hover.', 'storefront' ),
				'priority' 				=> 20,
			) );

			/**
			 * More
			 */
			if ( apply_filters( 'storefront_customizer_more', true ) ) {
				$wp_customize->add_section( 'storefront_more' , array(
					'title'      		=> __( 'More', 'storefront' ),
					'priority'   		=> 999,
				) );

				$wp_customize->add_setting( 'storefront_more', array(
					'default'    		=> null,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( new More_Storefront_Control( $wp_customize, 'storefront_more', array(
					'label'    			=> __( 'Looking for more options?', 'storefront' ),
					'section'  			=> 'storefront_more',
					'settings' 			=> 'storefront_more',
					'priority' 			=> 1,
				) ) );
			}
		}

		/**
		 * Get all of the Storefront theme mods.
		 *
		 * @return array $storefront_theme_mods The Storefront Theme Mods.
		 */
		public function get_storefront_theme_mods() {
			$storefront_theme_mods = array(
				'background_color'            => storefront_get_content_background_color(),
				'accent_color'                => get_theme_mod( 'storefront_accent_color' ),
				'hero_heading_color'          => get_theme_mod( 'storefront_hero_heading_color' ),
				'hero_text_color'             => get_theme_mod( 'storefront_hero_text_color' ),
				'header_background_color'     => get_theme_mod( 'storefront_header_background_color' ),
				'header_link_color'           => get_theme_mod( 'storefront_header_link_color' ),
				'header_text_color'           => get_theme_mod( 'storefront_header_text_color' ),
				'footer_background_color'     => get_theme_mod( 'storefront_footer_background_color' ),
				'footer_link_color'           => get_theme_mod( 'storefront_footer_link_color' ),
				'footer_heading_color'        => get_theme_mod( 'storefront_footer_heading_color' ),
				'footer_text_color'           => get_theme_mod( 'storefront_footer_text_color' ),
				'text_color'                  => get_theme_mod( 'storefront_text_color' ),
				'heading_color'               => get_theme_mod( 'storefront_heading_color' ),
				'button_background_color'     => get_theme_mod( 'storefront_button_background_color' ),
				'button_text_color'           => get_theme_mod( 'storefront_button_text_color' ),
				'button_alt_background_color' => get_theme_mod( 'storefront_button_alt_background_color' ),
				'button_alt_text_color'       => get_theme_mod( 'storefront_button_alt_text_color' ),
			);

			return apply_filters( 'storefront_theme_mods', $storefront_theme_mods );
		}

		/**
		 * Get Customizer css.
		 *
		 * @see get_storefront_theme_mods()
		 * @return array $styles the css
		 */
		public function get_css() {
			$storefront_theme_mods = $this->get_storefront_theme_mods();
			$brighten_factor       = apply_filters( 'storefront_brighten_factor', 25 );
			$darken_factor         = apply_filters( 'storefront_darken_factor', -25 );

			

			if ( ! class_exists( 'Storefront_Product_Pagination' ) ) {
				$styles .= '.storefront-product-pagination a {
					color: ' . $storefront_theme_mods['text_color'] . ';
					background-color: ' . $storefront_theme_mods['background_color'] . ';
				}';
			}

			
		}

		/**
		 * Get Customizer css associated with WooCommerce.
		 *
		 * @see get_storefront_theme_mods()
		 * @return array $woocommerce_styles the WooCommerce css
		 */
		public function get_woocommerce_css() {
			$storefront_theme_mods = $this->get_storefront_theme_mods();
			$brighten_factor       = apply_filters( 'storefront_brighten_factor', 25 );
			$darken_factor         = apply_filters( 'storefront_darken_factor', -25 );

		}

		/**
		 * Assign Storefront styles to individual theme mods.
		 *
		 * @deprecated 2.3.1
		 * @return void
		 */
		public function set_storefront_style_theme_mods() {
			if ( function_exists( 'wc_deprecated_function' ) ) {
				wc_deprecated_function( __FUNCTION__, '2.3.1' );
			} else {
				_deprecated_function( __FUNCTION__, '2.3.1' );
			}
		}

		/**
		 * Add CSS in <head> for styles handled by the theme customizer
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function add_customizer_css() {
			wp_add_inline_style( 'storefront-style', $this->get_css() );
			wp_add_inline_style( 'storefront-woocommerce-style', $this->get_woocommerce_css() );
		}

		/**
		 * Layout classes
		 * Adds 'right-sidebar' and 'left-sidebar' classes to the body tag
		 *
		 * @param  array $classes current body classes.
		 * @return string[]          modified body classes
		 * @since  1.0.0
		 */
		public function layout_class( $classes ) {
			$left_or_right = get_theme_mod( 'storefront_layout' );

			$classes[] = $left_or_right . '-sidebar';

			return $classes;
		}

		/**
		 * Add CSS for custom controls
		 *
		 * This function incorporates CSS from the Kirki Customizer Framework
		 *
		 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
		 * is licensed under the terms of the GNU GPL, Version 2 (or later)
		 *
		 * @link https://github.com/reduxframework/kirki/
		 * @since  1.5.0
		 */
		public function customizer_custom_control_css() {
			?>

			<?php
		}

		/**
		 * Get site logo.
		 *
		 * @since 2.1.5
		 * @return string
		 */
		public function get_site_logo() {
			return storefront_site_title_or_logo( false );
		}

		/**
		 * Get site name.
		 *
		 * @since 2.1.5
		 * @return string
		 */
		public function get_site_name() {
			return get_bloginfo( 'name', 'display' );
		}

		/**
		 * Get site description.
		 *
		 * @since 2.1.5
		 * @return string
		 */
		public function get_site_description() {
			return get_bloginfo( 'description', 'display' );
		}

		/**
		 * Check if current page is using the Homepage template.
		 *
		 * @since 2.3.0
		 * @return bool
		 */
		public function is_homepage_template() {
			$template = get_post_meta( get_the_ID(), '_wp_page_template', true );

			if ( ! $template || 'template-homepage.php' !== $template || ! has_post_thumbnail( get_the_ID() ) ) {
				return false;
			}

			return true;
		}
	}

endif;

return new Storefront_Customizer();