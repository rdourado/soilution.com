<?php get_header(); ?>
	<div id="body">
<?php 	while ( have_posts() ) : the_post(); ?>
		<h1 class="page-title">Estudos de Caso » <?php echo reset( get_the_category() )->cat_name; ?></h1>
		<article class="page-content">
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<div <?php post_class( 'entry-content' ); ?>>
				<?php the_content(); ?>
			</div>
		</article>
<?php 	endwhile; ?>
<?php 	get_sidebar(); ?>
	</div>
<?php get_footer(); ?>