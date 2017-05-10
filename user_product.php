<?
    include_once 'session_login.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Product List</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="main.css" rel="stylesheet">
    </head>
    <body>
        <? include 'menu.php' ?>
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
                        // 把 p_id 取出來 
                        $pId = $pIdList[$i];
                        echo "<tr>";
                        echo "<td><a href=\"product.php?id=$pId\">" . $pIdList[$i] . "</a></td>";
                        echo "<td>" . $nameList[$i] . "</td>";
                        echo "<td>" . $priceList[$i] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </center>
    </body>
</html>