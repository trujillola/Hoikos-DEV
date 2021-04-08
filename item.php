<!DOCTYPE html>
<html>
<title>Annonce</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/item.css"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">


<?php 
  session_start();
  include './php/contact.php';
  include './php/varSession.php';
  $_SESSION['idItem']=$_GET['id'];
  $idItem=$_SESSION['idItem'];
  $photos=$_SESSION['tableau'][$idItem]['photo'];
  if (!empty($_POST)) {
    $tab=$_SESSION['erreurs'];
  } else {
    $tab=array(1,1,1,1,1);
  }
?>

<body>

<!-- Navbar (sit on top) -->
<div class="haut">
  <div class="bar blanc espace-lettres padding carte">
    <a href="./index.php" class="bar-item boutton"><b>H</b> Oïkos</a>
     <div class="droite">
     <a href="connexion.php" class="w3-bar-item boutton"><?php
        if (isset($_SESSION['userID'])) {       
          echo 'Me déconnecter';
        }else{
          echo 'Connexion';
        }
        ?></a>
      <a href="espaceAcquereur.php" class="w3-bar-item boutton"><?php
        if (isset($_SESSION['userID'])) {       
          echo 'Mon espace';
        }
        ?></a>
      <a href="./index.php#about" class="w3-bar-item boutton">À propos</a>
      <a href="./index.php#contact" class="w3-bar-item  boutton">Contact</a>
    </div>  
  </div>
</div>

	<a href="javascript:history.back(1)" class="myButton">Retour</a>

<!-- !PAGE CONTENT! -->
<div class="contenu blanc bord-gauche bord-droit">

  <!-- Affichage des images -->
  <?php   

  ?>
  <div class="conteneur" id="apartment">
    <h2><strong><?php echo $_SESSION['tableau'][$idItem]['photo'][0]['libelle'];?></strong></h2>
	  <h2 class="texte-gris"><strong><b><?php echo $_SESSION['tableau'][$idItem]['prix']."$";?></b></strong></h2>

    <div class="position-conteneur" style = "margin:0.01em 16px;">
       <img src="" style="width:100%;" id="currentImage">
       <?php
        if (isset($_SESSION['userID'])) {
        ?>
         <div class="conteneur affiche-haut centre" id="intéressé">
          <p><i id = "fav1" class="fa fa-heart-o fa-2x favori" onclick = "changeFavori(this.id)"></i></i></p>
         </div>
         <?php
        }
        ?>
       <div class="conteneur affiche-milieu centre" id="intéressé">
        <p><a href="#contact" class="boutton xlarge noir carte invisible">Contacter le propriétaire</a></p>
       </div>
       <div class="conteneur bas-gauche noir">
        <p id="etiquette"></p>
      </div>
    </div>

  <div class="rangee-padding section">
  <?php
    for ($i=1; $i < 4; $i++) { 
      //echo '<img src"./images/'.$photo[$i]['chemin'].'">';
      echo '<div class="colonne s2">';
      echo '<img class="demo opacité hover-opacité-off" src="./images/'.$photos[$i]['chemin'].'" style="width:100%;cursor:pointer" onclick="affiche(this.src,this.title)" title="'.$photos[$i]['libelle'].'">';
      echo "</div>";
     }
  ?>
  <div class="conteneur">

  <!-- Description -->
    <div class="conteneur padding-16" id="description">
    <h2 class="bord-bas bord-gris-clair padding-16">Description</h2>
    <p><?php echo $_SESSION['tableau'][$idItem]['description'];?></p>
    </div>

  <!-- Installations -->
    <div class="conteneur padding-16" id="installations">
      <h2 class="bord-bas bord-gris-clair padding-16">Installations et points forts</h2>
      <div class="w3-row large" style="margin-left:27%;">
      <div class="colonne s6">
      <?php
        for ($i=0; ($i < 3)&&($i<count($_SESSION['tableau'][$idItem]['atout'])); $i++) { 
      ?>
          <p><i class="fa fa-dot-circle-o"></i> <?php echo $_SESSION['tableau'][$idItem]['atout'][$i]; ?></p>
      <?php
        }
      ?>
        </div>
        <div class="colonne s6">
      <?php
        for  ($i=3;($i < 6)&&($i<count($_SESSION['tableau'][$idItem]['atout'])); $i++) { 
      ?>
          <p><i class="fa fa-dot-circle-o"></i> <?php echo $_SESSION['tableau'][$idItem]['atout'][$i]; ?></p>
      <?php
        }
      ?>
        </div>
      </div>
    </div>
    
  <!-- Adresse et carte interactive -->
    <div class="conteneur padding-16" id="adresse">
      <h2 class="bord-bas bord-gris-clair padding-16">Adresse</h2>
	    <iframe style="display: block;
      margin-left: auto;
      margin-right: auto;  
      width:85%;" src="<?php echo $_SESSION['tableau'][$idItem]['adresse'];?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  

    <!-- Contact -->
    <div class="conteneur padding-32" id="contact">
      <h3 class="bord-bas bord-gris-clair padding-16">Contacter le propriétaire.</h3>
      <p>Entrez en contact avec nous pour parler de votre projet.</p>
      <form  name='monformulaire' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input class="myinput section bord" type="text" placeholder="Nom" value="<?php if(isset($nom)){echo $nom;}?>" required name="Nom" pattern="^[ a-zA-Z]+$" oninvalid="validationPattern(this.name)" onblur="validationPattern(this.name)"/>
        <input class="myinput section bord" type="text" placeholder="Prenom" value="<?php if(isset($prenom)){echo $prenom;}?>" required name="Prenom" pattern="^[ a-zA-Z]+$" oninvalid="validationPattern(this.name)" onblur="validationPattern(this.name)"/>
        <input class="myinput section bord" type="text" placeholder="Email"  value="<?php if(isset($mail)){echo $mail;}?>" required name="Adresse-email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" oninvalid="validationPattern(this.name)" onblur="validationPattern(this.name)">
        <input class="myinput section bord" type="text" placeholder="Sujet"  value="<?php if(isset($sujet)){echo $sujet;}?>" required name="Sujet" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)">
        <textarea class="myinput section bord" type="text" placeholder="Message"  value="<?php if(isset($message)){echo $message;}?>" required name="Message" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"></textarea>
        <button  onclick="" class="noir boutton section" type="submit" >
          <i class="fa fa-paper-plane"></i> ENVOYER
        </button>
      </form>
    </div>

    <div style = "height:10%;"></div>
	
	<!-- Fin du contenu de la page -->
	</div>

</div>

 <!-- Footer -->
 <footer  class="centre padding large" style="background-color:#37423a; margin-top:2%;;">
  <p style="color:white" >Powered by <a href="#">Amélie&Laura</a></p>
</footer>>

<script type="text/javascript">
  var erreurs = <?php echo json_encode($tab)?>;
  document.body.onload=validation(erreurs);
</script>

</body>
<script type="text/javascript" src="./js/formulaires.js"></script> 
<script type="text/javascript" src="./js/item.js"></script> 

</html>
