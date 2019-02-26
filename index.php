<?php
if (isset($_GET['requestSubmit'])) {
	require_once("./class/request.php");
	$request = new Request($_GET);
	$request->f_write = true;

	$result = $request->save();
}

require_once("./view/request.php");