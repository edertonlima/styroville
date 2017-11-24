
<h3><?php the_field('subtitulo'); ?></h3>

<div class="content-txt">
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
		if($imagem[0]){ ?>
			<img src="<?php echo $imagem[0]; ?>" class="img-page col-5">
		<?php }
	?>
	<?php the_content(); ?>
</div>