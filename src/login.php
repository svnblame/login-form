<?php
session_start();
include_once("connection.php");

$username = $_POST["username"];
$password = md5($_POST["password"]);

// Fetch data from database
$sql = "SELECT name FROM users WHERE username=:username AND password=:password";
$query = $conn->prepare($sql);
$query->bindParam(":username", $username, PDO::PARAM_STR);
$query->bindParam(":password", $password, PDO::PARAM_STR);
$query->execute();

$result = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    $_SESSION['username'] = $_POST['username'];
    echo 'true';
} else {
    echo 'false';
}
