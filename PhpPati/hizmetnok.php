<?php require 'config.php' ?>

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
    #map{
    color: black;
    height: 500px;
    width: 70%;
    padding: 20px;
    display: block;
    margin: 100px auto;
    box-shadow: 5px 5px 5px 0 rgba(0, 0, 0, 0.50);
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 0.9em;

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

    

    <div id="map">
        
        

        

        <script>
            <?php 
                    $conn = new mysqli( "localhost", "root", "12345678" ,"patizmir" );
                    

                    if ($conn->connect_error) {

                    die("Connection failed: " . $conn->connect_error);}

                    $sql = ("SELECT * FROM hizmet_noktalari ");
                    
                    $result = $conn->query($sql);
                
                    $hizmetDur = array();
                    $lat = array();
                    $long = array();
                    $konAd = array();
                    $i=0;
                    if($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                        

                            $hizmetDur[$i] = $row["hizmet_durumu"];
                            $lat[$i] = $row["loclat"];
                            $long[$i] = $row["loclong"];
                            $konAd[$i] = $row["konum_gorunenad"];
                            
                        $i++;  
                        }
                    }
                    else {

    echo "0 results";

}   
        ?>

            function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {zoom: 12, center: { lat: 38.423733, lng: 27.142826 }});

            var js_lat = <?php echo json_encode($lat); ?>;
            var js_long = <?php echo json_encode($long); ?>;
            var js_hizmetDur = <?php echo json_encode($hizmetDur); ?>;
            var js_konAd = <?php echo json_encode($konAd); ?>;


            var i;

            for(i=0; i< js_konAd.length; i++){

            addMarker({
                coordinates:{lat: parseFloat(js_lat[i]) , lng: parseFloat(js_long[i])},
                
                content : js_konAd[i]+'<br>' +'Hizmet Durumu:' +js_hizmetDur[i]
                
            });
            }

            function addMarker(options){
                var marker = new google.maps.Marker({
                    position: options.coordinates,
                    map : map, 
                    
                });
                var infoWindow = new google.maps.InfoWindow({
                    content : options.content,

                });



                marker.addListener('click', function(){
                    infoWindow.open(map,marker);
                });
            }



        


    }
        </script>
        
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFnziyz89Qd27KvPWBUwwfKnY2DAmVz-E&callback=initMap"> 
        </script>

</body>

</html>
