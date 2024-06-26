<?php
$servername = "127.0.0.1"; //use host your db mysql
$username = "root"; //use username your db mysql
$password = "password"; //use password your db mysql
$dbname = "testdb";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
