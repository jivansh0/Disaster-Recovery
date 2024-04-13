<?php
// Retrieve form data
$name = $_POST['name'];
$age = $_POST['age'];
$previous_location = $_POST['previous_location'];
$current_location = $_POST['current_location'];
$phone = isset($_POST['phone']) ? $_POST['phone'] : ''; // Check if phone number is provided

// Save data to a text file (you can modify this to save to a database)
$file = fopen("data.txt", "a"); // Open the file in append mode
fwrite($file, "Name: $name, Age: $age, Previous Location: $previous_location, Current Location: $current_location, Phone: $phone\n");
fclose($file);

// Redirect back to the form page
header("Location: request-help.html");
exit;
?>
