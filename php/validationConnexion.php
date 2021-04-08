<?php

if (!empty($_POST)) {
    //Récupération des valeurs du form
    $mail = $_POST['Adresse-email'];
    $mdp=$_POST['Mdp'];

    //Ouverture lecture du fichier identifiant.txt
    $filename = './identifiant.txt';
    $fh = fopen($filename,'r') or die("can't open file");
    $ok = 0;
    while((!feof($fh))&&($ok==0)){
        $line = explode(';',fgets($fh));
	    if (count($line)>2){
		    if (($mail==$line[4])&&($mdp==$line[7])) {
                $_SESSION['userID']=$line[0];
                $_SESSION['userInfo']=$line;
                //Récupération des infos sur les favoris
                fclose($fh);
                $filename = './favoris.txt';
                $fh = fopen($filename,'r') or die("can't open file");
                while((!feof($fh))&&($ok==0)){
                    $ligne=fgets($fh);
                    $fav = explode(';',$ligne);
                    if ($_SESSION['userID']==$fav[0]) {
                        $_SESSION['userFav']=array_slice($fav,-count($fav)+1,count($fav)-1);
                    }
                }    
                fclose($fh);        
                $ok = 1;
                header('Location: ./espaceAcquereur.php');
                exit;
		    }
	    }
    }
    if ($ok == 0) {
        echo '<script language="Javascript"> alert ("Identifiant ou mot de passe incorrect !") </script>';
    }
}
  //echo '<script language="Javascript"> alert ("'.$_SESSION["userID"].'") </script>';
  $servername='localhost';
  $username='laura';
  $password='laura';
  $dbname='Hoikos';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  include './php/recupereFavoris.php';
  $conn->close();
?>
