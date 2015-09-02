<?php
function makeHead($pageName)
{
	echo '<!DOCTYPE html>
				<html lang="fr">
				<head>
		';

	makeTitle($pageName);

	echo '<link rel="icon" type="image/png" href="/logos/logo_trium_16x16.png" />
				<meta charset="utf-8">
		';

	makeGeneralCss($pageName);
	makePageCss($pageName);
	makeKeywords($pageName);
	makeDescription($pageName);

	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
					<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
				<![endif]-->
				<meta name="viewport" content="width=device-width, initial-scale=1">
				</head>
		';
}

function makeTitle($pageName)
{
	global $pages;
	echo '<title>' . $pages[$pageName]["title"] . '</title>';
}

function makeGeneralCss($pageName)
{
	global $pages;
	echo '<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
				<link href="/css/fonts.css" rel="stylesheet">
				<link href="/css/general.css" rel="stylesheet">
				<link href="/css/header.css" rel="stylesheet">
				<link href="/css/footer.css" rel="stylesheet">
		';
}

function makePageCss($pageName)
{
	global $pages;
	foreach ($pages[$pageName]["css"] as $cssFile) {
		echo '<link href="/css/' . $cssFile . '" rel="stylesheet">
			';
	}
}

global $defaultKeywords;
$defaultKeywords = "forum trium, le forum trium, forum-trium, forum-trium.com, forum-trium.fr, forum entreprises, ingénieur, école d'ingénieur, commerce, école de commerce, industrie, matériaux, ingénieur industriel, ingénieur des matériaux, ingénierie informatique, informatique, statistiques, ingénierie statistique, salon, salon trium, cereza conseil, paristech, forum centrale, forum centrale supelec, centrale, école centrale, école centrale paris, école centrale des arts et manufactures, supélec, paris, île de france, forum des télécommunications, forum des télécoms, forum, trium, entreprises, mines, ponts, enpc, ponts et chaussées, ensta, ensae, paristech";

function makeKeywords($pageName)
{
	global $pages;
	global $defaultKeywords;
	echo "<meta name=\"keywords\" content=\"" . $defaultKeywords . $pages[$pageName]["keywords"] . "\">
		";
}

function makeDescription($pageName)
{
	global $pages;
	echo "<meta name=\"description\" content=\"" . $pages[$pageName]["description"] . "\">
		";
}
