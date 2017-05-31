<?php
    session_start();

    function getProductType() {
        include_once __DIR__.'/../f_other/connect_db.php';
        $DB = getDBObject();
        $typeList = array();

        $sql = "SELECT * FROM product_type";
        if ($result = $DB->query($sql)) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                array_push($typeList, $row);
            }
        }
        $DB->close();

        return $typeList;
    }

    function getTypeCount() {
        include_once __DIR__.'/../f_other/connect_db.php';
        $DB = getDBObject();
        $countList = array();

        $sql = "SELECT T.t_id, COUNT(L.t_id) AS count FROM product_list AS L LEFT JOIN product_type AS T ON L.t_id = T.t_id GROUP BY T.t_id";
        if ($result = $DB->query($sql)) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $tId = $row['t_id'];
                $countList[$tId] = $row['count'];
            }
        }
        $DB->close();

        return $countList;
    }


?>