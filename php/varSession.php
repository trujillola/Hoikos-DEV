
<?php


//Tableau indexé
$_SESSION['tableau']=array();

$servername='localhost';
$username='laura';
$password='laura';
$dbname='Hoikos';

// Create connections
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
    if ($res->num_rows > 2){
        $j=0;
        while($row2 = $res->fetch_assoc()) {
            $photo[$j]=$row2;
            //echo "Chemin : ".$photo[$i]["libelle"].$photo[$i]["chemin"];
            $row2 = $res->fetch_assoc();
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
     );
     $i=$i+1;
  }
} else {
  echo "0 results";
}
$conn->close();

?>
