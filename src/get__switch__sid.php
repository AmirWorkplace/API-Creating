<?php

$switch_id = $_POST['switch_id'];
include_once('./db.php');

$sql = "SELECT * FROM `switchdata` WHERE `id`=$switch_id";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
if (mysqli_num_rows($result) > 0) {
  echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
} else {
  echo "<h2>No Record Found.</h2>";
}