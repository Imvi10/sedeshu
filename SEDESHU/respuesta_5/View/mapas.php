<!DOCTYPE html>
<html class="no-js">
    <!--<![endif]-->
     <style>
       #map {
        height: 400px;
        width: 100%;
       }
       </style>
    <?php
    session_start();
    if ($_SESSION['loggedIn']) {
        include 'main.php';
        ?>
        <body>
            <div class="" id="userContainer">
                <div id="containerFormUser" style="display: none;">
                </div>
                <div class="row" id="containerObras" >
                </div>
            </div>

           <div id="map"></div>
            <script type="text/javascript">
                $(document).ready(function () {
                    getAllObras();
                });
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">window.location = "login.php"</script>
            <?php
        }
        ?>
    </body>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTilDeUfKgiGV2E8kBJ-yGn0ispvO6Qhc&callback=initMap">
    </script>

</html>