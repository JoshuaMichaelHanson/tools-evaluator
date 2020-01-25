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

$sql1 = "SELECT name, position FROM TE_CATEGORY";
$categories = $conn->query($sql1);
$catArray = array();
if ($categories->num_rows > 0) {
    // output data of each row
    while($row1 = $categories->fetch_assoc()) {
        // echo "Name: " . $row1["name"]. " " . $row1["position"]. "<br>";
        array_push($catArray, array('name' => $row1["name"], 'position' => $row1["position"]));
    }
} else {
    echo "0 results";
}

$sql2 = "SELECT name, category, position FROM TE_TOOL_WITH_CATEGORY";
$tools = $conn->query($sql2);
$toolArray = array();
if ($tools->num_rows > 0) {
    // output data of each row
    while($row2 = $tools->fetch_assoc()) {
        // echo "Tool: " . $row2["NAME"]. " - Category: " . $row2["CATEGORY"]. " " . $row2["POSITION"]. "<br>";
        array_push($toolArray, array('name' => $row2["NAME"], 'category' => $row2["CATEGORY"], 'position' => $row2["POSITION"]));
    }
} else {
    echo "0 results";
}

$returnArray = array('tools' => $toolArray) + array('categories' => $catArray);
$returnJson = json_encode($returnArray);
// echo "Return this => " . $returnJson;
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
echo $returnJson;

$conn->close();
?> 