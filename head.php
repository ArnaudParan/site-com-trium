<?php
function makeHead($page)
{
	echo '<!DOCTYPE html>
				<html lang="fr">
				<head>
		';

	makeTitle($page);

	echo '<link rel="icon" type="image/png" href="/logos/logo_trium_16x16.png" />
				<meta charset="utf-8">
		';

	makeGeneralCss($page);
	makePageCss($page);
	makeKeywords($page);
	makeDescription($page);

	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
					<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
				<![endif]-->
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta property="og:url" content="http://www.forum-trium.com"/>
				<meta property="og:type" content="website"/>
				<meta property="og:title" content="Forum Trium"/>
				<meta property="og:site_name" content="Forum Trium"/>
				<meta property="og:description" content="Le site du Forum Trium"/>
				<meta property="og:image" content="logos/logo_trium.png"/>
				</head>
		';
}

function makeTitle($page)
{
	global $pages;
	echo '<title>' . $page["title"] . '</title>';
}

function makeGeneralCss($page)
{
	global $pages;
	echo '<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
				<link href="/css/fonts.css" rel="stylesheet">
				<link href="/css/general.css" rel="stylesheet">
				<link href="/css/header.css" rel="stylesheet">
				<link href="/css/footer.css" rel="stylesheet">
		';
}

function makePageCss($page)
{
	global $pages;
	foreach ($page["css"] as $cssFile) {
		echo '<link href="/css/' . $cssFile . '" rel="stylesheet">
			';
	}
}

global $defaultKeywords;
$defaultKeywords = "forum étudiant, forum étudiants, forum île de france, forum étudiant île de france, forum trium, le forum trium, forum-trium, forum-trium.com, forum-trium.fr, forum entreprises, ingénieur, école d'ingénieur, commerce, école de commerce, industrie, matériaux, ingénieur industriel, ingénieur des matériaux, ingénierie informatique, informatique, statistiques, ingénierie statistique, salon, salon trium, cereza conseil, paristech, forum centrale, forum centrale supelec, centrale, école centrale, école centrale paris, école centrale des arts et manufactures, supélec, paris, île de france, forum des télécommunications, forum des télécoms, forum, trium, entreprises, mines, ponts, enpc, ponts et chaussées, ensta, ensae, paristech";

function makeKeywords($page)
{
	global $pages;
	global $defaultKeywords;
	echo "<meta name=\"keywords\" content=\"" . $defaultKeywords . $page["keywords"] . "\">
		";
}

function makeDescription($page)
{
	global $pages;
	echo "<meta name=\"description\" content=\"" . $page["description"] . "\">
		";
}
