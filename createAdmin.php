<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/db.php");
$pass = password_hash('admin12207', PASSWORD_DEFAULT);
$query = "INSERT INTO managers (name, surname, email, password, phone) VALUES ('admin', 'admin', 'admin@managers', '$pass', '88001231234')";
$pre = $pdo->query($query);
