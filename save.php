<?php
// Extract POST data safely
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dateoftravel = $_POST['dateoftravel'];
$states = $_POST['states'];
$requirement = $_POST['requirement'];

$scriptURL = 'https://script.google.com/macros/s/AKfycbzstA6Gew6DaBWmVW9TdAuqc9Hx1qMO2W3eJk8-SeOU1qysQaa_UzB_QdbouS89Zu1M/exec';

// Prepare data for POST request
$data = array(
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'dateoftravel' => $dateoftravel,
    'states' => $states,
    'requirement' => $requirement
);

// Initialize cURL
$ch = curl_init($scriptURL);

// Set cURL options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects

// Execute the POST request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    //echo 'Response: ' . $response;
    header('Location: thankyou.php');
    exit();
}


// Close cURL session
curl_close($ch);
?>
