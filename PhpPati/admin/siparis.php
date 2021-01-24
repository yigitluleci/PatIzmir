<?php require 'config.php'; 

if ( isset($_GET['cikisYap']) ) {
    unset($_SESSION['adminlogin']);
    unset($_SESSION['kadi']);
    header("Location:index.php");
    die();
}

if ( !isset($_SESSION['adminlogin']) ) {
    header("Location:index.php");
    die();
}

if($_POST){

    $mamakg = $_POST['mamakg'];
    $gidenpara = $mamakg * 4;


    $stok = DB::getRow("SELECT * FROM stok");
    $mama_kg = $stok->mama_KG + $mamakg;
    $para_TL = $stok->para_TL - $gidenpara;
    DB::insert("UPDATE stok SET para_TL =? ",array(
    $para_TL
    ));

    DB::insert("UPDATE stok SET mama_KG =?",array(
    $mama_kg    

    ));

    header("Location:siparis.php?success=1"); 

}











?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Patİzmir</title>

    <link rel="stylesheet" href="ayar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script>
        $(document).ready(function() {
            $(".hamburger-btn .fa-times").hide();

            $(".hamburger-btn .fa-bars").click(function() {
                $(this).hide();
                $(".hamburger-btn .fa-times").show();
                $(".mob ul").addClass("aktif");
            });

            $(".hamburger-btn .fa-times").click(function() {
                $(this).hide();
                $(".hamburger-btn .fa-bars").show();
                $(".mob ul").removeClass("aktif");
            });
        }); 

    </script>
</head>
<style>
    #content h1{
    text-align: center;
}
#button{
    background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}#button:hover{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
#bagis{
    text-align: center;
}
</style>
<body style="background-image: url(img/19022018_094837_denizden.jpg);
    font-family: 'Numans', sans-serif;">

<img src="img/ibblogo.png" alt="">


    <div class="genel">

        <nav class="desk">
            <ul>
                <li><a href="admin.php">Anasayfa</a></li>
                <li><a href="takip.php">Mama Takip</a></li>
                <li><a href="stok.php">Stok Durumu</a></li>
                <li><a href="siparis.php">Sipariş ver</a></li>
                <li><a href="admin.php?cikisYap=1">Çıkış yap</a></li>
            </ul>
        </nav>

        <nav class="mob">

            <div class="hamburger-btn">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <ul>
                <li><a href="admin.php">Anasayfa</a></li>
                <li><a href="takip.php">Mama Takip</a></li>
                <li><a href="stok.php">Stok Durumu</a></li>
                <li><a href="siparis.php">Sipariş ver</a></li>
                <li><a href="admin.php?cikisYap=1">Çıkış yap</a></li>
            </ul>
        </nav>

    </div>

    <img id="pati" src="img/paw.png" alt="">
    <h1 id="header">Patİzmir</h1>

    <div id="anasayfa">

        <div id="content">
            <br>
            <h1>Stok için mama satın al</h1>
            <br>
            <h1>1kg Mama 4Tl </h1>
            <br>
            <form action="" method="POST">
            <div id="bagis">
                    <input type="text" name="mamakg"placeholder="Kaç Kg mama almak istersiniz">
                    <br>
                    <br>
                    <input type="submit" value="Mama Al" id="button">
            </div>   
            </form>         
        </div>
        

    </div>
</body>
</html>