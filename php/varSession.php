
<?php
//Tableau indexé
$_SESSION['tableau']=array();

$servername='localhost';
$username='verdierame';
$password='Im4uema3cohb!';
$dbname='Hoikos';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Annonce;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i=0;
  while($row = $result->fetch_assoc()) {

    $id=$row["id"];
    //Récupération photos SELECT
    $sql = "SELECT p.chemin,t.libelle FROM Photo p, Titre t WHERE (p.idTitre=t.id) AND (p.idAnnonce=$id)";
    $res = $conn->query($sql);
    if ($res->num_rows > 0){
        $j=0;
        while($row2 = $res->fetch_assoc()) {
            $photo[$j]=$row2;
            //echo "Chemin : " . $photo[$i]["libelle"]. $photo[$i]["chemin"];
            $j=$j+1;
        }
    }
    //echo "</br>";

    //Récupération atouts
    $id=$row["id"];
    $sql = "SELECT a.libelle FROM `Atout` a,`AvoirAtout` aa WHERE a.id=aa.idAtout AND aa.idAnnonce=$id";
    $res = $conn->query($sql);
    if ($res->num_rows > 0){
        $j=0;
        while($row2 = $res->fetch_assoc()) {
            $atout[$j]=$row2["libelle"];
            //echo "Chemin : " . $atout[$j]."<br>";
            $j=$j+1;
        }
    }
   // echo "</br>";
   
    $_SESSION['tableau'][$i]=array(
        'id'  =>$row["id"],
        'cat' => $row["cat"],
        'prix' => $row["prix"],
        'photo' => $photo, //Attention, ici photo est un tableau de tableaux associatifs
        'description' => $row["descri"],
        'atout' => $atout,
        'adresse' => $row["adresse"],
        'mail' => $row["email"],
       // 'favoris' => $line[11]
     );
     $i=$i+1;
  }
} else {
  echo "0 results";
}
$conn->close();




/*
$fh=fopen('./fichier.txt','r') or die("can't open file");
$i = 0;
while(!feof($fh)){
    $line = explode(';',fgets($fh));
    if (count($line)>1) {
        $_SESSION['tableau'][$i]=array(
           'id'  => $line[0],
           'cat' => $line[1],
           'source' => $line[2],
           'nom' => $line[3],
           'prix' => $line[4],
           'photo' => $line[5], //Attention, ici photo contient photo1%photo2%photo3 qu'il faudra exploser à l'utilisation
           'titre' => $line[6], //Attention, ici titre contient photo1%photo2%photo3 qu'il faudra exploser à l'utilisation
           'description' => $line[7],
           'atout' => $line[8],
           'adresse' => $line[9],
           'mail' => $line[10],
           'favoris' => $line[11]
        );
    }
   $i++;
}
*/
?>
