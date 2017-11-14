<?php 
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
?>

<li class="col-4">
	<a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $imagem[0]; ?>');" title="<?php the_title(); ?>">
		<div class="mask">

			<?php if(get_field('video_galeria')) { ?>
				
			<?php } ?>

			<?php if(get_field('galeria')) { ?>
				<i class="fa fa-camera" aria-hidden="true"></i>
			<?php }elseif(get_field('video_galeria')) { ?>
				<i class="fa fa-play" aria-hidden="true"></i>
			<?php }else{ ?>
				<i class="fa fa-link" aria-hidden="true"></i>
			<?php } ?>

		</div>
	</a>

	<h3><?php the_title(); ?></h3>
</li>