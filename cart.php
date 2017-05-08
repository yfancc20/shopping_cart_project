<?php
    include_once 'connect_db.php';
    $DB = getDBObject();

    $idList = array();
    $nameList = array();
    $priceList = array();
    $numList = array();

    $sql = "SELECT * FROM shopping_cart AS S LEFT JOIN product_list AS P ON S.p_id = P.p_id";
    if ($result = $DB->query($sql)) {
        // count = number of results
        $count = $result->num_rows;

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            // push values into each array
            array_push($idList, $row['p_id']);
            array_push($nameList, $row['p_name']);
            array_push($numList, $row['p_num']);

            // 在這邊先把價錢算好
            $row['p_price'] = $row['p_price'] * $row['p_num'];
            array_push($priceList, $row['p_price']);
        }
    }

    // close DB
    $DB->close();

    $totalPrice = 0;
    for ($i=0; $i < $count; $i++) { 
       $price = $priceList[$i] * $numList[$i];
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Shopping cart</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="main.css" rel="stylesheet">
    </head>
    <body>
        <center>
            <h1>您的購物車</h1>
            <table class="listTable">
                <th>商品編號</th>
                <th>商品名稱</th>
                <th>商品數量</th>
                <th>商品價格</th>
                <?
                    for ($i=0; $i < $count; $i++) { 
                        echo "<tr>";
                        echo "<td><a href=\"product.php?id=$id\">" . $idList[$i] . "</td>";
                        echo "<td>" . $nameList[$i] . "</td>";
                        echo "<td>" . $numList[$i] . "</td>";
                        echo "<td>" . $priceList[$i] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </center>
    </body>
</html>