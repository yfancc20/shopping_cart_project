<?php
    include 'session_login.php';
?>

<div class="menu">
    <span><a href="main.php"> 商品列表</a></span>
    <span><a href="cart.php"> 購物車 </a></span>
    <?
        if ($login == false) {
    ?>
            <span><a href="register.php"> 註冊 </a></span>
            <span><a href="login.php"> 登入 </a></span>
    <?
        } else {
    ?>
            <span><a href="logout.php"> 登出 </a></span>
    <?
        }
    ?>
</div>