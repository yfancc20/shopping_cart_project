<?php
    // check login session
    session_start();
    $login = false;
    if (isset($_SESSION['u_id'])) {
        $login = true;
    }

    function redirect ($login){
        if ($login == false) {
            header('Location: product_list.php');
        }
    }
?>