<?php
$_SESSION['tableau']=array();

if (extension_loaded ('PDO')) {
    echo 'PDO OK'; 
    } else {
    echo 'PDO KO'; 
    }


   
/*    
try{
    $bdd = new PDO('mysql:host=localhost;dbnam=BDD', 'verdierame', 'Im4uema3cohb!');
}

catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
*/
echo 'oui';
        $mysqli = new mysqli("localhost", "verdierame", "Im4uema3cohb!", "BDD");
		$mysqli -> set_charset("utf8");
        echo 'oui';
		$requete = "SELECT * FROM Annonce";
        echo 'oui';
		$resultat = $mysqli -> query($requete);
        echo 'oui';
		foreach ($resultat as $row) {
            echo $row["id"];
            printf("%s (%s)\n", $row["id"]);
        }
        echo 'non';
		$mysqli->close();




/*
echo 'oui';

$query = $bdd->query("SELECT 'id' FROM 'Annonce'");

echo 'oui';

$resultat = mysql_query($query);
while($ligne=mysql_fetch_array($resultat)){
    echo $ligne['id'].'<br/>';
}
   */ 
    
    /*
    $dsn = 'mysql:host=ADRESSE_DU_SERVEUR;dbname=BDD.sql;port=8000;charset=utf8';
    
    try {
 
        $pdo = new PDO($dsn, 'verdierame' , 'Im4uema3cohb!');
        
        }
        catch (PDOException $exception) {
         
         exit('Erreur de connexion à la base de données');
         
        }

*/

?>
