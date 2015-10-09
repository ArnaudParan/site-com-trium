<footer class="row" style="margin-top:50px">
	<div class="separateur_footer"></div>
	<div class="col-lg-offset-1 col-lg-2">
		<a href="/"><img class="img" src="/logos/logo_trium_gris_reduit.png" alt="Trium"/></a>
	</div>
	<div class="col-lg-9 nav_footer hidden-xs" style="margin-top:50px">
		<ul>
			<li><a href="/">ACCUEIL</a>
<?php
global $pages;
foreach ($pages as $actualPage) {
if (($actualPage["visible"] == true) && ($actualPage["name"] != "accueil")) {
echo '<li><a href="/' . $actualPage["addr"] . '">' . strtoupper($actualPage["name"]) . '</a>
	';
}
}
?>
		</ul>
	</div>
</footer>

