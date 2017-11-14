
<?php 
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
	$terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' );
?>
	
<div class="col-12 first-post ecosistema">
	<div class="row">
		
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="col-6">
		<div class="cont-list col-6">
			<h5>
				<a href="<?php echo get_home_url(); ?>/<?php echo $post_type->name; ?>" title="<?php echo $terms[0]->name; ?>">
					<?php echo $terms[0]->name; ?>
				</a>
			</h5>
			<h4><?php the_title(); ?></h4>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="btn leia-mais" title="leia mais">leia mais</a>
		</div>

	</div>
</div>