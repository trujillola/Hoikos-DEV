<!DOCTYPE html>
<html>
<title>Inscription</title>
<?php require 'php/header.php' ?>
<link rel="stylesheet" href="./css/inscription.css">  
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script type="text/javascript" src="./js/formulaires.js"></script> 

<?php 
    session_start();
    unset($_SESSION['userID']);
    include './php/enregistrerUtilisateur.php';
?>

<body>
	
<!-- Barre de navigation -->
<div class="haut">
  <div class="bar blanc espace-lettres padding carte">
    <a href="index.php" class="bar-item boutton"><b>H</b> Oïkos</a>
     <div class="droite">
      <a href="./connexion.php" class="bar-item boutton">Connexion</a>
      <a href="./index.php#àpropos" class="bar-item boutton">À propos</a>
      <a href="./index.php#contact" class="bar-item boutton">Contact</a>
	</div>  
  </div>
</div>

<a href="javascript:history.back(1)" class="myButton">Retour</a>


<!-- !PAGE CONTENT! -->
<div class="contenu blanc bord-gauche bord-droit">

  <!-- Slideshow Header -->
  <div class="conteneur padding-16" id="etapes">
    <h2><strong>Je m'inscris</strong></h2>
	<div class = "large">Créez votre compte gratuitement et personnalisez votre recherche.</div>
		<div class="large padding-16"" style="text-align:left;">
			<p><i class="fa fa-envelope"></i>  Laissez votre adresse e-mail afin de recevoir les nouvelles annonces correspondant à vos critères de recherche.</p>
			<p><i class="fa fa-heart"></i> Sauvegarder vos recherches et annonces afin de les retrouver facilement.</p>
		</div>
  </div>

  
  <!-- Formulaire inscription -->
  <div class="conteneur padding-16" id="contact">
    <form name='monformulaire' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   	  <p><select class="myinput bord" style="width:100%;" value="Civilité" required name="Civilité" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)">
    	  <option value="" disabled selected hidden>Civilité</option>	
      	<option value="Madame" <?php if(isset($civilite)){if($civilite=="Madame"){echo 'selected';}}?>>Madame</option>
    	  <option value="Monsieur" <?php if(isset($civilite)){if($civilite=="Monsieur"){echo 'selected';}}?>>Monsieur</option>
 		    </select></p>
      <p><input class="myinput bord" type="text" placeholder="Nom" required name="Nom" value="<?php if(isset($nom)){echo $nom;}?>" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"></p>
      <p><input class="myinput bord" type="text" placeholder="Prénom" required name="Prenom" value="<?php if(isset($prenom)){echo $prenom;}?>" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"> </p>
      <p><input class="myinput bord" type="text" placeholder="Email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required name="Adresse-email" value="<?php if(isset($email)){echo $email;}?>" oninvalid="validationPattern(this.name)" onblur="validationPattern(this.name)"></p>
	    <p><input class="myinput bord" type="text" placeholder="Code postal" pattern="^[0-9]{5}$" required name="Codepostal" value="<?php if(isset($codepostal)){echo $codepostal;}?>" oninvalid="validationPattern(this.name)" onblur="validationPattern(this.name)"></p>
      <p><input class="myinput bord" type="password" placeholder="Mot de passe" required name="Mdp" value="" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"></p>
	    <p><input class="myinput bord" type="password" placeholder="Vérification du mot de passe" required name="MdpVerif" value="" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)"></p>
	    <p><select class="myinput bord" style="width:100%;" value="Profil" required name="Profil" oninvalid="validationSimple(this.name)" onblur="validationSimple(this.name)">
            <option value="" disabled selected hidden>Profil</option>	
	        	<option value="Propriétaire" <?php if(isset($profil)){if($profil=="Propriétaire"){echo 'selected';}}?>>Propriétaire</option>
          	<option value="Acquéreur" <?php if(isset($profil)){if($profil=="Acquéreur"){echo 'selected';}}?>>Acquéreur</option>
	    	 </select></p>
	    <button type="submit" class="noir boutton">Valider</button>
    </form>
  </div>
<!-- End page content -->
</div>
 
	<!-- Footer -->
  <?php require 'php/footer.php' ?>
	

</body>
</html>
