<?php
require('db.php');

$id  = $_GET["value"];


$sql = "SELECT * FROM todos WHERE id = '".$id."'"; 


$result = $con->query($sql);


$data = $result->fetch_assoc();


echo json_encode($data);

?>