<?php

if (!empty($_POST)) {
    //Récupération des valeurs du form
    $mail = $_POST['Adresse-email'];
    $mdp=$_POST['Mdp'];

    require 'connexionBDD.php' ;

    $sql = "SELECT * FROM Utilisateur WHERE email='$mail' AND mdp='$mdp';";
    $result = $conn->query($sql);
    if ($result->num_rows>0) {
        $i=0;
        $row = $result->fetch_assoc();
        $_SESSION['userID']=$row['id'];
        $_SESSION['userInfo']=$row;
        
        //Code du fichier recupereFavori.php que je n'arrive pas à inclure simplement.
        //---------------------------------------------------------------------------------
        $user=$_SESSION['userID'];
        $_SESSION['userFav']=array();
        $sql = "SELECT idAnnonce FROM Choisir WHERE idUtilisateur=$user;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $i=0;
          while($row = $result->fetch_assoc()) {
            $_SESSION['userFav'][$i]=$row['idAnnonce'];
            $i=$i+1;
          }
        }
        //---------------------------------------------------------------------------------
        
        $conn->close();
        header('Location: ./espaceAcquereur.php');
        exit();
      } else {
        echo '<script language="Javascript"> alert ("Identifiant ou mot de passe incorrect !") </script>';
      }
}

?>
