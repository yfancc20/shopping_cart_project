<?php
    session_start();

    $userId = $_POST['u_id'];
    $pId = $_POST['p_id'];
    $pName = $_POST['p_name'];
    $pPrice = $_POST['p_price'];
    $pStock = $_POST['p_stock'];


    // connect_db.php
    include_once __DIR__.'/../f_other/connect_db.php';
    $DB = getDBObject();

    $sql = "UPDATE product_list SET p_name = \"$pName\" , p_price = $pPrice , p_stock = $pStock WHERE u_id = $userId and p_id = $pId";
    if ($result = $DB->query($sql)) {
        $message = "更新成功！";
    } else {
        $message = "更新失敗！請重新嘗試，若屢次失敗請洽系統管理員。";
    } 

    $url = '../user_product.php';
    $DB->close();
    header("refresh:0; url=$url");

?>
<script type="text/javascript">
    alert("<?=$message?>")</script>
</script>