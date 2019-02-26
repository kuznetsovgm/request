<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/db.php");

$query = "CREATE TABLE IF NOT EXISTS requests (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name TINYTEXT,
	surname TINYTEXT,
	middleName TINYTEXT,
	email TINYTEXT  NOT NULL,
	phone TINYTEXT,
	address TINYTEXT,
	status TINYINT NOT NULL DEFAULT 0,
	manager TINYTEXT,
	date timestamp DEFAULT CURRENT_TIMESTAMP
)";
$count = $pdo->exec($query);
$query = "CREATE TABLE IF NOT EXISTS managers (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name TINYTEXT,
	surname TINYTEXT,
	email VARCHAR(255) NOT NULL,
	password TINYTEXT,
	phone TINYTEXT,
	UNIQUE KEY (email)
)";
$count = $pdo->exec($query);

require_once("./createAdmin.php");