<?php 
	$terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' );
?>

<section class="box-content post det-post" id="goScrollOn">
	<div class="container">

		<div class="row na-midia">

			<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>				
			<div class="list-na-midia">
				<div class="col-4">
					<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-det-single">
				</div>

				<div class="col-8">	
					<div class="cont-list">
						<h5>
							<a href="<?php echo get_home_url(); ?>/<?php echo $post_type->name; ?>" title="<?php echo $terms[0]->name; ?>">
								<?php echo $terms[0]->name; ?>
							</a>
						</h5>
						<h4><?php the_title(); ?></h4>
						<?php if (get_field('subtitulo')) { ?>
							<h5><?php the_field('subtitulo'); ?></h5>
						<?php } ?>
						<?php the_excerpt(); ?>
					</div>
				</div>

				<div class="col-12">	
					<div class="cont-list content-txt">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>