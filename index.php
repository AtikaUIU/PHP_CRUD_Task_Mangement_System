<?php
require('db.php');
?>
<html>

<head>
  <title>Task Management System</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
  .intro {
    text-align: center;
  }
  h1 {
    background: -webkit-linear-gradient(#e1c513, #76b0c3);
    color: #3e08bb;
  }

  a{
    font-size: 40px;
    text-decoration: none;
   
  }
  .style{
    margin-top: 170px;
  }
</style>

<body>

  <div class="container intro">
    <h1>Task Mangement System</h1>

   <div class="row">
   <div class="col-6">
      <img src="Task-List.png" alt="">
     
    </div>
    <div class="col-6 style">
       <div>
       <a href="login.php">Login</a>
       </div>
       <div>
       <a style="color: #c9b51b;" href="register.php">Register</a>
       </div>
       
    </div>
   </div>
  </div>

</body>

</html>