<?php
include_once('./db.php');

$name = $_POST['name'];
$age = $_POST['age'];
$description = $_POST['descriptions'];

$insert_data_query = "INSERT INTO `test_api_create` (`name`, `age`, `descriptions`) VALUES ('$name',$age,'$description')";

if (mysqli_query($conn, $insert_data_query)) {
  echo 'SUCCESS';
} else echo 'FAILED';