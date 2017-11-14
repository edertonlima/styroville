<?php get_header(); ?>

<section class="box-content produto list-produto">
	<div class="container">

		<div class="row">
			<div class="col-9">

				<h2>PRODUTOS</h2>

				<div class="row">
					<?php
						while ( have_posts() ) : the_post(); 
							
							get_template_part( 'content-produto-list', 'post' );

						endwhile;
						wp_reset_query();
					?>
				</div>

			</div>

			<div class="col-3">
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

							<li>
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

<?php get_footer(); ?>