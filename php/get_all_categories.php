<?php
$servername = "localhost";
$username = "tools";
$password = "rty-45Cq2@";
$dbname = "tools_evaluator";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, position FROM TE_CATEGORY";
$result = $conn->query($sql);
$catArray = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["position"]. "<br>";
        array_push($catArray, 'id' => $row["id"], 'name' => $row["name"], 'position' => $row["position"]);
    }
} else {
    echo "0 results";
}
$returnJson = json_encode($catArray);
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
echo $returnJson;
$conn->close();
?> 