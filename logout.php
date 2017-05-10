<?php
    // logout
    session_start();

    // destroy session
    session_unset();
    session_destroy();
?>

<script type="text/javascript">
    alert("登出成功！");
    document.location.href = "main.php";
</script>
