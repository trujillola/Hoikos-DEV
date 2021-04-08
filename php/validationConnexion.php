<?php

if (!empty($_POST)) {
    //Récupération des valeurs du form
    $mail = $_POST['Adresse-email'];
    $mdp=$_POST['Mdp'];

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

    $sql = "SELECT * FROM Utilisateur WHERE email='$mail' AND mdp='$mdp';";
    $result = $conn->query($sql);
    if ($result->num_rows>0) {
        $i=0;
        $row = $result->fetch_assoc();
        $_SESSION['userID']=$row['id'];
        $_SESSION['userInfo']=$row;
        include './recupereFavoris.php';
        $conn->close();
        header('Location: ./espaceAcquereur.php');
        exit();
      } else {
        echo '<script language="Javascript"> alert ("Identifiant ou mot de passe incorrect !") </script>';
      }
}

?>
