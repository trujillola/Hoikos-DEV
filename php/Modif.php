<?php
session_start();
$classe=$_POST["classe"];
$id=$_POST["identifiant"];
$user=$_SESSION['userID'];

if ($classe=="fa-heart-o") {
    $filename = '../favoris.txt';
    $fh = fopen($filename,"a+") or die("can't open file");
    $ok=0;
    while((!feof($fh))&&(ok==0)){
        $line=fgets($fh);
        $tabline = explode(';',$line);
        $newline="$user";
        if($user==$tabline[0]){
            for ($i=1;$i < count($tabline)-1; $i++) { 
                $newline=$newline.';'.$tabline[$i];
            }
            $newline=$newline.';'.$id.';'."\n";
            $userline=$newline;
            $contents=file_get_contents($filename);
            $contents = str_replace($line,$newline,$contents);
            file_put_contents($filename,$contents);	
            $ok=1;
        }
    }
    if ($ok==0) {
        $newline=$user.';'.$id.';'."\n";
        $userline=$newline;
        fputs($fh,$newline);
    }
    fclose($fh);

} else if ($classe=="fa-heart") {
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
}
$fav=explode(';',$userline);
$_SESSION['userFav']=array_slice($fav,-count($fav)+1,count($fav)-1);
?>