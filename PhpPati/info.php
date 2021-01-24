<?php require 'config.php'; ?>
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

    <div id="info">
        <h2>Patİzmir Nedir?</h2> <br> <br>

        <p>Patİzmir bizimle beraber güzel şehrimizde yaşayan sokak hayvanlarımızın beslenme ihtiyaçlarını karşılamak ve besinlerini güvence altına almak için oluşturulmuş bir projedir.</p> <br>

        <p>Patİzmir projesi sayesinde şehrimizin belirli ilçelerindeki belirli parklarına Patİzmir mama merkezleri kurulacaktır. Kurulan mama merkezlerinde hayvanlarımızın yediği mamalar takip edilecek, günde kaç hayvanın karnını doyurduğumuzu takip edebileceğiz. Patİzmir mama merkezlerinde sokak hayvanlarımızın mamaları güvence altındadır. Merkezimizde mamaların bulunduğu bir ana kabımız vardır ve bu kaba bağlı 10 adet 150gr. mama alabilen taslarımız bulunmaktadır. Mama kaplarındaki mamalar bittikçe merkaz kaptan 150 grama tamamlanacak şekilde mama akışı yapılır. Bu sistem sayesinde o bölgede gün içinde kaç hayvanı doyurabildiğimizi takip edebiliriz ve yine bu sistem sayesinde olası bir mama çalınma olayı ile karşı karşıya gelinirse sistem, kaptan çıkan mamaların kaç saniyede çıktığını kontrol ederek anormal mama çıkışlarının kaydını tutar ve 15 dakika boyunca ana kaptan anormal çıkışın bulunduğu kaba mama aktarımı yapılmaz. Caydırıcı olması bakımından sistemimizin bulunduğu her bölge 7/24 kamera kaydı ile takip edilmektedir. </p>



    </div>


</body>

</html>
