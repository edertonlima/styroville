<?php 
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
?>

<li class="col-4">
	<a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $imagem[0]; ?>');" title="<?php the_title(); ?>">
		<div class="mask">
			<i class="fa fa-link" aria-hidden="true"></i>
		</div>
	</a>

	<h3><?php the_title(); ?></h3>
	<p><?php the_excerpt(); ?></p>
	<a href="<?php the_permalink(); ?>" class="leia-mais" title="<?php the_title(); ?>">
		<i class="fa fa-file-text-o" aria-hidden="true"></i>
		Leia mais
	</a>
</li>