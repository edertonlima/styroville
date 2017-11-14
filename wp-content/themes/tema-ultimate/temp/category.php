<?php get_header(); ?>

<section class="box-content post list-post" id="goScrollOn">
	<div class="container">

		<nav class="nav-tab">
			<ul>
				<li class="active"><a href="javascript:" rel="#blog" title="Blog">Blog</a></li>
				<li><a href="javascript:" rel="#na-midia" title="Na Mídia">Na Mídia</a></li>
				<li><a href="javascript:" rel="#releases" title="Releases">Releases</a></li>
			</ul>
		</nav>

		<div class="content-tab">
			<div class="tab active" id="blog">
				<h2>Novidades</h2>
				<h3><?php echo category_description(); ?></h3>

				<div class="row">
					<?php
					$count_post = 0;

					while ( have_posts() ) : the_post();

						$count_post = $count_post+1;
						if($count_post == 1){
							get_template_part( 'content-blog-first-list', 'page' );
						}else{
							get_template_part( 'content-blog-list', 'page' );
						}

					endwhile;
					?>
				</div>
			</div>

			<div class="tab" id="na-midia">
				<h2>Construtechs</h2>
				<h3>na mídia</h3>

				<div class="row na-midia">

					<?php
						query_posts(
							array(
								'post_type' => 'na-midia',
							)
						);

						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content-na-midia-list', 'page' );

						endwhile;
						wp_reset_query();
					?>

				</div>
			</div>

			<div class="tab" id="releases">
				<h2>Releases de Imprensa</h2>

				<div class="row na-midia">

					<?php
						query_posts(
							array(
								'post_type' => 'releases',
							)
						);

						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content-releases-list', 'page' );

						endwhile;
						wp_reset_query();
					?>

				</div>
			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.nav-tab a').click(function(){
			jQuery('.nav-tab li').removeClass('active');
			jQuery(this).parent().addClass('active');

			jQuery('.content-tab .tab').removeClass('active');
			jQuery(jQuery(this).attr('rel')).addClass('active');
		});
	});
</script>