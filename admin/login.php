<?php
session_start();
if (isset($_SESSION['id'])) {
	header("Location: ./index.php");
	exit();
}
if (isset($_POST['email']) && isset($_POST['password'])) {
	require_once("../class/Manager.php");
	$manager = new Manager;
	if ($manager->login($_POST['email'], $_POST['password']) != false) {
		$_SESSION['id'] = $manager->id;
		header("Location: ./index.php");
		exit();
	}
}

require_once("../view/login.php");