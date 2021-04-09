<!DOCTYPE html>
<html>
<title>Hestia Oïkos</title>
<?php require 'php/header.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script type="text/javascript" src="./js/formulaires.js"></script> 
<link rel="stylesheet" href="./css/index.css">


<?php 
session_start();
include './php/contact.php';
if (!empty($_POST)) {
  $tab=$_SESSION['erreurs'];
} else {
  $tab=array(1,1,1,1,1);
}
?>

<body>

    <!-- Barre de navigation -->
    <div class="haut">
      <div class="bar blanc ecart-lettres padding carte">
        <a href="#home" class="bar-item boutton"><b>H</b> Oïkos</a>
        <div class="droite">
        <a href="connexion.php" class="w3-bar-item boutton"><?php
        if (isset($_SESSION['userID'])) {       
          echo 'Me déconnecter';
        }else{
          echo 'Connexion';
        }
        ?></a>
          <a href="#àpropos" class="bar-item boutton">À propos</a>
          <a href="#contact" class="bar-item boutton">Contact</a>
          <a href="espaceAcquereur.php" class="w3-bar-item boutton"><?php
        if (isset($_SESSION['userID'])) {       
          echo 'Mon espace';
        }
        ?></a>
      </div>  
      </div>
    </div>
    
    <!-- Header avec une image   -->
    <header class="bgimg conteneur niveaugris-min" id="home">
      <div class="middle centre">
        <p><a href="./recherche.php" class="boutton xlarge blanc card">Rechercher un bien immobilier</a></p>
      </div>
    </header>

    <!-- À propos -->
    <div class="conteneur padding-32" id="àpropos">
      <h3 class="bord-bas bord-gris-clair padding-16">À propos</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat.
      </p>
    </div>

    <div class="row rangee-padding niveaugris">
    <div class="half" style="width:40%;margin-left:6%;">
        <div class="conteneur ">
          <img src="./images/entrepreuneur1.jpg" alt="John" style="width:100% ">
          <h3>Associé 1</h3>
            <p class="opacité">Fondateur 1</p>
            <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
            <p><button class="boutton gris-clair bloc">Contact</button></p>
        </div>
    </div>  

      <div class="half" style="width:40%; margin-left : 6%;">
        <div class="conteneur">
          <img src="./images/entrepreuneur2.jpeg" alt="Jane" style="width:100%">
          <h3>Associé 2</h3>
          <p class="opacité">Fondateur 2</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="boutton gris-clair bloc">Contact</button></p>
        </div>
    </div>
    </div>

    <!-- Contact -->
    <div class="conteneur padding-32" id="contact">
      <h3 class="bord-bas bord-gris-clair padding-16">Contact</h3>
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

    <!-- Footer -->
    <?php require 'php/footer.php' ?>

<script type="text/javascript">
  var erreurs = <?php echo json_encode($tab) ?>;
  document.body.onload=validation(erreurs);
</script>

</body>
</html>