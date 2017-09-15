<?php
/* HIDE Logo WP */
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
function my_login_logo_one() { 
  ?> 
  <style type="text/css"> 
    body.login div#login h1 a {
     background-image: none;   
   } 
 </style>
<?php 
}
/* REMOVE Warning SEO Yoast */
add_action('admin_head', 'disable_yoast_notice');
function disable_yoast_notice() {
  echo '<style>
    #wpseo-dismiss-plugin-conflict {
  display: none;
}
</style>';
}
######FOR COPYRIGHT AND NOTICE################################
/* REMOVE NOTICE UPDATE WP */
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
/* REMOVE UPDATE PLUGIN */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
/* REMOVE Login url and logo */
function jsviet_login_logo_url() {
  return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'jsviet_login_logo_url' );
function jsviet_login_url_title() {
  return get_bloginfo("name");
}
add_filter( 'login_headertitle', 'jsviet_login_url_title' );
function jsviet_login_logo() {
  echo '';
}
add_action('login_head', 'jsviet_login_logo');
function remove_lostpassword_text ( $text ) {
  $wpv='You are using <span class="b">WordPress %s</span>.';
  if ($text == 'Lost your password?' || $text==$wpv){$text = '';}
  return $text;
}
add_filter( 'gettext', 'remove_lostpassword_text' );
function wpse_edit_footer(){
  add_filter( 'admin_footer_text', 'wpse_edit_text', 11 );
}
function wpse_edit_text($content) {
  return get_bloginfo("name");
}
add_action( 'admin_init', 'wpse_edit_footer' );
function annointed_admin_bar_remove() {
  global $wp_admin_bar;
/* Remove their stuff */
  $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);
add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
  remove_submenu_page( 'index.php', 'update-core.php' );
  remove_menu_page('tools.php');
/* remove_menu_page('edit-comments.php'); */
}
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
/* Remove query string from static files */
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

######END FOR COPYRIGHT AND NOTICE################################   
#ADD STYLE 
 function enqueue_styles() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array() );
	wp_enqueue_style( 'typed', get_template_directory_uri() . '/css/typed.css', array() );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array() );
	wp_enqueue_style( 'jquery-simpleCaptcha', get_template_directory_uri() . '/css/jquery.simpleCaptcha.css', array() );
	wp_enqueue_style( 'mystyle', get_template_directory_uri() . '/style.css');
 }
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
#ADD SRCIRPT JS TO FRONT END

add_action('wp_enqueue_scripts', 'init_js_scripts', 0);
function init_js_scripts(){
		$my_var=array(
			"siteurl"=>get_bloginfo("url"),
			"tempurl"=>get_bloginfo("template_directory"),
		);
		wp_localize_script( 'my_main_script', 'myvar', $my_var );

		wp_enqueue_script("local_jquery",get_template_directory_uri()."/js/jquery.js",false,null,true);
		wp_enqueue_script("bootstrap",get_template_directory_uri()."/js/bootstrap.min.js",false,null,true);
	wp_enqueue_script('google-maps', 'http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBZazo27_PRIu8y6pl3VCL9SEDE7df_eBg',false,null,true);
		wp_enqueue_script("jquery_ui_map",get_template_directory_uri()."/js/jquery.ui.map.js",false,null,true);
		wp_enqueue_script("jquery_easing",get_template_directory_uri()."/js/jquery.easing-1.3.pack.js",false,null,true);
    	wp_enqueue_script("jquery.parallax",get_template_directory_uri()."/js/jquery.parallax-1.1.3.js",false,null,true);
		wp_enqueue_script("jquery_magnific_popup",get_template_directory_uri()."/js/jquery.magnific-popup.min.js",false,null,true);
		wp_enqueue_script("typed",get_template_directory_uri()."/js/typed.js",false,null,true);
    	wp_enqueue_script("jquery_easypiechart",get_template_directory_uri()."/js/jquery.easypiechart.min.js",false,null,true);
		wp_enqueue_script("jquery_easypiechart",get_template_directory_uri()."/js/jquery.easypiechart.min.js",false,null,true);
		wp_enqueue_script("jquery_simpleCaptcha",get_template_directory_uri()."/js/jquery.simpleCaptcha.js",false,null,true);
		wp_enqueue_script("SimpleAjaxUploader",get_template_directory_uri()."/js/SimpleAjaxUploader.js",false,null,true);
		wp_enqueue_script("jquery_validate",get_template_directory_uri()."/js/jquery.validate.min.js",false,null,true);
		wp_enqueue_script("theme",get_template_directory_uri()."/js/theme.js",false,null,true);

}

     
#ADD JS SCRIPT TO BACKEND
add_action('admin_enqueue_scripts', 'admin_load_scripts');
function admin_load_scripts() {
    wp_enqueue_script('JQuery_cus', get_bloginfo("template_directory")."/js/admin/JQuery.admin-function.js");

    $my_var=array(
        "siteurl"=>get_bloginfo("url"),
        "tempurl"=>get_bloginfo("template_directory")
    );
    wp_localize_script( 'JQuery_cus', 'myvar', $my_var );

    wp_enqueue_script('jquery-ui-autocomplete');
    $current_admin_page=$_REQUEST['page'];

    if($current_admin_page=='lak-admin-user-config-slider'){
        wp_enqueue_script('slider-js-script',get_bloginfo("template_directory")."/js/admin/JQuery.admin-slider.js");
    }
}
#END
function improved_trim_excerpt($text) {
  global $post;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace('\]\]\>', ']]&gt;', $text);
    $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
    $text = strip_tags($text, '<p>');
    $excerpt_length = 50;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words)> $excerpt_length) {
      array_pop($words);
      array_push($words, '...');
      $text = implode(' ', $words);
    }
  }
  return $text;
}
function custom_excerpt_length( $length ) {
  return 40;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//Add featured image in post
if ( function_exists( 'add_theme_support' ) ) {
 add_theme_support( 'post-thumbnails' );
}

// Add RSS links to <head> section
automatic_feed_links();
if (function_exists('register_sidebar')) {
 register_sidebar(array(
  'name' => 'Sidebar Widgets',
  'id'   => 'sidebar-widgets',
  'description'   => 'These are widgets for the sidebar.',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2>',
  'after_title'   => '</h2>'
  ));
}
add_theme_support('nav-menus');
if(function_exists('register_nav_menus')){
	register_nav_menus(
   array(
    'main' => 'Main Nav'
    )
   );
}
/* get hinh dai dien */
function _getHinhDaiDien($postID=""){
  if($postID=="")
  {
    global $post;
    $postID=$post->ID;
  }
  $imgID=get_post_thumbnail_id($postID);
  if($imgID!=""){
    $img=wp_get_attachment_image_src($imgID,"medium");
    return $img[0];
  }else
  return "";
}
/* Get The First Image From a Post */
define("imgdir", get_bloginfo("template_directory")."/images",true);
function v5s_catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];
  if(empty($first_img)) {
    $first_img = imgdir."/no_image.jpg";
  }
  return $first_img;
}
/************************** 
BREADCRUMB START
*****************************/
 function the_breadcrumb() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '/ '; // delimiter between crumbs
  $home = '<span class="fa fa-home"></span>'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}
