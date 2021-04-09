<!DOCTYPE html>
<html lang="fr">
    <title>Connexion</title>
    <?php require 'php/header.php' ?>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="./css/css.css" rel="stylesheet">
    <link href="./css/inscription.css" rel="stylesheet">
    <script type="text/javascript" src="./js/formulaires.js"></script> 

    <style>
   
    body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
    .menu {display: none}
    .bgimg {
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 100%;
    }
    </style>

<?php 
    session_start();
    unset($_SESSION['userInfo']);
    unset($_SESSION['userID']);
    unset($_SESSION['userFav']);                          
    include './php/validationConnexion.php';
?>

<body>
    
<!-- Barre de navigation -->
<div class="top">
  <div class="w3-bar white wide padding card">
    <a href="index.php" class="w3-bar-item menu "><b>H</b> Oïkos</a>
     <div class="w3-right">
      <a href="index.php#àpropos" class="w3-bar-item menu">À propos</a>
      <a href="index.php#contact" class="w3-bar-item menu ">Contact</a>
	</div>  
  </div>
</div>

<!-- zone de connexion -->
<div class="conteneur padding-32" id="contact">
<form name="monformulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div id="connexion" class="appart white xlarge bandeau"> 
  <hr><h1>Connexion</h1><hr>
  </div>
  <div class="contenu">
     <div class="center padding-16 white xlarge">
       <input class="myinput bord" type="text" placeholder="Adresse e-mail" name="Adresse-email" required oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)">
      </div>
      <div class="center padding-16 white xlarge">
        <input class="myinput bord" type="password" placeholder="Mot de passe" name="Mdp" required oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)">
      </div class="bouton bouton padding-16 white xlarge">
      <button class="login xlarge bouton center">Login</button>
  </div>
</form>
</div>
<div class="xlarge center" id="inscription">
  <a href="inscription.php" title="Inscription" class="hover-text-green">Première inscription?</a>
</div>

<!-- Footer -->
<?php require 'php/footer.php' ?>

</body>
</html>