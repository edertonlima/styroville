<section class="box-content" id="goScrollOn">
	<div class="container">

		<h2>Construtechs</h2>
		<h3><?php the_field('subtitulo'); ?></h3>

		<div class="content-txt">
			<?php the_content(); ?>
		</div>

		<?php if( have_rows('equipe') ): ?>
			
			<div class="row">
				<?php while ( have_rows('equipe') ) : the_row(); ?>
					<div class="item col-3 list-portfolio">
						<div class="border-img">
							<?php $image = get_sub_field('imagem'); ?>
							<?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>							
						</div>
						<h5><?php the_sub_field('titulo'); ?></h5>
						<p><?php the_sub_field('resumo'); ?></p>
						<div class="ico-link">
							<?php if(get_sub_field('linkedin')){ ?>
								<a href="<?php the_sub_field('linkedin') ?>" target="_blank" title="Linkedin">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_linkedin.jpg" title="Linkedin">
								</a>
							<?php } ?>

							<?php if(get_sub_field('email')){ ?>
								<a href="mailto:<?php the_sub_field('email') ?>" target="_blank" title="Enviar e-mail">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_email.jpg" title="Enviar e-mail">
								</a>
							<?php } ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>		

		<?php endif; ?>

	</div>
</section>

<button type="button" class="ver-mais" style="display: none;">Ver mais</button>