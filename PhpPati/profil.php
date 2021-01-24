<?php require 'config.php'; 

if (@$_SESSION['login'] == true) {
    header("Location:profil1.php");
}
else{
    header("Location:login.php");
}


?>
