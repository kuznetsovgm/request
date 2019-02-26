<?php
class Manager
{
	protected $id;
	protected $name;
	protected $surname;
	protected $phone;
	protected $email;
	protected $password;

	function __construct($id = false) {
		if ($id !== false) {
			require("../db.php");
			$query = "SELECT name, surname, email, phone FROM managers WHERE id = :id";
			$pre = $pdo->prepare($query);
			$pre->execute(['id' => $id]);
			$manager = $pre->fetchAll(PDO::FETCH_NAMED)[0];
			if (isset($manager)) {
				foreach ($manager as $key => $val) {
					if (property_exists($this, $key)) {
						$this->$key = $val;
					}
				}
			} else {
				$this->name = "Менеджер удален.";
			}

		}
	}

	function __set($name, $value) {
		if (property_exists($this, $name)) {
			$this->$name = $value;
		}
	}

	function __get($name) {
		if (property_exists($this, $name)) {
			return $this->$name;
		} else {
			return null;
		}
	}

	function login($email = false, $password = false){
		if ($email === false && $password === false) {
			return false;
		}
		require("../db.php");
		$query = "SELECT * FROM managers WHERE email = :email";
		$pre = $pdo->prepare($query);
		$pre->execute(['email' => $email]);
		$manager = $pre->fetchAll(PDO::FETCH_NAMED)[0];
		if (isset($manager)) {
			foreach ($manager as $key => $val) {
				if (property_exists($this, $key)) {
					$this->$key = $val;
				}
			}
			return $this->id;
		} else {
			return false;
		}
	}

	/*function getId(){
		return $this->id;
	}*/

	function getName(){
		return "$this->name $this->surname";
	}
}
