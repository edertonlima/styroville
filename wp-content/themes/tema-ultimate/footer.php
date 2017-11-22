
	<?php if(!is_front_page()){
		get_template_part( 'content-contato', 'page' );
	} ?>

	<footer class="footer">
		<div class="container">

			<div class="copy">
				<div class="row">
					<div class="col-3">
						<a href="<?php echo get_home_url(); ?>" title="<?php the_field('titulo', 'option'); ?>" class="logo-footer">
							<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>" style="display: none;">
						</a>
					</div>
					<div class="col-9">
						<p><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y') ?> <?php the_field('titulo','option'); ?>. All rights reserved.</p>
					</div>
				</div>
			</div>
		
		</div>
	</footer>

	<script type="text/javascript">
		
		jQuery.noConflict();

		jQuery(document).ready(function(){
			jQuery(".scroll").click(function(event){
				event.preventDefault();
				jQuery('.menu-mobile').removeClass('active');
				jQuery('.header').removeClass('active');
				jQuery('.nav').css('top','-110vh');
				jQuery('html,body').animate( { scrollTop:jQuery(this.hash).offset().top } , 1000);
			});

			jQuery("#gotop").click(function(event){
				event.preventDefault();
				jQuery('html,body').animate( { scrollTop: 0 } , 1000);
			});


			// FORM
			/*
			jQuery(".enviar").click(function(){
				jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
				jQuery('.msg-form').removeClass('erro ok').html('');
				var nome = jQuery('#nome').val();
				var email = jQuery('#email').val();
				var mensagem = jQuery('#mensagem').val();
				var para = '<?php get_field('email', 'option'); ?>';
				var nome_site = '<?php get_field('titulo', 'option'); ?>';

				if(email!=''){
					jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
						if(result=='ok'){
							resultado = 'Enviado com sucesso! Obrigado.';
							classe = 'ok';
						}else{
							resultado = result;
							classe = 'erro';
						}
						jQuery('.msg-form').addClass(classe).html(resultado);
						jQuery('form').trigger("reset");
						jQuery('.enviar').html('ENVIAR').prop( "disabled", false );
					});
				}else{
					jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
					jQuery('.enviar').html('ENVIAR').prop( "disabled", false );
				}
			});
			*/
		});

		
		function logOff(){

			jQuery.ajax({
				url: "<?php echo get_template_directory_uri(); ?>/session.php",
				context: document.body
			}).done(function() {
				window.location.href = '<?php echo get_home_url(); ?>/minha-area'; 
			});

			/*jQuery.ajax("", { }, function(){
				alert();
				window.location.href = '<?php echo get_home_url(); ?>/minha-area'; 
			});*/
		};

	</script>

</body>
</html>

<?php
	/*if(isset($_SESSION['id'])){
		echo $_SESSION['id'];
		echo '<br>'.$_SESSION['usuario'];
		echo '<br>'.$_SESSION['senha'];
	}*/
?>