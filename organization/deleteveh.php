<?php

$mysqli = require __DIR__ . "/database.php";

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM vehicles WHERE v_id = $id";  
    $result = mysqli_query($mysqli, $sql);
    if ($result) {
        header('location:vehicle.php');
    } else {
        die(mysqli_error($mysqli));
    }
}

?>

