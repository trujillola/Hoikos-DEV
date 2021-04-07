<!DOCTYPE html>
<html>
<head>
<title>Recherche</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href="./css/css.css" rel="stylesheet">

<link rel="stylesheet" href="./css/recherche.js"> 
<link rel="stylesheet" href="./css/item.css"> 
</head>
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}

</style>

<?php
  session_start();
  include './varSession.php';
?>


<body>



<!-- Barre de navigation -->
<div class="top">
  <div class="w3-bar white wide padding card">
    <a href="index.php" class="w3-bar-item button"><b>H</b> Oïkos</a>
     <div class="w3-right">
      <a href="./index.php#about" class="w3-bar-item button">À propos</a>
      <a href="./index.php#contact" class="w3-bar-item  button">Contact</a>
      <a href="connexion.php" class="w3-bar-item boutton"><?php
        if (isset($_SESSION['userID'])) {       
          echo 'Me déconnecter';
        }else{
          echo 'Connexion';
        }
        ?></a>
	</div>  
  </div>
</div>





<!-- choix de la recherche -->
<div class="barre center border border-dark-grey  padding-10 large bar white wide padding card">
  <a href="javascript:void(0)" onclick="openMenu('Appartement');" id="myLink">
      <div class="w3-col s4 tablink w3-padding-large w3-button">Appartements</div>
    </a>
  <a href="javascript:void(0)" onclick="openMenu('Maison');">
    <div class="w3-col s4 tablink w3-padding-large w3-button">Maisons</div>
  </a>
  <a href="javascript:void(0)" onclick="openMenu('Chateau');">
    <div class="w3-col s4 tablink w3-padding-large w3-button">Chateaux</div>
  </a>
</div>



<!-- Appartements -->
<div id="Appartement" class="container padding-64 white xlarge menu">
  <div class=" appart"><hr><h2>Appartements</h2><hr></div>

    <div class="dropdown">
      <button onclick="myFunction('myDropdown1')" class="dropbtn xxlarge filtre button">Filtrer</button>
      <div id="myDropdown1" class="dropdown-content">
        <a href="">Prix croissants</a>
        <a href="">Prix décroissants</a>
      </div>
    </div>
    

  <!-- Grille -->
  <div class="grid">


  <?php
  foreach ($_SESSION['tableau'] as $item){
   if($item['cat']==0){
  ?>
  <div class="item">
      <div class="position-conteneur">
        <img  src="<?php echo $item['photo'][0]['chemin'] ?>" style="width:100%" onclick="onClick(this)">
        <div class="conteneur affiche-haut centre" id="intéressé">
          <p><i id = "<?php echo $item['id'] ?>" class="fa fa-heart-o  favori" onclick = "changeFavori(this.id)"></i></i></p>
         </div>
        <div class="conteneur affiche-milieu centre">
          <p><a href="./item.php?id=<?php echo $item['id']?>" class="boutton large black card invisible">Voir l'annonce</a></p>
        </div>
      </div>
      <p><?php echo $item['nom'] ?><br><b><?php echo $item['prix'] ?></b></p>
    </div>


  <?php
   }
  }
  ?>

  </div>
  
</div>



<!-- Maisons -->
<div id="Maison" class="container padding-64 white xlarge menu">
  <div class=" appart "><hr><h2>Maisons</h2><hr></div>

  <div class="dropdown">
      <button onclick="myFunction('myDropdown2')" class="dropbtn xxlarge filtre button">Filtrer</button>
      <div id="myDropdown2" class="dropdown-content">
        <a href="">Prix croissants</a>
        <a href="">Prix décroissants</a>
      </div>
    </div>
   <!-- <button class="xxlarge filtre" type="button" onclick="filtre()">Filtrer</button> -->
  <!-- Grille-->
    <div class="grid">
    <?php
foreach ($_SESSION['tableau'] as $item){
 if($item['cat']==1){
?>
<div class="item">
    <div class="position-conteneur">
      <img  src="<?php echo $item['source'] ?>" style="width:100%" onclick="onClick(this)">
      <div class="conteneur affiche-haut centre" id="intéressé">
        <p><i id = "<?php echo $item['id'] ?>" class="fa fa-heart-o  favori" onclick = "changeFavori(this.id)"></i></i></p>
       </div>
      <div class="conteneur affiche-milieu centre">
        <p><a href="./item.php?id=<?php echo $item['id']?>" class="boutton large black card invisible">Voir l'annonce</a></p>
      </div>
    </div>
    <p><?php echo $item['nom'] ?><br><b><?php echo $item['prix'] ?></b></p>
  </div>


<?php
 }
}
?>

