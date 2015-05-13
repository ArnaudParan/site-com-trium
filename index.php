<?php
if(isset($_GET['eikjfdolDZFeS546'])){
	$p1=$_GET['eikjfdolDZFeS546'];
}
else{
	$p1='index.html';
}
if(isset($_GET['poEfurnj856oafer'])){
	$p2=$_GET['poEfurnj856oafer'];
}
else{
	$p2='';
}

$racine='/opt/lampp/htdocs/site-com-trium';
$url_base='http://localhost';
$page=$p1;
if(preg_match('#^$|index\.html#',$p1) && $p2==''){
	$page='index.html';
	include($racine.'/head.php');
	echo('<link href="/css/accueil.css" rel="stylesheet">');
	echo('</head>');
	echo('<body id="page-top" >');
	echo('<div class="container">');
	include($racine.'/header.php');
	include($racine.'/accueil.php');
	echo('</div>');
	include($racine.'/scripts.php');
	echo('</body>');
	echo('</html>');
}
elseif(preg_match('#entreprises\.html#',$p1) && $p2==''){
	include($racine.'/head.php');
	echo('<link href="/css/entreprises.css" rel="stylesheet">');
	echo('</head>');
	echo('<body id="page-top" >');
	echo('<div class="container">');
	include($racine.'/header.php');
	include($racine.'/entreprises.php');
	echo('</div>');
	include($racine.'/scripts.php');
	echo('</body>');
	echo('</html>');
}
elseif(preg_match('#403\.html#',$p1) && $p2==''){
	include($racine.'/403.php');
}
elseif(preg_match('#404\.html#',$p1) && $p2==''){
	include($racine.'/404.php');
}
elseif(preg_match('#a_venir\.html#',$p1) && $p2==''){
	include($racine.'/a_venir.php');
}
elseif(preg_match('#eleves\.html#',$p1) && $p2==''){
	header('Location: '.$url_base.'/a_venir.html');
}
elseif(preg_match('#partenaires\.html#',$p1) && $p2==''){
	header('Location: '.$url_base.'/a_venir.html');
}
elseif(preg_match('#contact\.html#',$p1) && $p2==''){
	header('Location: '.$url_base.'/a_venir.html');
}
else{
	header('Location: '.$url_base.'/404.html');
}
