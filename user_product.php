<?
    include_once 'session_login.php';
    redirect($login);

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
        <link href="main.css" rel="stylesheet">
    </head>
    <body>
        <? include 'menu.php' ?>
        <center>
            <button onclick="location.href='product_upload.php'">上傳新商品</button>
            <h1>您有 <?=$count?> 項商品</h1>
            <table class="listTable">
                <tr>
                    <th>商品編號</th>
                    <th>商品名稱</th>
                    <th>商品價格</th>
                </tr>
                <?
                    for ($i=0; $i < $count; $i++) { 
                        // 把 p_id 取出來 
                        $pId = $pList[$i]['p_id'];
                ?>
                        <tr>
                            <td><a href="product.php?id=<?=$pId?>"><?=$pList[$i]['p_id']?></a></td>
                            <td><?=$pList[$i]['p_name']?></td>
                            <td><?=$pList[$i]['p_price']?></td>
                            <td>
                                <form method="post" action="product_delete.php">
                                    <input type="hidden" name="p_id" value="<?=$pId?>">
                                    <button type="submit" value="submit">X</button>
                                </form>
                            </td>
                        </tr>
                <?
                    }     
                ?>
            </table>
        </center>
    </body>
</html>