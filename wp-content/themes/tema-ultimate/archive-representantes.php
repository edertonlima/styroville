
<?php get_header(); ?>

<?php

	query_posts(
		array(
			'post_type' => 'representantes',
			'posts_per_page' => -1
		)
	);
	while ( have_posts() ) : the_post();

		$representantes[] = array(
			'ID' => $post->ID,
			'nome' => $post->post_title,
			'estado' => get_field('estado_representantes',$post->ID),
			'cidade' => get_field('cidade_representantes',$post->ID),
			'email' => get_field('e-mail_representantes',$post->ID),
			'telefone' => get_field('telefone_representantes',$post->ID),
			'celular' => get_field('celular_representantes',$post->ID),
			'whatsapp' => get_field('whatsapp_representantes',$post->ID),
			'skype' => get_field('skype_representantes',$post->ID)
		);

	endwhile;
	wp_reset_query();
?>

	<section class="box-content representantes">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h2>
						<a href="<?php echo get_home_url(); ?>/empresa" title="EMPRESA">
							EMPRESA
						</a>
						<span>
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							REPRESENTANTES
						</span>
					</h2>
				</div>

				<div class="col-8">
					<div class="content-txt">
						<p class="center">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac fringilla lorem. Nunc ullamcorper ipsum quis lorem auctor efficitur. Donec mattis condimentum euismod.
						</p>

						<h4 class="center">Selecione seu estado e sua cidade paraencontrar o<br>representante mais próximo:</h4>
					</div>

					<div class="col-6">
						<div class="select">
							<select name="estado" id="estado">
								<option value="Selecione um Estado">Selecione um Estado</option>
								
								<?php 
									foreach ($representantes as $key => $value) { 
										$estados[] = $value['estado'];
									}

									foreach (array_unique($estados) as $estado) { ?>
										<option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
									<?php }
								?>									

							</select>
						</div>
					</div>	

					<div class="col-6">
						<div class="select">
							<select name="cidade" id="cidade" disabled>
								<option value="">Selecione uma Cidade</option>
							</select>
						</div>
					</div>

					<div class="col-12">
						<ul class="list-representantes"></ul>
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
	<?php 
		echo 'var representantes = '. json_encode($representantes).';';
	?>

	jQuery('form.login').submit(function(event){

		jQuery('.enviar').html('Enviando').prop( "disabled", true );
		jQuery('.msg-form').removeClass('erro ok').html('');

		var usuario = jQuery('#usuario').val();
		var senha = jQuery('#senha').val();		

		var enviar = true;

		if(usuario == ''){
			jQuery('#usuario').parent().addClass('erro');
			enviar = false;
		}

		if(senha == ''){
			jQuery('#senha').parent().addClass('erro');
			enviar = false;
		}

		if(!enviar){
			jQuery('.msg-form').html('Todos os campos são obrigatórios.');
			jQuery('.enviar').html('Entrar').prop( "disabled", false );
			return false;
		}else{
			jQuery('.enviar').html('Enviar').prop( "disabled", false );
			//event.preventDefault();
		}		
		
	});

	/*jQuery(".enviar").click(function(){

	});*/

	jQuery(document).ready(function(){

		jQuery("#estado").change(function(){
			var cidade = '<option value="Selecione uma Cidade">Selecione uma Cidade</option>';
			val_estado = jQuery('#estado option:selected').val();
			var cidades = [];

			if(val_estado != 'Selecione um Estado'){

				jQuery.each(representantes, function (key, val) {
					if(val.estado == val_estado) {
						cidades.push(val.cidade);
					}
				});
				cidades = cidades.filter(function(elem, pos, self) {
					return self.indexOf(elem) == pos;
				});

				jQuery.each(cidades, function (key, val) {
					cidade += '<option value="' + val + '">' + val + '</option>';
				});

				jQuery("#cidade").html(cidade).prop('disabled', false);
			}else{
				jQuery('#cidade').html(cidade).prop('disabled', true);
			}
		}).change();

		jQuery("#cidade").change(function(){
			val_cidade = jQuery('#cidade option:selected').val();
			val_estado = jQuery('#estado option:selected').val();
			list_representantes = '';

			if(val_cidade != 'Selecione uma Cidade'){
				jQuery.each(representantes, function (key, val) { //alert(val.cidade);
					if((val.estado == val_estado) && (val.cidade == val_cidade)) { //alert(val.estado+' = '+val_estado);

						list_representantes += '<li>';
						list_representantes += '<h3>'+val.nome+'</h3><div class="content-txt">';

						if(val.email != ''){
							list_representantes += '<span><strong>E-mail</strong>'+val.email+'</span>'
						}

						if(val.telefone != ''){
							list_representantes += '<span><strong>Telefone</strong>'+val.telefone+'</span>'
						}

						if(val.celular != ''){
							list_representantes += '<span><strong>Celular</strong>'+val.celular+'</span>'
						}

						if(val.whatsapp != ''){
							list_representantes += '<span><strong>Whatsapp</strong>'+val.whatsapp+'</span>'
						}

						if(val.skype != ''){
							list_representantes += '<span><strong>Skype</strong>'+val.skype+'</span>'
						}

						list_representantes += '</div></li>';
					}
				});
			}

			jQuery('.list-representantes').append(list_representantes);
		}).change();

		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

	})
</script>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.nav ul li.menu-empresa').addClass('active');
	});
</script>