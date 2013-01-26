<?php global $t_url; 
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php echo $t_url; ?>/style.css" media="screen">
	<!--[if lt IE 9]><script src="<?php echo $t_url; ?>/js/html5shiv.js"></script><![endif]-->
	<!-- WP/ --><?php wp_head(); ?><!-- /WP -->
</head>
<body <?php body_class( is_page() ? " page-{$post->post_name}" : '' ); ?>>
	<header id="head">
		<h1 id="logo"><img src="<?php echo $t_url; ?>/img/soilution.png" alt="Soilution" width="181" height="127"></h1>
		<nav id="nav">
<?php 		wp_nav_menu( array( 
				'theme_location' => 'menu', 
				'menu_id' => 'menu',
				'container' => '',
			) ); ?>
			<p id="i18n"><a href="<?php 
			echo get_permalink( get_page_by_path( 'who-we-are' ) );
			?>"><img src="<?php echo $t_url; ?>/img/en.png" alt="English" width="16" height="11"></a></p>
<?php 		get_search_form(); ?>
		</nav>
	</header>
