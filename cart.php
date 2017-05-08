<?php
    // include db file
    include_once 'connect_db.php';
    $DB = getDBObject();

    // initiate some arrays
    $idList = array();
    $pIdList = array();
    $nameList = array();
    $priceList = array();
    $numList = array();

    // select results from shopping_cart table
    $sql = "SELECT S.id, P.p_id, P.p_name, P.p_price, S.p_num FROM shopping_cart AS S LEFT JOIN product_list AS P ON S.p_id = P.p_id";
    if ($result = $DB->query($sql)) {
        // count = number of results
        $count = $result->num_rows;

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            // push values into each array
            array_push($idList, $row['id']);
            array_push($pIdList, $row['p_id']);
            array_push($nameList, $row['p_name']);
            array_push($numList, $row['p_num']);
            array_push($priceList, $row['p_price']);
        }
    }

    // close DB
    $DB->close();

    // calculate total-price
    $totalPrice = 0;
    for ($i=0; $i < $count; $i++) { 
       $totalPrice += $priceList[$i] * $numList[$i];
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
        <? include 'menu.html' ?>
        <center>
            <h1>您的購物車</h1>
            <table class="listTable">
                <th>商品編號</th>
                <th>商品名稱</th>
                <th>商品數量</th>
                <th>商品價格</th>
                <?
                    // table of shopping list
                    for ($i=0; $i < $count; $i++) {
                        $id = $idList[$i];
                        $pId = $pIdList[$i];
                ?>
                        <tr>
                            <td><a href="product.php?id=<?=$pId?>"><?=$pIdList[$i]?></a></td>
                            <td><?=$nameList[$i]?></td>
                            <td><?=$numList[$i]?></td>
                            <td><?=$priceList[$i]*$numList[$i]?></td>
                            <!-- The better way to delete item is using ajax -->
                            <!-- Do not mention here -->
                            <td>
                                <form method="post" action="cart_delete.php">
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <input type="hidden" name="p_id" value="<?=$pId?>">
                                    <button type="submit" value="submit">X</button>
                                </form>
                            </td>
                        </tr>
                <?
                    }
                ?>
                <td colspan="2"></td>
                <td>總和：</td>
                <td><?=$totalPrice?></td>
            </table>
        </center>
    </body>
</html>