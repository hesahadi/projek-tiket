<?php 
session_start();
 
session_destroy();
 
// mengalihkan halaman ke halaman login
header("location: ../index.html");
exit();

?>