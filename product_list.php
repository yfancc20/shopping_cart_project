<?php
    include_once 'f_other/session_login.php';
    include 'f_data/get_product.php';

    if (isset($_GET['t'])) {
        $tId = $_GET['t'];
        // get product with certain type
        $productList = getProductFromType($tId);
    } else {
        // get all products without classifying
        $productList = getProductFromType(0);
    }
    $count = count($productList);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Product List</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <? include 'part/menu.php' ?>
        <div class="wrapper">
            <? include 'part/type.php' ?>
            <div class="main">
                <div class="list-header">
                    <h1>有 <?=$count?> 項商品</h1>
                </div>
                <table class="list-table">
                    <?
                        for ($i=0; $i < $count; $i++) { 
                            // 把 p_id 取出來 
                            $pId = $productList[$i]['p_id'];
                            $pName = $productList[$i]['p_name'];
                            $pPrice = $productList[$i]['p_price'];
                    ?>
                            <tr>
                                <td rowspan="3" class="list-img"><img src=""></td>
                                <td class="list-name"><a href="product.php?id=<?=$pId?>"><?=$pName?></a></td>
                            </tr>
                            <tr>
                                <td class="list-price">＄<?=$pPrice?></td>
                            </tr>
                            <tr><td colspan="2" class="list-bottom"></td></tr>
                    <?
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>