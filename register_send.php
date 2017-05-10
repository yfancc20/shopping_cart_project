<?php
    include_once 'session_login.php';
    include_once 'connect_db.php';
    $DB = getDBObject();

    $userAccount = $_POST['u_account'];
    $userPasswd = $_POST['u_passwd'];
    $userName = $_POST['u_name'];
    $userPhone = $_POST['u_phone'];
    $userEmail = $_POST['u_email'];

    // select the maximum of id in user
    $sql = "SELECT MAX(id) FROM user";
    if ($result = $DB->query($sql)) {
        while ($row = $result->fetch_array()) {
            $maxId = $row[0];
        }
    }

    // user's new id = maxId + 1
    $userId = $maxId + 1;
    // encrypt password
    $userPasswd = md5($userPasswd); 

    $sql = "INSERT INTO user(u_id, u_account, u_passwd, u_name, u_phone, u_email) VALUES($userId, \"$userAccount\", \"$userPasswd\", \"$userName\", \"$userPhone\", \"$userEmail\")";
    if ($result = $DB->query($sql)) {
        $_SESSION['u_id'] = $userId;
        $message = "註冊成功！";
        $redirect = "<script>document.location.href=\"main.php\"</script>";
    } else {
        $message = "註冊失敗，請重試！";
        $redirect = "<script>history.go(-1)</script>";
    }

    $DB->close();
    echo "<script>alert(\"$message\")</script>";
    echo $redirect;

?>