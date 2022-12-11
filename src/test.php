<?php
    /* include_once('./db.php');

    $sql = "SELECT * FROM `switchdata` WHERE `id`=3";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    $data = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));

    if (mysqli_num_rows($result) > 0) {
      echo $data;
    } else {
      echo "<h2>No Record Found.</h2>";
    } */

    // $newobj = new stdClass();

    /* include_once('./db.php');

    // $switch_id = $_POST['switch_id'];
    $switch_id = 1;

    $sql = "SELECT * FROM `switchdata` WHERE `id`=$switch_id";
    $result = mysqli_query($conn, $sql);
    // echo $result;
    print_r($result); */

    /* 
    $get_data_query = "SELECT * FROM `test_api_create` ORDER BY 'id' DESC";

    if (mysqli_query($conn, $get_data_query)) {
      $get_data = mysqli_query($conn, $get_data_query);
      echo json_encode(mysqli_fetch_all($get_data, MYSQLI_ASSOC));
    } else echo 'SORRY';
    */
    // echo $get_data;
    // echo 'SUCCESS';
    // echo $get_data;
    // echo json_encode(mysqli_fetch_all(mysqli_query(mysqli_connect("localhost", "root", "@SyedAmir17807594", "iot_project_api"), "SELECT * FROM `test_api_create` ORDER BY `id` DESC"), MYSQLI_ASSOC));



    /* $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                  <tr>
                    <th width="60px">Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Descriptions</th>
                    
                  </tr>';

      while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["name"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["age"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["descriptions"]}'>Delete</button></td></tr>";
      }
      $output .= "</table>";

      mysqli_close($conn); */

    // echo $output;

    /* ? OFF Thise Clone? */


    // $("#push__data").html(data);

    /*  let getData = Object.assign({}, ...data);
                        console.log(getData);*/

    // console.log(Object.assign({}, ...data[0]));
    /* console.log(data.length);*/
    /* for (var x = 0; x < alldata.length; x++) {
                // $.each(data, function(key, value) {
                $("#push__data").append(
                  `<tr> <td>${alldata[x].id}</td> <td>${alldata[x].uniqe_id}</td> <td>${alldata[x].switch_name}</td> <td>${alldata[x].switch_value}</td> </tr>`
                )
                // })
              } */


    // loadTable();
    // console.log(+response);

    // console.log(response);        // console.log(data);
    // let alldata = JSON.parse(data);
    // $('.th-width').addClass('w-600px');
    // $('.th-width').style.width = '600px';



















    /* 
    if (mysqli_num_rows($result) > 0) {
      // echo $result;
      print_r($result);
      // echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    } else {
      echo "<h2>No Record Found.</h2>";
    } */
    /* 


    SELECT `switch_name`, `switch_value`  FROM `switchdata` ORDER BY $switch_id DESC LIMIT 1; 

    SELECT `id`, `uniqe_id`, `switch_name`, `switch_value` FROM `switchdata` WHERE 1

    */

    // getSwitchID(switchdb_id);
    // console . log(response);
    // getSwitchID(switchdb_id);
    // console . log(response);
    ?>

<button
  class="shwo-data ring-4 ring-offset-2 ring-slate-400 bg-teal-500 px-2 p-[2px] rounded-sm tracking-wide duration-300 hover:tracking-widest text-slate-200 text-xl uppercase font-bold my-3 hover:bg-lime-500 hover:text-slate-900"
  id="show__data">CLICK
</button>