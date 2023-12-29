<?php

session_start();

// إفراغ جميع المتغيرات التابعة للجلسة
$_SESSION = array();

// إتلاف الجلسة
session_destroy();

// إعادة توجيه المستخدم إلى صفحة تسجيل الدخول أو أي صفحة أخرى بعد تسجيل الخروج
header('Location: index.php');
exit;
