<?php
/**
 * @package WordPress
 * @subpackage 
 */
 
add_theme_support( 'post-thumbnails' );
require_once('include/wp_bootstrap_navwalker.php');
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() { register_nav_menus( array( 'main_menu' => 'Main Menu', 'footer_menu' => 'Footer Menu', 'sitemap' => 'Sitemap Menu', 'mobile_menu' => 'Main Mobile Menu', 'mobile_dropdown_menu' => 'Mobile Dropdown Menu') );}
function theme_options_register( $wp_customize ) {
	class Text_Editor_Custom_Control extends WP_Customize_Control { 
		public $type = 'textarea'; /** ** Render the content on the theme customizer page */ 
		public function render_content() { 
		?> 
		<label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php $settings = array( 'media_buttons' => false, 'quicktags' => true ); $this->filter_editor_setting_link(); wp_editor($this->value(), $this->id, $settings ); ?> 
		</label>
		<?php do_action('admin_footer'); do_action('admin_print_footer_scripts'); } 
		private function filter_editor_setting_link() { 
			add_filter( 'the_editor', function( $output ) { 
				return preg_replace( '/<textarea/', '<textarea ' . $this->get_link(), $output, 1 ); 
			}); 
		} 
	} 
	function editor_customizer_script() {
		wp_enqueue_script( 'wp-editor-customizer', get_template_directory_uri() . '/js/customizer-panel.js', array( 'jquery' ), rand(), true ); 
	}
	add_action( 'customize_controls_enqueue_scripts', 'editor_customizer_script' ); 	 
	
	
	$wp_customize->add_panel( 'theme_options', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'textdomain' ),
		'description' => __( 'Theme Options Panel', 'theme_customizer' ),

    ));
	$wp_customize->add_section( 'theme_option_section_partner', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Partner Details', 'textdomain' ),
		'description' => '',
		'panel' => 'theme_options',
	));
	
	//Partner Name Options
	$wp_customize->add_setting( 'footer_partner_name' , array(
		'default' => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_partner_name_control', array(
		'label'      => __( 'Footer Partner Name', 'Theme Options' ),
		'section'    => 'theme_option_section_partner',
		'settings'   => 'footer_partner_name',
		'type'       => 'text'
	)));
	
	
	//Footer Partner URL
	$wp_customize->add_setting( 'footer_partner_url' , array(
		'default' => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_partner_url_control', array(
		'label'      => __('Footer Partner URL'),
		'section'    => 'theme_option_section_partner',
		'settings'   => 'footer_partner_url',
		'type'       => 'text'
	)));
	
	$wp_customize->add_section( 'theme_option_section_business', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Business Details', 'textdomain' ),
		'description' => '',
		'panel' => 'theme_options',
	));
	
	
	
	//Business Name
	$wp_customize->add_setting( 'business_name' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_name_control', array(
		'label'      => __('Business Name'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'business_name',
		'type'       => 'text'
	)));
	
	//Street Address
	$wp_customize->add_setting( 'street_address' , array(
		'default'   => 'Street Address',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'street_address_control', array(
		'label'      => __( 'Street Address'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'street_address',
		'type'       => 'text'
	)));
	
	//City
	$wp_customize->add_setting( 'address_city' , array(
		'default'   => 'City',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address_city_control', array(
		'label'      => __( 'Address - City'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'address_city',
		'type'       => 'text'
	)));
	
	//State
	$wp_customize->add_setting( 'address_state' , array(
		'default'   => 'State',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address_state_control', array(
		'label'      => __( 'Address - State'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'address_state',
		'type'       => 'text'
	)));
	
	//Zipcode
	$wp_customize->add_setting( 'address_zipcode' , array(
		'default'   => 'Zipcode',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address_zipcode_control', array(
		'label'      => __( 'Address - Zipcode'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'address_zipcode',
		'type'       => 'text'
	)));
	
	//Address Link Checkbox
	$wp_customize->add_setting( 'address_link_checkbox', array(
		'default'    => false,
		'transport'  => 'refresh',
	));
	$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, 'address_link_checkbox_control', array(
		'label'    => __( 'Include google maps link in the header/footer address' ),
		'section'  => 'theme_option_section_business',
		'settings' => 'address_link_checkbox',
		'type'     => 'checkbox'
	)));
	
	//Phone Number
	$wp_customize->add_setting( 'phone_number' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_number_control', array(
		'label'      => __( 'Phone Number'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'phone_number',
		'type'       => 'text'
	)));
	
	//Email
	$wp_customize->add_setting( 'email' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email_control', array(
		'label'      => __( 'Email'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'email',
		'type'       => 'text'
	)));
    
	
	//Logo Image
	$wp_customize->add_setting( 'logo_image' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_image_control', array(
		'label'      => __( 'Logo Image'),
		'description' => __('Width maximum 341px, Height should be 225px', 'Business'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'logo_image',
	)));
	
	
	$wp_customize->add_section( 'theme_option_section_social', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Social Networking Details', 'textdomain' ),
		'description' => '',
		'panel' => 'theme_options',
	));
	
	
	//Facebook
	$wp_customize->add_setting( 'facebook' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_control', array(
		'label'      => __( 'Facebook'),
		'section'    => 'theme_option_section_social',
		'settings'   => 'facebook',
		'type'       => 'text'
	)));
    
    //Instagram
	$wp_customize->add_setting( 'instagram' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_control', array(
		'label'      => __( 'Instagram'),
		'section'    => 'theme_option_section_social',
		'settings'   => 'instagram',
		'type'       => 'text'
	)));
	
	
	$wp_customize->add_section( 'theme_option_section_page_settings', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Page Settings', 'textdomain' ),
		'description' => '',
		'panel' => 'theme_options',
	));
	
	
	//Creating 404 page select field list
	$page_list = array(); $args = array('post_type' => 'page'); $themePages = get_posts($args); 
	foreach($themePages as $themePage) {
		$page_list[$themePage->post_title] = $themePage->post_title;
		$removeHome = array_search('Home',$page_list);
		unset($page_list[$removeHome]);
	}
	//404 Banner Image
	$wp_customize->add_setting( '404_banner_image' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, '404_banner_image_control', array(
		'label'      => __( '404 Banner Image'),
		'section'    => 'theme_option_section_page_settings',
		'settings'   => '404_banner_image',
		'type'       => 'select',
		'choices' => $page_list,
	)));
	
	$wp_customize->add_setting( 'google_ga_code' , array(
		'default'   => '',
		'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google_ga_code_control', array(
        'label'      => __( 'Google GA Code'),
        'section'    => 'theme_option_section_page_settings',
		'settings'   => 'google_ga_code',
        'type'       => 'textarea',
	)));
    
	 
	 
	 
	$wp_customize->add_panel( 'panel_id', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Color Options', 'textdomain' ),
		'description' => __( 'Color Options Panel', 'theme_customizer' ),

    ));
	$wp_customize->add_section( 'content_colors', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Content Colors', 'textdomain' ),
		'description' => '',
		'panel' => 'panel_id',
	));
	
	//Primary Color
	$wp_customize->add_setting( 'primary_color' , array(
		'default'   => '#000000',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color_control', array(
		'label'      => __( 'Primary Color', 'textdomain' ),
		'section'    => 'content_colors',
		'settings'   => 'primary_color',
	)));
	
	//Secondary Color
	$wp_customize->add_setting( 'secondary_color' , array(
		'default'   => '#000000',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color_control', array(
		'label'      => __( 'Secondary Color', 'textdomain' ),
		'section'    => 'content_colors',
		'settings'   => 'secondary_color',
	)));
	
	//Link Color
	$wp_customize->add_setting( 'link_color' , array(
		'default'   => '#000000',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_control', array(
		'label'      => __( 'Link Color', 'textdomain' ),
		'section'    => 'content_colors',
		'settings'   => 'link_color',
	)));
	
	//Link Hover Color
	$wp_customize->add_setting( 'link_hover_color' , array(
		'default'   => '#000000',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color_control', array(
		'label'      => __( 'Link Hover Color', 'textdomain' ),
		'section'    => 'content_colors',
		'settings'   => 'link_hover_color',
	)));
	
	
	//Navigation Colors
	$wp_customize->add_section( 'navigation_colors', array(
		'priority' => 15,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Navigation Colors', 'textdomain' ),
		'description' => '',
		'panel' => 'panel_id',
	));
	//Header Navigation Link Color
	$wp_customize->add_setting( 'header_navigation_link_color' , array(
		'default'   => '#000000',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_navigation_link_color_control', array(
		'label'      => __( 'Header Navigation Link Color', 'textdomain' ),
		'section'    => 'navigation_colors',
		'settings'   => 'header_navigation_link_color',
	)));
	//Header Navigation Link Hover Color
	$wp_customize->add_setting( 'header_navigation_link_hover_color' , array(
		'default'   => '#000000',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_navigation_link_hover_color_control', array(
		'label'      => __( 'Header Navigation Link Hover Color', 'textdomain' ),
		'section'    => 'navigation_colors',
		'settings'   => 'header_navigation_link_hover_color',
	)));
	
	//Footer Navigation Link Color
	$wp_customize->add_setting( 'footer_navigation_link_color' , array(
		'default'   => '#000000',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_navigation_link_color_control', array(
		'label'      => __( 'Footer Navigation Link Color', 'textdomain' ),
		'section'    => 'navigation_colors',
		'settings'   => 'footer_navigation_link_color',
	)));
	//Footer Navigation Link Hover Color
	$wp_customize->add_setting( 'footer_navigation_link_hover_color' , array(
		'default'   => '#000000',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_navigation_link_hover_color_control', array(
		'label'      => __( 'Footer Navigation Link Hover Color', 'textdomain' ),
		'section'    => 'navigation_colors',
		'settings'   => 'footer_navigation_link_hover_color',
	)));
}
add_action( 'customize_register', 'theme_options_register' );


