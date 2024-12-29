<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $investigator_id = $_POST['investigator_id'];

    // Check if the Investigator ID exists in the database
    $sql = "SELECT * FROM Investigator WHERE Investigator_ID = '$investigator_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Investigator found, start session and redirect
        $_SESSION['investigator_id'] = $investigator_id;
        header("Location: dashboard.php");
    } else {
        // Invalid Investigator ID
        echo "Invalid Investigator ID!";
    }
    $conn->close();
}
?><?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the investigator ID from the form
    $investigator_id = $_POST['investigator_id'];

    // In a real-world scenario, you should validate the ID against a database
    // For simplicity, we'll just check if the ID is a valid number
    if ($investigator_id) {
        // Store the investigator ID in the session
        $_SESSION['investigator_id'] = $investigator_id;

        // Redirect to the dashboard page after successful login
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid Investigator ID.";
    }
}
?>

