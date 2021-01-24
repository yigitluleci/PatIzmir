<?php 
    require 'config.php';
    if (@$_SESSION['login'] == true) {
    header("Location:profil1.php");}

    if ( $_POST ) {

        
        $kullanici_mail = $_POST['kullanici_mail'];
        $kullanici_sifre = $_POST['kullanici_sifre'];

        $kontrol = DB::getRow("SELECT * FROM user WHERE kullanici_mail=? AND kullanici_sifre=?",array(
            $kullanici_mail,
            $kullanici_sifre
        ));

        /** başarılı ise */
        if ( $kontrol ) {
            $_SESSION['login'] = true;
            $_SESSION['kadi'] = $kontrol->kullanici_id;
            header("Location:profil1.php");
            die();
            
        }
        else
        {
            header("Location:index.php?error=1");
            die();
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Patİzmir</title>
    <link rel="stylesheet" href="ayar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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

    <div id="signin">
        <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="kullanici_mail" class="form-control" placeholder="Email" required="">
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="kullanici_sifre" class="form-control" placeholder="Şifre" required="">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Giriş Yap" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <?php if ( isset($_GET['success']) ): ?>
                <div class="alert alert-success">
                    Başarıyla kayıt oldunuz.
                </div>
            <?php endif ?>

            <?php if ( isset($_GET['error']) ): ?>
                <div class="alert alert-danger">
                    email veya şifre hatalı.
                </div>
            <?php endif ?>

            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Üye Değil misin ?  <a href="signin.php">Üye Ol</a>
                </div>
                
            </div>
    </div>


</body>

</html>
