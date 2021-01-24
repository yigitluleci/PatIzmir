<?php require 'baglan.php'; 

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
nav.takip ul {
    width: 100%;
    height: 60px;
    list-style: none;
    margin: 0 auto;
    
}
nav.takip ul li {
    width: 50%;
    float: left;
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.5s ease;
}
nav.takip ul li:hover
{
    background: tomato;
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

        <nav class="takip">
            <ul>
                <li><a  href="takip.php">Tüm Çıkışlar</a></li>
                <li><a  href="takip2.php">Şüpheli Çıkışlar</a></li>
            </ul>            
        </nav>

        <h2 style="text-align: center;">Mama Takip</h2>
        <p>Mama takip sistemi ile tüm mama çıkışları ve şüpheli çıkışlar kontrol edilir.</p>
        <table style="width: 100%" border="1">
        
        <tr>
            <th>ID</th>
            <th>Konum Adı</th>
            <th>Çıkış miktarı(Gram)</th>
            <th>Çıkış süresi(saniye)</th>
        </tr>

        <?php

        $bilgilerimsor=$db->prepare("SELECT * from cikislar");
        $bilgilerimsor->execute();

        $say=0;
        
        while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) {

         ?>
         	<?php if ($bilgilerimcek['cikis_miktar'] > 100 && $bilgilerimcek['cikis_sure']< 15) {?>

         		<tr>
            <td><?php echo $bilgilerimcek['cikislar_id'] ?></td>
            <td><?php echo $bilgilerimcek['konum_ad'] ?></td>
            <td><?php echo $bilgilerimcek['cikis_miktar'] ?></td>
            <td><?php echo $bilgilerimcek['cikis_sure'] ?></td>          
        		</tr>
         	<?php } ?>


        <?php } ?>

    </table>


        

    </div>
</body>
</html>