<?php
include('config_serveur.php');
include('pages.php');
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

$page=$p1;
if(preg_match('#^$|index\.html#',$p1) && $p2==''){
	charge_page ('accueil');
}
elseif ($p2 == '') {
	charge_page($p1);
}
elseif(preg_match('#entreprises\.html#',$p1) && $p2==''){
	charge_page ('entreprises');
}
elseif(preg_match('#contact\.html#',$p1) && $p2==''){
	charge_page ('contact');
}
elseif(preg_match('#403\.html#',$p1) && $p2==''){
	charge_page('403');
}
elseif(preg_match('#404\.html#',$p1) && $p2==''){
	charge_page('404');
}
elseif(preg_match('#a_venir\.html#',$p1) && $p2==''){
	charge_page('a_venir');
}
elseif(preg_match('#eleves\.html#',$p1) && $p2==''){
	header('Location: '.$url_base.'/a_venir.html');
}
elseif(preg_match('#partenaires\.html#',$p1) && $p2==''){
	header('Location: '.$url_base.'/a_venir.html');
}
else{
	header('Location: '.$url_base.'/404.html');
}

function charge_page ($nom_page)
{
	global $racine;
	global $pages;
	$pageFound = false;

	foreach ($pages as $pageObj) {
		if ($pageObj["name"] == $nom_page && $pageObj["a_venir"] == false) {
			$pageFound = true;
			$page = $pageObj;
			include ($racine . '/head.php');
			makeHead($nom_page);
			echo ('<body id="page-top" >');
			echo ('<div class="container-fluid">');
			include ($racine . '/header.php');
			echo ('<div id="corps">');
			include ($racine . '/' . $page["html"]);
			echo ('</div>');
			include ($racine . '/footer.php');
			echo ('</div>');
			include ($racine . '/scripts.php');
			makeScripts($page);
			echo ('</body>');
			echo ('</html>');
		}

		elseif ($pageObj["name"] == $nom_page && $pageObj["a_venir"] == true) {
			charge_page("a_venir");
			$pageFound = true;
		}
	}

	if ($pageFound == false) {
		charge_page("404");
	}
}

function makeScripts($page) {
	foreach ($page["scripts"] as $script) {
		echo ('<script src="/js/' . $script . '"></script>');
	}
}
