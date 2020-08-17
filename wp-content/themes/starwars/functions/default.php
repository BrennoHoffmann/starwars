<?php

if( ! defined( 'ABSPATH' ) ) { header( 'Location: /' ); exit; }


define('VERSION','3');


function shapeSpace_conditional_styles() {
  wp_enqueue_style( 'vendor', get_template_directory_uri() .'/dist/css/vendor.css?v0', array(), VERSION );
  wp_enqueue_style( 'main', get_template_directory_uri() . '/dist/css/main.css?v0', array(), VERSION );
}

function shapeSpace_frontend_scripts() {
	shapeSpace_conditional_styles();
	
	
	wp_enqueue_script( 'main', get_template_directory_uri() .'/dist/js/vendor.js', array('jquery'), VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() .'/dist/js/main.js', array('jquery'), VERSION, true );

   
   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
      // enqueue the javascript that performs in-link comment reply fanciness
      wp_enqueue_script( 'comment-reply' ); 
  }
}
add_action('wp_enqueue_scripts', 'shapeSpace_frontend_scripts');


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/* SUPORTE AO MENU */
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'menu_principal', 'Menu do Topo' );
}

/* CONFIGURA O SUPORTE A MINIATURAS */
if ( function_exists( 'add_theme_support' )){
	add_theme_support( 'post-thumbnails' );	
	add_image_size( 'square', 183, 178, true );
	add_image_size( 'small', 113, 78, true );
	add_image_size( 'thumb', 330, 240, true );
	add_image_size( 'post_thumbnail', 674, 472, true );
}


// PAGINATION
function wp_pagination($pages = '', $range = 21)
{  
    global $wp_query, $wp_rewrite;  
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
    $pagination = array(  
        'base' => @add_query_arg('page','%#%'),  
        'format' => '',  
        'total' => $wp_query->max_num_pages,  
        'current' => $current,  
        'show_all' => true,  
        'type' => 'plain'  
    );  
    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );  
    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );  
    
    if($$pagination['total'] > 1) {
    echo '<div class="container">
    <div class="row">
      <div class="col mobile-1-1">
        <div class="paginacao">
          <span>MAIS CONTEÚDO</span><div class="pagination wp_pagination">'.paginate_links( $pagination ).'</div></div></div></div></div>';
    }

} //END COM ESSA FUNÇÃO PODE-SE CHAMAR A PAGINAÇÃO    wp_pagination()

//BREADCRUMBS
function wp_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '>'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs" class="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs" class="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Resultado da busca "' . get_search_query() . '"' . $after;
 
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
} // END COM ESSA FUNÇÃO PODE-SE CHAMAR O BREADCRUMB     wp_custom_breadcrumbs()


function sa_get_bootstrap_paginate_links( ) {
	ob_start();
	?>
		<div class="pages clearfix">
			<?php
				global $my_query;
        $current = max( 1, absint( get_query_var( 'paged' ) ) );
        $args = array(
					'total'              => $my_query->max_num_pages,
					'current'            => $current,
					'show_all'           => true,
					'end_size'           => 1,
					'mid_size'           => 2,
					'prev_next'          => false,
					'add_args'           => false,
					'add_fragment'       => '',
					'before_page_number' => '',
					'after_page_number'  => '',
					'type' => 'array',
				);
      
        $pagination = paginate_links( $args ); 
        ?>
        
			<?php if ( ! empty( $pagination ) ) : ?>
      <span>MAIS CONTEÚDO</span>
				<ul class="inline">
					<?php foreach ( $pagination as $key => $page_link ) : ?>
						<li class="paginated_link <?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>"><?php echo $page_link ?></li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
		</div>
	<?php
	$links = ob_get_clean();
	return apply_filters( 'sa_bootstap_paginate_links', $links );
}
function custom_paginate_links(  ) {
	echo sa_get_bootstrap_paginate_links(   );
}


