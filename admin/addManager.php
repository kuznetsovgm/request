<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ./login.php");
	exit();
}
if (isset($_POST['addManager']) &&
	isset($_POST['email']) &&
	isset($_POST['password']) &&
	isset($_POST['name']) &&
	isset($_POST['surname']) &&
	isset($_POST['phone'])
	) {
	require("../db.php");
	require_once("../class/Manager.php");
	$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$query = "INSERT INTO managers (name, surname, email, password, phone) VALUES (?, ?, ?, ?, ?)";
	$pre = $pdo->prepare($query);
	$count = $pre->execute([$name, $surname, $email, $pass, $phone]);
	echo $count !== false ? "Менеджер добавлен." : "Произошла ошибка.";
}

require_once("../view/addManager.php");