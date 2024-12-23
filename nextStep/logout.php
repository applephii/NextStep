<?php
session_start();  // Start the session

// Destroy the session to log the user out
session_destroy();

// Redirect to the index page
header("Location: index.php");  // Redirect to the home page
exit();  // Ensure the script stops after the redirect
?>
