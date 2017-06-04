<?php
    session_start();

    function getProductFromType($typeId) {

        include_once __DIR__.'/../f_other/connect_db.php';
        $DB = getDBObject();
        $pList = array();

        $sql = "SELECT * FROM product_list";
        if ($typeId > 0) {
            $sql .= " WHERE t_id = $typeId";
        }

        $erow = array();
        $productList = array();

        if ($result = $DB->query($sql)) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $erow['p_id'] = $row['p_id'];
                $erow['p_name'] = $row['p_name'];
                $erow['p_price'] = $row['p_price'];
                $erow['p_stock'] = $row['p_stock'];
                array_push($productList, $erow);
            }
        }
        $DB->close();

        return $productList;
    }
?>