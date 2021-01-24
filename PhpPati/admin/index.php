<?php 
    require 'config.php';
    if (@$_SESSION['adminlogin'] == true) {
    header("Location:admin.php");}

    if ( $_POST ) {

        
        $admin_mail = $_POST['admin_mail'];
        $admin_pass = $_POST['admin_pass'];

        $kontrol = DB::getRow("SELECT * FROM admin WHERE admin_mail=? AND admin_pass=?",array(
            $admin_mail,
            $admin_pass
        ));

        /** başarılı ise */
        if ( $kontrol ) {
            $_SESSION['adminlogin'] = true;
            $_SESSION['adminkadi'] = $kontrol->admin_id;
            header("Location:admin.php");
            die();
            
        }
        else
        {
            
            die();
        } 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Giriş Yap</h3>
                
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="admin_mail" class="form-control" placeholder="Email" required="">
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="admin_pass" class="form-control" placeholder="Şifre" required="">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Giriş Yap" class="btn float-right login_btn">
                    </div>
                </form>
       
                
            </div>
        </div>
    </div>
</div>
</body>
</html>