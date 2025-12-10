<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "Creator_Platform";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to database.<br>";

// ------------------------------
//  CLEAN TABLES
// ------------------------------
$cleanupQueries = [
    "DELETE FROM Posts",
    "DELETE FROM Subscription_Tiers",
    "DELETE FROM Creators",
    "DELETE FROM Users",

    "ALTER TABLE Users AUTO_INCREMENT = 1",
    "ALTER TABLE Creators AUTO_INCREMENT = 1",
    "ALTER TABLE Subscription_Tiers AUTO_INCREMENT = 1",
    "ALTER TABLE Posts AUTO_INCREMENT = 1"
];

foreach ($cleanupQueries as $q) {
    if ($conn->query($q) === TRUE) {
        echo "Executed: $q<br>";
    } else {
        echo "Error executing [$q]: " . $conn->error . "<br>";
    }
}

// ------------------------------
//  INSERT TEST DATA
// ------------------------------
$insertQueries = [

    // USER 1 – creator
    "INSERT INTO Users (Username, User_Email, Password_Hash, Role)
    VALUES ('creatorUser', 'creator@example.com', '01234', 'creator')",

    // Creator profile for User 1
    "INSERT INTO Creators (User_ID)
    VALUES (1)",

    // Sample tier for Creator 1
    "INSERT INTO Subscription_Tiers (Creator_ID, Tier_Name, Price_Cents, Details)
    VALUES (1, 'Gold Tier', 500, 'Access to premium creator content')",

    // USER 2 – normal user
    "INSERT INTO Users (Username, User_Email, Password_Hash, Role)
    VALUES ('normalUser', 'user@example.com', '57789', 'user')"
];

foreach ($insertQueries as $q) {
    if ($conn->query($q) === TRUE) {
        echo "Inserted: $q<br>";
    } else {
        echo "Error inserting [$q]: " . $conn->error . "<br>";
    }
}

echo "<br>✔ Seed data inserted successfully.";

$conn->close();
