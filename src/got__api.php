<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET DATA</title>
  <style>
    .table {
      font-size: 1.5rem;
      font-weight: 900;
    }

    tr,
    td {
      padding: 5px 12px;
      text-align: center;
    }

    tr,
    th {
      padding: 5px 12px;
      text-align: center;
      color: #000;
      font-weight: 600;
    }
  </style>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js'></script>
</head>

<body>
  <button id="onlive">ON LIVE UPDATE</button>
  <button id="offlive">OFF LIVE UPDATE</button>
  <div class="table" id="push__data">

  </div>

  <script>
    $(document).ready(function() {
      function switchStatus(dataStream) {
        $.ajax({
          url: `http://localhost/MySQL-api/src/get__json__api.php?auth_token=1922AsjdSyEdmcji_LED_7175074279jdQaMIrEnskvpoxmAlI112&dataStream=${dataStream}`,
          type: 'GET',
          dataType: 'JSON',
          success: function(data) {
            let getData = Object.assign({}, ...data);
            // console.log(getData);
            /* $('#push__data').html(`
              <table border="3">
                <tr>
                  <th>ID</th>
                  <th>Switch Name</th>
                  <th>Switch Value</th>
                  <th>Auth Token</th>
                </tr>
                <tr>
                  <td>${getData.id}</td>
                  <td>${getData.switch_name}</td>
                  <td>${getData.switch_value}</td>
                  <td>${getData.uniqe_id}</td>
                </tr>
              </table>
          `); */
            console.log(+getData.switch_value);
            $('#push__data').html(+getData.switch_value);
          }
        })
      }
      switchStatus(9)

      $('#onlive').on('click', function() {
        // $(document).ajaxStop(function() {
        setInterval(() => {
          switchStatus(9)
        }, 500);
        // });
      });

      $('#offlive').on('click', function() {
        window.location.reload();
      });

    });
  </script>
</body>

</html>
<!-- !!<link rel="stylesheet" href="http://localhost\MySQL-api\src\got__api.php">


switch_name
: 
" LED 5"
switch_value
: 
"1"
uniqe_id
: 
"214748364


-->