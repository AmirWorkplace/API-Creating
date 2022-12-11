<?php
include_once('./db.php');

$switch_id = $_POST['switch_id'];
$sewitch_val = $_POST['sewitch_val'];

$sql = "UPDATE `switchdata` SET `switch_value`=$sewitch_val WHERE  `id`=$switch_id";

mysqli_query($conn, $sql) or die("SQL Query Failed.");
