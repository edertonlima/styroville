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
				jQuery('.box-busca').removeClass('active');
			}else{
				jQuery('.nav').css('top','0px');
				jQuery(this).addClass('active');
				jQuery('.header').addClass('active');
				jQuery('.box-busca').addClass('active');
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
		jQuery('.menu-mobile').removeClass('active');
		jQuery('.header').removeClass('active');
		jQuery('.box-busca').removeClass('active');

		width = jQuery(document).width();
		if(width < 850){
			jQuery('.nav').css('top','-110vh');
		}else{
			jQuery('.nav').css('top','auto');
		}

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
					<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>">
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

					<li class="menu-minha-area">
						<a href="<?php echo get_home_url(); ?>/minha-area" title="MINHA ÁREA">MINHA ÁREA</a>
					</li>
				</ul>
			</nav>

		</div>

		<dib class="box-busca">
			<div class="link">
				<a href="<?php echo get_home_url(); ?>" title="Página inicial">Página inicial</a>
				<span>|</span>
				<a href="<?php echo get_home_url(); ?>/minha-area" title="Minha área">Minha área</a>
			</div>

			<form class="busca-header" role="search" method="get" id="searchform" action="<?php echo get_home_url(); ?>">
				<fieldset>
					<input value="" name="s" id="s" type="text" placeholder="BUSCA" />
					<button type="submit">OK</button>
				</fieldset>
			</form>
		</dib>
	</header>