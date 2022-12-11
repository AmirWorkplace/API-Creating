<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "@SyedAmir17807594";
$dbname = "iot_project_api";

$conn = mysqli_connect(
  $dbhost,
  $dbuser,
  $dbpass,
  $dbname
);

if (!$conn) die('Please Check Your Localhost Server and Detect Your Problem Then try to Sovle these...Thank You soo Much !');