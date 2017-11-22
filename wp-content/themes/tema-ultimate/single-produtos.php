<?php get_header(); ?>

	<?php $terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' ); //var_dump($terms); ?>
	<?php $post_type = get_post_type_object( $post->post_type ); ?>

	<?php //$taxonomy = get_queried_object(); var_dump($taxonomy) ?>

	<section class="box-content produto det-produto">
		<div class="container">

			<div class="row">
				<div class="col-12">

					<h2>
						<a href="<?php echo get_home_url(); ?>/produtos" title="PRODUTOS">
							PRODUTOS 
						</a>
						<span>
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<a href="<?php echo get_category_link($terms[0]->term_id); ?>" title="<?php echo $terms[0]->name; ?>">
								<?php echo $terms[0]->name; ?>
							</a>

							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<?php the_title(); ?>
						</span>

						<?php 
							if((isset($_SESSION['id'])) and ($_SESSION['id'] != '')){ ?>
								<a href="javascript: logOff();" class="logOff" title="Sair">
									Sair <i class="fa fa-sign-out" aria-hidden="true"></i>
								</a>
							<?php }
						?>
					</h2>

				</div>

				<div class="col-9">
					<div class="row">
						<?php
							while ( have_posts() ) : the_post(); 
								
								get_template_part( 'content-produtos', 'post' );

							endwhile;
							wp_reset_query();
						?>
					</div>
				</div>

				<div class="col-3 sidebar">
					<h2>CATEGORIAS</h2>
					<ul class="list-menu">

						<?php
							$args = array(
							    'taxonomy'      => 'produtos_taxonomy',
							    'parent'        => 0,
							    'orderby'       => 'name',
							    'order'         => 'ASC',
							    'hierarchical'  => 1,
							    'pad_counts'    => true,
							    'hide_empty'    => 0
							);
							$categories = get_categories( $args );
							foreach ( $categories as $categoria ){ ?>

								<li class="<?php if($categoria->term_id == $terms[0]->term_id){ echo 'active'; } ?>">
									<a href="<?php echo get_category_link($categoria->term_id); ?>" title="<?php echo $categoria->name; ?>">
										<i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $categoria->name; ?>
									</a>
								</li>

								<?php
							}
						?>

					</ul>
				</div>
			</div>

		</div>
	</section>

	<?php 
		$posts = get_field('produtos_relacionados');
		if( $posts ): ?>
		
			<section class="box-content produto list-produto prod-relacionado">
				<div class="container">

					<div class="row">
						<div class="col-9">
							
							<h2>Produtos Relacionados</h2>

							<?php
								foreach( $posts as $post):
									setup_postdata($post);

									get_template_part( 'content-produtos-list', 'post' );

								endforeach;
								wp_reset_postdata();
							?>

						</div>
					</div>

				</div>
			</section>
			
		<?php endif;
	?>

<?php get_footer(); ?>