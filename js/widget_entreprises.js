//codages pour les différentes tailles
var xs=0, sm=1, md=2, lg=3;
var categorie=['xs','sm','md','lg']
//tailles minimales pour le responsive avec bootstrap
var taille_min=[0,768,992,1200];
//catégorie actuelle du média
var taille_media=lg;

//fonction principale
$(function(){
	$(window).resize(redimensionnement);
	//$(window).resize(function(){console.log('blabla')});
});

//fonction appelée au redimensionnement, qui détermine si on a changé de catégorie de média
function redimensionnement(){
	//la catégorie actuelle du média
	var taille_actuelle=lg;
	//donne à taille_actuelle sa valeur
	if(window.matchMedia('(min-width:  '+taille_min[lg]+'px)').matches){
		taille_actuelle=lg;
	}
	else if(window.matchMedia('(min-width:  '+taille_min[md]+'px)').matches){
		taille_actuelle=md;
	}
	else if(window.matchMedia('(min-width:  '+taille_min[sm]+'px)').matches){
		taille_actuelle=sm;
	}
	else{
		taille_actuelle=xs;
	}
	//si la catégorie a changé, on appelle la fonction
	if(taille_actuelle!=taille_media){
		taille_media=taille_actuelle;
		chg_cat(taille_media);
	}
}

//fonction appelée quand on a changé de catégorie
function chg_cat(cat){
	console.log(categorie[cat]);
}
