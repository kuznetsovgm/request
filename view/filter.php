<div>
	<form action="" method="POST" class="addManagerForm">
		<!-- <label>Дата: <input type="date" name="date"></label> -->
		<label>Менеджер: </label>
		<!-- <label class="indent checkbox"><input type="checkbox" name="manager[]" checked value="IS NULL">Не назначен</label> -->
		<?php foreach ($managers as $manager) : ?>
			<label class="indent checkbox"><input type="checkbox" name="manager[]" checked value="<?= $manager->id ?>"> <?= $manager->getName() ?></label>
		<?php endforeach; ?>
		<label>Статус: </label>
		<?php
		require_once("../status.php");
		foreach ($status as $key => $value) : ?>
			<label class="indent checkbox"><input type="checkbox" name="status[]" checked value="<?= $key ?>"> <?= $value ?></label>
		<?php endforeach; ?>
		<!-- <input type="reset" name="reset" class="button2 right"> -->
		<input type="submit" name="filter" class="button2 right" value="Показать">
	</form>
</div>