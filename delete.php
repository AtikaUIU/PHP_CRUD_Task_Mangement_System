<?php


 require 'db.php';


 $id  = $_POST["delete"];


 $sql = "DELETE FROM todos WHERE id = '".$id."'";


 $result = $con->query($sql);


 header("Location: dashboard.php");


?>