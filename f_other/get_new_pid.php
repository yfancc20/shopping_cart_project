<?php
    session_start();

    function getNewPId() {
        include_once 'connect_db.php';
        $DB = getDBObject();

        $today = date("y").date("m").date("d");
        $sql = "SELECT MAX(p_id) FROM product_list";
        if ($result = $DB->query($sql)) {
            $row = $result->fetch_array();
            $maxPId = $row[0];
        }

        $dateString = substr($maxPId, 0, 6);
        $numString = substr($maxPId, -3);

        if ($today == $dateString) {
            $num = intval($numString) + 1;
            $num = str_pad($num, 3, "0");
        } else {
            $num = "001";
        }

        $pId = $today . $num;
        return $pId;

    }

    getNewPId();
?>