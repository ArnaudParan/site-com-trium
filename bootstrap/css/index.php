<?php
include('header.php')
?>
	<!--Le carousel-->
	<div class="row">
		<div class="col-md-12">
			<div id="monCarousel" class="carousel slide" data-ride="carousel" style="height:300px">
				<!-- indicateurs-->
				<ol class="carousel-indicators">
					<li data-target="#monCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#monCarousel" data-slide-to="1"></li>
					<li data-target="#monCarousel" data-slide-to="2"></li>
				</ol>

				<!--wrapper pour les slides-->
				<div class="carousel-inner" role="listbox">
					<!-- slide 0 -->
					<div class="item active">
						<img src="" alt=""/>
						<div class="carousel-caption">
							<h1>Slide 0</h1>
						</div>
					</div>
					<!-- slide 1 -->
					<div class="item">
						<img src="" alt=""/>
						<div class="carousel-caption">
							<h1>Slide 1</h1>
						</div>
					</div>
					<!-- slide 2 -->
					<div class="item">
						<img src="" alt=""/>
						<div class="carousel-caption">
							<h1>Slide 2</h1>
						</div>
					</div>
				</div>

				<!--Controles-->
				<a class="left carousel-control" href="#monCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#monCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<!-- fin carousel-->
	<!-- intermède -->
	<div class="row">
		<div class="col-md-12" style="margin-top:20px">
			<div class="lisere_banniere"></div>
			<div style="text-align:center;font-size:18px;">Le Trium, une rencontre entre étudiants et entreprises</span>
			<div class="lisere_banniere"></div>
		</div>
	</div>

	<!-- bas de page -->
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 cadre_bas">
			<h1>ECOLES</h1>
			<div class="lisere_bleu"></div>
			<div class="row">
				<div class="col-xs-6 col-md-6 ecole">
					<a href="ecoles.php#enpc"><img class="img" src="logos/logo_enpc.png" alt="ENPC"/></a>
				</div>
				<div class="col-xs-6 col-md-6 ecole">
					<a href="ecoles.php#ensta"><img class="img" src="logos/logo_ensta.png" alt="ENSTA"/></a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-6 ecole">
					<a href="ecoles.php#mines"><img class="img" src="logos/logo_mines.png" alt="Mines"/></a>
				</div>
				<div class="col-xs-6 col-md-6 ecole">
					<a href="ecoles.php#ensae"><img class="img" src="logos/logo_ensae.png" alt="ENSAE"/></a>
				</div>
			</div>
			<div class="lisere_bleu"></div>
			<div style="text-align:center">Plus de 3000 étudiants des meilleures écoles d’ingénieur françaises</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 cadre_bas">
			<h1>FORUM</h1>
			<div class="lisere_bleu"></div>
			<div class="row">
				<div class="col-md-12 cadre_image">
					<img class="img" src="logos/logo_trium.png" alt="FORUM TRIUM"/>
				</div>
			</div>
			<div class="lisere_bleu"></div>
			<div style="text-align:center">Une journée animée par des conférences, des tables rondes, des déjeuners-rencontre </div>
		</div>
		<div class="col-sm-offset-3 col-md-offset-0 col-xs-12 col-sm-6 col-md-4 col-lg-4 cadre_bas">
			<h1>ENTREPRISES</h1>
			<div class="lisere_bleu"></div>
			<div class="row">
				<div class="col-md-12 cadre_image">
					<a href="entreprises.php#widget_ent"><img class="img" src="images/widget_entreprises.png" alt="Entreprises"/></a>
				</div>
			</div>
			<div class="lisere_bleu"></div>
			<div style="text-align:center">Près de 200 entreprises de tous horizons </div>
		</div>
	</div>
	<div class="row" style="margin-top:20px"></div>
	<div class="row">
		<div class="col-lg-7">
			<h1>GALERIE</h1>
			<div class="lisere_bleu"></div>
			<div class="lisere_bleu"></div>
			<div style="text-align:center">Découvrez l'édition précédente en images</div>
		</div>
		<div class="col-lg-5">
			<h1>LA PAROLE AUX ENTREPRISES</h1>
			<div class="lisere_bleu"></div>
			<div class="col-lg-12" style="margin-top:20px">
				<a class="twitter-timeline" href="https://twitter.com/PontsHeon" data-widget-id="595210981669740544">Tweets de @PontsHeon</a>
			</div>
		</div>
	</div>
</div>

<!-- Les scripts -->
<script src="bootstrap/js/jquery-2.1.3.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- timeline twitter -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
</body>
</html>
