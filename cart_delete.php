<?php
    include_once 'connect_db.php';
    $DB = getDBObject();

    // get post value
    $id = $_POST['id'];
    $pId = $_POST['p_id'];

    $sql = "DELETE FROM shopping_cart WHERE id = $id";
    if ($result = $DB->query($sql)) {
        $DB->close();
        echo "<script>document.location.href=\"cart.php?id=$pId\"</script>";
    } else {
        $DB->close();
        echo '<script>alert("Delete failed！！")</script>';
        echo "<script>document.location.href=\"cart.php?id=$pId\"</script>";
    }

?>