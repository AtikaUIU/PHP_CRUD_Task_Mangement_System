<?php
require('db.php');

session_start();
$id = $_SESSION['user_id'];

$post = $_POST;

//var_dump($id);
$sql = "INSERT INTO todos (user_id, title, description) VALUES ('$id', '".$post['add_title']."', '".$post['add_description']."')";



$result = $con->query($sql);

$sql = "SELECT * FROM todos Order by id desc LIMIT 1"; 

$result = $con->query($sql);

$data = $result->fetch_assoc();

header("Location: dashboard.php");

?>
