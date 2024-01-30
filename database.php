<?php

// localhost
// $db_server = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_name = "notes-app";
// $port = 4306;


// ONLINE
$db_server = "sql204.infinityfree.com";
$db_user = "if0_35881921";
$db_pass = "GJQThPddGF0jq";
$db_name = "if0_35881921_notetapp";



$con  = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$con) {
    echo "NOT Connected";
}

?>