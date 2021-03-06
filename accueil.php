<!--Le carousel-->
<div class="row">
	<div class="col-sm-12">
		<div id="monCarousel" class="carousel slide" data-ride="carousel">
			<!-- indicateurs-->
			<ol class="carousel-indicators">
				<li data-target="#monCarousel" data-slide-to="0" class="active"></li>
<?php
include('connexion_db.php');
$handler = new CompaniesDbHandler();
$companiesNb = $handler->get_pack_companies_nb();
for ($slideId = 1; $slideId <= $companiesNb; $slideId++) {
    echo '				<li data-target="#monCarousel" data-slide-to="' . $slideId . '"></li>
';
}
?>
			</ol>

			<!--wrapper pour les slides-->
			<div class="carousel-inner" role="listbox">
				<!-- slide 0 -->
				<div class="item active">
					<img src="" alt=""/>
					<div class="carousel-caption">
					</div>
					<div class="bloc_carousel col-sm-offset-2 col-sm-2 hidden-xs" style="margin-top:60px;font-size:20px">
						Le <b><?php global $date_trium; echo $date_trium; ?></b>.
					</div>
					<div class="bloc_carousel col-sm-offset-1 col-sm-5 ent-carousel">
						<div>
							<div class="col-sm-4">
								<a href=""><img class="img" src="/logos/logo_trium.png" alt="Trium"/></a>
							</div>
							<div class="col-sm-8 hidden-xs">
								Le forum Trium est un forum entreprises organisé par l'école des Ponts ParisTech, l'école des Mines ParisTech et l'Ensta ParisTech, avec le partenariat de l'Ensae ParisTech. Il a lieu le <b><?php global $date_trium; echo $date_trium; ?> au Parc des expositions de la Porte de Versailles.</b>
							</div>
						</div>
					</div>
				</div>
				<!-- slide 1 -->
				<div class="item">
					<img src="" alt=""/>
					<div class="carousel-caption">
					</div>
					<div class="bloc_carousel col-sm-offset-2 col-sm-2 hidden-xs" style="margin-top:60px;">
						Vous intéressez ces entreprises, venez les découvrir.
					</div>
					<div class="bloc_carousel col-sm-offset-1 col-sm-5 ent-carousel">
						<div>
							<div class="col-sm-4">
								<a href="http://www.vousmeritezcanalplus.com/"><img class="img" src="/logos/logo_canal+.png" alt="Canal +"/></a>
							</div>
							<div class="col-sm-8 hidden-xs">
								The Canal + Group is a European leader in the Pay TV industry. Its impressive content and original productions are available to its subscribers on every screen and digital device both in Europe and other emerging markets - even on replay and demand!<br/>

								 Canal+ has its roots in a culture of communication: the work environment is open and it’s team are young and friendly<br/>
							</div>
						</div>
					</div>
				</div>
<?php
print_companies_carousel();

function print_companies_carousel()
{
    $handler = new CompaniesDbHandler();
    $iterator = new PackCompaniesIterator($handler);
    $company = $iterator->iterate();
    while ($company != NULL) {
        $id = $company["id"];
        $pack = $handler->get_pack($id);
        $logo = $pack["chemin_image"];
        $website = $company["website"];
        $description = $pack["message_carousel"];
        $name = $company["company"];
        if ($id != 138) { //si ce n'est pas canal car il fallait les mettre en premier
            print_company_carousel($logo, $website, $description, $name);
        }
        $company = $iterator->iterate();
    }
}

function print_company_carousel($logo, $website, $description, $name)
{
    echo '				<div class="item">
					<img src="" alt=""/>
					<div class="carousel-caption">
					</div>
					<div class="bloc_carousel col-sm-offset-2 col-sm-2 hidden-xs" style="margin-top:60px;">
						Vous intéressez ces entreprises, venez les découvrir.
					</div>
					<div class="bloc_carousel col-sm-offset-1 col-sm-5 ent-carousel">
						<div>
							<div class="col-sm-4">
								<a href="' . $website . '"><img class="img" src="' . $logo . '" alt="' . $name . '"/></a>
							</div>
							<div class="col-sm-8 hidden-xs">
								' . $description . '
							</div>
						</div>
					</div>
				</div>
';
}
?>
			</div>

			<!--Controles-->
			<!--<a class="left carousel-control" href="#monCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#monCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>-->
		</div>
	</div>
