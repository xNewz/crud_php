<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sid = $_POST["sid"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    // Check if sid is a valid number
    if (!is_numeric($sid)) {
        echo "Student ID must be a number";
        exit();
    }

    // Check if all required fields are filled
    if (empty($sid) || empty($fname) || empty($lname) || empty($_FILES["profileImage"]["name"])) {
        echo "Please fill in all required fields and select an image.";
        exit();
    }

    // File upload handling
    $targetDir = "uploads/";  // Directory where you want to store uploaded images
    $targetFile = $targetDir . basename($_FILES["profileImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the image file is a valid image
    $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
    if ($check === false) {
        echo "File is not a valid image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profileImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now add data to the database

            // It's important to use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO students (sid, fname, lname, profile_image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isss", $sid, $fname, $lname, $targetFile);

            if ($stmt->execute()) {
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file. Error: " . $_FILES["profileImage"]["error"];
        }
    }
}

$conn->close();
?>
