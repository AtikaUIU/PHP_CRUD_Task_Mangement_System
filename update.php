<?php
require('db.php');

$id  = $_POST["update"];
$post = $_POST;


$sql = "UPDATE todos SET title = '".$post['title']."'
    ,description = '".$post['description']."' 
    WHERE id = '".$id."'";


$result = $con->query($sql);

$sql = "SELECT * FROM todos WHERE id = '".$id."'"; 


$result = $con->query($sql);


$data = $result->fetch_assoc();


header("Location: dashboard.php");

?>