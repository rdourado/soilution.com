<?php get_header(); ?>
<?php query_posts( "{$query_string}&posts_per_page=-1" ); ?>
	<article id="body">
		<h1 class="page-title">Resultado da Busca</h1>
		<div id="search">
			<div class="page-image"></div>
			<form action="<?php echo home_url( '/' ); ?>" method="get" id="searchform-2">
				<fieldset>
					<legend><?php _e( 'Resultados para:', 'soilution' ); ?></legend>
					<label for="s-2"><?php _e( 'Busca', 'soilution' ); ?></label>
					<input type="text" name="s" id="s-2" size="18" value="<?php the_search_query(); ?>" required aria-required="true">
					<button type="submit"><img src="<?php echo $t_url; ?>/img/ico-search.png" alt="ok" width="16" height="16"></button>
				</fieldset>
			</form>
			<ol id="results">
<?php 			while ( have_posts() ) : the_post(); ?>
				<li class="result">
					<a href="<?php the_permalink(); ?>">
						<h2 class="title"><?php the_title(); ?></h2>
						<?php the_excerpt(); ?>
					</a>
				</li>
<?php 			endwhile;
				wp_reset_query(); ?>
			</ol>
		</div>
	</article>
<?php get_footer(); ?>