<?php
   
    //$conn = new mysqli($servername, $username, $password, $dbname);
    $con = mysqli_connect("localhost","root","","php_task");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>