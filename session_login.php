<?php
    // check login session
    session_start();
    $login = false;
    if (isset($_SESSION['u_id'])) {
        $login = true;
    }

    function redirect ($login){
        if ($login == false) {
            $_SESSION['from_url'] = $_SERVER['PHP_SELF'];
            header('Location: login.php');
        }
    }
?>