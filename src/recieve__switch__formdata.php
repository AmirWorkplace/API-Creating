<?php
include_once('./db.php');

$sql = "SELECT * FROM `switchdata` ORDER BY `id` DESC";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {
  // echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
  $output =
    '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
      <th width="60px">Id</th>
      <th>Unique ID</th>
      <th>Switch Name</th>
      <th>Switch Value</th>
      
    </tr>';

  while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<tr>
      <td>{$row['id']}</td>
      <td>{$row['uniqe_id']}</td>
      <td>{$row['switch_name']}</td>
      <td>{$row['switch_value']}</td>
    </tr>";
  }
  $output .= "</table>";

  mysqli_close($conn);

  echo $output;
} else {
  echo "<h2>No Record Found.</h2>";
}