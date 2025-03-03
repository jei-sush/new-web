<?php
$upload_dir = "uploads/";

// Create the "uploads" directory if it doesn't exist
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$files = scandir($upload_dir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Files</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

    <section class="intro-section">
        <h1>Download Files</h1>
    </section>

    <section class="content">
        <h2>Available Downloads</h2>
        <div class="download-list">
            <?php
            $dir = "uploads/"; // Change to your upload directory
            if (is_dir($dir)){
                if ($dh = opendir($dir)){
                    while (($file = readdir($dh)) !== false){
                        if ($file != "." && $file != "..") {
                            echo "<p><a href='$dir$file' download>$file</a></p>";
                        }
                    }
                    closedir($dh);
                }
            }
            ?>
        </div>
        <a href="index.html" class="btn">Back to Home</a>
    </section>

</body>
</html>
