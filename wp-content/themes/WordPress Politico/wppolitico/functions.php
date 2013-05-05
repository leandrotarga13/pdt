<?php
add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 225, 225, true );
add_image_size( 'dual', 612, 375, true );
add_image_size( 'nivo', 918, 375, true );
?>
<?php 
function dimox_breadcrumbs() {
 
  $delimiter = '&nbsp;&raquo;&nbsp;';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . '';
      single_cat_title();
      echo '' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() && !is_attachment() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}
?>
<?php
function styleme($atts, $content = null) {
	extract(shortcode_atts(array(
        "class" => ''
	), $atts));
	return '<h2 class="'.$class.'">'.$content.'</h2>';
}
add_shortcode('h2', 'styleme');
?>
<?php
function stylemeone($atts, $content = null) {
	extract(shortcode_atts(array(
        "class" => ''
	), $atts));
	return '<span class="'.$class.'">'.$content.'</span>';
}
add_shortcode('span', 'stylemeone');
?>
<?php
function stylemetwo($atts, $content = null) {
	extract(shortcode_atts(array(
        "class" => ''
	), $atts));
	return '<div class="'.$class.'">'.$content.'</div>';
}
add_shortcode('div', 'stylemetwo');
?>
<?php
function stylemethree($atts, $content = null) {
	extract(shortcode_atts(array(
        "class" => '',
        "id" => ''
	), $atts));
	return '<p class="'.$class.'" id="'.$id.'">'.$content.'</p>';
}
add_shortcode('p', 'stylemethree');
?>
<?php 
add_theme_support( 'menus' );
register_nav_menu('main', 'Main Navigation Menu');
register_nav_menu('footer', 'Footer Navigation Menu');
?>
<?php
function remove_footer_admin () {
    echo "Theme designed and developed by <a href='http://themeforest.net/user/themolitor?ref=themolitor'>THE MOLITOR</a>";
} 

add_filter('admin_footer_text', 'remove_footer_admin');
?>
<?php //SIDEBAR GENERATOR (FOR SIDEBAR AND FOOTER)-----------------------------------------------
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Live Widgets',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
));
register_sidebar(array('name'=>'Footer Widgets',
		'description' => 'Use only 4 widgets here. You can turn these widgets on/off on the theme settings page.',
		'before_widget' => '<li id="%1$s" class="footerWidget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="footerWidgetTitle">',
		'after_title' => '</h2>',
));
?>
<?php

$key = "key";

$meta_boxes = array(

"custom_subtext" => array(
"name" => "custom_subtext",
"title" => "Title Sub-Text",
"description" => "Sub-text appears next to post/page title (for categories, use the <a href='edit-tags.php?taxonomy=category'>category description text box</a>)."),

"custom_video" => array(
"name" => "custom_video",
"title" => "Slider Video Embed Code",
"description" => "Video should be 612x375."),

"custom_link" => array(
"name" => "custom_link",
"title" => "Slider Custom Link",
"description" => "Overrides the default link to the post.")

);

function create_meta_box() {

global $key;

if( function_exists( 'add_meta_box' ) ) {

add_meta_box( 'new-meta-boxes', ' Custom Post Options', 'display_meta_box', 'page', 'normal', 'high' );
add_meta_box( 'new-meta-boxes', ' Custom Post Options', 'display_meta_box', 'post', 'normal', 'high' );
}

}

function display_meta_box() {

global $post, $meta_boxes, $key;
?>
<div class="form-wrap">
<?php

wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

foreach($meta_boxes as $meta_box) {

$data = get_post_meta($post->ID, $key, true);
?>
<div class="form-field form-required">

<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>

<input type="text" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?>" />

<p><?php echo $meta_box[ 'description' ]; ?></p>

</div>

<?php } ?>
</div>
<?php

}

function save_meta_box( $post_id ) {

global $post, $meta_boxes, $key;

foreach( $meta_boxes as $meta_box ) {

$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];

}

if ( !wp_verify_nonce( $_POST[ $key . '_wpnonce' ], plugin_basename(__FILE__) ) )

return $post_id;

if ( !current_user_can( 'edit_post', $post_id ))

return $post_id;

update_post_meta( $post_id, $key, $data );
}
require_once('scripts/jquery.php');
add_action( 'admin_menu', 'create_meta_box' );
add_action( 'save_post', 'save_meta_box' );
?>