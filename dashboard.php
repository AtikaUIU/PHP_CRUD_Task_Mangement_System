<?php
//database connection
require('db.php');

 session_start();
 if($_SESSION['user_id'] != null){

    $user_id = $_SESSION['user_id'];
    $query =  "SELECT * FROM `todos` WHERE user_id='" . $user_id . "'";
    //$result = mysqli_query($con, $query) or die(mysqli_connect_error());
    $result = $con->query($query);
    //value in array
   // echo $result;
   //MYSQLI_ASSOC=Columns are returned into the array having the fieldname as the array index.
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $rows = mysqli_num_rows($result);
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard -User area</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body style="background: #9ac4cd;">
    
    <div id="login">
    <h2>Welcome to <?php echo  $_SESSION['username']; ?>'s Panel</h2>
    
 </div> 
    <div class="form">
        <table class="table table-success table-striped">
         <button style="margin-left: 530px;height:40px;" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">Add Task</button>
            <thead>
            <tr >
                <th>ID</th>
                <th>Title</th><br>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                  if ($rows >= 1) {
                    //$row = mysqli_fetch_array($result);
                    //echo mysqli_fetch_assoc($result);
                   // while($row = $result->fetch_assoc())
                   $id = 0;
                    foreach($row as $value){
                      $id++;
                       // $row = mysqli_fetch_assoc($row);
                       echo "<tr>";
                       echo "<td>" . $id . "</td>";
                       echo "<td>" . $value['title'] . "</td>";
                       echo "<td>" . $value['description'] . "</td>";
                    // echo "<td><a href='edit.php?id=" . $value['id'] . "'>Edit</a> | <a href='delete.php?id=" . $value['id'] . "'>Delete</a></td>";
                    echo "<td> <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' onClick='edit($value[id])'>Edit</button> 
                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' onClick='del($value[id])'>Delete</button></td>";
                  }
                }
              
           
            ?>
            </tbody>
           
        </table>     

    </div>

<!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModal">Add Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="add.php" method="post">
      <div class="modal-body">
                    <label for="t_title">Todo title:</label><br>
                    <input  type="text" name="add_title" id="add_title"><br>
                    <label for="t_description">Todo Description:</label><br>
                    <input  type="text" name="add_description" id="add_description"><br>
                    <!-- <input type="hidden" name="update" id="$_SESSION['user_id']"> -->
                 
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" onclick="">Add Task</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>

    <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Edit Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="update.php" method="post">
      <div class="modal-body">
                    <label for="t_title">Todo title:</label><br>
                    <input  type="text" name="title" id="title"><br>
                    <label for="t_description">Todo Description:</label><br>
                    <input  type="text" name="description" id="description"><br>
                    <input type="hidden" name="update" id="update">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

   <!-- Delete Modal -->
   <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="delete.php" method="post">
      <div class="modal-body">
                    <p>Are You sure you want to delete it?????</p>
                    <input type="hidden" name="delete" id="delete">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <div class="logout">
       
        <a style="color:#ed3407;" href="logout.php">Logout</a>
    </div>

  <script>

    edit=(value)=>{
       // console.log(value);
       $.ajax({
                            url: 'edit.php',
                            type: 'GET',
                            dataType: "json",
                            data: {
                                value: value,
                                // _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                //console.log("response", response);
                                $('#title').val(response.title);
                                $('#description').val(response.description);
                                $('#update').val(response.id)
                            }


                        });

    }
    del=(value)=>{
        $('#delete').val(value)

    }
  </script>  
</body>
</html>