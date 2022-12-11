<?php
include_once('./db.php');

if (isset($_GET['dataStream']) && isset($_GET['auth_token'])) {
  $find_id = $_GET['dataStream'];
  $auth_token = $_GET['auth_token'];

  $query = "SELECT * FROM `switchdata` WHERE `id`=$find_id AND `uniqe_id`='$auth_token'";
  if ($sql = mysqli_query($conn, $query)) {
    $fetch_data = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    echo json_encode($fetch_data);
  } else {
    echo "SORRY";
  }
} else echo "Got Problem?";
