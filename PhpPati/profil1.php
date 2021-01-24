<?php require 'config.php';

if ( isset($_GET['cikisYap']) ) {
    unset($_SESSION['login']);
    unset($_SESSION['kadi']);
    header("Location:index.php");
    die();
}

if ( !isset($_SESSION['login']) ) {
    header("Location:index.php");
    die();
}

$kullanici_id= $_SESSION['kadi'];
$kullanici = DB::getRow("SELECT * FROM user WHERE kullanici_id =?", array($kullanici_id));


?>
<!DOCTYPE html>
<html lang="en">

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
    nav.profil ul {
    width: 100%;
    height: 60px;
    list-style: none;
    margin: 0 auto;
    
}
nav.profil ul li {
    width: 33.3333333333%;
    float: left;
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.5s ease;
}
nav.profil ul li:hover
{
    background: tomato;
}
#content h1{
	text-align: center;
}

</style>


<body style="background-image: url(img/19022018_094837_denizden.jpg) ">

    <img src="img/ibblogo.png" alt="">


    <div class="genel">

        <nav class="desk">
            <ul>
                <li><a href="index.php">Anasayfa</a></li>
                <li><a href="info.php">Patİzmİr Nedir</a></li>
                <li><a href="hizmetnok.php">Hizmet noktaları</a></li>
                <li><a href="profil.php">Profilim</a></li>
                <li><a href="login.php">Giriş Yap</a></li>
            </ul>
        </nav>

        <nav class="mob">

            <div class="hamburger-btn">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <ul>
                <li><a href="index.php">Anasayfa</a></li>
                <li><a href="info.php">Patİzmİr Nedir</a></li>
                <li><a href="hizmetnok.php">Hizmet noktaları</a></li>
                <li><a href="profil.php">Profilim</a></li>
                <li><a href="loginlogin.php">Giriş Yap</a></li>
            </ul>
        </nav>

    </div>
    <img id="pati" src="img/paw.png" alt="">
    <h1 id="header">Patİzmir</h1>

    <div id= "anasayfa">
        <nav class="profil">
            <ul>
                <li><a  href="profil1.php">Profil</a></li>
                <li><a  href="profil2.php">Bağış Yap</a></li>
                <li><a href="profil1.php?cikisYap=1">Cikis Yap</a></li>
            </ul>            
        </nav>

        <div id="content">
        	<br>
        	<h1>Hoşgeldin, <?php echo $kullanici->kullanici_ad ?> <?php echo $kullanici->kullanici_soyad ?> </h1>
        	<br>
        	<h2>Patİzmir sistemine kayıt olduğun için biz ve sokaktaki canlarımız sana teşekkür ediyoruz.</h2>
        	<br>
        	<p>Bu güne kadar toplam <?php echo $kullanici->kullanici_bagis ?> TL yardımda bulundun.</p>
        	<br>
        	<p>Dilersen yukarıdaki "Bağış Yap" menüsünden bağış yapıp bizimle beraber sokak hayvanlarına yardım edebilirsin.</p>
        </div>

    </div>




</body>

</html>
