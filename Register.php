<?php
// Include your database connection file here (ensure you use PDO or mysqli with prepared statements)
include 'db_conn.php';

$message = '';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    if(isset($_POST['emailAddress'])){ // Check if emailAddress exists in $_POST
        $emailAddress = $_POST['emailAddress'];
    } else {
        $emailAddress = ''; // Set a default value if not provided
    }
    $password = $_POST['password'];
    
    // Check if password length is at least 6 characters
    if (strlen($password) < 6) {
        
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT); // Encrypt the password

        // Prepare SQL to prevent SQL injection
        $sql = "INSERT INTO users (username, emailAddress, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sss", $username, $emailAddress, $password); // Bind parameters
            if ($stmt->execute()) {
                $message = 'User registered successfully!';
            } else {
                $message = 'An error occurred while executing the SQL query.';
            }
        } else {
            $message = 'An error occurred while preparing the SQL query.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="submit"] {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: darkorange;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    <!-- Head content here -->
  
</head>
<body>
    <form action="register.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="emailAddress">Email Address:</label>
            <input type="text" name="emailAddress" id="emailAddress" required>
        </div>
        
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <input type="submit" name="register" value="Register">
            <a href="Login.php" class="btn btn-light blue">Login</a>
        </div>
        <p><?php echo $message; ?></p>
    </form>
</body>
</html>
