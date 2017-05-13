<?php
    session_start();

    $userId = $_POST['u_id'];
    $pName = $_POST['p_name'];
    $pPrice = $_POST['p_price'];
    $pStock = $_POST['p_stock'];

    // get p_id
    include_once 'f_other/get_new_pid.php';
    $pId = getNewPId();

    // connect_db.php
    include_once 'connect_db.php';
    $DB = getDBObject();

    $sql = "INSERT INTO product_list(u_id, p_id, p_name, p_price, p_stock) VALUES($userId, \"$pId\", \"$pName\", $pPrice, $pStock)";
    if ($result = $DB->query($sql)) {
        // echo "<script>alert(\"上傳成功！\")</script>";
    } 

    $DB->close();
    header('refresh:0; url=user_product.php');
?>