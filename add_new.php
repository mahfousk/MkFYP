<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
    $Filename = $_POST['Filename'];
    $Title = $_POST['Title'];
    $Creator = $_POST['Creator'];
    $Description = $_POST['Description'];
    $Right = $_POST['Right']; // Added
    $Type = $_POST['Type']; // Added
    $Date = $_POST['Date']; // Added

    // Use a prepared statement to insert data safely
    $sql = "INSERT INTO `crud` (`Filename`, `Title`, `Creator`, `Description`, `Right`, `Type`, `Date`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $Filename, $Title, $Creator, $Description, $Right, $Type, $Date); // Updated

    if (mysqli_stmt_execute($stmt)) {
        header("location: index.php?msg=new record created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
  crossorigin="anonymous">

  

  <!-- font awesome -->  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
   crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Proof Of Concept Page</title>
</head>
<body>

<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
     Proof Of Concept Page
   </nav>
   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Filename

                  <input type="text" class="form-control" name="Filename" placeholder="Filename">
               </div>

               <div class="col">
                  <label class="form-label">Title:</label>
                  <input type="text" class="form-control" name="Title" placeholder="Title">
               </div>
            </div>

            <div class="col">
                  <label class="form-label">Creator:</label>
                  <input type="text" class="form-control" name="Creator" placeholder="Creator">
               </div>
            </div>
            
                 <div class="col">
                  <label class="form-label">Description:</label>
                  <input type="text" class="form-control" name="Description" placeholder="Description">
               </div>

               <div class="col">
                  <label class="form-label">Right:</label>
                  <input type="text" class="form-control" name="Right" placeholder="Right">
               </div>

               <div class="col">
                  <label class="form-label">Type:</label>
                  <input type="text" class="form-control" name="Type" placeholder="Type">
               </div>

               <div class="col">
                  <label class="form-label">Date:</label>
                  <input type="text" class="form-control" name="Date" placeholder="Date">
               </div>
         



            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>




   <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    
</body>
</html>
