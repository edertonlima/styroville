<?php 
	session_start();

	if(isset($_SESSION['id'])){
		
		if($post->ID != $_SESSION['id']){
			$url = get_post_permalink($_SESSION['id']).'#novo-pedido';
			header('Location: '.$url);
		}else{

			if(isset($_POST['nome'])){

				if(get_field('tipo')){
					$nome = $_POST['razao_social'];
					$doc = $_POST['cnpj'];
					$tipo = true;
				}else{ echo 'tipo';
					$nome = $_POST['nome'];
					$doc = $_POST['cpf'];
					$tipo = false;
				}

				$update_post = array(
					'ID' => $post->ID,
					'post_title' => $nome
				);
				wp_update_post( $update_post );

				update_field( 'cpf__cnpj', $doc, $post->ID );
				update_field( 'email', $_POST['email'], $post->ID );

				update_field( 'telefone', $_POST['telefone'], $post->ID );
				update_field( 'celular', $_POST['celular'], $post->ID );

				update_field( 'endereco', $_POST['endereco'], $post->ID );
				update_field( 'numero', $_POST['numero'], $post->ID );
				update_field( 'bairro', $_POST['bairro'], $post->ID );
				update_field( 'cidade', $_POST['cidade'], $post->ID );
				update_field( 'uf', $_POST['uf'], $post->ID );
				update_field( 'cep', $_POST['cep'], $post->ID );

				update_field( 'nome_fantasia', $_POST['nome_fantasia'], $post->ID );
				update_field( 'inscricao_estadual', $_POST['inscricao_estadual'], $post->ID );
				update_field( 'email_xml', $_POST['email_xml'], $post->ID);
				update_field( 'email_financeiro', $_POST['email_financeiro'], $post->ID );
				
				update_field( 'usuario', $usuario, $post->ID );
				update_field( 'senha', $_POST['senha'], $post->ID );

				$url = get_post_permalink($post->ID).'#meus-dados/atualizado';
				header('Location: '.$url);

			}

		}

	}else{

		$url = get_home_url().'/minha-area';
		header('Location: '.$url);

	}
?>

<?php get_header(); ?>

