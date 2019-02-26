<?php
class Request
{
	private $id;
	private $date;
	private $name;
	private $surname;
	private $middleName;
	private $address;
	private $phone;
	private $email;
	private $status;
	private $manager;
	public $f_write = false;

	function __construct($value = false) {
		if ($value !== false && gettype($value) != 'array') {
			$this -> select($value);
		} elseif (gettype($value) == 'array') {
			foreach ($value as $key => $val) {
				if (property_exists($this, $key)) {
					$this->$key = $val;
				}
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

	function select($id) {
		require("../db.php");
		$query = "SELECT * FROM requests WHERE id = :id";
		$pre = $pdo->prepare($query);
		$pre->execute(['id' => $id]);
		foreach ($pre->fetchAll(PDO::FETCH_NAMED)[0] as $key => $val) {
			if (property_exists($this, $key)) {
				$this->$key = $val;
			}
		}
	}

	function save() {
		if (isset($this->id)) {
			$query = "UPDATE requests SET name = :name, surname = :surname, middleName = :middleName, email = :email, phone = :phone, address = :address, status = :status, manager = :manager WHERE id = :id";
			require("../db.php");
			$pre = $pdo->prepare($query);
			$count = $pre->execute(['id' => $this->id, 'name' => $this->name, 'surname' => $this->surname, 'middleName' => $this->middleName, 'email' => $this->email, 'phone' => $this->phone, 'address' => $this->address, 'status' => $this->status, 'manager' => $this->manager]);
		} else {
			$query = "INSERT INTO requests (name, surname, middleName, email, phone, address) 
				VALUES (:name, :surname, :middleName, :email, :phone, :address)";
			require("./db.php");
			$pre = $pdo->prepare($query);
			$count = $pre->execute(['name' => $this->name, 'surname' => $this->surname, 'middleName' => $this->middleName, 'email' => $this->email, 'phone' => $this->phone, 'address' => $this->address]);
		}
		if ($count !== false && $count > 0) {
			$this->f_write = false;
			return $count;
		} else {
			return false;
		}
	}

	function __destruct() {
		if ($this->f_write) {
			$this->save();
		}
	}
}
