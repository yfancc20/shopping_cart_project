<?php
    include_once 'session_login.php';

    if ($login == true) {
        echo "<script>history.go(-1)</script>";
    }

    include_once 'connect_db.php';
    $DB = getDBObject();

    $userAccount = $_POST['u_account'];
    $userPasswd = md5($_POST['u_passwd']);

    $sql = "SELECT u_id FROM user WHERE u_account = \"$userAccount\" AND u_passwd = \"$userPasswd\"";
    if ($result = $DB->query($sql)) {
        $row = $result->fetch_array();
        $userId = $row[0];
        $_SESSION['u_id'] = $userId;
        $message = "登入成功！";
        $url = "product_list.php";
    } else {
        $message = "帳號或密碼錯誤。";
        $url = "login.php";
    }
    $DB->close();
    header("refresh:0; url=$url");
?>
<script type="text/javascript">
    alert("<?=$message?>");
</script>