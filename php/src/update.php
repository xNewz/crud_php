<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sid = $_POST["updateSid"];  // Update this to match the field name in your form
    $fname = $_POST["newFname"]; // Update this to match the field name in your form
    $lname = $_POST["newLname"]; // Update this to match the field name in your form

    $sql = "UPDATE students SET fname='$fname', lname='$lname' WHERE sid=$sid";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
echo "<script>window.location.href = 'index.php';</script>";

$conn->close();
?>
