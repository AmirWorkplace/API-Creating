<?php
include_once('./db.php');

$switch_name = $_POST['switch_name'];
$switch_value = $_POST['switch_value'];
// $uniqe_id = hexdec(uniqid());

function uniqueId($switch_name)
{
  // return "AsjdSyEdmcji" . str_replace(' ', '_', $switch_name) . hexdec(uniqid()) . "jdQaMIrEnskvpoxmAlI";
  return "1922AsjdSyEdmcji_LED_7175074279jdQaMIrEnskvpoxmAlI112";
}

$insert_data_query = "INSERT INTO `switchdata` (`uniqe_id`, `switch_name`, `switch_value`) VALUES ('" . uniqueId($switch_name) . "','$switch_name',$switch_value)";

if (mysqli_query($conn, $insert_data_query)) {
  echo 'SUCCESS';
} else echo 'FAILED';
