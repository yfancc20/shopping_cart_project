<?php
    include_once __DIR__.'/../f_other/connect_db.php';
    $DB = getDBObject();

    // get post value
    $sId = $_POST['s_id'];
    $pId = $_POST['p_id'];

    $sql = "DELETE FROM shopping_cart WHERE s_id = $sId";
    if ($result = $DB->query($sql)) {
        $DB->close();
        $delete = true;
    } else {
        $DB->close();
        $delete = false;
    }

    $url = "../cart.php";
    header("refresh:0; url=$url");

    if (!$delete) {
?>
        <script>
            alert("Delete failed！！");
        </script>
<?
    }
?>

