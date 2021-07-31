<?php
$conn = mysqli_connect("103.97.125.243", "mehocsit_root", "mehoc@2020", "mehocsit_mehoc");
$conn->set_charset("utf8");
$domain = $_SERVER['SERVER_NAME'];
$domain_storage = 'https://storage.'.$_SERVER['SERVER_NAME'];
?>