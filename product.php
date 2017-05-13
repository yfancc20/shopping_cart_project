<?

    // 從網址取得的 get 參數 id=xxxx
    $p_id = $_GET['id'];

    // include_once 多一個 once 避免重複 include 同一張檔案的錯誤
    include_once 'connect_db.php';
    $DB = getDBObject();

    // 取這個商品的資料
    $sql = "SELECT p_name, p_price FROM product_list WHERE p_id = $p_id";
    if ($result = $DB->query($sql)) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $p_name = $row['p_name'];
            $p_price = $row['p_price'];
        }
    }
    $DB->close();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Product</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="main.css" rel="stylesheet">
    </head>
    <body>
        <? include 'menu.php' ?>
        <div class="wrapper">
            <div class="main">
                <form method="POST" action="cart_put.php">
                    <h1><?=$p_name?></h1>
                    <p><?=$p_id?></p>
                    <input type="hidden" name="p_id" value="<?=$p_id?>">
                    <select name="p_num">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>                
                    <button class="putCart" type="submit" value="submit"> 放入購物車 </button>
                </form>
            </div>
        </div>
    </body>
</html>