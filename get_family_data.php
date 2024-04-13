<?php
// Read data from data.txt file
$lines = file("data.txt", FILE_IGNORE_NEW_LINES);

$familyData = [];

// Process each line and parse data
foreach ($lines as $line) {
    $personData = [];
    preg_match_all('/([^:]+): ([^,]+)/', $line, $matches);
    $personData['name'] = $matches[2][0];
    $personData['age'] = $matches[2][1];
    $personData['previous_location'] = $matches[2][2];
    $personData['current_location'] = $matches[2][3];
    // Check if phone number exists in the line
    if (isset($matches[2][4])) {
        $personData['phone'] = $matches[2][4];
    } else {
        $personData['phone'] = ''; // Set empty string if phone number doesn't exist
    }
    $familyData[] = $personData;
}

// Output family data as JSON
header('Content-Type: application/json');
echo json_encode($familyData);
?>
