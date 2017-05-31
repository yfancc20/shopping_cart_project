<?php
    include_once 'connect_db.php';
    $DB = getDBObject();

    // get post value
    $pId = $_POST['p_id'];

    $sql = "DELETE FROM product_list WHERE p_id = $pId";
    if ($result = $DB->query($sql)) {
        $DB->close();
        header('Location: user_product.php');
    } 

?>