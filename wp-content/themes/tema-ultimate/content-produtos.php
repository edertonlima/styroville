<div class="col-6">
	<ul class="galeria-equipamento">
		<li class="img-principal">
			<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); ?>
			<?php $imagem2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
			<a href="<?php echo $imagem2[0]; ?>" class="fancybox" data-fancybox="galeria"><img src="<?php echo $imagem[0]; ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
		</li>
		<?php 
		$galeria = get_field('galeria');
		if( $galeria ):
			foreach( $galeria as $imagem ): ?>
			<li><a href="<?php echo $imagem['url']; ?>" class="fancybox" data-fancybox="galeria"><img src="<?php echo $imagem['sizes']['thumbnail']; ?>"/></a></li>
		<?php endforeach; ?>
	<?php endif; ?>
	</ul>
</div>	

<div class="col-6">
	<div class="cont-det">
		<h3><?php the_title(); ?></h3>

		<div class="review">
			<?php 
				if( have_rows('avaliacao') ) {

					$avaliacoes = get_field('avaliacao' );
					foreach($avaliacoes as $avaliacao){ 
						$nota[] = $avaliacao['nota'];
					}

					$qtd_estrela = array_sum($nota) / count(array_filter($nota)); 

					for($i=1; $i <= 5; $i++){
						if($i <= $qtd_estrela){ ?>

							<i class="fa fa-star" aria-hidden="true"></i>

						<?php }else{ ?>

							<i class="fa fa-star off" aria-hidden="true"></i>

						<?php }
					}

				}else{

					for($i=1; $i <= 5; $i++){ ?>

						<i class="fa fa-star off" aria-hidden="true"></i>

					<?php }
				}
			?>

			<span>
				<?php 
					if( have_rows('avaliacao') ) {

						if(count($avaliacoes) == 1){
							echo '1 avaliação';
						}else{
							echo count($avaliacoes).' avaliações';
						}

					}else{

						echo '0 avaliações';
						
					}
				?>				
			</span>
		</div>

		<?php the_excerpt(); ?>
		<a href="<?php echo get_home_url(); ?>/minha-area" title="Solicitar Orçamento" class="btn orcamento">
			<i class="fa fa-paper-plane" aria-hidden="true"></i>
			Solicitar Orçamento
		</a>
	</div>	
</div>

<div class="col-12">
	<div class="cont-det">
		
		<nav class="nav-tab">
			<ul>
				<li class="active"><a href="javascript:" rel="#descricao" title="Descrição"><h2>Descrição</h2></a></li>

				<?php if( have_rows('avaliacao') ): ?>
					<li><a href="javascript:" rel="#avaliacoes" title="Avaliações"><h2>Avaliações</h2></a></li>
				<?php endif; ?>

				<?php if(get_field('video')){ ?>
					<li><a href="javascript:" rel="#video-demonstrativo" title="Vídeo Demonstrativo"><h2>Vídeo Demonstrativo</h2></a></li>
				<?php } ?>
			</ul>
		</nav>
		

		<div class="content-tab">
			<div class="tab active" id="descricao">
				<?php the_content(); ?>
			</div>

			<?php if( have_rows('avaliacao') ): ?>
				<div class="tab" id="avaliacoes">				
						
					<ul class="avaliacoes">
						<?php while ( have_rows('avaliacao') ) : the_row(); ?>

							<li>
								<?php $image = get_sub_field('foto'); ?>
								<?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>	

								<div class="cont-avaliacao">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
									<p><?php the_sub_field('depoimento'); ?></p>
									<h3><?php the_sub_field('nome'); ?></h3>
								</div>
							</li>

						<?php endwhile; ?>
					</ul>
					
				</div>
			<?php endif; ?>

			<?php if(get_field('video')){ ?>
				<div class="tab" id="video-demonstrativo">
					<?php the_field('video'); ?>
				</div>
			<?php } ?>
		</div>

	</div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {		
		jQuery('.fancybox').fancybox();	
	});
</script>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.nav-tab a').click(function(){
			jQuery('.nav-tab li').removeClass('active');
			jQuery(this).parent().addClass('active');

			jQuery('.content-tab .tab').removeClass('active');
			jQuery(jQuery(this).attr('rel')).addClass('active');
		});
	});
</script>