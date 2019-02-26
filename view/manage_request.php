<!DOCTYPE html>
<html>
<head>
	<title>Заявка №<?= $request->id ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<div class="container">
		<div class="h1"><img src="../icons/request.png">Просмотр заявки</div>
		<form action="" method="POST" class="requestForm">
			<label>Фамилия: <input type="text" name="surname" required value="<?= $request->surname ?>"></label>
			<label>Имя: <input type="text" name="name" required value="<?= $request->name ?>"></label>
			<label>Отчество: <input type="text" name="middleName" value="<?= $request->middleName ?>"></label>
			<label>Адрес: <input type="text" name="address" required value="<?= $request->address ?>"></label>
			<label>Телефон: <input type="tel" name="phone" required value="<?= $request->phone ?>"></label>
			<label>Email: <input type="email" name="email" required value="<?= $request->email ?>"></label>
			<label>Статус: 
				<select name="status" class="selectStatus">
					<?php
					require_once('../status.php');
					foreach ($status as $key => $value) : ?>
						<option value="<?= $key ?>" <?= $request->status != $key ?: 'selected' ?>>
							<?= $value ?>
						</option>
					<?php endforeach; ?>
				</select>
			</label>
			<input type="submit" name="requestSubmit" value="Сохранить" class="button2 right">
		</form>
	</div>
</body>
</html>