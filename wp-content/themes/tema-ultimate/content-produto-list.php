<div class="col-4">
	<a href="<?php the_permalink(); ?>" class="item-produto">
		<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="">

		<div class="cont-list">
			<h4><?php the_title(); ?></h4>
			<div class="review">
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star off" aria-hidden="true"></i>
				<i class="fa fa-star off" aria-hidden="true"></i>
				<span>5 avaliações</span>
			</div>
		</div>	
	</a>
</div>