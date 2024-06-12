<?php
//destroy sesi admin
session_start();
session_destroy();
header('Location: login.php');
exit();

?>