<?php
session_start();

// پاک کردن همه متغیرهای session
$_SESSION = array();

// نابود کردن session
session_destroy();

// هدایت به صفحه ورود
header("Location: login.php");
exit();
?>
