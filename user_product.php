<?
    include_once 'f_other/session_login.php';
    redirectLogin($login);

    include_once 'f_data/get_user_product.php';

    $userId = $_SESSION['u_id'];

    $pList = getUserProduct($userId);
    $count = count($pList);
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
            <div class="main">
                <div class="list-header">
                    <h1>您有 <?=$count?> 項商品</h1>
                </div>
                <button onclick="location.href='product_upload.php'">上傳新商品</button>
                <table class="list-cart">
                    <tr>
                        <th width="10%">商品編號</th>
                        <th width="100px">商品圖片</th>
                        <th>商品名稱</th>
                        <th width="15%">商品價格</th>
                        <th width="10%"></th>
                    </tr>
                    <?
                        for ($i=0; $i < $count; $i++) { 
                            // 把 p_id 取出來 
                            $pId = $pList[$i]['p_id'];
                    ?>
                            <tr>
                                <td><a href="product.php?id=<?=$pId?>"><?=$pList[$i]['p_id']?></a></td>
                                <td class="list-img"></td>
                                <td><?=$pList[$i]['p_name']?></td>
                                <td><?=$pList[$i]['p_price']?></td>
                                <td>
                                    <form method="post" action="f_page/product_delete.php">
                                        <input type="hidden" name="p_id" value="<?=$pId?>">
                                        <button type="submit" value="submit">X</button>
                                    </form>
                                </td>
                            </tr>
                    <?
                        }     
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>