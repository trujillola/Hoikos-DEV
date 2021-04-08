<!DOCTYPE html>
<html>
<title>Espace</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link href="./css/css.css" rel="stylesheet">
<link rel="stylesheet" href="./css/inscription.css">  

<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("/w3images/pizza.jpg");
  min-height: 90%;
}
</style>


<?php 
session_start();
if (!empty($_SESSION['userID'])) {
  if (!empty($_POST)) {
    include './php/enregistrerModification.php';
  }
  include './varSession.php';
?>

<script>

function retireFavori(id){
  //Ajax
	var identifiantDIV='bien'+id;

	xhttp = new XMLHttpRequest(); 

	xhttp.onreadystatechange = function() {
		if ((this.readyState == 4) && (this.status == 200)) {	
       document.getElementById(identifiantDIV).style.display="none";
       alert('ON EST OK');
		}
	};
	
	xhttp.open("POST","./php/retireFavori.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+id); 
	 
};
</script>

<body>
<!-- Barre de navigation -->
<div class="top">
  <div class="w3-bar white wide padding card">
    <a href="index.php" class="w3-bar-item menu "><b>H</b> Oïkos</a>
     <div class="w3-right">
      <a href="connexion.php"  class="w3-bar-item menu">Me déconnecter</a>
      <a href="index.php#about" class="w3-bar-item menu">À propos</a>
      <a href="index.php#contact" class="w3-bar-item menu ">Contact</a>
	</div>  
  </div>
</div>

<div id="Chateaux" class="container padding-32 white xlarge">
  <div class=" appart "><hr><h2>Mes favoris</h2><hr></div>

  <a href="javascript:history.back(1)" class="myButton">Retour</a>



  <!-- Grille -->
  <div class="grid">


    <?php
      //echo '<script language="Javascript"> alert ("'.count($_SESSION['userFav']).'") </script>';

for ($i=0; $i <count($_SESSION['userFav'])-1 ; $i++) { 

  $fav=$_SESSION['userFav'][$i];
  $item=$_SESSION['tableau'][$fav];
 // echo '<script language="Javascript"> alert ("'.$i.'") </script>';
 // echo '<script language="Javascript"> alert ( "fav :'.$fav.'") </script>';

  ?>
 <div class="item" id="<?php echo 'bien'.$item['id']?>">
      <div class="position-favoris">
        <img src="<?php echo $item['photo'][0]['chemin'] ?>" style="width:100%">
        <div class="conteneur display-topleft">
          <p><a class="boutton large black card invisible" id ="<?php echo $item['id'];?>" onclick="retireFavori(this.id)">Retirer des favoris</a></p>
        </div>
        <div class="conteneur affiche-milieu centre">
          <p><a href="./item.php?id=<?php echo $item['id']?>" class="boutton large black card invisible">Voir l'annonce</a></p>
        </div>
      </div>
      <p><?php echo $item['nom'] ?><br><b><?php echo $item['prix'] ?></b></p>
    </div>
  <?php

  }
  ?>

  </div>
  
</div>

<div class="contenu blanc">
<h2 class="bord-bas bord-gris-clair padding-16">Modifier mes informations</h2>
<div class="conteneur padding-16" id="contact">
    <form name='monformulaire' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   	  <p><select class="myinput bord" style="width:100%;" value="Civilité" required name="Civilité" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)">
    	  <option value="" disabled selected hidden>Civilité</option>	
      	<option value="Madame" <?php if($_SESSION['userInfo'][3]=="Madame"){echo 'selected';}?>>Madame</option>
    	  <option value="Monsieur" <?php if($_SESSION['userInfo'][3]=="Monsieur"){echo 'selected';}?>>Monsieur</option>
 		    </select></p>
      <p><input class="myinput bord" type="text" placeholder="Nom" required name="Nom" value="<?php echo $_SESSION['userInfo'][1];?>" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"></p>
      <p><input class="myinput bord" type="text" placeholder="Prénom" required name="Prenom" value="<?php echo $_SESSION['userInfo'][2];?>" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"> </p>
      <p><input class="myinput bord" type="text" placeholder="Email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required name="Adresse-email" value="<?php echo $_SESSION['userInfo'][4];?>" oninvalid="validationPattern(this.name)" onblur="validationPattern(this.name)"></p>
	    <p><input class="myinput bord" type="text" placeholder="Code postal" pattern="^[0-9]{5}$" required name="Codepostal" value="<?php echo $_SESSION['userInfo'][5];?>" oninvalid="validationPattern(this.name)" onblur="validationPattern(this.name)"></p>
      <p><input class="myinput bord" type="date" placeholder="Date de naissance" required name="Date" value="<?php echo $_SESSION['userInfo'][6];?>" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"></p>   
      <p><input class="myinput bord" type="hidden" name="MdpAncienCache" value="<?php echo $_SESSION['userInfo'][7];?>"></p>
      <p><input class="myinput bord" type="password" placeholder="Ancient mot de passe" name="MdpVerif" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"></p>
	    <p><input class="myinput bord" type="password" placeholder="Nouveau mot de passe" name="Mdp" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"></p>
      <p><input class="myinput bord" type="hidden" name="Profil" value="<?php echo $_SESSION['userInfo'][8];?>"></p>
      <button type="submit" class="noir boutton">Valider</button>
    </form>
  </div>
  </div>

<!-- Footer -->
<footer  class="center padding xlarge"style="background-color:#7A8A93">
  <p>Powered by <a href="index.html#about" title="Présenttion" target="_blank" class="hover-text-green">Amélie&Laura</a></p>
</footer>

<?php 
}else{
  header('Location: ./connexion.php');
	exit();
}
?>
</body>
</html>