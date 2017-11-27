<?php get_header(); ?>

	<section class="box-content fale-conosco">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h2>
						FALE CONOSCO
					</h2>
				</div>

				<div class="col-8">

					<?php
						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content-page', 'post' );

						endwhile;
						wp_reset_query();
					?>
					
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
		jQuery('.nav ul li.menu-fale-conosco').addClass('active');
	});
</script>