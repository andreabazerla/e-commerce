<?php
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	session_start();

	define("SERVER","localhost");
	define("USERNAME","username");
	define("PASSWORD","password");
	define("DATABASE","music_store");

	$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE) or die("Error: " . mysql_error());
	
	if ($conn->connect_error) {
		die("Error: " . $conn->connect_error);
	}

	class Store implements Page, IteratorAggregate {

		public function create($title) {
			echo $title;
		}
		
		public function createStore() {
			
			global $conn, $store;

			$sql = "SELECT * FROM store";
			$result = $conn->query($sql);
			$num = mysqli_num_rows($result);

			if ($num != 0) {
				for ($id = 0; $id < $num; $id++) {
					$store->addInstrument($id+1);
				}
			}
			
			return $store;
			
		}

		private $instruments = array(array());

		public function getIterator() {
			return new Instrument($this);
    }

    public function addInstrument($id) {

			global $conn;

			$sql = "SELECT * FROM store WHERE id = $id";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$id = $row["id"];
				$timestamp = $row["timestamp"];
				$name = $row["name"];
				$description = $row["description"];
				$price = $row["price"];
				$weight = $row["weight"];
				$photo = $row["photo"];
				$type = $row["type"];
				$discount = $row["discount"];
				$level = $row["level"];
			}

			$this->instruments[$id][0] = $id;
			$this->instruments[$id][1] = $timestamp;
			$this->instruments[$id][2] = $name;
			$this->instruments[$id][3] = $description;
			$this->instruments[$id][4] = $price;
			$this->instruments[$id][5] = $weight;
			$this->instruments[$id][6] = $photo;
			$this->instruments[$id][7] = $type;
			$this->instruments[$id][8] = $discount;
			$this->instruments[$id][9] = $level;

    }

    public function getInstrument($id) {
			if (isset($this->instruments[$id][0])) {
				$id = $this->instruments[$id][0];
				$timestamp = $this->instruments[$id][1];
				$name = $this->instruments[$id][2];
				$description = $this->instruments[$id][3];
				$price = $this->instruments[$id][4];
				$weight = $this->instruments[$id][5];
				$photo = $this->instruments[$id][6];
				$type = $this->instruments[$id][7];
				$discount = $this->instruments[$id][8];
				$level = $this->instruments[$id][9];
				return array($id, $timestamp, $name, $description, $price, $weight, $photo, $type, $discount, $level);
			}
			return null;
    }
    
    public function isEmpty() {
			return empty($instruments);
    }

	}

	class Instrument implements Iterator {

		private $id = 0;
		private $store;

    public function __construct(Store $store) {
			$this->store = $store;
    }

    public function current() {
			return $this->store->getInstrument($this->id+1);
    }

    public function key() {
			return $this->id;
    }

    public function next() {
			$this->id++;
    }

    public function rewind() {
			$this->id = 0;
    }

    public function valid() {
			return !is_null($this->store->getInstrument($this->id+1));
    }

	}

	interface Page {
		public function create($title);
	}

	class Home implements Page {
		public function create($title) {
			echo $title;
			return $title;
		}
	}

	class Profile implements Page {

		public function create($title) {
			echo $title;
		}

		public function getProfile($username) {

			global $conn;

			$sql = "
				SELECT type, username
				FROM users
				WHERE username = '$username';
			";

			$result = mysqli_query($conn, $sql);

			if (!$conn->query($sql)) {
				echo "Error: " . $conn->error;
			} else {
				if (mysqli_num_rows($result) != 1) {
					die("Error: user duplicated");
				} else {
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$type = $row["type"];

					switch ($type) {
						case "occasional_customer":
							return (new OccasionalCustomer)->getProfile($username);
						case "school_owner":
							return (new SchoolOwner)->getProfile($username);
						case "professional_musician":
							return (new ProfessionalMusician)->getProfile($username);
					}

				}
			}
		}
	}

	class Search implements Page {
		public function create($title) {
			echo $title;
		}
	}

	class Sale implements Page {
		public function create($title) {
			echo $title;
		}
	}

	class Cart implements Page {
		public function create($title) {
			echo $title;
		}
	}

	class Signup implements Page {
		public function create($title) {
			echo $title;
		}
	}

	class Login implements Page {
		public function create($title) {
			echo $title;
		}
	}
	
	class Item implements Page {
		public function create($title) {
			echo $title;
		}
	}

	class PageFactory {
		public function getPage($page) {
			$page = ucfirst(strtolower($page));
			(new $page)->create($page);
		}
	}

	class WebsiteFactory {
		public function createWebsite($page) {
			return (new PageFactory)->getPage($page);
		}
	}

	$website = new WebsiteFactory;

	abstract class Customer {
		abstract function getProfile($username);
	}

	class DefaultCustomer extends Customer {

		public function getProfile($username) {

			global $conn;

			$sql = "
				SELECT firstname, lastname, fc, city, phone, mobile, type, username
				FROM users
				WHERE username = '$username';
			";

			$result = mysqli_query($conn, $sql);

			if (!$conn->query($sql)) {
				echo "Error: " . $conn->error;
			} else {
				if (mysqli_num_rows($result) != 1) {
					die("Error");
				} else {
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$firstname = $row["firstname"];
					$lastname = $row["lastname"];
					$fc = $row["fc"];
					$city = $row["city"];
					$phone = $row["phone"];
					$mobile = $row["mobile"];
					$type = $row["type"];
					return array($firstname, $lastname, $fc, $city, $phone, $mobile, $type);
				}
			}
		}

	}

	class OccasionalCustomer extends DefaultCustomer {}

	class SchoolOwner extends DefaultCustomer {}

	class ProfessionalMusician extends DefaultCustomer {}

	if (isset($_POST["signup"])) {
		
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$fc = $_POST["fc"];
		$city = $_POST["city"];
		$phone = $_POST["phone"];
		$mobile = $_POST["mobile"];
		$type = $_POST["type"];
		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql = "
			INSERT INTO users
				(firstname, lastname, fc, city, phone, mobile, type, username, password)
			VALUES
				('$firstname', '$lastname', '$fc', '$city', '$phone', '$mobile', '$type', '$username', '$password');
		";

		if ($conn->query($sql) === FALSE) {
			echo "Error: " . $conn->error;
		}

	}

	if (isset($_POST["login"])) {
		
		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql = "
			SELECT 	username,
							password
			FROM 		users
			WHERE		username = '$username'
				AND		password = '$password';
		";

		$result = mysqli_query($conn, $sql);

		
		if ($conn->query($sql) === FALSE) {
			echo "Error: " . $conn->error;
		} else {
			if (mysqli_num_rows($result) != 1) {
				die("Error: " . mysqli_error());
			}
		}

		$_SESSION["username"] = $username;

	}
	
	if (isset($_POST["buy"])) {
		
		if (isset($_POST["username"]) && $_POST["username"]!="") {
			
			$username = $_POST["username"];
			$instrument = $_POST["instrument"];
			
			$sql = "
				SELECT username, instrument
				FROM cart
				WHERE username = '$username'
					AND instrument = '$instrument';
			";
			
			$result = mysqli_query($conn, $sql);
			
			if ($conn->query($sql) === FALSE) {
				echo "Error: " . $conn->error;
			} else {
				if (mysqli_num_rows($result) < 1) {
					
					$sql = "
						INSERT INTO cart (username, instrument)
						VALUES ('$username', '$instrument');
					";
					
					if ($conn->query($sql) === FALSE) {
			echo "Error: " . $conn->error;	
		}
					
				}
			}
		}
	}
	
	if (isset($_POST["delete"])) {
		
		$username = $_POST["username"];
		$instrument = $_POST["instrument"];
		
		$sql = "
			DELETE FROM cart
			WHERE username = '$username'
				AND instrument = '$instrument';
		";
		
		mysqli_query($conn, $sql);	
		
	}

	if (isset($_POST["sell"])) {
		
		$name = $_POST["name"];
		$description = $_POST["description"];
		$price = $_POST["price"];
		$weight = $_POST["weight"];
		$photo = $_POST["photo"];
		$type = $_POST["type"];
		$discount = $_POST["discount"];
		$level = $_POST["level"];

		$sql = "
			INSERT INTO store
				(name, description, price, weight, photo, type, discount, level)
			VALUES
				('$name', '$description', '$price', '$weight', '$photo', '$type', '$discount', '$level');
		";

		if ($conn->query($sql) === FALSE) {
			echo "Error: " . $conn->error;
		}

	}

?>
