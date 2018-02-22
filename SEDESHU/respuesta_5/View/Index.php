<!DOCTYPE html>
<html class="no-js">
    <!--<![endif]-->
    <?php
    session_start();
    if ($_SESSION['loggedIn']) {
        include 'main.php';
        ?>
        <body>
            <div class="" id="indexContainer">
                <div id="options" style="display: none;">
                </div>
                <div class="row" id="containerUsers" >
                </div>
            </div>

           
            <?php
        } else {
            ?>
            <script type="text/javascript">window.location = "login.php"</script>
            <?php
        }
        ?>
    </body>

</html>