<?php
    // check login session
    session_start();
    $login = false;
    if (isset($_SESSION['u_id'])) {
        $login = true;
    }
?>