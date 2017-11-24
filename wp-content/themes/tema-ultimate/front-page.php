<?php get_header(); ?>


<section class="box-content">
	<div class="container">

		<div class="row">
			<div class="col-8">
				<h2 class="tit-area"><?php the_field('subtitulo',get_page_by_path('empresa')->ID); ?></h2>

				<div class="row">

					<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(get_page_by_path('empresa')->ID), 'medium' );
						if($imagem[0]){ ?>
							<img src="<?php echo $imagem[0]; ?>" class="img-page col-8">
						<?php }
					?>

					<div class="col-4">
						<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>">
						<p></p>
						<p><?php echo get_the_excerpt(get_page_by_path('empresa')->ID); ?></p>
						<a href="<?php echo get_home_url(); ?>/empresa" title="Mais Notícias" class="mais-item">
							<i class="fa fa-caret-right" aria-hidden="true"></i> Saiba mais
						</a>
					</div>

				</div>
			</div>

			<div class="col-4 sidebar">

				<div class="sidebar-block noticias">
					<h2>NOTÍCIAS</h2>

					<ul class="list-noticias">
						<?php query_posts(
							array(
								'post_type' => 'post',
								'posts_per_page' => 3
							)
						);

						while ( have_posts() ) : the_post(); 
							get_template_part( 'content-noticias-list', 'post' );
						endwhile;
						wp_reset_query(); ?>
					</ul>
					<a href="<?php echo get_home_url(); ?>/noticias" title="Mais Notícias" class="mais-item">
						<i class="fa fa-caret-right" aria-hidden="true"></i> Mais Notícias
					</a>
				</div>

			</div>
		</div>

	</div>
</section>

<?php /*
<section class="box-content box-comofunciona" id="goScrollOn">
	<div class="container">

		<h2>Como Funciona</h2>
		<h3>Somos Venture Builders</h3>

		<div class="row">
			<div class="col-4 ico-comofunciona">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/como-funciona/ico-1.png">
				<h4>Recrutamento Founders</h4>
				<p>Buscamos pessoas com o espírito empreendedor, motivados a gerar impacto através da tecnologia, resolvendo problemas reais.</p>
			</div>

			<div class="col-4 ico-comofunciona">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/como-funciona/ico-2.png">
				<h4>Formamos um Time</h4>
				<p>Juntos co-criamos, formamos um time, prototipamos soluções, validamos modelos de negócios escaláveis.</p>
			</div>

			<div class="col-4 ico-comofunciona">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/como-funciona/ico-3.png">
				<h4>Investimos para Crescer</h4>
				<p>Investimos no negócio para desenvolver produtos incríveis e trilhar o caminho do crescimento.</p>
			</div>
		</div>

	</div>
</section>

<section class="box-content box-comofunciona cinza">
	<div class="container">

		<div class="row">
			<div class="col-10 metodologia">
				<h2>Também investimos em Construtechs</h2>
				<h4>Procuramos Startups que estejam desenvolvendo soluções para a cadeia da construção e mercado imobiliário. O que avaliamos?</h4>
			</div>
		</div>

	</div>
</section>

<section class="box-content no-padding-top box-comofunciona">
	<div class="container">

		<div class="row">
			<div class="col-4 mar-left-1 ico-comofunciona">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/como-funciona/ico-1.png">
				<h4>Recrutamento Founders</h4>
				<p>Buscamos pessoas com o espírito empreendedor, motivados a gerar impacto através da tecnologia, resolvendo problemas reais.</p>
			</div>

			<div class="col-4 mar-left-2 ico-comofunciona">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/como-funciona/ico-2.png">
				<h4>Formamos um Time</h4>
				<p>Juntos co-criamos, formamos um time, prototipamos soluções, validamos modelos de negócios escaláveis.</p>
			</div>

			<div class="col-4 mar-left-1 ico-comofunciona">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/como-funciona/ico-1.png">
				<h4>Recrutamento Founders</h4>
				<p>Buscamos pessoas com o espírito empreendedor, motivados a gerar impacto através da tecnologia, resolvendo problemas reais.</p>
			</div>

			<div class="col-4 mar-left-2 ico-comofunciona">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/como-funciona/ico-2.png">
				<h4>Formamos um Time</h4>
				<p>Juntos co-criamos, formamos um time, prototipamos soluções, validamos modelos de negócios escaláveis.</p>
			</div>
		</div>

	</div>	
</section>

<section class="box-content">
	<div class="container">

		<h2>Construtechs</h2>
		<h3><?php the_field('subtitulo',79); ?></h3>

		<?php if( have_rows('portfolio',79) ): ?>
			
			<div class="owl-carousel owl-theme startups">
				<?php while ( have_rows('portfolio',79) ) : the_row(); ?>
					<a href="<?php the_sub_field('link',79); ?>" target="_blank" title="<?php the_sub_field('titulo',79); ?>" class="item">
						<img src="<?php the_sub_field('imagem',79); ?>" alt="<?php the_sub_field('titulo',79); ?>">
					</a>
				<?php endwhile; ?>
			</div>		

		<?php endif; ?>

	</div>	
</section>

<?php get_template_part( 'content-contato', 'page' ); ?>

<section class="box-content">
	<div class="container">

		<h2>Construtechs</h2>
		<h3>na mídia</h3>

		<?php query_posts(
			array(
				'post_type' => 'na-midia',
				'posts_per_page' => 12
			)
		); ?>

		<div class="owl-carousel owl-theme na-midia">
			<?php while ( have_posts() ) : the_post(); 
				$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item">
					<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>">
				</a>

			<?php endwhile;
			wp_reset_query(); ?>
		</div>

	</div>	
</section>

<?php */ get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery('.owl-carousel.startups').owlCarousel({
		loop: false,
		center: false,
		nav: false,
		margin: 20,
		responsive: {
			500: {
				items: 1
			},
			768: {
				items: 3
			}
		}
	});
</script>
