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
	$('.ent').hover(hov,dehov);
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

//fonction lancée quand on met le curseur sur un des boutons du widget
function hov(){
	if($(this).attr("anim")!="true" && $(this).attr("anim")!="debutfalse"){
		$(this).attr("anim","true");
		console.log($(this).attr("anim"));
		var id=-1;
		if($(this).attr("id")=="btn1"){
			id=1;
		}
		else if($(this).attr("id")=="btn2"){
			id=2;
		}
		else if($(this).attr("id")=="btn3"){
			id=3;
		}
		else if($(this).attr("id")=="btn4"){
		id=4;
		}
		else if($(this).attr("id")=="btn5"){
			id=5;
		}
		else if($(this).attr("id")=="btn6"){
			id=6;
		}
		$(this).animate({opacity:0.},200,function(){
			$('#sbtn'+id+'1').animate({top:"-=60"},500);
			$('#sbtn'+id+'2').animate({top:"+=35",left:"+=55"},500);
		$('#sbtn'+id+'3').animate({top:"+=35",left:"-=55"},500);
		});
	}
}

function dehov(){
	if($(this).attr("anim")=="true"){
		$(this).attr("anim","debutfalse");
		var id=-1;
		if($(this).attr("id")=="btn1"){
			id=1;
		}
		else if($(this).attr("id")=="btn2"){
			id=2;
		}
		else if($(this).attr("id")=="btn3"){
			id=3;
		}
		else if($(this).attr("id")=="btn4"){
			id=4;
		}
		else if($(this).attr("id")=="btn5"){
			id=5;
		}
		else if($(this).attr("id")=="btn6"){
			id=6;
		}
		$('#sbtn'+id+'1').animate({top:"+=60"},500);
		$('#sbtn'+id+'2').animate({top:"-=35",left:"-=55"},500);
		$('#sbtn'+id+'3').animate({top:"-=35",left:"+=55"},500,function(){
			$("#btn"+id).animate({opacity:1.},500, function(){
				console.log("fin");
				$(this).attr("anim","false");
			});
		});
	}
}
