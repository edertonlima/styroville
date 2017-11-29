<?php get_header(); ?>

	<section class="box-content fale-conosco">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h2>
						FALE CONOSCO
					</h2>
				</div>

				<div class="col-8">

					<?php
						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content', 'post' );

						endwhile;
						wp_reset_query();
					?>

					<div class="contato-footer page">
						<span class="tel">+55 (49) 3674.0000</span>
						<span class="email">comercial@styroville.com.br</span>

						<h4>Horário de Atendimento</h4>
						<p>08:00 as 12:00 - 13:30 as 18:00</p>			
					</div>

					<p><?php the_excerpt(); ?></p>

					<div class="row">
						<form action="javascript:" class="form-padrao">
							<fieldset class="col-12">
								<p class="msg-form"></p>
							</fieldset>
							<fieldset class="col-12">
								<input type="text" name="nome" id="nome" placeholder="Nome: *">
							</fieldset>
							<fieldset class="col-12">
								<input type="text" name="email" id="email" placeholder="E-mail: *">
							</fieldset>
							<fieldset class="col-12">
								<textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="Mensagem: *"></textarea>
							</fieldset>
							<fieldset class="col-12">
								<button class="enviar" type="submit">Enviar</button>
							</fieldset>
						</form>
					</div>
					
				</div>

				<div class="col-4 sidebar">

					<?php include 'sidebar-empresa.php'; ?>
					<?php include 'sidebar-noticias.php'; ?>

				</div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.nav ul li.menu-fale-conosco').addClass('active');
	});
</script>

<script type="text/javascript">
	jQuery(".enviar").click(function(){
		jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
		jQuery('.msg-form').removeClass('erro ok').html('');
		var nome = jQuery('#nome').val();
		var email = jQuery('#email').val();
		var mensagem = jQuery('#mensagem').val();
		var para = '<?php the_field('email', 'option'); ?>';
		var nome_site = '<?php bloginfo('name'); ?>';

		if(nome == ''){
			jQuery('#nome').parent().addClass('erro');
		}

		if(email == ''){
			jQuery('#email').parent().addClass('erro');
		}

		if(mensagem == ''){
			jQuery('#mensagem').parent().addClass('erro');
		}

		if((nome == '') || (email == '') || (mensagem == '')){
			jQuery('.msg-form').html('Campos obrigatórios não podem estar vazios.');
			jQuery('.enviar').html('ENVIAR').prop( "disabled", false );
		}else{
			jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
				if(result=='ok'){
					resultado = 'Enviado com sucesso! Obrigado.';
					classe = 'ok';
				}else{
					resultado = result;
					classe = 'erro';
				}
				jQuery('.msg-form').addClass(classe).html(resultado);
				jQuery('.form-padrao').trigger("reset");
				jQuery('.enviar').html('ENVIAR').prop( "disabled", false );
			});
		}
	});

	jQuery(document).ready(function(){
		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

		jQuery('textarea').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});
	})
</script>