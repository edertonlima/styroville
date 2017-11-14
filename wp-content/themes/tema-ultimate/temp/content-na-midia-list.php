
<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	
<div class="item list-na-midia">
	<div class="col-4">
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="">
	</div>

	<div class="col-8">	
		<div class="cont-list">
			<h4><?php the_title(); ?></h4>
			<div class="info-post">
				<?php echo ucfirst(get_the_date()); ?>
				<br>Por <?php echo get_the_author_meta('first_name'); ?>
			</div>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="post-completo" title="Leia o artigo completo">Leia o artigo completo</a>
		</div>
	</div>
</div>