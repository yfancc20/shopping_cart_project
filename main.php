<?php

    include_once 'connect_db.php';

    $DB = getDBObject();    // 拿到可以操作Database的東西了：$DB

    // sql 語法
    $sql = "SELECT * FROM product_list";

    // result 結果根據 query 的語法會不同
    // 若是 Insert, Update, Delete等等只需要知道成功與否的語法，result 就是 True或False
    // 若是 Select, Describe, Show等等會有明確資料結果的語法，result 就是一個含有這些結果的 object
    // 那如何運用 result?
    // 當 condition 非 false 的話（有可能是 true，或是有結果的 object）

    // 宣告三行陣列
    $idList = array();
    $nameList = array();
    $priceList = array();

    if ($result = $DB->query($sql)) {
        // 可以做很多事，以下舉例：

        // 1. result有幾行？
        $count = $result->num_rows;

        // 2. result的資料？
        // 在 php 跟 mysql 之間，result 必須一行一行取出來。
        // 使用 while 一行一行曲資料
        // fetch_array: 取該行資料，每次取完資料就丟給 row，所以每次row的值都會被新的一行所取代
        // MYSQLI_ASSOC：如果有加這個參數，row 就可以有 key，否則沒有
        // 如果沒有 MYSQLI_ASSOC，就必須用 $row[0], $row[1]的方式取資料
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            // array_push, 把後者放進前者的陣列裡
            array_push($idList, $row['p_id']);
            array_push($nameList, $row['p_name']);
            array_push($priceList, $row['p_price']);
        }
    }
    
    for ($i=0; $i < $count; $i++) { 
        echo "商品id:" . $idList[$i];
        echo "商品名稱:" . $nameList[$i];
        echo "商品價格：" . $priceList[$i];
        echo "<br>";
    }

    // 我做完該做的事了，我就關掉資料庫。
    $DB->close();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Examples</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="main.css" rel="stylesheet">
    </head>
    <body>
        <center>
            <h1>這是一個假商品列表，有 <?=$count?> 項商品</h1>
            <table class="listTable">
                <tr>
                    <th>商品編號</th>
                    <th>商品名稱</th>
                    <th>商品價格</th>
                </tr>
                <?
                    for ($i=0; $i < $count; $i++) { 
                        // 把 id 取出來 
                        $id = $idList[$i];
                        echo "<tr>";
                        echo "<td><a href=\"product.php?id=$id\">" . $idList[$i] . "</a></td>";
                        echo "<td>" . $nameList[$i] . "</td>";
                        echo "<td>" . $priceList[$i] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </center>
    </body>
</html>