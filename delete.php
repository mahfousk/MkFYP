<?php
include "db_conn.php";

// Check if the Filename parameter is set and not empty
if(isset($_GET['Filename']) && !empty($_GET['Filename'])) {
    $Filename = mysqli_real_escape_string($conn, $_GET['Filename']); 

    // Prepare and execute the delete query
    $sql = "DELETE FROM `crud` WHERE Filename = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Filename);
    
    if($stmt->execute()) {
        // Redirect back to index.php with success message
        header("Location: index.php?msg=Record deleted successfully");
        exit();
    } else {
        // Display error message if delete operation fails
        echo "Failed: " . mysqli_error($conn);
    }
} else {
    // Display error message if Filename parameter is missing or empty
    echo "Filename parameter is missing or empty";
    exit();
}
?>
