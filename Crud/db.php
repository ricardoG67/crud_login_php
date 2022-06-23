<?php
//inicializa sesion:
session_start();

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_mysql_crud';

$conn = mysqli_connect(
    $server,
    $username,
    $password,
    $database 
  ) or die(mysqli_erro($mysqli));

/*CON PDO
try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}
*/
?>