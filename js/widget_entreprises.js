//codages pour les différentes tailles
var xs=0, sm=1, md=2, lg=3;
var categorie=['xs','sm','md','lg']
//tailles minimales pour le responsive avec bootstrap
var taille_min=[0,768,992,1300];
//catégorie actuelle du média
var taille_media=lg;
//stocke les positions des boutons
var pos_btn=[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]];
//stocke l'id du bouton active
var id_active=0;
//dit si le widget est actif
var widget_active=false;
var last_hover_id=0;

//fonction principale
$(function(){
	$(window).resize(redimensionnement);
	$('.zone_btn').hover(hov);
	var l = parseInt($('#widget_ent').parent().css('width'))-parseInt($('#widget_ent').parent().css('padding-left'));
	positionne_widget(l);
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
	var l = parseInt($('#widget_ent').parent().css('width'))-parseInt($('#widget_ent').parent().css('padding-left'));
	positionne_widget(l);
}

//fonction lancée quand on met le curseur sur un des boutons du widget
function hov(){
	var id=-1;
	if($(this).attr("id")=="zone_btn1"){
		id=1;
	}
	else if($(this).attr("id")=="zone_btn2"){
		id=2;
	}
	else if($(this).attr("id")=="zone_btn3"){
		id=3;
	}
	else if($(this).attr("id")=="zone_btn4"){
	id=4;
	}
	else if($(this).attr("id")=="zone_btn5"){
		id=5;
	}
	else if($(this).attr("id")=="zone_btn6"){
		id=6;
	}
	last_hover_id=id;
	fonc_hov(id);
}

function fonc_hov(id){
	var l=$('#widget_ent').attr('l');
	var c_x=$('#widget_ent').attr('center_x');
	var c_y=$('#widget_ent').attr('center_y');
	var l_sbtn=parseInt($('#sbtn11').css('width'));
	if(!widget_active && $('#zone_btn'+id).attr("anim")!="true" && $('#zone_btn'+id).attr("anim")!="debutfalse"){
		widget_active=true;
		//Range l'élément actif
		dehov(id_active,function(){
			id_active=id;
			if(last_hover_id==id){
				$('#zone_btn'+id).attr("anim","true");
				//met le bouton au centre
				$('#btn'+id).animate({left:c_x,top:c_y},300,function(){
					//ouvre le sous menu
					$('#sbtn'+id+'1').animate({top:"-="+(Math.sqrt(3)/2-1/(2*Math.sqrt(3)))*l_sbtn},300);
					$('#sbtn'+id+'2').animate({top:"+="+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn,left:"+="+l_sbtn/2},300);
					$('#sbtn'+id+'3').animate({top:"+="+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn,left:"-="+l_sbtn/2},300,function(){
						widget_active=false;
						if(id!=last_hover_id){
							//si l'utilisateur a cliqué sur un autre entre temps
							fonc_hov(last_hover_id);
						}
					});
				});
			}
			else{

				id_active=0;
				$('#zone_btn'+id).attr("anim","false");
				widget_active=false;
				fonc_hov(last_hover_id);
			}
		});
	}
}

function dehov(id,fonction){
	var l_btn=parseInt($('#btn1').css('width'));
	var l_sbtn=parseInt($('#sbtn11').css('width'));
	if($("#zone_btn"+id).attr("anim")=="true"){
		$('#zone_btn'+id).attr("anim","debutfalse");
		$('#sbtn'+id+'1').animate({top:"+="+(Math.sqrt(3)/2-1/(2*Math.sqrt(3)))*l_sbtn},300);
		$('#sbtn'+id+'2').animate({top:"-="+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn,left:"-="+l_sbtn/2},300);
		$('#sbtn'+id+'3').animate({top:"-="+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn,left:"+="+l_sbtn/2},300,function(){
				$("#btn"+id).animate({left:pos_btn[id-1][0],top:pos_btn[id-1][1]},300, function(){
				$('#zone_btn'+id).attr("anim","false");
				fonction();
			});
		});
	}
	else{
		fonction();
	}
}

/*positionne le widget en fonction de la largeur l qui lui est allouée*/
function positionne_widget(l){
	var l_btn=parseInt($('#btn1').css('width'));
	var l_sbtn=parseInt($('#sbtn11').css('width'));
	var l_zone_btn=parseInt($('#zone_btn1').css('width'));
	l=l-2*(l_sbtn-l_btn/2);
	//largeur de l'hexagone créé par les centres des boutons
	var vraie_largeur=l-l_btn;
	//écart largeur btn sbtn
	var decalage_sbtn=(l_btn-l_sbtn)/2;
	//décalage
	var decalage_widget_y=(Math.sqrt(3)/2-1/(2*Math.sqrt(3)))*l_sbtn-decalage_sbtn;
	var decalage_widget_x=15+l_sbtn-l_btn/2;
	$('#widget_ent').attr('l',vraie_largeur+'');
	$('#widget_ent').attr('center_x',+decalage_widget_x+vraie_largeur/2+'');
	$('#widget_ent').attr('center_y',+decalage_widget_y+vraie_largeur/(Math.sqrt(3))+'');
	$('#widget_ent').css('height',vraie_largeur*2/Math.sqrt(3)+l_btn+decalage_widget_y+(Math.sqrt(3)/2-2/(2*Math.sqrt(3)))*l_sbtn-decalage_sbtn+'px');
	$('#widget_ent').css('width',l+2*(l_sbtn-l_btn/2)+'px');

	//positionnement des boutons
	pos_btn[0]=[decalage_widget_x+vraie_largeur/2,decalage_widget_y+0];
	pos_btn[1]=[decalage_widget_x+vraie_largeur,decalage_widget_y+vraie_largeur/(2*Math.sqrt(3))];
	pos_btn[2]=[decalage_widget_x+vraie_largeur,decalage_widget_y+3*vraie_largeur/(2*Math.sqrt(3))];
	pos_btn[3]=[decalage_widget_x+vraie_largeur/2,decalage_widget_y+4*vraie_largeur/(2*Math.sqrt(3))];
	pos_btn[4]=[decalage_widget_x+0,decalage_widget_y+3*vraie_largeur/(2*Math.sqrt(3))];
	pos_btn[5]=[decalage_widget_x+0,decalage_widget_y+vraie_largeur/(2*Math.sqrt(3))];

	//positionnement des sous boutons
	for(i=0;i<6;i++){
		$('#fond_btn'+(i+1)).css({'left':pos_btn[i][0]+'px','top':pos_btn[i][1]+'px'});
		$('#btn'+(i+1)).css({'left':pos_btn[i][0]+'px','top':pos_btn[i][1]+'px'});
	}

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
