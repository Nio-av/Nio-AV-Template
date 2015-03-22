<?php



//Menue in Header and Footer
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(array('header-menu' => __('Header Menu'),
							'footer-menu' => __('Footer Menu')));
}


// Register Custom Navigation Walker
require_once('PlugIns/wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php');


//Beitragsbild-support
add_theme_support( 'post-thumbnails' );





//enable SVG
function kb_svg ( $svg_mime ){
	$svg_mime['svg'] = 'image/svg+xml';
	return $svg_mime;
}
add_filter( 'upload_mimes', 'kb_svg' );


//add Class to next & previous Post Link
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
//
function posts_link_attributes() {
    return 'class="postnav window"';
}



//remove Image Size from Article
add_filter( 'post_thumbnail_html', 'remove_width_and_height_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_and_height_attribute', 10 );
function remove_width_and_height_attribute( $html ) {
   return preg_replace( '/(height|width)="\d*"\s/', "", $html );
}

add_filter('gallery_style', create_function('$a', 'return "
<div class=\'gallery\'>";'));






?>