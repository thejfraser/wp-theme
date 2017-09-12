<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-templates' );
function _remove_script_version( $src ) {
	$parts = explode( '?ver', $src );

	return $parts[0];
}

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'Fonts', 'https://fonts.googleapis.com/icon?family=Material+Icons|Raleway:400,700', [ ], null );
	wp_enqueue_style( 'Materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css', [ ], null );
	wp_enqueue_style( 'Core', get_stylesheet_uri(), [ 'Materialize' ], null );
	wp_enqueue_script( 'Materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js', [ 'jquery' ], null, true );
	wp_enqueue_script( 'Core', get_stylesheet_directory_uri() . '/core.js', [ 'jquery' ], null, true );
} );

add_action( 'init', function () {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
} );

add_filter( 'tiny_mce_plugins', function ( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
} );

add_action( 'init', function () {
	register_post_type( 'off-topic-posts', [
		'labels'             => [
			'name'               => 'Off-topic Posts',
			'singular_name'      => 'Off-topic Post',
			'menu_name'          => 'Off-topic Posts',
			'name_admin_bar'     => 'Off-topic Posts',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Post',
			'new_item'           => 'New Post',
			'edit_item'          => 'Edit Post',
			'view_item'          => 'View Post',
			'all_items'          => 'All Posts',
			'search_items'       => 'Search Posts',
			'parent_item_colon'  => 'Parent Posts:',
			'not_found'          => 'No posts found',
			'not_found_in_trash' => 'No posts found in Trash',
		],
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'off-topic' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'         => [ 'post_tag', 'category' ]
	] );

	register_post_type( 'posts', [
		'labels'             => [
			'name'               => 'Topic Posts',
			'singular_name'      => 'Topic Post',
			'menu_name'          => 'Topic Posts',
			'name_admin_bar'     => 'Topic Posts',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Post',
			'new_item'           => 'New Post',
			'edit_item'          => 'Edit Post',
			'view_item'          => 'View Post',
			'all_items'          => 'All Posts',
			'search_items'       => 'Search Posts',
			'parent_item_colon'  => 'Parent Posts:',
			'not_found'          => 'No posts found',
			'not_found_in_trash' => 'No posts found in Trash',
		],
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'posts' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'         => [ 'post_tag', 'category' ]
	] );


	register_post_type( 'featured-banners', [
		'labels'             => [
			'name'               => 'Featured Banners',
			'singular_name'      => 'Featured Banner',
			'menu_name'          => 'Featured Banners',
			'name_admin_bar'     => 'Featured Banners',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Banner',
			'new_item'           => 'New Banner',
			'edit_item'          => 'Edit Banner',
			'view_item'          => 'View Banner',
			'all_items'          => 'All Banners',
			'search_items'       => 'Search Banners',
			'parent_item_colon'  => 'Parent Banners:',
			'not_found'          => 'No banners found',
			'not_found_in_trash' => 'No banners found in Trash',
		],
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'rewrite'            => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' ),
	] );
} );


add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


add_filter( 'image_size_names_choose', function ( $sizes ) {
	return array_merge( $sizes, array(
		'featured-banner' => 'Featured Banner',
		'card-image'      => 'Card Image'
	) );
} );
add_image_size( 'featured-banner', 1920, 1080, [ 'center', 'center' ] );
add_image_size( 'card-image', 412, 154, true );

add_action( 'save_post', function ( $postId ) {
	if (
		! current_user_can( 'edit_post', $postId )
		|| wp_is_post_autosave( $postId )
		|| wp_is_post_revision( $postId )
	) {
		return $postId;
	}

	if ( get_save_post_type( $postId ) === 'featured-banners' ) {
		$cache = get_html_cache_path( 'home-carousel' );
		if ( $cache ) {
			unlink( $cache );
		}
	}

	if ( in_array( get_save_post_type( $postId ), [ 'post', 'off-topic-posts' ] ) ) {
		$cache = get_html_cache_path( 'home-loop' );
		if ( $cache ) {
			unlink( $cache );
		}
	}

	return $postId;
} );


function get_save_post_type( $id ) {
	if ( isset( $_POST['post_type'] ) ) {
		return $_POST['post_type'];
	}

	return get_post_type( $id );
}


function get_html_cache_path( $item ) {
	$path = get_html_cache_path_anyway( $item );

	return file_exists( $path ) ? $path : false;
}

function get_html_cache_path_anyway( $item ) {
	return trailingslashit( get_stylesheet_directory() ) . 'html-cache/' . $item . '.php';
}

include( 'components/acf.php' );

add_filter( 'get_the_archive_title', function ( $title ) {
	if ( is_post_type_archive( 'off-topic-posts' ) ) {
		return 'Off-topic Posts';
	}
	if ( is_post_type_archive( 'posts' ) ) {
		return 'Posts';
	}

	return $title;
} );


function buildPagination( $current, $max, $link ) {

	$current = max( $current, 1 );
	$out     = '';
	if ( $max === 1 ) {
		return '';
	}

	$loop = 2;
	$out  = '<ul class="pages-nav">';
	if ( $current == 1 ) {
		$out .= '<li class="grey lighten-4 currentPage">1</li>';
	} else {
		$out .= "<li class='grey lighten-4 '><a href='{$link}'>1</a></li>";
	}

	if ( $loop < $current ) :
		$out .= '<li class="hasmore">&hellip;<ul class="more z-depth-1">';
		while ( $loop < $current ) {
			$out .= "<li class='grey lighten-4 '><a href='{$link}page/{$loop}/'>{$loop}</a></li>";
			$loop ++;
		}
		$out .= '</ul></li>';
	endif;

	if ( $current > 1 ) {
		$out .= "<li class='grey lighten-4 '>{$current}</li>";
		$loop ++;
	}


	if ( $loop < $max ):
		$out .= '<li class="hasmore">&hellip;<ul class="more z-depth-1">';
		while ( $loop < $max ) {
			$out .= "<li class='grey lighten-4 '><a href='{$link}page/{$loop}/'>{$loop}</a></li>";
			$loop ++;
		}
		$out .= '</ul></li>';
	endif;

	if ( $current < $max ) {
		$out .= "<li class='grey lighten-4 '><a href='{$link}page/{$max}/'>{$max}</a></li>";
	}


	return $out;
}


add_filter( 'content_url', function ( $url ) {
	return str_replace( '.jamiefraser.co.uk/wp-content', 'static.jamiefraser.co.uk', $url );
} );