//// BREADCRUMB END //// 

/* PAGINATION */
 function emm_paginate($args = null) {
   $defaults = array(
    'page' => null, 'pages' => null, 
    'range' => 3, 'gap' => 3, 'anchor' => 1,
    'before' => '<div class="emm-paginate">', 'after' => '</div>',
    'title' => __(''),
    'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
    'echo' => 1
    );
   $r = wp_parse_args($args, $defaults);
   extract($r, EXTR_SKIP);
   if (!$page && !$pages) {
    global $wp_query;
    $page = get_query_var('paged');
    $page = !empty($page) ? intval($page) : 1;
    $posts_per_page = intval(get_query_var('posts_per_page'));
    $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
  }
  $output = "";
  if ($pages > 1) {	
    $output .= "$before<span class='emm-title'>$title</span>";
    $ellipsis = "<span class='emm-gap'>...</span>";
    if ($page > 1 && !empty($previouspage)) {
     $output .= "<a href='" . get_pagenum_link($page - 1) . "' class='emm-prev'>$previouspage</a>";
   }
   $min_links = $range * 2 + 1;
   $block_min = min($page - $range, $pages - $min_links);
   $block_high = max($page + $range, $min_links);
   $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
   $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;
   if ($left_gap && !$right_gap) {
     $output .= sprintf('%s%s%s', 
      emm_paginate_loop(1, $anchor), 
      $ellipsis, 
      emm_paginate_loop($block_min, $pages, $page)
      );
   }
   else if ($left_gap && $right_gap) {
     $output .= sprintf('%s%s%s%s%s', 
      emm_paginate_loop(1, $anchor), 
      $ellipsis, 
      emm_paginate_loop($block_min, $block_high, $page), 
      $ellipsis, 
      emm_paginate_loop(($pages - $anchor + 1), $pages)
      );
   }
   else if ($right_gap && !$left_gap) {
     $output .= sprintf('%s%s%s', 
       emm_paginate_loop(1, $block_high, $page),
       $ellipsis,
       emm_paginate_loop(($pages - $anchor + 1), $pages)
       );
   }
   else {
    $output .= emm_paginate_loop(1, $pages, $page);
  }
  if ($page < $pages && !empty($nextpage)) {
    $output .= "<a href='" . get_pagenum_link($page + 1) . "' class='emm-next'>$nextpage</a>";
  }
  $output .= $after;
}
if ($echo) {
 echo $output;
}
return $output;
}
function emm_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i)) 
   ? "<span class='emm-page emm-current'>$i</span>" 
   : "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";
 }
 return $output;
}

/* Security */
add_filter( 'xmlrpc_methods', 'remove_xmlrpc_pingback_ping' );
function remove_xmlrpc_pingback_ping( $methods ) {
 unset( $methods['pingback.ping'] );
 return $methods;
};
