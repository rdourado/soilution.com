<?php 		global $t_url; ?>
			<form action="<?php echo home_url( '/' ); ?>" method="get" id="searchform">
				<fieldset>
					<legend><?php _e( 'Formulário de busca', 'soilution' ); ?></legend>
					<label for="s"><?php _e( 'Busca', 'soilution' ); ?></label>
					<input type="text" name="s" id="s" size="18" value="<?php the_search_query(); ?>" required aria-required="true">
					<button type="submit"><img src="<?php echo $t_url; ?>/img/ico-search.png" alt="ok" width="16" height="16"></button>
				</fieldset>
			</form>
