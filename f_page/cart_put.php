<?php
    // include db file
    include_once __DIR__.'/../f_other/connect_db.php';
    $DB = getDBObject();

    // 雖然現在沒有使用者，如果有使用者的話，記得要有userId
    // $userId = $_SESSION['user_id'];

    // PHP變數小寫開頭，中間有不同單字用大寫比較好
    $pId = $_POST['p_id'];
    $pNum = $_POST['p_num']; 

    $sql = "INSERT INTO shopping_cart(`p_id`, `p_num`) VALUES($pId, $pNum)";
    if ($result = $DB->query($sql)) {
        $DB->close();
        $url = "../cart.php";
        $put = true;
    } else {
        $DB->close();
        $put = false;
        $url = "../product.php?id=$pId";
    }

    header("refresh:0; url=$url");

    if (!$put) {
?>
        <script type="text/javascript">
            alert("放入失敗！");
        </script>
<?       
    }
?>