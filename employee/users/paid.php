<?php

$user = $_GET['user'];
$bill_id = $_GET['bill'];
$desk = $_GET['desk'];
$ts = $_GET['ts'];


$dbname = "internet_cafe";
$conn = mysqli_connect("localhost:3310", "root", "dragonorange22", $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "update bill set bill_status = 1 where bill_id = $bill_id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header("Location: details.php?user=$user&desk=$desk&bill=$bill_id&ts=$ts");
    exit;
} else {
    echo "Error deleting record";
}

?>