<?php
// Include your database connection file here
include 'db_conn.php';

session_start();
$message = ''; // Initialize the message variable

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Password is correct, so start a new session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to index page
        header("Location: index.php");
        exit;
    } else {
        // Username or password is incorrect
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            text-align: center; /* Center align the form */
        }
        input[type="submit"], a.btn {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 10px; /* Add some spacing between inputs and button */
        }
        input[type="submit"]:hover, a.btn:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>
    <form action="Login.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <input type="submit" name="login" value="Login">
        </div>
        <div>
            <p><?php echo $message; ?></p>
            <p>Don't have an account? <a href="Register.php" class="btn btn-light blue">Register</a></p>
        </div>
    </form>
</body>
</html>
