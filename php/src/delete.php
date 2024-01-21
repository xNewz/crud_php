<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["sid"])) {
    $sid = $_GET["sid"];

    // Retrieve the profile image file path before deleting the record
    $getImagePathSql = "SELECT profile_image FROM students WHERE sid=$sid";
    $result = $conn->query($getImagePathSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $profileImagePath = $row["profile_image"];

        // Delete the record from the database
        $deleteSql = "DELETE FROM students WHERE sid=$sid";

        if ($conn->query($deleteSql) === TRUE) {
            // Delete the associated image file from the server
            if (unlink($profileImagePath)) {
                echo "ลบข้อมูลและรูปภาพเรียบร้อย";
            } else {
                echo "Error deleting image file.";
            }
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "No record found for the specified Student ID.";
    }
}

echo "<script>window.location.href = 'index.php';</script>";

$conn->close();
?>
