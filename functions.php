<?php
/* //CSS Imports
function iambenzo_css(){
  wp_register_style('bs-css', get_bloginfo('template_url') . '/css/bootstrap.min.css');
  wp_register_style('nzo-css', get_bloginfo('template_url') . '/css/nzo-style.css');
  wp_register_style('txt-css', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic|Ubuntu:500,700');
  wp_enqueue_style('bs-css', get_bloginfo('template_url') . '/css/bootstrap.min.css');
  wp_enqueue_style('nzo-css', get_bloginfo('template_url') . '/css/nzo-style.css');
  wp_enqueue_style('txt-css', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic|Ubuntu:500,700');
}
add_action( 'wp_enqueue_scripts', 'iambenzo_css' ); */
//JS Imports for the footer
function iambenzo_enqueue() {
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array( 'jquery' ) );
}
function iambenzo_custom_js(){ ?>
  <script>
      $('.carousel').carousel({
          interval: 5000 //changes the speed
      })
  </script>
<?php }
add_action('wp_footer', 'iambenzo_enqueue');
add_action('wp_footer', 'iambenzo_custom_js');

//Custom image size for slider
add_theme_support( 'post-thumbnails' );set_post_thumbnail_size( 300, 150, array( 'center', 'center') );
add_image_size( 'home-slider', 850, 400, true );

//Menus functionality
function register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Register Sidebar
function iambenzo_sidebar() {

	$args = array(
		'id'            => 'basebar',
		'name'          => 'Basebar',
		'before_title'  => '<hr> <h2 class="intro-text text-center">',
		'after_title'   => '</h2> <hr>',
		'before_widget' => '<div class="widget col-lg-6 text-center">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'iambenzo_sidebar' );

//Content Filters
function img_responsive($content){
    return str_replace('<img class="','<img class="img-responsive ',$content);
}
add_filter('the_content','img_responsive');

// Add Shortcodes
function iambenzo_box_shortcode( $atts , $content = null ) {
$output = '</div> </div> </div> <div class="row"> <div class="box"> <div class="col-lg-12"> ' . $content;
return $output;
}
function iambenzo_box_dark_shortcode( $atts , $content = null ) {
$output = '</div> </div> </div> <div class="row"> <div class="box-dark"> <div class="col-lg-12"> ' . $content;
return $output;
}
function iambenzo_box_clear_shortcode( $atts , $content = null ) {
$output = '</div> </div> </div> <div class="row"> <div class="box-clear"> <div class="col-lg-12"> ' . $content;
return $output;
}
add_shortcode( 'box', 'iambenzo_box_shortcode' );
add_shortcode( 'box-dark', 'iambenzo_box_dark_shortcode' );
add_shortcode( 'box-clear', 'iambenzo_box_clear_shortcode' );

//Theme Settings Menu
add_action( 'admin_menu', 'iambenzo_add_admin_menu' );
add_action( 'admin_init', 'iambenzo_settings_init' );


function iambenzo_add_admin_menu(  ) {

	add_submenu_page( 'themes.php', 'Theme Settings', 'Theme Settings', 'manage_options', 'iambenzo', 'iambenzo_options_page' );

}


function iambenzo_settings_init(  ) {

	register_setting( 'pluginPage', 'iambenzo_settings' );

	add_settings_section(
		'iambenzo_pluginPage_section',
		__( 'Home Page Content', 'wordpress' ),
		'iambenzo_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'iambenzo_text_field_0',
		__( 'Heading Part 1', 'wordpress' ),
		'iambenzo_text_field_0_render',
		'pluginPage',
		'iambenzo_pluginPage_section'
	);

	add_settings_field(
		'iambenzo_text_field_1',
		__( 'Heading Part 2', 'wordpress' ),
		'iambenzo_text_field_1_render',
		'pluginPage',
		'iambenzo_pluginPage_section'
	);

	add_settings_field(
		'iambenzo_textarea_field_2',
		__( 'Content', 'wordpress' ),
		'iambenzo_textarea_field_2_render',
		'pluginPage',
		'iambenzo_pluginPage_section'
	);


}


function iambenzo_text_field_0_render(  ) {

	$options = get_option( 'iambenzo_settings' );
	?>
	<input type='text' name='iambenzo_settings[iambenzo_text_field_0]' value='<?php echo $options['iambenzo_text_field_0']; ?>'>
	<?php

}


function iambenzo_text_field_1_render(  ) {

	$options = get_option( 'iambenzo_settings' );
	?>
	<input type='text' name='iambenzo_settings[iambenzo_text_field_1]' value='<?php echo $options['iambenzo_text_field_1']; ?>'>
	<?php

}


function iambenzo_textarea_field_2_render(  ) {

	$options = get_option( 'iambenzo_settings' );
	?>
	<textarea cols='40' rows='5' name='iambenzo_settings[iambenzo_textarea_field_2]'>
		<?php echo $options['iambenzo_textarea_field_2']; ?>
 	</textarea>
	<?php

}


function iambenzo_settings_section_callback(  ) {

	echo __( 'Configure what displays in the white box of the home page.', 'wordpress' );

}


function iambenzo_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Theme Settings</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>
