<?php
session_start();
    if (!isset($_SESSION['a_go_uname']) || !isset($_SESSION['a_go_pwd']) || !isset($_SESSION['a_go_accountid'])) {
        // Not loggeg in. Redirect
        ?>
            <script type="text/javascript">
                function Redirect(){
                    window.location = "../a/";
                }
                document.write('<p class = "text-center" style = "margin-top: 30px; background-color: blue; padding: 10px; color: white; text-align: center; font-weight: bold; font-size: 20px; font-family: arial;">Not logged in</label></p>');
                setTimeout('Redirect()', 3000);
            </script>
        <?php
        die();
    }
?>