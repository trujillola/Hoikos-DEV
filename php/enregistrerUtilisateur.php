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
            //Ouverture écriture du fichier identifiant.txt
            $fichier = './identifiant.txt';
            $fh = fopen($fichier,'r+') or die("can't open file");
            $ok = 1;
            $i=0;
            while(!feof($fh)){
                $line = explode(';',fgets($fh));
                //  echo '<script language="Javascript"> alert ("count line : '.count($line).' ") </script>';

                if (count($line)>2){
                   // echo '<script language="Javascript"> alert ("i : '.$i.' et nom '.$line[1].' ") </script>';
                    if ($email==$line[4]) {
                        $ok = 0;
                    }
                    $i=$i+1;
                }
            }
           // echo '<script language="Javascript"> alert ("i : '.$i.' ") </script>';

            if ($ok) {
                $id=$i+1;
                $ligne = $id.';'.$nom.';'.$prenom.';'.$civilite.';'.$email.';'.$codepostal.';'.$date.';'.$mdp.';'.$profil."\n";
                fputs($fh, $ligne);
                echo '<script language="Javascript"> alert ("Votre compte a été créé.") </script>';
                $_SESSION['userID']=$id;
                $_SESSION['userInfo']=explode(';',$ligne);
                $civilite = $_POST['Civilité'];
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
            }else{
                echo '<script language="Javascript"> alert ("Ce compte existe déjà ! Essayez une autre adresse mail.") </script>';
            }
    }
}
?>
