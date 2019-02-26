<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ./login.php");
	exit();
}

require_once("../class/Request.php");
require_once("../class/Manager.php");

if (isset($_POST['requestSubmit'])) {
	$request = new Request($_GET['id']);
	foreach ($_POST as $key => $value) {
		$request -> $key = $value;
	}
	$request->manager = $_SESSION['id'];
	$request->f_write = true;
	$request->save();
} else {
	$request = new Request($_GET['id']);
}

require_once("../view/manage_request.php");