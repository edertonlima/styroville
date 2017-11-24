<?php get_header(); ?>

	<section class="box-content empresa">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h2>
						<a href="<?php echo get_home_url(); ?>/empresa" title="EMPRESA">
							EMPRESA
						</a>
						<span>
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<?php echo the_title(); ?>
						</span>
					</h2>
				</div>

				<div class="col-9">

					<?php
						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content-page', 'post' );

						endwhile;
						wp_reset_query();
					?>

					<?php if(is_page(124)){ ?>
						<div class="content-txt">
							<div class="col-4">
								<h4>Missão</h4>
								<p><?php the_field('missao'); ?></p>
							</div>

							<div class="col-4">
								<h4>Visão</h4>
								<p><?php the_field('visao'); ?></p>
							</div>

							<div class="col-4">
								<h4>Valores</h4>
								<p><?php the_field('valores'); ?></p>
							</div>
						</div>
					<?php } ?>
					
				</div>

				<div class="col-3 sidebar">

					<?php include 'menu-empresa.php'; ?>

					<div class="sidebar-block noticias">
						<h2>NOTÍCIAS</h2>

						<ul class="list-noticias">
							<?php query_posts(
								array(
									'post_type' => 'post',
									'posts_per_page' => 3
								)
							);

							while ( have_posts() ) : the_post(); 
								get_template_part( 'content-noticias-list', 'post' );
							endwhile;
							wp_reset_query(); ?>
						</ul>
						<a href="<?php echo get_home_url(); ?>/noticias" title="Mais Notícias" class="mais-item">
							<i class="fa fa-caret-right" aria-hidden="true"></i> Mais Notícias
						</a>
					</div>

				</div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.nav ul li.menu-empresa').addClass('active');
	});
</script>