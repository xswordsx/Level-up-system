<?php
include ("inc/config.php");
$file = $_GET['file'];  
$file=CONFIG_HOST.'"uploads/generated_codes/'.$file;
header('Content-type: text/html');

header('Content-Disposition: attachment; filename="'.$file.'"');


?>