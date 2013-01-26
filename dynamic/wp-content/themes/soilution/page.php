<?php get_header( is_page( 'who-we-are' ) ? 'who-we-are' : '' ); ?>
	<article id="body">
<?php 	while ( have_posts() ) : the_post(); ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="page-content">
			<div class="page-image"></div>
			<?php the_content(); ?>
		</div>
<?php 	endwhile; ?>
	</article>
<?php get_footer(); ?>