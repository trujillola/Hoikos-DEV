//Au chargement de la page, c'est la première photo qui est affichée et son etiquette
var premiereImage = document.getElementsByClassName("demo")[0].src;
var premiereEtiquette = document.getElementsByClassName("demo")[0].title;
affiche(premiereImage,premiereEtiquette);

function affiche(src,title) {
  document.getElementById('currentImage').src=src;
  document.getElementById('etiquette').innerHTML=title;
}

function changeFavori(id){
  if (document.getElementById(id).classList.contains('fa-heart-o')){
    document.getElementById(id).classList.add('fa-heart');
    document.getElementById(id).classList.remove('fa-heart-o');
  }else{
    document.getElementById(id).classList.remove('fa-heart');
    document.getElementById(id).classList.add('fa-heart-o');  }
}