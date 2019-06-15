<?php
session_start(); 
require_once '../../library/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('location: ' . ADMIN_URL . 'user');
	die();
}
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$role = $_POST['role'];



$sql = "update users
		set
			full_name = :fullname,
			role = :role
		where id = :id";
$sta = $pdo->prepare($sql);
$sta->bindParam(':fullname', $name);
$sta->bindParam(':role', $role);
$sta->bindParam(':id', $id);
$sta->execute();
$_SESSION['login']['full_name'] = $name;
$_SESSION['login']['role'] = $role;

header('location: ' . ADMIN_URL . 'user');
die();
?>
