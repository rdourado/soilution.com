<?php 
/*
Template name: Página Inicial
*/
?>
<?php get_header(); ?>
	<article id="body">
<?php 	$i = 0;
		while ( has_sub_field( 'destaques' ) ) : ?>
		<div id="group-<?php echo ++$i; ?>">
			<a href="<?php the_sub_field( 'pagina' ); ?>">
				<h2 class="heading"><?php the_sub_field( 'titulo' ); ?></h2>
				<p class="excerpt"><?php the_sub_field( 'descricao' ); ?><br><b><?php the_sub_field( 'acao' ); ?></b></p>
			</a>
		</div>
<?php 	endwhile; ?>
	</article>
<?php get_footer(); ?>