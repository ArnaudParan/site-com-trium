	<!-- Lea Header et ses widgets-->
	<header class="row">
		<div class="banniere_haut"></div>
		<div class="col-xs-5 col-sm-2 col-md-2 col-lg-1">
			<div class="col-md-6 col-xs-6"><a href="#"><img class="lang" src="/logos/french.png" alt="Français"/></a></div>
			<div class="col-md-6 col-xs-6"><a href="eng/"><img class="lang" src="/logos/english.png" alt="Anglais"/></a></div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
			<img class="img" src="/logos/logo_trium.png" alt="FORUM TRIUM"/>
		</div>
		<!-- Le nav -->
		<div class="col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-2 col-xs-12 col-sm-12 col-sm-7 col-lg-7">
			<div class="row">
				<div class="col-lg-offset-1" style="margin-top:20px">
					<a href="http://www.forum-trium.fr"><button type="button" class="btn btn-success" aria-label="Left Align">
						<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Le site entreprises
					</button></a>
				</div>
			</div>
			<!-- Le nav originel -->
			<nav class="row nav_originel">
				<ul>
					<li><a href="/">ACCUEIL</a>
					<?php
					if($page["name"]=='accueil'){
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:visible"></div></li>
							';
					}else{
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:hidden"></div></li>
							';
					}
					?>
<?php
global $pages;
foreach ($pages as $actualPage) {
	if (($actualPage["visible"] == true) && ($actualPage["name"] != "accueil")) {
		echo '<li><a href="/' . $actualPage["name"] . '">' . strtoupper($actualPage["name"]) . '</a>
			';
		if ($actualPage["name"] == $page["name"]) {
			echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:visible"></div></li>
				';
		}
		else {
			echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:hidden"></div></li>
				';
		}
	}
}
?>
				</ul>
			</nav>
		</div>
	<div class="lisere_banniere col-lg-12" style="padding-top:7px;margin-left:0px;margin-right:0px;"></div>
	</header>
	<div class="row" style="padding-top:20px;">
	</div>
