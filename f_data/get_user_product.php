<?php
    session_start();

    // parameter: userId
    // return: pList
    function getUserProduct($userId) {

        include_once __DIR__.'/../f_other/connect_db.php';
        $DB = getDBObject();
        $pList = array();

        $sql = "SELECT * FROM product_list WHERE u_id = $userId";
        if ($result = $DB->query($sql)) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                array_push($pList, $row);
            }
        }
        $DB->close();

        return $pList;
    }
?>