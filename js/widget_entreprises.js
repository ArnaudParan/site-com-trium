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
	positionne_widget(500);
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
	var l_sbtn=parseInt($('#sbtn11').css('width'));
	if($(this).attr("anim")!="true" && $(this).attr("anim")!="debutfalse"){
		$(this).attr("anim","true");
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
			$('#sbtn'+id+'1').animate({top:"-="+(Math.sqrt(3)/2-1/(2*Math.sqrt(3)))*l_sbtn},500);
			$('#sbtn'+id+'2').animate({top:"+="+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn,left:"+="+l_sbtn/2},500);
			$('#sbtn'+id+'3').animate({top:"+="+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn,left:"-="+l_sbtn/2},500);
		});
	}
}

function dehov(){
	var l_btn=parseInt($('#btn1').css('width'));
	var l_sbtn=parseInt($('#sbtn11').css('width'))
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
		$('#sbtn'+id+'1').animate({top:"+="+(Math.sqrt(3)/2-1/(2*Math.sqrt(3)))*l_sbtn},500);
		$('#sbtn'+id+'2').animate({top:"-="+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn,left:"-="+l_sbtn/2},500);
		$('#sbtn'+id+'3').animate({top:"-="+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn,left:"+="+l_sbtn/2},500,function(){
			$("#btn"+id).animate({opacity:1.},500, function(){
				$(this).attr("anim","false");
			});
		});
	}
}

/*positionne le widget en fonction de la largeur l qui lui est allouée*/
function positionne_widget(l){
	var l_btn=parseInt($('#btn1').css('width'));
	var l_sbtn=parseInt($('#sbtn11').css('width'))
	var vraie_largeur=l-l_btn;
	var decalage_sbtn=(l_btn-l_sbtn)/2;
	$('#btn1').css({'left':vraie_largeur/2+'px','top':'0px'});
	$('#btn2').css({'left':vraie_largeur+'px','top':vraie_largeur/(2*Math.sqrt(3))+'px'});
	$('#btn3').css({'left':vraie_largeur+'px','top':3*vraie_largeur/(2*Math.sqrt(3))+'px'});
	$('#btn4').css({'left':vraie_largeur/2+'px','top':4*vraie_largeur/(2*Math.sqrt(3))+'px'});
	$('#btn5').css({'left':'0px','top':3*vraie_largeur/(2*Math.sqrt(3))+'px'});
	$('#btn6').css({'left':'0px','top':vraie_largeur/(2*Math.sqrt(3))+'px'});

	for(i=1;i<=6;i++){
		for(j=1;j<=3;j++){
			$('#sbtn'+i+''+j).css({'left':$('#btn'+i).css('left'),'top':$('#btn'+i).css('top')});
			$('#sbtn'+i+''+j).css({'left':'+='+decalage_sbtn+'px','top':'+='+decalage_sbtn+'px'});
		}
	}
	for(i=1;i<=6;i++){
		$('#btn'+i).css({'visibility':'visible'});
		for(j=1;j<=3;j++){
			$('#sbtn'+i+''+j).css({'visibility':'visible'});
		}
	}
}
