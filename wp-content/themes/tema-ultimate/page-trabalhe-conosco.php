<?php get_header(); ?>

	<section class="box-content empresa">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h2>
						<?php if(($post->post_name == 'area-de-atuacao') or($post->post_name == 'qualidade')){ 
							the_title();						
						}else{ ?>
							<a href="<?php echo get_home_url(); ?>/empresa" title="EMPRESA">
								EMPRESA
							</a>
							<span>
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<?php the_title(); ?>
							</span>
						<?php } ?>
					</h2>
				</div>

				<div class="col-8">

					<?php
						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content', 'post' );

						endwhile;
						wp_reset_query();
					?>

					<p><?php the_excerpt(); ?></p>

					<form>
						
					</form>
					
				</div>

				<div class="col-4 sidebar">

					<?php include 'sidebar-empresa.php'; ?>
					<?php include 'sidebar-noticias.php'; ?>

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