<?php
include "./include/connect.php"; // Database connection

// Check if ID is passed in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer
    
    // Delete the record
    $query = "DELETE FROM borrow_records WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Record deleted successfully!";
        header("Location: borrow.php"); // Redirect after deletion
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No record ID provided.";
}
?>
