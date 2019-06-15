<?php 
session_start();
require_once './library/db.php';
unset($_SESSION['login']);
header('location: '. SITE_URL);
 ?>