</div>
<!-- fin carousel-->
<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
		<!-- intermède -->
		<div class="row">
			<div class="col-sm-12" style="margin-top:20px">
				<div class="lisere_banniere"></div>
				<div style="text-align:center;font-size:18px;">Le Trium, une rencontre entre étudiants et entreprises</div>
				<div class="lisere_banniere"></div>
			</div>
		</div>

		<!-- ecoles forum entreprises -->
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 cadre_bas">
				<h1>ECOLES</h1>
				<div class="lisere_bleu"></div>
				<div class="row" style="margin-top:20px">
					<div class="col-xs-6 col-md-6 ecole">
						<a href="/ecoles.html#enpc"><img class="img" src="/logos/logo_enpc.png" alt="ENPC"/></a>
					</div>
					<div class="col-xs-6 col-md-6 ecole">
						<a href="/ecoles.html#ensta"><img class="img" src="/logos/logo_ensta.png" alt="ENSTA"/></a>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6 ecole">
						<a href="/ecoles.html#mines"><img class="img" src="/logos/logo_mines.png" alt="Mines"/></a>
					</div>
					<div class="col-xs-6 col-md-6 ecole">
						<a href="/ecoles.html#ensae"><img class="img" src="/logos/logo_ensae.png" alt="ENSAE"/></a>
					</div>
				</div>
				<div class="lisere_bleu" style="margin-top:20px"></div>
				<div style="text-align:center;margin-top:20px">Plus de 3000 étudiants des meilleures écoles d’ingénieur françaises</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 cadre_bas">
				<h1>FORUM</h1>
				<div class="lisere_bleu"></div>
				<div class="row" style="margin-top:20px">
					<div class="col-md-12 cadre_image">
						<img class="img" src="/logos/logo_trium.png" alt="FORUM TRIUM"/>
					</div>
				</div>
				<div class="lisere_bleu" style="margin-top:20px"></div>
				<div style="text-align:center;margin-top:20px">Une journée animée par des conférences, des tables rondes, des déjeuners-rencontre </div>
			</div>
			<div class="col-sm-offset-3 col-md-offset-0 col-xs-12 col-sm-6 col-md-4 col-lg-4 cadre_bas">
				<h1>ENTREPRISES</h1>
				<div class="lisere_bleu"></div>
				<div class="row" style="margin-top:20px">
					<div class="col-md-12 cadre_image">
						<a href="/entreprises.html#widget_ent"><img class="img" src="/images/widget_entreprises.png" alt="Entreprises"/></a>
					</div>
				</div>
				<div class="lisere_bleu" style="margin-top:20px"></div>
				<div style="text-align:center;margin-top:20px">Près de 200 entreprises de tous horizons </div>
			</div>
		</div>
		<!-- twitter facebook et app -->
		<div class="row" style="margin-top:20px">
			<div class="col-sm-offset-3 col-sm-6" style="color:black;font-size:25px;text-align:center;font-weight:bold;font-family:Simplicity">
				L'application permet de profiter à fond de l'évènement
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8 col-xs-12 col-xs-offset-0">
				<div class="row" style="margin-top:40px"></div>
				<div class="row">
					<div class="col-sm-offset-0 col-sm-2 col-xs-2">
						<a href=""><img class="img" src="/logos/twitter.png" alt="Twitter"/></a>
					</div>
					<div class="col-sm-8 col-xs-8">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<a href=""><img class="img" src="/logos/apple_store.png" alt="Apple Store"/></a>
							</div>
							<div class="col-sm-6 col-xs-6">
								<a href=""><img class="img" src="/logos/play_store.png" alt="Play Store"/></a>
							</div>
						</div>
					</div>
					<div class="col-sm-2 col-xs-2">
					<a href="https://www.facebook.com/Forum-Trium-220358747991521/timeline/"><img class="img" src="/logos/facebook.png" alt="Facebook"/></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-3 col-sm-6" style="color:black;font-size:25px;text-align:center;font-weight:bold;font-family:Simplicity">
				Suivez nos entreprises et nous sur les réseaux sociaux
			</div>
		</div>
		<div class="row" style="margin-top:40px"></div>
		<!-- gallerie et la parole aux entreprises -->
		<div class="row">
			<div class="col-sm-7">
				<h1>TIMELAPSE</h1>
				<div class="lisere_bleu"></div>
				<div class="row">
					<iframe class="col-xs-12" style="margin-top:20px;margin-bottom:20px" width="560" height="315" src="https://www.youtube.com/embed/-yIwxRCRa_w" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="lisere_bleu"></div>
				<div style="text-align:center">Découvrez l'édition précédente</div>
			</div>
			<div class="col-sm-5">
				<h1>LA PAROLE AUX ENTREPRISES</h1>
				<div class="lisere_bleu"></div>
				<div class="col-sm-12" style="margin-top:20px">
					<a class="twitter-timeline"  href="https://twitter.com/ArnaudParan/lists/forumtrium" data-widget-id="656211797935063040">Tweets de https://twitter.com/ArnaudParan/lists/forumtrium</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- timeline twitter -->

            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