<section class="box-content clientes">
	<div class="container">

		<div class="row">
			<div class="col-12">

				<h2>
					<a href="<?php echo get_home_url(); ?>/minha-area" title="PRODUTOS">
						ÁREA RESTRITA
					</a>
					<span>
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<?php the_title(); ?>
					</span>
					<span>
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<div id="page-area"></div>
					</span>

					<?php 
						if((isset($_SESSION['id'])) and ($_SESSION['id'] != '')){ ?>
							<a href="javascript: logOff();" class="logOff" title="Sair">
								Sair <i class="fa fa-sign-out" aria-hidden="true"></i>
							</a>
						<?php }
					?>
				</h2>

			</div>

			<div class="col-9">
				<div class="cont-tab-area" id="novo-pedido">

					<div class="table-responsive">
						<table class="table">
							<tbody>

								<?php 
									$terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' );
									$grupo = $terms[0]->term_id;
									query_posts(
										array(
											'post_type' => 'produtos',
											'posts_per_page' => -1
										)
									); 

								 while ( have_posts() ) : the_post(); 

										$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>

										<tr>
											<td width="30">
												<div class="input-checkbox center">
													<label>
														<input type="checkbox" name="<?php echo $post->ID; ?>" id="<?php echo $post->ID; ?>" value="<?php echo $post->ID; ?>">
													</label>
												</div>
											</td>
											<td width="80">
												<label for="<?php echo $post->ID; ?>">
													<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>">
												</label>
											</td>
											<td>
												<label for="<?php echo $post->ID; ?>">
													<h4><?php the_title(); ?></h4></td>
												</label>
											</td>
											<td class="preco">
												<?php if( have_rows('precos') ){

													$preco = false;
													while ( have_rows('precos') ) : the_row();
														if($grupo == get_sub_field('grupo_cliente')){
															echo 'R$ '.get_sub_field('preco');
															$preco = true;
															break;
														}
													endwhile;

													if(!$preco){
														echo '<span class="preco_off">Preço não<br>disponível</span>';
													}

												}else{
													echo '<span class="preco_off">Preço não<br>disponível</span>';
												} ?>
											</td>
											<td class="qtd" width="130">
												<h4 class="qtd">QTD:</h4>
												<input type="text" name="qtd" placeholder="0">
											</td>
										</tr>

								<?php endwhile;
								wp_reset_query(); ?>

							</tbody>
						</table>
					</div>

				</div>
				<div class="cont-tab-area" id="meus-pedidos">
					meus pedidos
				</div>
				<div class="cont-tab-area" id="meus-dados">
					<?php
						while ( have_posts() ) : the_post(); ?>
							
							<form action="<?php the_permalink(); ?>" class="cadastro <?php if(get_field('tipo')){ echo 'pj'; }else{ echo 'pf'; } ?>" method="post">
								<div class="row">

									<label class="col-12 titulo">Dados Principais:</label>
									<fieldset class="col-12">
										<input type="text" class="inputPessoa pf" name="nome" id="nome" placeholder="Nome*" value="<?php echo get_the_title(); ?>">
										<input type="text" class="inputPessoa pj" name="razao_social" id="razao_social" placeholder="Razão Social*" value="<?php echo get_the_title(); ?>">
									</fieldset>

									<fieldset class="col-12">
										<input type="text" class="inputPessoa pj" name="nome_fantasia" id="nome_fantasia" placeholder="Nome Fantasia" value="<?php the_field('nome_fantasia'); ?>">
									</fieldset>

									<fieldset class="col-6">
										<input type="text" class="inputPessoa mask-cpf pf" name="cpf" id="cpf" placeholder="CPF*" value="<?php the_field('cpf__cnpj'); ?>">
										<input type="text" class="inputPessoa mask-cnpj pj" name="cnpj" id="cpnj" placeholder="CNPJ*" value="<?php the_field('cpf__cnpj'); ?>">
									</fieldset>

									<fieldset class="col-6">
										<input type="text" class="inputPessoa pj" name="inscricao_estadual" id="inscricao_estadual" placeholder="Inscrição Estadual*" value="<?php the_field('inscricao_estadual'); ?>">
									</fieldset>


									<label class="col-12 titulo">Informações de Contato:</label>
									<fieldset class="col-6">
										<input type="text" class="mask-telefone" name="telefone" id="telefone" placeholder="Telefone" value="<?php the_field('telefone'); ?>">
									</fieldset>

									<fieldset class="col-6">
										<input type="text" class="mask-telefone" name="celular" id="celular" placeholder="Celular" value="<?php the_field('celular'); ?>">
									</fieldset>

									<fieldset class="col-12">
										<input type="text" name="email" id="email" placeholder="E-mail*" value="<?php the_field('email'); ?>">
									</fieldset>

									<fieldset class="col-6">
										<input type="text" class="inputPessoa pj" name="email_xml" id="email_xml" placeholder="E-mail XML" value="<?php the_field('email_xml'); ?>">
									</fieldset>

									<fieldset class="col-6">
										<input type="text" class="inputPessoa pj" name="email_financeiro" id="email_financeiro" placeholder="E-mail Financeiro" value="<?php the_field('email_financeiro'); ?>">
									</fieldset>


									<label class="col-12 titulo">Endereço:</label>
									<fieldset class="col-7">
										<input type="text" name="endereco" id="endereco" placeholder="Endereço*" value="<?php the_field('endereco'); ?>">
									</fieldset>

									<fieldset class="col-2">
										<input type="text" name="numero" id="numero" placeholder="N.º*" value="<?php the_field('numero'); ?>">
									</fieldset>

									<fieldset class="col-3">
										<input type="text" name="cep" id="cep" class="mask-cep" placeholder="CEP*" value="<?php the_field('cep'); ?>">
									</fieldset>

									<fieldset class="col-5">
										<input type="text" name="bairro" id="bairro" placeholder="Bairro*" value="<?php the_field('bairro'); ?>">
									</fieldset>

									<fieldset class="col-5">
										<input type="text" name="cidade" id="cidade" placeholder="Cidade*" value="<?php the_field('cidade'); ?>">
									</fieldset>

									<fieldset class="col-2">
										<input type="text" name="uf" id="uf" placeholder="UF*" value="<?php the_field('uf'); ?>">
									</fieldset>
									

									<label class="col-12 titulo">Senha de acesso:</label>
									
									<fieldset class="col-12">
										<input type="password" name="senha" id="senha" placeholder="Senha*" value="<?php the_field('senha'); ?>">
									</fieldset>

									<fieldset class="col-12">
										<button type="submit" class="btn enviar">Alterar</button>
										<!--<a href="javascript:" class="btn enviar">Cadastrar</a>-->
									</fieldset>

									<fieldset class="col-12">
										<p class="msg-form"></p>
									</fieldset>

								</div>
							</form>

						<?php endwhile;
						wp_reset_query();
					?>
				</div>
			</div>

			<div class="col-3 sidebar">
				<ul class="list-menu">

					<li class="" id="menu-novo-pedido">
						<a href="<?php echo get_post_permalink($post->ID); ?>/#novo-pedido" title="Novo Pedido">
							<i class="fa fa-caret-right" aria-hidden="true"></i> Novo Pedido
						</a>
					</li>

					<li class="" id="menu-meus-pedidos">
						<a href="<?php echo get_post_permalink($post->ID); ?>/#meus-pedidos" title="Meus Pedidos">
							<i class="fa fa-caret-right" aria-hidden="true"></i> Meus Pedidos
						</a>
					</li>

					<li class="" id="menu-meus-dados">
						<a href="<?php echo get_post_permalink($post->ID); ?>/#meus-dados" title="Meus Dados">
							<i class="fa fa-caret-right" aria-hidden="true"></i> Meus Dados
						</a>
					</li>

				</ul>
			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery("form.cadastro").submit(function(event){
		jQuery('.enviar').html('Enviando').prop( "disabled", true );
		jQuery('.msg-form').removeClass('erro ok').html('');

		var nome = jQuery('#nome').val();
		var razao_social = jQuery('#razao_social').val();		
		var nome_fantasia = jQuery('#nome_fantasia').val();		
		var email = jQuery('#email').val();
		var telefone = jQuery('#telefone').val();
		var celular = jQuery('#celular').val();
		var cpf = jQuery('#cpf').val();
		var cnpj = jQuery('#cnpj').val();
		var endereco = jQuery('#endereco').val();
		var numero = jQuery('#numero').val();
		var bairro = jQuery('#bairro').val();
		var cidade = jQuery('#cidade').val();
		var cep = jQuery('#cep').val();
		var uf = jQuery('#uf').val();
		var senha = jQuery('#senha').val();
		var inscricao_estadual = jQuery('#inscricao_estadual').val();
		var email_xml = jQuery('#email_xml').val();
		var email_financeiro = jQuery('#email_financeiro').val();

		var para = '<?php the_field('email', 'option'); ?>';
		var nome_site = '<?php bloginfo('name'); ?>';

		var enviar = true;

		if((jQuery('.pessoa').val()) == '.pf'){
			if(nome == ''){
				jQuery('#nome').parent().addClass('erro');
				enviar = false;
			}

			if(cpf == ''){
				jQuery('#cpf').parent().addClass('erro');
				enviar = false;
			}
		}else{
			if(razao_social == ''){
				jQuery('#razao_social').parent().addClass('erro');
				enviar = false;
			}

			/*if(nome_fantasia == ''){
				jQuery('#nome_fantasia').parent().addClass('erro');
				enviar = false;
			}*/

			if(cnpj == ''){
				jQuery('#cnpj').parent().addClass('erro');
				enviar = false;
			}
		}

		if(email == ''){
			jQuery('#email').parent().addClass('erro');
			enviar = false;
		}

		/*if(telefone == ''){
			jQuery('#telefone').parent().addClass('erro');
			enviar = false;
		}

		if(celular == ''){
			jQuery('#celular').parent().addClass('erro');
			enviar = false;
		}*/

		if(endereco == ''){
			jQuery('#endereco').parent().addClass('erro');
			enviar = false;
		}

		if(numero == ''){
			jQuery('#numero').parent().addClass('erro');
			enviar = false;
		}

		if(bairro == ''){
			jQuery('#bairro').parent().addClass('erro');
			enviar = false;
		}

		if(cidade == ''){
			jQuery('#cidade').parent().addClass('erro');
			enviar = false;
		}

		if(uf == ''){
			jQuery('#uf').parent().addClass('erro');
			enviar = false;
		}

		if(cep == ''){
			jQuery('#cep').parent().addClass('erro');
			enviar = false;
		}

		if(senha == ''){
			jQuery('#senha').parent().addClass('erro');
			enviar = false;
		}

		if(!enviar){
			jQuery('.msg-form').html('Todos os campos são obrigatórios.');
			jQuery('.enviar').html('Alterar').prop( "disabled", false );
			return false;
		}else{
			//jQuery('form').submit();
			//jQuery('form').trigger("reset");
			jQuery('.enviar').html('Alterar').prop( "disabled", false );
		}
	});

	jQuery(document).ready(function(){
		jQuery('input.pessoa').click(function(){
			jQuery('.inputPessoa').hide();
			jQuery(jQuery(this).attr('value')).show();
		});
	});

	jQuery(document).ready(function(){
		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});
	})

	jQuery(function(jQuery){
		url = jQuery(location).attr('hash');
		if(url == '#novo-pedido'){
			page = 'Novo Pedido';
			content = '#novo-pedido';
			menu = '#menu-novo-pedido';
		}

		if(url == '#meus-pedidos'){
			page = 'Meus Pedidos';
			content = '#meus-pedidos';
			menu = '#menu-meus-pedidos';
		}

		if((url == '#meus-dados/atualizado') || (url == '#meus-dados')){
			page = 'Meus Dados';
			content = '#meus-dados';
			menu = '#menu-meus-dados';
		}

		jQuery('.list-menu li').removeClass('active');
		jQuery('.cont-tab-area').removeClass('active');

		jQuery('#page-area').html(page);
		jQuery(content).addClass('active');
		jQuery(menu).addClass('active');

		/*if(jQuery('body').height() < jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}*/
	});
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
<script type="text/javascript">
	jQuery(function(jQuery){
	   jQuery(".mask-telefone").mask("(99) 9999-9999?9");
	   jQuery(".mask-cpf").mask("999.999.999-99");
	   jQuery(".mask-cnpj").mask("99.999.999/9999-99");
	   jQuery(".mask-cep").mask("99999-999");
	});
</script>