</div>

</div>


<!-- Chateaux -->
<div id="Chateau" class="container padding-32 white xlarge menu">
  <div class=" appart "><hr><h2>Chateaux</h2><hr></div>

  <div class="dropdown">
    <button onclick="myFunction('myDropdown3')" class="dropbtn xxlarge filtre button">Filtrer</button>
    <div id="myDropdown3" class="dropdown-content">
      <a href="">Prix croissants</a>
      <a href="">Prix décroissants</a>
    </div>
  </div>

  <!-- Grille -->
  <div class="grid">
  <?php
  foreach ($_SESSION['tableau'] as $item){
   if($item['cat']==2){
  ?>
  <div class="item">
      <div class="position-conteneur">
        <img  src="<?php echo $item['source'] ?>" style="width:100%" onclick="onClick(this)">
        <div class="conteneur affiche-haut centre" id="intéressé">
          <p><i id = "<?php echo $item['id'] ?>" class="fa fa-heart-o  favori" onclick = "changeFavori(this.id)"></i></i></p>
         </div>
        <div class="conteneur affiche-milieu centre">
          <p><a href="./item.php?id=<?php echo $item['id']?>" class="boutton large black card invisible">Voir l'annonce</a></p>
        </div>
      </div>
      <p><?php echo $item['nom'] ?><br><b><?php echo $item['prix'] ?></b></p>
    </div>


  <?php
   }
  }
  ?>

  </div>
  
</div>


   
</div>
<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
    <img id="img01" style="max-width:100%">
  </div>
</div>

<!-- Footer -->
<footer  class="center padding xlarge"style="background-color:#7A8A93">
  <p>Powered by <a href="index.php#about" title="Présentation" target="_blank" class="hover-text-green">Amélie&Laura</a></p>
</footer>


<script>
 
//Menu dynamique
function openMenu(menuName) {
    var i, x;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    document.getElementById(menuName).style.display = "block";
  }
  document.getElementById("myLink").click();


  function onClick(element) {
document.getElementById("img01").src = element.src;
document.getElementById("modal01").style.display = "block";
}

//bouton filtrer
function myFunction(id) {
  document.getElementById(id).classList.toggle("show");
}

//fermeture bouton filtrer
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

  //Au chargement de la page, c'est la première photo qui est affichée et son etiquette


function changeFavori(id){
  if (document.getElementById(id).classList.contains('fa-heart-o')){
    document.getElementById(id).classList.add('fa-heart');
    document.getElementById(id).classList.remove('fa-heart-o');
  }else{
    document.getElementById(id).classList.remove('fa-heart');
    document.getElementById(id).classList.add('fa-heart-o');  }
}


  function onClick(element) {
document.getElementById("img01").src = element.src;
document.getElementById("modal01").style.display = "block";
}

//bouton filtrer
function myFunction(id) {
  document.getElementById(id).classList.toggle("show");
}

//fermeture bouton filtrer
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

  //Au chargement de la page, c'est la première photo qui est affichée et son etiquette


function changeFavori(id){
  if (document.getElementById(id).classList.contains('fa-heart-o')){
    document.getElementById(id).classList.add('fa-heart');
    document.getElementById(id).classList.remove('fa-heart-o');
  }else{
    document.getElementById(id).classList.remove('fa-heart');
    document.getElementById(id).classList.add('fa-heart-o');  }
}


  function onClick(element) {
document.getElementById("img01").src = element.src;
document.getElementById("modal01").style.display = "block";
}

//bouton filtrer
function myFunction(id) {
  document.getElementById(id).classList.toggle("show");
}

//fermeture bouton filtrer
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

  //Au chargement de la page, c'est la première photo qui est affichée et son etiquette


function changeFavori(id){
  if (document.getElementById(id).classList.contains('fa-heart-o')){
    document.getElementById(id).classList.add('fa-heart');
    document.getElementById(id).classList.remove('fa-heart-o');
    $_SESSION['id'] =id;
    alert("$_SESSION['id']");
  <?php favoris();?>
  }else{
    document.getElementById(id).classList.remove('fa-heart');
    document.getElementById(id).classList.add('fa-heart-o');}

}
</script>

<?php

function favoris(){
  $user = $_SESSION['userID'];
  $fichier = fopen($_SESSION['userID'].'.txt', 'x+');
  fwrite($fichier, "ui");
  fwrite($fichier, $_SESSION['id']);
  fwrite($fichier, "\n");
  fclose($fichier);
}
    ?>


</body>
</html>
