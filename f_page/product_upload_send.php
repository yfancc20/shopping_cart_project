<?php
    session_start();

    // post values
    $userId = $_POST['u_id'];
    $pName = $_POST['p_name'];
    $pPrice = $_POST['p_price'];
    $pStock = $_POST['p_stock'];
    $pPhoto = $_FILES['p_photo'];

    // get p_id
    include_once __DIR__.'/../f_other/get_new_pid.php';
    $pId = getNewPId();

    // connect_db.php
    include_once __DIR__.'/../f_other/connect_db.php';
    $DB = getDBObject();

    // sql 
    // $sql = "INSERT INTO product_list(u_id, p_id, p_name, p_price, p_stock) VALUES($userId, \"$pId\", \"$pName\", $pPrice, $pStock)";
    // if ($result = $DB->query($sql)) {
    //     $message = "上傳成功！";
    // } else {
    //     $message = "上傳失敗！請重新上傳，若屢次失敗請洽系統管理員！";
    // }

    // uploading photo
    $userDir = "user_" . $userId;
    $dirString = "../u_photo/" . $userDir . "/";
    $pIdMD5 = md5(substr($pId, -5));
    $pIdBind = substr($pIdMD5, 3, 5);
    $pPhoto['name'] = $userId . $pId . $pIdBind;

    // check directory or not
    if (!is_dir($dirString)) {
        mkdir($dirString, 0700, true);
    }

    // start uploading
    if (is_dir($dirString)) {
        echo $pPhoto['type'];
        // move_uploaded_file($pPhoto['tmp_name'], $dirString.$pPhoto["name"]);
    }

    $url = '../user_product.php';
    $DB->close();
    // header("refresh:0; url=$url");
?>
<!-- <script type="text/javascript">
    alert("<?=$message?>")
</script> -->