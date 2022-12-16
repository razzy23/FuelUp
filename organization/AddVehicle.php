<?php

print_r($_POST);
// if (strlen($_POST["password"]) < 8) {
//     die("Password must be at least 8 characters");
// }

// if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
//     die("Password must contain at least one letter");
// }

// if ( ! preg_match("/[0-9]/", $_POST["password"])) {
//     die("Password must contain at least one number");
// }
session_start();
$BRN = $_SESSION['BRN'];

$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO vehicles (nic, vletter, vnumber, vtype, vfuel, chassis)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssss",
                  $BRN,
                  $_POST["vletter"],
                  $_POST["vnumber"],
                  $_POST["vtype"],
                  $_POST["vfuel"],
                  $_POST["chassis"]);
                  
if ($stmt->execute()) {
    header("Location: RegistrationSuccesful.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("Chassis No already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
