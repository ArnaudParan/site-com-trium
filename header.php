	<!-- Lea Header et ses widgets-->
	<header class="row">
		<div class="banniere_haut"></div>
		<div class="col-xs-5 col-sm-1 col-md-1 col-lg-1">
			<div class="col-md-6 col-xs-6"><a href="#"><img class="lang" src="/logos/french.png" alt="Français"/></a></div>
			<div class="col-md-6 col-xs-6"><a href="eng/"><img class="lang" src="/logos/english.png" alt="Anglais"/></a></div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
			<a href="/"><img class="img" src="/logos/logo_trium.png" alt="FORUM TRIUM"/></a>
		</div>
		<!-- Le nav -->
		<div class="col-sm-offset-1 col-md-offset-0 col-lg-offset-2 col-sm-12 col-md-8 col-lg-7 hidden-xs">
			<div class="row">
				<div class="col-lg-offset-1 col-sm-offset-4" style="margin-top:20px">
					<a href="http://www.sirom.net/trium/site/index.php"><button type="button" class="btn btn-success" aria-label="Left Align">
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
		echo '<li><a href="/' . $actualPage["addr"] . '">' . strtoupper($actualPage["name"]) . '</a>
			';
		if ($actualPage["name"] == $page["name"] || (isset($fatherPage) && $fatherPage["name"] == $actualPage["name"])) {
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
		<div class="col-xs-12 visible-xs">
			<ul class="nav nav-pills">
				<li role="presentation">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-exanded="false"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
						<ul class="dropdown-menu">
							<li><a href="/">ACCUEIL</a></li>
		<?php
		global $pages;
		foreach ($pages as $actualPage) {
			if (($actualPage["visible"] == true) && ($actualPage["name"] != "accueil")) {
				echo '<li><a href="/' . $actualPage["addr"] . '">' . strtoupper($actualPage["name"]) . '</a></li>
					';
			}
		}
		?>
						</ul>
				</li>
			</ul>
		</div>
	<div class="lisere_banniere col-xs-12" style="padding-top:7px;margin-left:0px;margin-right:0px;"></div>
	</header>
<?php
	if (isset($fatherPage)) {
		echo '<div class="row"><div class="col-sm-offset-2 col-sm-8" style="padding-top:20px">
			<div class="btn-group btn-group-justified" role="group" aria-label="justified button group">';
		foreach ($fatherPage["tabs"] as $actualTab) {
			if($page["name"] == $actualTab["name"]) {
				echo	'<div class="btn-group" role="group">
						<a href="' . $actualTab["addr"] .'"><button type="button" class="btn btn-info">' . $actualTab["name"] .'</button></a>
					</div>';
			}
			else {
				echo	'<div class="btn-group" role="group">
						<a href="' . $actualTab["addr"] .'"><button type="button" class="btn btn-default">' . $actualTab["name"] .'</button></a>
					</div>';
			}
		}
		echo 	'</div>
		</div></div>';
	}
?>
