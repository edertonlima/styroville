<div class="item list-na-midia">
	<div class="col-12">	
		<div class="cont-list">
			<h4><?php the_title(); ?></h4>
			<h5><?php the_field('subtitulo'); ?></h5>
			<div class="info-post">
				<?php if (get_field('localizacao')) { ?>
					<?php the_field('localizacao'); echo ', ('.ucfirst(get_the_date()).')'; ?>,
				<?php }else{ ?>
					<?php echo ucfirst(get_the_date()); ?>
				<?php } ?>
				<br>Por <?php echo get_the_author_meta('first_name'); ?>
			</div>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="post-completo" title="Leia o artigo completo">Leia o artigo completo</a>
		</div>
	</div>
</div>