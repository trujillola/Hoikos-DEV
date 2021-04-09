<?php
if (!empty($_POST)) {
  
    //Récupération des données saisies
    $civilite = $_POST['Civilité'];
    $nom=$_POST['Nom'];
    $prenom=$_POST['Prenom'];
    $email=$_POST['Adresse-email'];
    $codepostal=$_POST["Codepostal"];
    $date=$_POST['Date'];
    $mdp=$_POST['Mdp'];
    $mdpverif=$_POST['MdpVerif'];
    $profil=$_POST['Profil'];
    
    //Vérification
    if ($mdp!=$mdpverif) {
        echo "<h2 class = 'titre' > ECHEC : votre compte n'a pas pu être créé : les mots de passe sont différents ! </h2>";
    }else{
        $servername='localhost';
        $dbname='Hoikos';
    
        // Create connection
        $conn = new mysqli($servername, $_SESSION['username'], $_SESSION['password'], $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id FROM Utilisateur WHERE email='$email';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<script language="Javascript"> alert (" ECHEC : un compte est déjà lié à cette adresse mail ! ") </script>';
            $conn->close();

        } else {
            $sql = "INSERT INTO Utilisateur(nom,prenom,civilite,email,codePostal,mdp,profil) VALUES ('$nom','$prenom','$civilite','$email',$codepostal,'$mdp','$profil');";
            $result=$conn->query($sql);
            //On récup la ligne qu'on vient d'ajouter quand même
            $result2=$conn->query("SELECT * FROM Utilisateur WHERE email='$email';");
            $_SESSION['userInfo']=$result2->fetch_assoc();
            $_SESSION['userID']=$_SESSION['userInfo']['id'];
            $conn->close();
            unset($nom);
            unset($prenom);
            unset($email);
            unset($codepostal);
            unset($date);
            unset($mdp);
            unset($mdpverif);
            unset($profil);
            header('Location: ./espaceAcquereur.php');
            exit();
        }

    }
}
?>
