<?php
session_start();

$id=$_POST['id'];
$user=$_SESSION['userID'];

$filename = '../favoris.txt';
$fh = fopen($filename,"a+") or die("can't open file");

while(!feof($fh)){
    $line=fgets($fh);
    $tabline = explode(';',$line);
    $newline="$user";
    if($user==$tabline[0]){
        for ($i=1;$i < count($tabline)-1; $i++) { 
            if($id!=$tabline[$i]){
                $newline=$newline.';'.$tabline[$i];
            }
        }
        $newline=$newline.';'."\n";
        $userline=$newline;
        $contents=file_get_contents($filename);
        $contents = str_replace($line,$newline,$contents);
        file_put_contents($filename,$contents);	
    }
}
fclose($fh);
$fav=explode(';',$userline);
$_SESSION['userFav']=array_slice($fav,-count($fav)+1,count($fav)-1);

?>