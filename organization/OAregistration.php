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

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO org_admin (CompanyName, BRN, Email, MobileNo, password_hash)
        VALUES (?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssss",
                  $_POST["CompanyName"],
                  $_POST["BRN"],
                  $_POST["Email"],
                  $_POST["MobileNo"],
                  $password_hash);
                  
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
