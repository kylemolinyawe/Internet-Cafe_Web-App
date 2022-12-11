<?php

$table = $_GET['table'];
$field = $_GET['field'];
$id = $_GET['id'];

$dbname = "internet_cafe";
$conn = mysqli_connect("localhost:3310", "root", "dragonorange22", $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "DELETE FROM $table WHERE $field = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header("Location: view.php?category=$table");
    exit;
} else {
    echo "Error deleting record";
}

?>