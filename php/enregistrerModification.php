<?php  
    //echo '<script language="Javascript"> alert ("'.$_SESSION['userID'].'") </script>';

    //Récupération des données saisies
    $civilite = $_POST['Civilité'];
    $nom=$_POST['Nom'];
    $prenom=$_POST['Prenom'];
    $email=$_POST['Adresse-email'];
    $codepostal=$_POST["Codepostal"];
    $mdp=$_POST['MdpAncienCache'];
    $mdpAncien=$_POST['MdpVerif'];
    $mdpNouveau=$_POST['Mdp'];
    $profil=$_POST['Profil'];
    $user=$_SESSION['userID'];
    //Vérification
    if ((!empty($mdpAncien))) {
        if (($mdpAncien!=$mdp)||(empty($mdpNouveau))) {
            echo '<script language="Javascript"> alert ("Pour changer le mot de passe, veuillez saisir votre mot de passe actuel puis votre nouveau mot de passe.") </script>';
        }else{
            $mdp=$mdpNouveau;
        }
    }

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

    $sql = "UPDATE Utilisateur SET nom='$nom', prenom='$prenom', civilite='$civilite', email='$email', codePostal=$codepostal, mdp='$mdp', profil='$profil' WHERE id=$user;";
    $result = $conn->query($sql);

    $sql = "SELECT * FROM Utilisateur WHERE id=$user;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['userInfo']=$result->fetch_assoc(); 
    } else {
        echo '<script language="Javascript"> alert ("0 results") </script>';
    }
$conn->close();

?>
