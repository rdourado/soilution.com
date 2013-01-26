<?php 
/*
Template name: Clientes
*/
?>
<?php get_header(); ?>
	<article id="body">
<?php 	while ( have_posts() ) : the_post(); ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="page-content">
			<div class="page-image"></div>
<?php 		if ( $clients = get_field( 'clientes' ) ) : ?>
			<p class="clients">
<?php 			foreach ( $clients as $image ) : ?>
				<img src="<?php echo $image['sizes']['client']; ?>" alt="<?php echo $image['alt']; ?>" class="client">
<?php 			endforeach; ?>
			</p>
<?php 		endif; ?>
		</div>
<?php 	endwhile; ?>
	</article>
<?php get_footer(); ?>