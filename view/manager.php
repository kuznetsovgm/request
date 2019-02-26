<!DOCTYPE html>
<html>
<head>
	<title>Просмотр заявок</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<div class="container">
		<div class="h1">
			<img src="../icons/requestsList.png">
			Список заявок
			<!-- кнопка выхода -->
			<button class="button1"><a href=<?= $_SERVER['REQUEST_URI'] . "?logout=logout" ?>>Выход</a></button>
			<button class="button1" id='filter'>Фильтр</button>
			<?= $_SESSION['id'] != 1 ? '' : "<button class='button1' id='addManager'>Добавить менеджера</button>" ?>
		</div>
		<div class="row">
			<div class="id">№</div>
			<div class="date">Дата</div>
			<div class="name">ФИО</div>
			<div class="phone">Телефон</div>
			<div class="email">E-mail</div>
			<!-- <div class="address">Адрес</div> -->
			<div class="status">Статус</div>
			<div class="manager">Менеджер</div>
		</div>
		<?php
		require_once('../status.php');
		foreach ($requests as $request) : ?>
			<div class="row">
				<div class="id"><?= $request->id ?></div>
				<div class="date"><?= $request->date ?></div>
				<div class="name"><?= $request->name . " " . $request->surname . " " . $request->middleName ?></div>
				<div class="phone"><?= $request->phone ?></div>
				<div class="email"><?= $request->email ?></div>
				<!-- <div class="address"><?= $request->address ?></div> -->
				<div class="status">
					<?= $status[$request->status] ?>
				</div>
				<div class="manager"><?= $request->manager == null ? '' : getManager($request->manager); ?></div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="popupWindow displayNone" id='addManagerForm'>
		<?php $_SESSION['id'] != 1 ?: include_once("./addManager.php") ?>
	</div>
	<div class="popupWindow displayNone" id='filterForm'>
		<?php require_once('../view/filter.php'); ?>
	</div>
</body>
</html>