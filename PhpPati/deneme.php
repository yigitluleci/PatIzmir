<?php require 'config.php'; 

echo $_SESSION['kadi'];

$kullanici_id= $_SESSION['kadi'];

$kullanici = DB::getRow("SELECT * FROM user WHERE kullanici_id =?", array($kullanici_id));

echo $kullanici->kullanici_ad;
?>