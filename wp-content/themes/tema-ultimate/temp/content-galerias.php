<?php 
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
?>

<?php if((get_the_excerpt()) or (get_field('video_galeria'))){ ?>
	<section class="box-content box-post det-post det-galerias box-page-sobre">
		<div class="container">

			<div class="row">

				<div class="col-12">
					<div class="text-detalhe">
						<?php echo the_excerpt(); ?>
					</div>
				</div>

			</div>

			<?php if(get_field('video_galeria')) { ?>
				<div class="row">
					<div class="col-12">

						<?php the_field('video_galeria'); ?>

					</div>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<?php if( have_rows('galeria') ): ?>
	<section class="box-content box-post box-post-list box-projetos det-galerias <?php if((get_the_excerpt()) or (get_field('video_galeria'))){ echo 'no-padding-top'; }?>">
		<div class="container">

			<ul class="row list-post">

				
				<?php while ( have_rows('galeria') ) : the_row(); ?>

					<li class="col-3">
						<a href="<?php the_sub_field('imagem'); ?>" data-fancybox="galeria" style="background-image: url('<?php the_sub_field('imagem'); ?>');" data-caption="<?php the_sub_field('texto_galeria'); ?>">
							<div class="mask">
								<i class="fa fa-camera" aria-hidden="true"></i>
							</div>
						</a>
					</li>

				<?php endwhile; ?>
				
			</ul>

		</div>
</section>
<?php endif; ?>

<script type="text/javascript">
	jQuery(document).ready(function(){


	});

	jQuery(window).resize(function(){

	});
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {		
		jQuery('.fancybox').fancybox();	
	});
</script>