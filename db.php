<?php
try {
	$pdo = new PDO(
	    'mysql:host=localhost;dbname=base1',
		'root',
		'',
		[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
	);
} catch (PDOException $e) {
	echo "Невозможно подключиться к БД<br><br>$e";
}
