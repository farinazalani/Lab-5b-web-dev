<?php
include 'database.php';

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Delete user record
    $sql = "DELETE FROM users WHERE matric='$matric'";

    if ($con->query($sql) === TRUE) {
        echo "User deleted successfully.";
        header("Location: users_table.php"); // Redirect to the table
        exit;
    } else {
        echo "Error deleting record: " . $con->error;
    }
} else {
    echo "No user specified.";
}

$con->close();
?>
