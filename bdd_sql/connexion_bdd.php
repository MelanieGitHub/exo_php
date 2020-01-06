<?php

class Database
{
	private $host = "localhost";
	private $db_name = "mange_ton_php";
	private $username = "root";
	private $password = "";
	public $pdo;

	public function dbConnection()
	{
		$this->pdo = null;
		try {
			$this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception) {
			echo "Connexion error: " . $exception->getMessage();
		}
		return $this->pdo;
	}
}
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'mange_ton_php');
// define('DB_USER', 'root');
// define('DB_PASS', '');

// try {
// 	$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
// } catch (Exception $e) {
// 	echo "Impossible de se connecter à la base de données '" . DB_NAME . "' sur " . DB_HOST . " avec le compte utilisateur '" . DB_USER . "'";
//       echo "<br/>Erreur PDO : <i>" . $e->getMessage() . "</i>";
// 	die();
// }

// $db_username = 'root';
// $db_password = '';
// $db_name     = 'mange_ton_php';
// $db_host     = 'localhost';
// $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
//     or die('could not connect to database');

// //OR 

// $connect = mysqli_connect("127.0.0.1", "root", "", "ff_manager");

// //OR with error

// $base = mysqli_connect("127.0.0.1", "root", "", "ff_manager");
// if ($base) {
// 	echo 'Connexion réussie.<br />';
// 	echo 'Informations sur le serveur:' . mysqli_get_host_info($base);
// } else {
	//printf('Erreur %d : %s.<br/>', mysqli_connect_errno(), mysqli_connect_error());
// }
