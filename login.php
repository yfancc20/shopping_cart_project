<?php
    include_once 'f_other/session_login.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <? include 'part/menu.php' ?>
        <div class="wrapper">
            <div class="main">
            <h1>會員登入</h1>
                <form method="post" action="f_page/login_check.php">
                    <table class="form-table">
                        <tr>
                            <th>帳號</th>
                            <td><input type="text" name="u_account"></td>
                        </tr>
                        <tr>
                            <th>密碼</th>
                            <td><input type="password" name="u_passwd"></td>
                        </tr>
                    </table>
                    <button type="submit">登入</button>
                </form>
            </div>
        </div>
    </body>
</html>