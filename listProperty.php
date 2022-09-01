<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "propertiesdb";

$streetNumber = $_POST['streetNumber'];
$streetName = $_POST['streetName'];
$city = $_POST['city'];
$province = $_POST['province'];
$zipCode = $_POST['zipCode'];
$attached = $_POST['attached'];
$detached = $_POST['detached'];
$oversized = $_POST['oversized'];
$additional = $_POST['additional'];
$boat = $_POST['boat'];
$furnished = $_POST['furnished'];
$unfurnished = $_POST['unfurnished'];

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
if( $conn->connect_error) {
    die( 'Connection failed'.$conn->connect_error);
  } else {
    $stmt = $conn.prepare("insert into properties(streetNumber, streetName, city, province, zipCode, garageDesc, furniture, images, shortDesc)
    values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssissbs", $streetNumber, $streetName, $city, $province, $zipCode, $attached, $detached, $oversize, $additional, $boat, $furnished, $unfurnished);
    $stmt->execute();
    echo "Submitted successfully";
    $stmt->close();
    $conn->close();
}
