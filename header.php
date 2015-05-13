	<!-- Lea Header et ses widgets-->
	<header class="row">
		<div class="col-xs-5 col-sm-2 col-md-2 col-lg-1">
			<div class="col-md-6 col-xs-6"><a href="#"><img class="lang" src="/logos/french.png" alt="Français"/></a></div>
			<div class="col-md-6 col-xs-6"><a href="eng/"><img class="lang" src="/logos/english.png" alt="Anglais"/></a></div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
			<img class="img" src="/logos/logo_trium.png" alt="FORUM TRIUM"/>
		</div>
		<!-- Le nav -->
		<div class="col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-2 col-xs-12 col-sm-12 col-sm-7">
			<!-- Le nav originel -->
			<nav class="row nav_originel">
				<ul>
					<li><a href="/index.html">ACCUEIL</a>
					<?php
					if($page=='index.html'){
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:visible"></div></li>';
					}else{
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:hidden"></div></li>';
					}
					?>
					<li><a href="/eleves.html">ELEVES</a>
					<?php
					if($page=='eleves.html'){
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:visible"></div></li>';
					}else{
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:hidden"></div></li>';
					}
					?>
					<li><a href="/entreprises.html">ENTREPRISES</a>
					<?php
					if($page=='entreprises.html'){
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:visible"></div></li>';
					}else{
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:hidden"></div></li>';
					}
					?>
					<li><a href="/partenaires.html">PARTENAIRES</a>
					<?php
					if($page=='partenaires.html'){
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:visible"></div></li>';
					}else{
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:hidden"></div></li>';
					}
					?>
					<li><a href="/contact.html">CONTACTS</a>
					<?php
					if($page=='contact.html'){
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:visible"></div></li>';
					}else{
						echo '<div class="lisere_bleu" style="margin-left:-5px;margin-right:-5px;visibility:hidden"></div></li>';
					}
					?>
				</ul>
				<div class="lisere_banniere" style="margin-right:0px;margin-left:0px"></div>
			</nav>
		</div>
	</header>
