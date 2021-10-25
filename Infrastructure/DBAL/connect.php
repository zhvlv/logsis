<?php

$DBMS = 'mysql';
$host = 'localhost';
$db = 'logsis';
$charset = 'utf8';
$user = 'root';
$password = '';

$PDO = $DBMS . ':host=' . $host . ';dbname=' . $db . ';charset=' . $charset;


try {
	$connection = new PDO($PDO, $user, $password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$_POST['connection'] = $connection;
} catch (PDOException $e) {

	echo $e->getMessage();

}

