<?php get_header(); ?>

		<div class="header-tit">
			<div class="image-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg_header.jpg');"></div>

			<h2><?php echo get_the_archive_title(); ?></h2>

			<ul class="breadcrumbs">
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li><strong><?php echo get_the_archive_title(); ?></strong></li>
			</ul>
		</div>
	</header>

	<section class="box-content box-post box-post-list box-projetos list-projetos">
		<div class="container">

			<ul class="row list-post">

				<?php 
				while ( have_posts() ) : the_post();

					get_template_part( 'content-list-projetos' );

				endwhile;
				?>

			</ul>

		</div>
	</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){


	});

	jQuery(window).resize(function(){

	});
</script>