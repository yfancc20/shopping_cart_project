<?php
    include_once 'f_other/session_login.php';
    $userId = $_SESSION['u_id'];

    // this page need to login
    redirectLogin($login);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Product Upload</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <? include 'part/menu.php' ?>
        <div class="wrapper">
            <h1>上傳新商品</h1>
            <form method="post" action="f_page/product_upload_send.php">
                <table class="form-table">
                    <tr>
                        <th>商品名稱</th>
                        <td><input type="text" name="p_name"></td>
                    </tr>
                    <tr>
                        <th>商品價格</th>
                        <td><input type="text" name="p_price" placeholder="請輸入單價"></td>
                    </tr>
                    <tr>
                        <th>商品庫存</th>
                        <td><input type="text" name="p_stock"></td>
                    </tr>
                </table>
                <input type="hidden" name="u_id" value="<?=$userId?>">
                <button type="submit">上傳</button>
            </form>
        </div>
    </body>
</html>