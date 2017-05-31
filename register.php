<?php
    include_once 'f_other/session_login.php';

    // help filling the form when refreshing
    $preAccount = isset($_POST['u_account']) ? $_POST['u_account'] : "";
    $preName = isset($_POST['u_name']) ? $_POST['u_name'] : "";
    $prePhone = isset($_POST['u_phone']) ? $_POST['u_phone'] : "";
    $preEmail = isset($_POST['u_email']) ? $_POST['u_email'] : "";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Register</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <? include 'part/menu.php' ?>
        <div class="wrapper">
            <div class="main">
                <h1>註冊新會員</h1>
                <form method="post" action="f_page/register_send.php">
                    <table class="form-table">
                        <tr>
                            <th><span> * </span>帳號</th>
                            <td><input type="text" name="u_account" value="<?=$preAccount?>"></td>
                        </tr>
                        <tr>
                            <th><span> * </span>密碼</th>
                            <td><input type="password" name="u_passwd"></td>
                        </tr>
                        <tr>
                            <th><span> * </span>再次確認密碼</th>
                            <td><input type="password" name="u_passwdChk"></td>
                        </tr>
                        <tr>
                            <th><span> * </span>姓名</th>
                            <td><input type="text" name="u_name" value="<?=$preName?>"></td>
                        </tr>
                        <tr>
                            <th><span> * </span>手機</th>
                            <td><input type="text" name="u_phone" value="<?=$prePhone?>"></td>
                        </tr>
                        <tr>
                            <th><span> * </span>電子信箱</th>
                            <td><input type="text" name="u_email" value="<?=$preEmail?>"></td>
                        </tr>
                    </table>
                    <button type="submit">確認送出</button>
                </form>
            </div>
        </div>
    </body>
</html>