<?php
$servername = "localhost";
$username = "tools";
$password = "rty-45Cq2@";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?> 