//Au chargement de la page, c'est la première photo qui est affichée et son etiquette
var premiereImage = document.getElementsByClassName("demo")[0].src;
var premiereEtiquette = document.getElementsByClassName("demo")[0].title;
affiche(premiereImage,premiereEtiquette);

function affiche(src,title) {
  document.getElementById('currentImage').src=src;
  document.getElementById('etiquette').innerHTML=title;
}

function changeFavori(id){
  //Ajax
	var identifiant=id;
  var classe = document.getElementById(identifiant).classList;
	xhttp = new XMLHttpRequest(); 
	 
	xhttp.onreadystatechange = function() {
		if ((this.readyState == 4) && (this.status == 200)) {	
      if (document.getElementById(identifiant).classList.contains('fa-heart-o')){
        document.getElementById(identifiant).classList.add('fa-heart');
        document.getElementById(identifiant).classList.remove('fa-heart-o');
        }else{
           document.getElementById(identifiant).classList.remove('fa-heart');
           document.getElementById(identifiant).classList.add('fa-heart-o');  
          }
		}
	};
	
	xhttp.open("POST","./php/Modif.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("identifiant="+identifiant+"&classe="+classe[3]); 
	 
};