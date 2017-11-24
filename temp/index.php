<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php 
	$titulo_princ = '';
	$descricao_princ = '';
	$imagem_princ = '';
	$url = '';
	$imgPage = '';
	$imagem = '';
	$titulo = '';
	$descricao = '';

	if($titulo == ''){
		$titulo = $titulo_princ;
	}else{
		$titulo = $titulo.' - '.$titulo_princ;
	}
	
	if($descricao == ''){
		$descricao = $descricao_princ;
	}

	$autor = 'Di20 Desenvolvimento';
?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="" type="image/x-icon" />
<link rel="icon" href="" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="" />
<meta name="language" content="pt-br" />
<meta name="title" content="" />

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
<meta property="og:site_name" content="" />
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
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="<?php //echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php //echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>

</head>
<body <?php //body_class(); ?>>

	<header class="header">
		<strong>Aguarde! Em breve teremos novidade para você!</strong>
	</header>

	<img src="images/logo.jpg" alt="Associação Beneficente Betesda" class="logo">

	<footer class="footer">
		<div class="item">
			<i class="fa fa-envelope-o" aria-hidden="true"></i>
			<span>
				<div>Quer falar conosco?</div>
				<strong>vendas@styroville.com.br</strong>
			</span>
		</div>

		<div class="item">
			<i class="fa fa-comment-o" aria-hidden="true"></i>
			<span>
				<div>Ligue para nós</div>
				<strong>(47) 3043-1260</strong>
			</span>
		</div>

		<div class="item endereco">
			Rua Gerhard Barkemeyer, 196 CEP 89237-638<br>Vila Nova | Joinville - SC
		</div>
	</footer>

</body>
</html>