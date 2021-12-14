<?php
session_start();
session_unset();
session_write_close();

header("location:http://localhost/uni/index.php");
?>