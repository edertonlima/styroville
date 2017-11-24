<?php get_header(); ?>

	<section class="box-content fale-conosco">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h2>
						FALE CONOSCO
					</h2>
				</div>

				<div class="col-9">

					<?php
						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content-page', 'post' );

						endwhile;
						wp_reset_query();
					?>
					
				</div>

				<div class="col-3 sidebar">

					<?php include 'menu-empresa.php'; ?>

					<div class="sidebar-block noticias">
						<h2>NOTÍCAS</h2>

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
		jQuery('.nav ul li.menu-fale-conosco').addClass('active');
	});
</script>