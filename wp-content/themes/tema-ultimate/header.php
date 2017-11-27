<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php 
	$titulo_princ = get_field('titulo', 'option');
	$descricao_princ = get_field('descricao', 'option');
	$imagem_princ = get_field('imagem_principal', 'option');
	$url = get_home_url();
	$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );

	if(is_tax()){
		$terms = get_queried_object();
		$titulo = $terms->name;
		$descricao = $terms->description;
		$imagem = get_field('imagem_listagem',$terms->taxonomy.'_'.$terms->term_id);
		$url = get_term_link($terms->term_id);
	}

	if(is_archive()){
		$titulo = get_field('titulo_pagina','option');
		$descricao = get_field('descricao_pagina','option');
		$imagem = get_field('imagem_pagina','option');
		$url = $url.'/produtos';
	}

	if(is_single()){
		$titulo = get_the_title();
		$descricao = get_the_excerpt();
		
		if($imgPage[0] != ''){
			$imagem = $imgPage[0];	
		}			
		$url = get_the_permalink();
	}

	if($titulo == ''){
		$titulo = $titulo_princ;
	}else{
		$titulo = $titulo.' - '.$titulo_princ;
	}
	
	if($descricao == ''){
		$descricao = $descricao_princ;
	}

	$autor = '';
?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $imagem; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $imagem; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo $titulo_princ; ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css" type="text/css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){

		jQuery('.menu-mobile').click(function(){
			if(jQuery(this).hasClass('active')){
				jQuery('.nav').css('top','-110vh');
				jQuery(this).removeClass('active');
				jQuery('.header').removeClass('active');
			}else{
				jQuery('.nav').css('top','0px');
				jQuery(this).addClass('active');
				jQuery('.header').addClass('active');
			}
		});

		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 400){
			jQuery('.header').addClass('scroll_menu');
		}
	});	

	jQuery(window).load(function(){
		if(((jQuery('body').height())+100) < jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});
	
	jQuery(window).resize(function(){
		/*jQuery('.menu-mobile').removeClass('active');
		jQuery('.header').removeClass('active');
		jQuery('.nav').css('top','-110vh'); */

		if(((jQuery('body').height())+100) < jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});

	jQuery(window).scroll(function(){
		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 400){
			jQuery('.header').addClass('scroll_menu');
		}else{
			jQuery('.header').removeClass('scroll_menu');
		}
	});
</script>

</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">

			<a href="javascript:" class="menu-mobile"><span><em>X</em></span></a>

			<h1>
				<a href="<?php echo get_home_url(); ?>" title="<?php the_field('titulo', 'option'); ?>">
					<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>" style="display: none;">
				</a>
			</h1>

			<nav class="nav">
				<ul class="menu-principal">
					<li class="menu-empresa">
						<a href="<?php echo get_home_url(); ?>/empresa" title="EMPRESA">EMPRESA</a>
					</li>

					<li class="menu-produtos">
						<a href="<?php echo get_home_url(); ?>/produtos" title="PRODUTOS">PRODUTOS</a>
					</li>

					<li class="menu-qualidade">
						<a href="<?php echo get_home_url(); ?>/qualidade" title="QUALIDADE">QUALIDADE</a>
					</li>

					<li class="menu-area-de-atuacao">
						<a href="<?php echo get_home_url(); ?>/area-de-atuacao" title="ÁREA DE ATUAÇÃO">ÁREA DE ATUAÇÃO</a>
					</li>

					<li class="menu-noticias">
						<a href="<?php echo get_home_url(); ?>/noticias" title="NOTÍCIAS">NOTÍCIAS</a>
					</li>

					<li class="menu-fale-conosco">
						<a href="<?php echo get_home_url(); ?>/fale-conosco" title="FALE CONOSCO">FALE CONOSCO</a>
					</li>
				</ul>
			</nav>

		</div>
	</header>

	<?php /*
		if(is_category()){
			$categoria_slide = get_the_category();
			$id_slide = $categoria_slide[0]->taxonomy.'_'.$categoria_slide[0]->term_id;
		}else{
			$id_slide = '';
		} */
	?>

	<?php /* if( have_rows('slide',$id_slide) ) { ?>

		<!-- slide -->
		<section class="box-content box-slide">
			<div class="slide">
				<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

					<div class="carousel-inner" role="listbox">

						<?php
							$slide = 0;
							while ( have_rows('slide',$id_slide) ) : the_row();

								if(get_sub_field('video')){
									$slide = $slide+1; ?>

									<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
										<video autoplay="true" loop="true" muted="true">
											<source src="<?php the_sub_field('video'); ?>" type="video/mp4">
										</video>

										<?php if(get_sub_field('youtube')){ ?>
											<div class="play">
												<a href="javascript:" target="" data-target="#lightbox">
													<i class="fa fa-youtube-play" aria-hidden="true" rel="<?php the_sub_field('youtube'); ?>"></i>
												</a>
											</div>
										<?php }else{ ?>
											<div class="container">
												<div class="box-height">
													<div class="box-texto">

														
														<p class="texto">
															<?php if(get_sub_field('titulo')){ ?>
																<span class="txt-slide"><?php the_sub_field('titulo'); ?></span>
															<?php } ?>

															<span class="box-btn">
																<?php if(get_sub_field('titulo_link')){ ?>
																	<a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('titulo_link'); ?>" class="btn btn-slide">
																		<?php the_sub_field('titulo_link'); ?>
																	</a>
																<?php } ?>
															</span>
														</p>
														

													</div>
												</div>
											</div>
										<?php } ?>
									</div>

								<?php }else{
									if(get_sub_field('imagem')){
										$slide = $slide+1; ?>

										<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

											<?php if((get_sub_field('titulo')) or (get_sub_field('subtitulo'))){ ?>
												
												<div class="container">
													<div class="box-height">
														<div class="box-texto">

															<p class="texto">
																<?php if(get_sub_field('titulo')){ ?>
																	<span class="txt-slide"><?php the_sub_field('titulo'); ?></span>
																<?php } ?>

																<span class="box-btn">
																	<?php if(get_sub_field('titulo_link')){ ?>
																		<a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('titulo_link'); ?>" class="btn btn-slide">
																			<?php the_sub_field('titulo_link'); ?>
																		</a>
																	<?php }else{ ?>
																		<span></span>
																	<?php } ?>
																</span>
															</p>
															
														</div>
													</div>
												</div>

											<?php } ?>

										</div>

									<?php }
								}

							endwhile;
						?>

					</div>

					<ol class="carousel-indicators">
						
						<?php for($i=0; $i<$slide; $i++){ ?>
							<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
						<?php } ?>
						
					</ol>

					<a href="#goScrollOn" id="goScroll" class="scroll">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/seta_slide.png">
					</a>

				</div>
			</div>
		</section>
	<?php }else{ ?>
		<section class="box-content no-padding no-slide">
			<div class="slide"></div>
		</section>
	<?php } */ ?>

	<?php //$rows = get_field('slide'); var_dump($rows); ?>