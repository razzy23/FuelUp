<?php
session_start();
$conn = new mysqli("localhost", "root", "root", "FuelUp") or die("Connection failed: " . mysqli_connect_error);
?>