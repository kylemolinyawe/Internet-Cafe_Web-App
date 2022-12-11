<?php

$user = $_GET['user'];
$bill_id = $_GET['bill'];
$ts = $_GET['ts'];

$dbname = "internet_cafe";
$conn = mysqli_connect("localhost:3310", "root", "dragonorange22", $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "DELETE FROM bill WHERE bill_id = $bill_id"; 
$conn -> query ($sql);

$sql = "DELETE FROM user where user_id = $user";
$conn -> query ($sql);

$sql = "delete from timeslot where ts_id = $ts";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header("Location: manage.php");
    exit;
} else {
    echo "Error deleting record";
}

?>