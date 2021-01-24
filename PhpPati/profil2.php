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


if ( $_POST )
    {

    $kullanici_bagis1 = $_POST['kullanici_bagis'];
    $kullanici_bagis = $kullanici_bagis1 + $kullanici->kullanici_bagis;
    $kullanici_ad    = $kullanici->kullanici_ad;
    $kullanici_soyad = $kullanici->kullanici_soyad;
    $kullanici_mail  = $kullanici->kullanici_mail;

    
    DB::insert("UPDATE user SET kullanici_bagis =? WHERE kullanici_id=?", array(
        $kullanici_bagis,
        $kullanici_id
    ));

    DB::insert("INSERT INTO gelen_bagislar(kullanici_ad,kullanici_soyad,kullanici_mail,para_TL) VALUES(?,?,?,?)",array(
        $kullanici_ad,
        $kullanici_soyad,
        $kullanici_mail,
        $kullanici_bagis1

    ));
    $stok = DB::getRow("SELECT para_TL FROM stok");
    $para_TL = $kullanici_bagis1 + $stok->para_TL;
    DB::insert("UPDATE stok SET para_TL =? ",array(
        $para_TL
    ));


    header("Location:profil2.php?success=1"); 
    }

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
                <li><a  href="profil1.php?cikisYap=1">Cikis Yap</a></li>
            </ul>    

            <div id="content">
            <br>
            <h1>Sokaktaki dostlarımıza destek olman için son bir adım kaldı</h1>
            <br>
            <h3>Destekte bulunacağın her 4 TL ile sokaktaki dostlarımıza 1 KG mama alabilirsin ve en az 4 dostumuzun bir günlük ihtiyacını karşılayabilirsin.</h2>
            <br>
            <form action="" method="POST">
            <div id="bagis">
                        <input type="text" name="kullanici_bagis"placeholder="Bağılanacak Para Tutarını Giriniz">
                        <br>
                        <br>
                        <input type="submit" value="Bağış Yap" id="button">
            </div>   
            </form>         
        </div>        
        </nav>
    </div>




</body>

</html>
