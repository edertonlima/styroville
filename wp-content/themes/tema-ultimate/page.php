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
								<?php echo the_title(); ?>
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

				<div class="col-4 sidebar">

					<?php include 'sidebar-empresa.php'; ?>
					<?php include 'sidebar-noticias.php'; ?>

				</div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>

<script type="text/javascript">
	<?php if($post->post_name == 'area-de-atuacao'){ ?>

		jQuery(document).ready(function(){
			jQuery('.nav ul li.menu-area-de-atuacao').addClass('active');
		});
	
	<?php }else{

		if($post->post_name == 'qualidade'){ ?>

			jQuery(document).ready(function(){
				jQuery('.nav ul li.menu-qualidade').addClass('active');
			});
		
		<?php }else{ ?>

			jQuery(document).ready(function(){
				jQuery('.nav ul li.menu-empresa').addClass('active');
			});

		<?php } 
	} ?>
</script>