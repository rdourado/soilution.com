<?php get_header(); ?>
	<div id="body">
		<h1 class="page-title">Estudos de Caso » <?php single_cat_title(); ?></h1>
		<article class="page-content">
<?php 		query_posts( "{$query_string}&post_type=estudo&posts_per_page=1" );
			while ( have_posts() ) : the_post(); ?>
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<div <?php post_class( 'entry-content' ); ?>>
				<?php the_content(); ?>
			</div>
<?php 		endwhile; ?>
		</article>
<?php 	get_sidebar(); ?>
	</div>
<?php get_footer(); ?>