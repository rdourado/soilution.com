<?php 
$pid = get_page_by_path( 'contato' );
$pid = $pid->ID;
?>
	<hr>
	<footer id="foot">
		<address id="hcard-soilution" class="vcard">
			© <b class="fn org">Soilution</b> &nbsp;.&nbsp; 
			<span class="adr">
				<span class="street-address"><?php the_field( 'endereco', $pid ); ?></span> &nbsp;.&nbsp; 
				<span class="postal-code"><?php the_field( 'cep', $pid ); ?></span> &nbsp;.&nbsp; 
				<?php the_field( 'bairro', $pid ); ?> &nbsp;.&nbsp; 
				<span class="locality"><?php the_field( 'cidade', $pid ); ?></span> &nbsp; 
				<span class="country-name"><?php the_field( 'pais', $pid ); ?></span> &nbsp;.&nbsp; 
			</span>
			<span class="tel"><?php the_field( 'telefone', $pid ); ?></span>
		</address>
	</footer>
	<!-- WP/ --><?php wp_footer(); ?><!-- /WP -->
</body>
</html>