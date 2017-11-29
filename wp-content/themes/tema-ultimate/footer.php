	<footer class="footer">
		<div class="container">

			<div class="row">
				<div class="col-3">
					<h3>SEJA BEM VINDO!</h3>
					<ul class="menu-footer">
						<li>
							<a href="<?php echo get_home_url(); ?>/empresa" title="Empresa">- Empresa</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/produtos" title="Produtos">- Produtos</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/qualidade" title="Qualidade">- Qualidade</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/area-de-atuacao" title="Área de Atuação">- Área de Atuação</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/noticias" title="Notícias">- Notícias</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/fale-conosco" title="Fale Conosco">- Fale Conosco</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/minha-area" title="Minha Área">- Minha Área</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/trabalhe-conosco" title="<?php echo get_page_by_path('trabalhe-conosco')->post_title; ?>">
								- <?php echo get_page_by_path('trabalhe-conosco')->post_title; ?>
							</a>
						</li>	
					</ul>
				</div>

				<div class="col-3" style="display: none;">
					<h3>EMPRESA</h3>

					<ul class="menu-footer">
						<li>
							<a href="<?php echo get_home_url(); ?>/empresa" title="<?php echo get_page_by_path('empresa')->post_title; ?>">
								<?php echo get_page_by_path('empresa')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/nossa-equipe" title="<?php echo get_page_by_path('nossa-equipe')->post_title; ?>">
								<?php echo get_page_by_path('nossa-equipe')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/logistica" title="<?php echo get_page_by_path('logistica')->post_title; ?>">
								<?php echo get_page_by_path('logistica')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/responsavel-tecnico" title="<?php echo get_page_by_path('responsavel-tecnico')->post_title; ?>">
								<?php echo get_page_by_path('responsavel-tecnico')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/responsabilidade-social" title="<?php echo get_page_by_path('responsabilidade-social')->post_title; ?>">
								<?php echo get_page_by_path('responsabilidade-social')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/responsabilidade-ambiental" title="<?php echo get_page_by_path('responsabilidade-ambiental')->post_title; ?>">
								<?php echo get_page_by_path('responsabilidade-ambiental')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/projeto-ecoeter" title="<?php echo get_page_by_path('projeto-ecoeter')->post_title; ?>">
								<?php echo get_page_by_path('projeto-ecoeter')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/representantes" title="<?php echo get_page_by_path('representantes')->post_title; ?>">
								<?php echo get_page_by_path('representantes')->post_title; ?>
							</a>
						</li>

						<li>
							<a href="<?php echo get_home_url(); ?>/qualidade" title="<?php echo get_page_by_path('qualidade')->post_title; ?>">
								- <?php echo get_page_by_path('qualidade')->post_title; ?>
							</a>
						</li>	
					</ul>
				</div>

				<div class="col-3">
					<h3>NOTÍCIAS</h3>

					<ul class="menu-footer">
						<?php query_posts(
							array(
								'post_type' => 'post',
								'posts_per_page' => 3
							)
						);

						while ( have_posts() ) : the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">- <?php the_title(); ?></a>
							</li>
						<?php endwhile;
						wp_reset_query(); ?>
					</ul>
				</div>

				<div class="col-3">
					<h3>PRODUTOS</h3>

					<ul class="menu-footer">
						<?php
							$args = array(
							    'taxonomy'      => 'produtos_taxonomy',
							    'parent'        => 0,
							    'orderby'       => 'name',
							    'order'         => 'ASC',
							    'hierarchical'  => 1,
							    'pad_counts'    => true,
							    'hide_empty'    => 0
							);
							$categories = get_categories( $args );
							foreach ( $categories as $categoria ){ ?>

								<li>
									<a href="<?php echo get_category_link($categoria->term_id); ?>" title="<?php echo $categoria->name; ?>">
										- <?php echo $categoria->name; ?>
									</a>
								</li>

								<?php
							}
						?>
					</ul>
				</div>

				<div class="col-3 contato-footer">
					<h3>FALE CONOSCO</h3>

					<span class="tel">+55 (49) 3674.0000</span>
					<span class="email">comercial@styroville.com.br</span>

					<h4>Horário de Atendimento</h4>
					<p>08:00 as 12:00 - 13:30 as 18:00</p>
		
				</div>
			</div>

			<div class="copy">
				<div class="row">
					<div class="col-6">
						<p><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y') ?> <?php the_field('titulo','option'); ?>. All rights reserved.</p>
					</div>

					<div class="col-6 ultimate">
						<a href="http://www.ultimate.com.br" target="_blank" title="ULTIMATE">ULTIMATE! tecnologia e design</a>
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