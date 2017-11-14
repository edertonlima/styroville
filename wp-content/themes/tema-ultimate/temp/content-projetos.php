<?php 
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
?>

<section class="box-content box-post det-post">
	<div class="container">

		<div class="row">

			<div class="col-5">
				<img src="<?php echo $imagem[0]; ?>" alt="">
			</div>

			<div class="col-7">
				<?php echo the_content(); ?>
			</div>

		</div>

		<div class="row galeria">
			<div class="col-9">

				<?php if( have_rows('galeria') ):
					while ( have_rows('galeria') ) : the_row(); ?>

						<?php if(get_sub_field('imagem')){ ?>
							<img src="<?php the_sub_field('imagem'); ?>" />
						<?php } ?>

						<?php if(get_sub_field('texto_galeria')){ ?>
							<p class="txt-sup">
								<?php the_sub_field('texto_galeria'); ?>
							</p>
						<?php } ?>

					<?php endwhile;
				endif; ?>

			</div>
			<div class="col-3">
				<?php the_field('texto_secundario') ?>
			</div>
		</div>

	</div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function(){


	});

	jQuery(window).resize(function(){

	});
</script>