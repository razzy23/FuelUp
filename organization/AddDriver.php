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

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO org_driver (username, NIC, email, PhoneNo, password_hash, BRN)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssss",
                  $_POST["username"],
                  $_POST["NIC"],
                  $_POST["email"],
                  $_POST["PhoneNo"],
                  $password_hash,
                  $BRN);
                  
if ($stmt->execute()) {

    header("Location: SignUp_Success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
