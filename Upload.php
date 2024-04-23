<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Year Project</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            /* Gradient background */
            background: linear-gradient(to right bottom, #e6e9f0 0%, #eef1f5 100%);
            /* Set background to cover the entire window and remain fixed during scroll */
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff; /* You may adjust the background as needed */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .upload-form {
            padding: 20px;
            border-radius: 8px;
        }
        .btn {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload to Digital Repository</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit" class="btn">
    </form>
</div>

</body>
</html>
