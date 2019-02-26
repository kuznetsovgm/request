<?php
session_start();
if (isset($_GET['logout']) && $_GET['logout'] == 'logout') {
	 unset($_SESSION['id']);
}
if (!isset($_SESSION['id'])) {
	header("Location: ./login.php");
	exit();
}
if (isset($_POST['action']) && $_POST['action'] == 'getRequest') {
	header("Location: ./request.php?id=" . $_POST['id']);
	exit();
}

function getManager($id) {
	require_once('../class/Manager.php');
	$manager = new Manager($id);
	return "$manager->name $manager->surname";
}
function addFilter($where, $add, $and = true) {
	if ($where) {
		if ($and) {
			$where .= " AND $add";
		} else {
			$where .= " OR $add";
		}
	} else {
		$where = $add;
	}
	return $where;
}

$order = isset($_GET['order']) ? $_GET['order'] : 'id';

require_once("../class/Request.php");
require_once("../class/Manager.php");

require("../db.php");
$query = "SELECT * FROM requests";
if (isset($_POST['filter'])) {
	$where = '';
	$arr = array();
	if (isset($_POST['manager'])) {
		$in = str_repeat('?,', count($_POST['manager']) - 1) . '?';
		$where = addFilter($where, "manager IN ($in)");
		$arr = array_merge($arr, $_POST['manager']);
	}
	if (isset($_POST['status'])) {
		$in = str_repeat('?,', count($_POST['status']) - 1) . '?';
		$where = addFilter($where, "status IN ($in)");
		$arr = array_merge($arr, $_POST['status']);
	}
	$query .= " WHERE $where ORDER BY $order DESC";
	$pre = $pdo->prepare($query);
	$pre->execute($arr);
} else {
	$query .= " ORDER BY $order DESC";
	$pre = $pdo->prepare($query);
	$pre->execute();
}
$requests = $pre->fetchAll(PDO::FETCH_CLASS, 'Request');

require("../db.php");
$query = "SELECT * FROM managers;";
$pre = $pdo->prepare($query);
$pre->execute();
$managers = $pre->fetchAll(PDO::FETCH_CLASS, 'Manager');

require_once("../view/manager.php"); 