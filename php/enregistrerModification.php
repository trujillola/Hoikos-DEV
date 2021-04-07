<?php  
    //echo '<script language="Javascript"> alert ("'.$_SESSION['userID'].'") </script>';

    //Récupération des données saisies
    $civilite = $_POST['Civilité'];
    $nom=$_POST['Nom'];
    $prenom=$_POST['Prenom'];
    $email=$_POST['Adresse-email'];
    $codepostal=$_POST["Codepostal"];
    $date=$_POST['Date'];
    $mdp=$_POST['MdpAncienCache'];
    $mdpAncien=$_POST['MdpVerif'];
    $mdpNouveau=$_POST['Mdp'];
    $profil=$_POST['Profil'];
    
    //Vérification
    if ((!empty($mdpAncien))) {
        if (($mdpAncien!=$mdp)||(empty($mdpNouveau))) {
            echo '<script language="Javascript"> alert ("Pour changer le mot de passe, veuillez saisir votre mot de passe actuel puis votre nouveau mot de passe.") </script>';
        }else{
            $mdp=$mdpNouveau;
        }
    }

    //Ouverture lecture du fichier identifiant.txt
    $filename = './identifiant.txt';
    $fh = fopen($filename,"r+") or die("can't open file");
    $okline=0;

    while((!feof($fh))&&($okline==0)){
        $line=fgets($fh);
        $tabline = explode(';',$line);

	    if ((count($tabline)>2)&&($tabline[0]==$_SESSION['userID'])){
            $newline=$_SESSION['userID'].';'.$nom.';'.$prenom.';'.$civilite.';'.$email.';'.$codepostal.';'.$date.';'.$mdp.';'.$profil;
           // echo '<script language="Javascript"> alert ("newline :'.$newline.'") </script>';
            //echo '<script language="Javascript"> alert ("ICI") </script>';
            $contents=file_get_contents('./identifiant.txt');
			$contents = str_replace($line,$newline,$contents);
			file_put_contents($filename,$contents);	
            $okline=1;
            $_SESSION['userInfo']=explode(';',$newline);        
            echo '<script language="Javascript"> alert ("Vos modifications ont été enregistrées !")</script>';
		}
    }

?>
