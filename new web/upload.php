<?php
$upload_dir = "uploads/";

// Create the "uploads" directory if it doesn't exist
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $upload_dir . $file_name;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $message = "<p class='success'>✅ File uploaded successfully!</p>";
    } else {
        $message = "<p class='error'>❌ Error uploading file.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .upload-box {
            background: #008CBA;
            padding: 15px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            display: inline-block;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="file"] {
            display: none;
        }
        .upload-btn {
            padding: 10px 15px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .upload-btn:hover {
            background: #45a049;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .home-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .home-btn:hover {
            background: #555;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Upload Your File</h2>
        <?php echo $message; ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label class="upload-box">
                Select File
                <input type="file" name="file" required>
            </label>
            <br>
            <button type="submit" class="upload-btn">Upload</button>
        </form>
        <a href="index.html" class="home-btn">🏠 Back to Home</a>
    </div>

</body>
</html>
