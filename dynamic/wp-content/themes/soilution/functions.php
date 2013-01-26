<?php 

$t_url = get_bloginfo( 'template_url' );

/* Setup */

add_action( 'after_setup_theme', 'my_setup' );

function my_setup() {

	add_editor_style();

	register_nav_menu( 'menu', _x( 'Menu', 'soilution' ) );
	
	add_theme_support( 'post-thumbnails', array( 'estudo' ) );
	set_post_thumbnail_size( 40, 40, true );
	add_image_size( 'client', 136, 81, true );

}

/* Actions */

add_action( 'admin_menu', 'remove_menus' );
add_action( 'wp_enqueue_scripts', 'my_scripts' );
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function remove_menus() {
	global $menu;
	$restricted = array( __('Posts'), __('Media'), __('Links'), __('Tools'), __('Comments') );
	end( $menu );
	while ( prev( $menu ) ) {
		$value = explode( ' ', $menu[key($menu)][0] );
		if ( in_array( $value[0] != NULL ? $value[0] : "" , $restricted ) )
			unset( $menu[key($menu)] );
	}
}

function my_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, false, true );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'interface', get_template_directory_uri() . '/js/interface.js', array( 'jquery' ), false, true );
}

function my_login_logo() { ?>
<style type="text/css">
body.login div#login h1 a {
	background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/img/soilution.png);
	background-size: auto;
	height: 127px;
	margin-left: auto;
	margin-right: auto;
	width: 181px;
}
</style>
<?php }

/* Filters */

add_filter( 'excerpt_length', 'my_excerpt_length' );
add_filter( 'login_headerurl', 'my_login_logo_url' );
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_excerpt_length( $length ) {
	return 40;
}

function my_login_logo_url() {
	return get_bloginfo( 'url' );
}

function my_login_logo_url_title() {
	return 'Ir para o início';
}

/* Custom Post Type */

add_action( 'init', 'register_cpt_estudo' );

function register_cpt_estudo() {

    $labels = array( 
        'name' => _x( 'Estudos', 'soilution' ),
        'singular_name' => _x( 'Estudo', 'soilution' ),
        'add_new' => _x( 'Add New', 'soilution' ),
        'add_new_item' => _x( 'Add New Estudo', 'soilution' ),
        'edit_item' => _x( 'Edit Estudo', 'soilution' ),
        'new_item' => _x( 'New Estudo', 'soilution' ),
        'view_item' => _x( 'View Estudo', 'soilution' ),
        'search_items' => _x( 'Search Estudos', 'soilution' ),
        'not_found' => _x( 'No estudos found', 'soilution' ),
        'not_found_in_trash' => _x( 'No estudos found in Trash', 'soilution' ),
        'parent_item_colon' => _x( 'Parent Estudo:', 'soilution' ),
        'menu_name' => _x( 'Estudos', 'soilution' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'revisions', 'thumbnail' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'estudo', $args );
}