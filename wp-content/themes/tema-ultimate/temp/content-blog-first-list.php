
<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
	
<div class="col-12 first-post">
	<div class="row">
		
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="col-6">
		<div class="cont-list col-6">
			<h5><?php the_title(); ?></h5>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="btn leia-mais" title="leia mais">leia mais</a>
		</div>

	</div>
</div>