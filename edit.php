<?php
include "db_conn.php";

if(isset($_POST['submit'])) {
    $OldFilename = mysqli_real_escape_string($conn, $_POST['OldFilename']);
    $Filename = mysqli_real_escape_string($conn, $_POST['Filename']);
    $Title = mysqli_real_escape_string($conn, $_POST['Title']);
    $Creator = mysqli_real_escape_string($conn, $_POST['Creator']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $Right = mysqli_real_escape_string($conn, $_POST['Right']); // Added for Right
    $Type = mysqli_real_escape_string($conn, $_POST['Type']); // Added for Type
    $Date = mysqli_real_escape_string($conn, $_POST['Date']); // Added for Date

    // Check if the user has changed the filename
    if($OldFilename != $Filename) {
        // Update the filename in the database
        $sqlUpdateFilename = "UPDATE `crud` SET `Filename`='$Filename' WHERE Filename='$OldFilename'";
        $resultUpdateFilename = mysqli_query($conn, $sqlUpdateFilename);
        if(!$resultUpdateFilename) {
            echo "Failed to update filename: " . mysqli_error($conn);
            exit();
        }
    }

    $sql = "UPDATE `crud` SET `Title`='$Title', `Creator`='$Creator', `Description`='$Description', `Right`='$Right', `Type`='$Type', `Date`='$Date' WHERE Filename='$Filename'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: index.php?msg=Record updated successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} else {
    if(isset($_GET['Filename'])) {
        $Filename = mysqli_real_escape_string($conn, $_GET['Filename']); 

        $sql = "SELECT * FROM `crud` WHERE Filename = '$Filename' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $OldFilename = $row['Filename']; // Add the Old Filename field
            $Title = $row['Title'];
            $Creator = $row['Creator'];
            $Description = $row['Description'];
            $Right = $row['Right']; // Added for Right
            $Type = $row['Type']; // Added for Type
            $Date = $row['Date']; // Added for Date
        } else {
            echo "Record not found!";
            exit();
        }
    } else {
        echo "Filename parameter is missing";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content here -->
</head>
<body>
    <title>Edit User</title>

    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        Edit User.
    </nav>
    
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User</h3>
            <p class="text-muted">Complete the form below to edit the user</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <!-- Old Filename field -->
                <input type="hidden" name="OldFilename" value="<?php echo $OldFilename; ?>">

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Filename:</label>
                        <input type="text" class="form-control" name="Filename" placeholder="Filename" value="<?php echo $Filename; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Title:</label>
                        <input type="text" class="form-control" name="Title" placeholder="Title" value="<?php echo $Title; ?>">
                    </div>
                </div>

                <div class="col">
                    <label class="form-label">Creator:</label>
                    <input type="text" class="form-control" name="Creator" placeholder="Creator" value="<?php echo $Creator; ?>">
                </div>
            
                <div class="col">
                    <label class="form-label">Description:</label>
                    <input type="text" class="form-control" name="Description" placeholder="Description" value="<?php echo $Description; ?>">
                </div>

                <div class="col">
                    <label class="form-label">Right:</label>
                    <input type="text" class="form-control" name="Right" placeholder="Right" value="<?php echo $Right; ?>">
                </div>

                <div class="col">
                    <label class="form-label">Type:</label>
                    <input type="text" class="form-control" name="Type" placeholder="Type" value="<?php echo $Type; ?>">
                </div>

                <div class="col">
                    <label class="form-label">Date:</label>
                    <input type="text" class="form-control" name="Date" placeholder="Date" value="<?php echo $Date; ?>">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
