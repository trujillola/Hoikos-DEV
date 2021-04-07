<?php 

//Fonctions
function verifchampspattern($nom,$pattern,&$ok,$int){
  $res = trim($_POST[$nom]," \n\r\t\v\0");
  $_SESSION["erreurs"][$int]=1;

  if (empty($_POST[$nom])){
    $_SESSION["erreurs"][$int]=0;
    $ok= 0;
  } else {
    switch ($nom) {
      case'Adresse-email' : {
        if (filter_var($_POST[$nom],FILTER_VALIDATE_EMAIL)=="") {
          $_SESSION["erreurs"][$int]=0;
          $ok = 0;
        }
        break;
      }
      default : {
        if (!preg_match($pattern,$res)) {
          $_SESSION["erreurs"][$int]=0;
          $ok = 0;
        }
        break;
      }
    }
  }
  return($res);
}

function verifchampsrequired($nom,&$ok,$int){
  $res=trim($_POST[$nom]," \n\r\t\v\0");
  $_SESSION["erreurs"][$int]=1;
  if (empty($_POST[$nom])) {
    $_SESSION["erreurs"][$int]=0;
    $ok = 0;
  }
  return($res);
}


//Instructions ! 
  if (!empty($_POST)){

    if (isset($_SESSION['erreurs'])) {
      unset($_SESSION['erreurs']);
    }

    //Initialisation du tableau associatif des messages d'erreur : 1 signifie pas d'erreur, 0 signifie une erreur sur le champs
    $_SESSION["erreurs"] = array(1,1,1,1,1);

    $ok = 1;

    //Vérification et récupération des valeurs du formulaire
    $nom=verifchampspattern("Nom","/^[ a-zA-Z]+$/",$ok,0);
    $prenom=verifchampspattern("Prenom","/^[ a-zA-Z]+$/",$ok,1);
    $mail=verifchampspattern("Adresse-email","",$ok,2);
    $sujet=verifchampsrequired("Sujet",$ok,3);
    $message=wordwrap(verifchampsrequired("Message",$ok,4), 70, "\r\n");

    //Envoi du mail
    if ($ok) {
      
      $headers="FROM:".$nom." ".$prenom."<".$mail.">";
      if(isset($_SESSION['idItem'])){
        $destinataire=$_SESSION['tableau'][$_SESSION['idItem']]['mail'];
      }else{
        $destinataire="trujillola@eisti.eu";
      }
      $testmail=mail($destinataire,$sujet,$message,$headers,"-f trujillola@eisti.eu");
      if($testmail) {
        echo '<script language="Javascript"> alert("Votre mail a été envoyé avec succès !") </script>';
      }else{
        echo '<script language="Javascript"> alert("Votre mail n\'a pas pu être envoyé !") </script>';
      }

      unset($nom);
      unset($prenom);
      unset($mail);  
      unset($sujet);
      unset($message); 
      
    }else{
      echo '<script language="Javascript"> alert("Votre mail n\'a pas été envoyé car des champs sont invalides !") </script>';
    }
  }
?>