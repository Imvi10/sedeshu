<!DOCTYPE html>
<html class="no-js">
    <!--<![endif]-->
    <?php
    session_start();
    if ($_SESSION['loggedIn']) {
        include 'main.php';
        ?>
        <body>
            <div class="" id="userContainer">
                <div id="containerFormUser" style="display: none;">
                </div>
                <div class="row" id="containerUsers" >
                </div>
            </div>

            <div id="modal_User" class="modal fade" role="dialog">
                <div class="modal-dialog" id="modal_User_Size">
                    <div class="modal-content">
                        <div id="modal_User_Head" class="modal-header">
                        </div>
                        <div id="modal_User_Content" class="modal-body">
                        </div>
                        <div class="modal-footer" id="modal_User_Footer">
                        </div>
                    </div>

                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    if (permisos === 1      ) {
                        window.location = "Index.php";
                    } else if (permisos === 2) {
                        getAllUsers();
                    }
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

</html>