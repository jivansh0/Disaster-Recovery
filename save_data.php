<?php

// Retrieve data from the POST request
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$age = isset($_POST['age']) ? trim($_POST['age']) : '';
$previous_location = isset($_POST['previous_location']) ? trim($_POST['previous_location']) : '';
$current_location = isset($_POST['current_location']) ? trim($_POST['current_location']) : '';
$current_coordinates = isset($_POST['current_coordinates']) ? trim($_POST['current_coordinates']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

// Split the current coordinates into latitude and longitude
$current_coordinates_parts = explode(', ', $current_coordinates);
$latitude = $current_coordinates_parts[0];
$longitude = $current_coordinates_parts[1];

// Combine latitude and longitude into a single string
$current_coordinates_combined = "$latitude $longitude";

// Open the data.txt file for writing and append the data
$file = fopen("data.txt", "a");

// Write each data field with its label to the file
fwrite($file, "Name: $name, Age: $age, Previous Location: $previous_location, Current Coordinates: $current_coordinates_combined, Current Location: $current_location, Phone: $phone\n");

// Close the file
fclose($file);

// Redirect to the request-help.html page
header("Location: request-help.html");
exit;
?>
