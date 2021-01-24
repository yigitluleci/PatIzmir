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

$stok = DB::getRow("SELECT * FROM stok");



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

        <h2>Sistemde <?php echo $stok->para_TL ?> TL ve <?php echo $stok->mama_KG ?> KG mama vardır.</h2>

        

    </div>
</body>
</html>