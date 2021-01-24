<?php require 'config.php'; ?>
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
                <li><a href="login.php">Giriş Yap</a></li>
            </ul>
        </nav>

    </div>

    <img id="pati" src="img/paw.png" alt="">
    <h1 id="header">Patİzmir</h1>

    <div id="anasayfa">

        <h2>İzmir Büyükşehir Belediyesi Patİzmir resmi sitesine hoşgeldiniz.</h2> <br> <br>

        <p>Patİzmir şehrimizde yaşayan sokak hayvanlarının mama ihtiyaçlarının karşılanması ve korunması adına yürütülen bir projedir.</p> <br>
        <p>Daha fazla bilgi için "Patİzmir Nedir" sayfasını ziyaret ediniz.</p>

    </div>
</body>
</html>
