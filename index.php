<?php
include('config_serveur.php');
include('pages.php');
include ($racine . '/head.php');
include($racine . '/infos_edition.php');
if(isset($_GET['chemin'])){
	$p1 = $_GET['chemin'];
}
if(isset($_GET['page1'])){
	$p1=$_GET['page1'];
}
else{
	$p1='404';
}
if(isset($_GET['page2'])){
	$p2 = $_GET['page2'];
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
else {
	charge_onglet($p1,$p2);
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
			makeHead($page);
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
		header('Location: '.$url_base.$pages["404"]["addr"]);
	}
}

function charge_onglet($nom_page, $nom_onglet)
{
	//TODO
	global $racine;
	global $pages;
	$pageFound = false;

	foreach ($pages as $pageObj) {
		if ($pageObj["name"] == $nom_page && $pageObj["a_venir"] == false && $pageObj["tabs"][$nom_onglet]["name"] == $nom_onglet) {
			$pageFound = true;
			$page = $pageObj["tabs"][$nom_onglet];
			$fatherPage = $pageObj;
			makeHead($page);
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
		header('Location: '.$url_base.$pages["404"]["addr"]);
	}
}

function makeScripts($page) {
	foreach ($page["scripts"] as $script) {
		echo ('<script src="/js/' . $script . '"></script>');
	}
}
