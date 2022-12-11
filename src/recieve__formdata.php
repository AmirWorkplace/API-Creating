<?php


include_once('./db.php');

$sql = "SELECT * FROM `test_api_create` ORDER BY `id` DESC";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {

  echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
} else {
  echo "<h2>No Record Found.</h2>";
}
