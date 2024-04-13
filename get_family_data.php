<?php

// Read data from "data.txt" file
$lines = file("data.txt", FILE_IGNORE_NEW_LINES);

// Initialize an array to store family data
$familyData = [];

// Iterate through each line in the file
foreach ($lines as $line) {
    // Initialize an associative array to store person data
    $personData = [];
    
    // Use regular expression to parse the line and extract data
    preg_match_all('/([^,]+): (.+?)(?:, |$)/', $line, $matches);
    
    // Store parsed data in the personData array
    $personData['name'] = $matches[2][0] ?? ''; // Use null coalescing operator to handle undefined array key
    $personData['age'] = $matches[2][1] ?? ''; // Use null coalescing operator to handle undefined array key
    $personData['previous_location'] = $matches[2][2] ?? ''; // Use null coalescing operator to handle undefined array key
    
    // Extract current coordinates as a single string (latitude,longitude)
    $coordinates = $matches[2][3] ?? '';
    $personData['current_coordinates'] = $coordinates; // Store coordinates as a single string
    
    $personData['current_location'] = $matches[2][4] ?? ''; // Use null coalescing operator to handle undefined array key
    $personData['phone'] = $matches[2][5] ?? ''; // Use null coalescing operator to handle undefined array key

    // Add person data to familyData array
    $familyData[] = $personData;
}

// Set response header to indicate JSON content type
header('Content-Type: application/json');

// Encode family data array to JSON format and output it
echo json_encode($familyData);
?>
