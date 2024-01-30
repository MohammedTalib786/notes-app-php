<?php
include("database.php");
$sr_no = $_GET["sr_no"];

echo $sr_no;

$delQuery = "DELETE FROM notes WHERE sr_no = '$sr_no'";
mysqli_query($con, $delQuery);

echo "<script> window.location = 'index.php' </script>";

?>