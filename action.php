<?php
header( "Content-Type: text/html; charset=utf-8" );
mb_internal_encoding( 'UTF-8' ); // Установка кодировки

if (!isset($_POST['login'])) {
	die('No login');
}

if (!isset($_POST['psw'])) {
	die('No password');
}

$login    = stripcslashes( htmlspecialchars( $_POST['login'] ) );
$password = $_POST['psw'];

/* Подключение к базе данных MySQL с помощью вызова драйвера */
$dsn      = 'mysql:dbname=form_db;host=127.0.0.1';
$user     = 'root';
$password = '';

try {
	$dbh = new PDO( $dsn, $user, $password );
} catch ( PDOException $e ) {
	echo 'Подключение не удалось: ' . $e->getMessage();
}

if ( isset( $_POST['log_in'] ) ) {
	$query = $dbh->prepare( "SELECT *
			 FROM users
			 WHERE login = :login
			 LIMIT 1" );
	$query->bindValue( ':login', $login );
	$query->execute();

	if ( $query->rowCount() > 0 ) {
		// set the resulting array to associative
		$result = $query->setFetchMode( PDO::FETCH_ASSOC );
		foreach ($query->fetchAll() as $row) {
			$password_hash = $row['password_hash'];
			if (password_verify($password, $password_hash)) {
				echo 'Login Success! <a href="index.php">Log In</a>';
			} else {
				echo 'Password incorrect. <a href="index.php">Log In</a>';
			}
		}
	} else {
		echo 'Login Incorrect. <a href="index.php">Log In</a>';
	}
}

if ( isset( $_POST['sign_up'] ) ) {
	$password_hash = password_hash( $password, PASSWORD_DEFAULT );
	$query = $dbh->prepare( "INSERT INTO users (login, password_hash) VALUES (:login, :password_hash)" );
	$query->bindParam( ':login', $login );
	$query->bindParam( ':password_hash', $password_hash );
	$query->execute();

	if ($query->errorCode() == 0) {
		echo 'Signup Success. <a href="index.php">Log In</a>';
	} else {
		echo 'Login: "'.$login.'" already exist. <a href="index.php">Log In</a>';
	}
}