require_once get_template_directory() . '/include/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'na_register_required_plugins' );
function na_register_required_plugins() {
	$plugins = array(
		array( 'name' => 'Post Types Order', 'slug' => 'post-types-order', 'source' => get_template_directory() . '/packages/plugins/post-types-order.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Gravity Forms', 'slug' => 'gravityforms', 'source' => get_template_directory() . '/packages/plugins/gravityforms.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'SEO Ultimate', 'slug' => 'seo-ultimate', 'source' => get_template_directory() . '/packages/plugins/seo-ultimate.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Disable Comments', 'slug' => 'disable-comments', 'source' => get_template_directory() . '/packages/plugins/disable-comments.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'All In One WP Migration', 'slug' => 'all-in-one-wp-migration', 'source' => get_template_directory() . '/packages/plugins/all-in-one-wp-migration.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'All In One WP Migration Unlimited Extension', 'slug' => 'all-in-one-wp-migration-unlimited-extension', 'source' => get_template_directory() . '/packages/plugins/all-in-one-wp-migration-unlimited-extension.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Advanced Custom Fields PRO', 'slug' => 'advanced-custom-fields-pro', 'source' => get_template_directory() . '/packages/plugins/advanced-custom-fields-pro.zip', 'required' => true,  'version' => '',	'force_activation'   => true,'force_deactivation' => false,'external_url' => '','is_callable' => '',),
		array( 'name' => 'ACF - Repeater Field Tabs', 'slug' => 'acf-repeater-tabs', 'source' => get_template_directory() . '/packages/plugins/acf-repeater-tabs.zip', 'required' => true, 'version' => '1.5.6', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Advanced Custom Fields: Gravityforms Add-on', 'slug' => 'acf-gravityforms-add-on', 'source' => get_template_directory() . '/packages/plugins/acf-gravityforms-add-on.zip', 'required' => true, 'version' => '1.2.1', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
	);
	$config = array( 'id' => 'na', 'default_path' => '', 'menu' => 'tgmpa-install-plugins', 'parent_slug' => 'themes.php', 'capability' => 'edit_theme_options', 'has_notices' => true, 'dismissable' => true, 'dismiss_msg' => '', 'is_automatic' => true, 'message' => '', );
	tgmpa( $plugins, $config );
}

function twentytwelve_widgets_init() {
    register_sidebar( array(
        'name' => 'The Blog',
        'id' => 'sidebar-the-blog',
        'before_widget' => '<div class="widget">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
 
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

add_filter('gform_init_scripts_footer', 'init_scripts');
function init_scripts() {
    return true;
}

function attachmentpages_noindex() {
if(is_attachment()) {
echo '<meta name="robots" content="noindex" />';
}
}
add_action('wp_head', 'attachmentpages_noindex');

function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a class="read-more btn" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//Add options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Options');
}

//String to SEO Freindly URL
setlocale(LC_ALL, 'en_US.UTF8');
function seo_friendly_url($str, $replace=array(), $delimiter='-') {
	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("~[^a-zA-Z0-9/_|+ -]~", '', $clean);
	$clean = preg_replace("~[/_|+ -]+~", $delimiter, $clean);
	$clean = strtolower(trim($clean, '-'));
	return $clean;
}


function getSmallTextExcerpt($text){
	global $post;
	if($text != ''){
		$text = strip_shortcodes($text);
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 15; // 15 words
		$excerpt_more = '...';
		$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
	}
	return $text;
}

function getLargeTextExcerpt($text){
	global $post;
	if($text != ''){
		$text = strip_shortcodes($text);
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 35; // 35 words
		$excerpt_more = '...';
		$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
	}
	return $text;
}

function getTextExcerpt($text){
	global $post;
	if($text != ''){
		$text = strip_shortcodes($text);
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 35; // 35 words
		$excerpt_more = '... <span class="read-more-text">Read More</span>';
		$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
	}
	return $text;
}

function pagination_bar() {
    global $the_query;
 
    $total_pages = $the_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
