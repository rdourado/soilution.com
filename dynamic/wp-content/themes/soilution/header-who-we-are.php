<?php global $t_url; 
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php echo $t_url; ?>/style.css" media="screen">
	<!-- WP/ --><?php wp_head(); ?><!-- /WP -->
</head>
<body <?php body_class( is_page() ? " page-{$post->post_name}" : '' ); ?>>
	<header id="head">
		<h1 id="logo"><img src="<?php echo $t_url; ?>/img/soilution.png" alt="Soilution" width="181" height="127"></h1>
		<nav id="nav">
<?php 		$my_menu = wp_nav_menu( array( 
				'theme_location' => 'menu', 
				'menu_id' => 'menu',
				'container' => '',
				'echo' => 0,
			) );
			$my_menu = str_replace( '<a', '<span', $my_menu );
			echo str_replace( '/a>', '/span>', $my_menu ); ?>
			<p id="i18n"><a href="<?php 
			echo get_permalink( get_page_by_path( 'quem-somos' ) );
			?>"><img src="<?php echo $t_url; ?>/img/pt-br.png" alt="Português" width="16" height="11"></a></p>
<?php 		get_search_form(); ?>
		</nav>
	</header>
