<section class="box-content" id="goScrollOn">
	<div class="container">

		<h2>Construtechs</h2>
		<h3><?php the_field('subtitulo'); ?></h3>

		<div class="content-txt">
			<?php the_content(); ?>
		</div>

		<?php if( have_rows('portfolio') ): ?>
			
			<div class="row">
				<?php while ( have_rows('portfolio') ) : the_row(); ?>
					<div class="item col-3 list-portfolio">
						<img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo'); ?>" class="img-portfolio">
						<h5><?php the_sub_field('titulo'); ?></h5>
						<p><?php the_sub_field('resumo'); ?></p>
						<div class="ico-link">
							<?php if(get_sub_field('facebook')){ ?>
								<a href="<?php the_sub_field('facebook') ?>" target="_blank" title="Facebook">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_facebook.jpg" title="Facebook">
								</a>
							<?php } ?>

							<?php if(get_sub_field('link')){ ?>
								<a href="<?php the_sub_field('link') ?>" target="_blank" title="Visitar">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_link.jpg" title="Visitar">
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