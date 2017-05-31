<?php
    // include db file
    include_once 'f_other/session_login.php';
    include_once 'f_other/connect_db.php';
    $DB = getDBObject();

    // this page need to login
    redirectLogin($login);

    // initiate some arrays
    $sIdList = array();
    $pIdList = array();
    $nameList = array();
    $priceList = array();
    $numList = array();

    // varaibles
    $userId = $_SESSION['u_id'];

    // select results from shopping_cart table
    $sql = "SELECT S.s_id, P.p_id, P.p_name, P.p_price, S.p_num FROM shopping_cart AS S LEFT JOIN product_list AS P ON S.p_id = P.p_id WHERE S.u_id = $userId";
    if ($result = $DB->query($sql)) {
        // count = number of results
        $count = $result->num_rows;

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            // push values into each array
            array_push($sIdList, $row['s_id']);
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
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <? include 'part/menu.php' ?>
        <div class="wrapper">
            <div class="main">
                <div class="list-header">
                    <h1>購物車內有 <?=$count?> 件商品</h1>
                </div>
                <table class="list-cart">
                    <th>商品編號</th>
                    <th></th>
                    <th>商品名稱</th>
                    <th>商品數量</th>
                    <th>商品價格</th>
                    <th></th>
                    <?
                        // table of shopping list
                        for ($i=0; $i < $count; $i++) {
                            $sId = $sIdList[$i];
                            $pId = $pIdList[$i];
                    ?>
                            <tr>
                                <td><a href="product.php?id=<?=$pId?>"><?=$pIdList[$i]?></a></td>
                                <td class="list-img"></td>
                                <td width="150px;"><?=$nameList[$i]?></td>
                                <td><?=$numList[$i]?></td>
                                <td><?=$priceList[$i]*$numList[$i]?></td>
                                <!-- The better way to delete item is using ajax -->
                                <!-- Do not mention here -->
                                <td>
                                    <form method="post" action="f_page/cart_delete.php">
                                        <input type="hidden" name="s_id" value="<?=$sId?>">
                                        <input type="hidden" name="p_id" value="<?=$pId?>">
                                        <button type="submit" value="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                    <?
                        }
                    ?>
                    <tfoot>
                        <td colspan="3"></td>
                        <td>總和：</td>
                        <td><?=$totalPrice?></td>
                        <td></td>
                    </tfoot>
                </table>
            </div>
        </div>
    </body>
</html>