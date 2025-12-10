<?php

$host = "localhost";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to server.<br>";

// --------------------------------
// DROP TABLES IN SAFE ORDER
// --------------------------------
$dropQueries = [
    "DROP TABLE IF EXISTS Creator_Platform.Posts",
    "DROP TABLE IF EXISTS Creator_Platform.Subscription_Tiers",
    "DROP TABLE IF EXISTS Creator_Platform.Creators",
    "DROP TABLE IF EXISTS Creator_Platform.Users",
    "DROP SCHEMA IF EXISTS Creator_Platform"
];

foreach ($dropQueries as $q) {
    if ($conn->query($q) === TRUE) {
        echo "Executed: $q<br>";
    } else {
        echo "Error executing [$q]: " . $conn->error . "<br>";
    }
}

echo "<br>✔ Schema dropped successfully.";

$conn->close();
?>
