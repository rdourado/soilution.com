<?php 
/*
Template name: Contato
*/

$error = array();

if ( isset( $_POST['gotcha'] ) && $_POST['gotcha'] )
	wp_die( 'Aha! Gotcha!', 'SPAMMER!' );

if ( $_POST ) {

	if ( ! $_POST['nome'] ) 	$error['nome'] = true;
	if ( ! $_POST['assunto'] ) 	$error['assunto'] = true;
	if ( ! $_POST['mensagem'] ) $error['mensagem'] = true;
	if ( ! $_POST['email'] && ! preg_match( '/^([A-Z0-9\.\-_]+)@([A-Z0-9\.\-_]+)?([\.]{1})([A-Z]{2,6})$/i', $emailFrom ) )
	$error['email'] = true;

	if ( ! count( $error ) ) {

		$youremail 	= get_option( 'admin_email' );
		$body 		= "Nome: " . $_POST['nome'] . "\r\nEmail: " . $_POST['email'] . "\r\n\r\n" . $_POST['mensagem'];
		$headers 	= "Reply-to: {$_POST['email']}";
		
		$sent = wp_mail( $youremail, $_POST['assunto'], $body, $headers ) ? true : false;

	}

}

?>
<?php get_header(); ?>
	<article id="body">
<?php 	while ( have_posts() ) : the_post(); ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="page-content">
			<div class="page-image"></div>
			<p class="vcard">
				<span class="adr">
					<span class="street-address"><?php the_field( 'endereco' ); ?></span><br>
					<?php the_field( 'bairro' ); ?> &nbsp;.&nbsp; <span class="postal-code"><?php the_field( 'cep' ); ?></span><br>
					<span class="locality"><?php the_field( 'cidade' ); ?></span> &nbsp;.&nbsp; 
					<span class="country-name"><?php the_field( 'pais' ); ?></span><br>
				</span>
				Tel.: <span class="tel"><?php the_field( 'telefone' ); ?></span>
			</p>
			<form action="<?php echo get_permalink( get_page_by_path( 'contato' ) ); ?>" method="post" id="contactform">
				<fieldset>
					<legend>Contato</legend>
<?php 				if ( count( $error ) ) : ?>
					<p id="err-msg">Todos os campos são obrigatórios.<br>Por favor, preencha-os adequadamente.</p>
<?php 				elseif ( $sent ) : ?>
					<p>Mensagem enviada!<br>Por favor, aguarde nosso retorno.</p>
<?php 				else : the_content(); endif; ?>
					<p>
						<label for="nome"><?php _e( 'Nome:', 'soilution' ); ?></label><br>
						<input type="text" name="nome" id="nome" size="50" value="<?php 
						if ( ! $sent ) echo $_POST['nome']; ?>" required aria-required="true"<?php 
						if ( $error['nome'] ) 
							echo ' class="invalid" placeholder="Digite seu nome" aria-invalid="true" aria-describedby="err-msg"';
						?>>
					</p>
					<p>
						<label for="email"><?php _e( 'Email:', 'soilution' ); ?></label><br>
						<input type="email" name="email" id="email" size="50" value="<?php 
						if ( ! $sent ) echo $_POST['email']; ?>" required aria-required="true"<?php 
						if ( $error['email'] ) 
							echo ' class="invalid" placeholder="Digite um e-mail válido" aria-invalid="true" aria-describedby="err-msg"';
						?>>
					</p>
					<p>
						<label for="assunto"><?php _e( 'Assunto:', 'soilution' ); ?></label><br>
						<input type="text" name="assunto" id="assunto" size="50" value="<?php 
						if ( ! $sent ) echo $_POST['assunto']; ?>" required aria-required="true"<?php 
						if ( $error['assunto'] ) echo ' class="invalid" placeholder="Digite um assunto" aria-invalid="true" aria-describedby="err-msg"';
						?>>
					</p>
					<p>
						<label for="mensagem"><?php _e( 'Mensagem:', 'soilution' ); ?></label><br>
						<textarea name="mensagem" id="mensagem" cols="40" rows="9" required aria-required="true"<?php 
						if ( $error['mensagem'] ) echo ' class="invalid" aria-invalid="true" aria-describedby="err-msg"';
						?>><?php if ( ! $sent ) echo $_POST['mensagem']; ?></textarea>
					</p>
					<p class="antispam">
						<label for="gotcha"><?php _e( 'Campo antispam. Ignore-o, por favor.', 'soilution' ); ?></label><br>
						<input type="text" name="gotcha" id="gotcha">
					</p>
					<p class="submit"><button type="submit"><?php _e( 'Enviar', 'soilution' ); ?></button></p>
				</fieldset>
			</form>
		</div>
<?php 	endwhile; ?>
	</article>
<?php get_footer(); ?>