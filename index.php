<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Project Database</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        Current Records
    </nav>

    <div class="container">
        <?php
        include "db_conn.php";

        // Check if deletion message is set and display if available
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
        <a href="add_new.php" class="btn btn-dark">Add New</a>
        

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Filename</th>
                    <th scope="col">Title</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Description</th>
                    <th scope="col">Right</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            
                <?php
                $sql = "SELECT * FROM `crud`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["Filename"] ?></td>
                        <td><?php echo $row["Title"] ?></td>
                        <td><?php echo $row["Creator"] ?></td>
                        <td><?php echo $row["Description"] ?></td>
                        <td><?php echo $row["Right"] ?></td>
                        <td><?php echo $row["Type"] ?></td>
                        <td><?php echo $row["Date"] ?></td>
                        <td>

                        
                            <!-- Edit link -->
                            <a href="edit.php?Filename=<?php echo $row["Filename"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <!-- Delete link -->
                            <a href="delete.php?Filename=<?php echo $row["Filename"] ?>" class="link-dark" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
                    
                <?php
                
                }
                ?>
            </tbody>
        </table>
    </div>

    
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
