<!DOCTYPE html>
<html>
<head>
	<title>Заявка</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<div class="container">
		<div class="h1"><img src="./icons/request.png"> Форма заявки</div>
		<?php isset($result) && $result !== false ? require_once('./view/requestAccepted.php') : require_once('./view/requestForm.php'); ?>
	</div>
</body>
</html>