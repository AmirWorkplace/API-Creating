<?php include('./header.php'); ?>
<section class="insert-formdata-sec">

  <form action="" method="POST" class="insert-formdata" id="insert__formdata">
    <div class="heading">
      <h1>Insert Data to Make an <span>api</span></h1>
    </div>
    <hr class="fdhr">
    <div class="inp-group">
      <label for="" class="title-label">Inter Your Name</label>
      <label for="" class="colon-label">:</label>
      <input require placeholder="@Example: Syed Amir Ali" type="text" class="input-sec" name="name" id="name">
    </div>
    <div class="inp-group">
      <label for="" class="title-label">Inter Your Age</label>
      <label for="" class="colon-label">:</label>
      <input required placeholder="@Example: 32" type="number" class="input-sec" name="age" id="age">
    </div>
    <div class="inp-group">
      <label for="" class="title-label">Write Your Details</label>
      <label for="" class="colon-label">:</label>
      <textarea type="text" class="textarea-sec" name="descriptions" id="descriptions">Please Write Something Or Some thing Else.....</textarea>
    </div>
    <div class="inp-group">
      <input type="submit" name="insert__data" value="Add Data" class="submit-btn">
    </div>
  </form>

  <button class="shwo-data" id="show__data">CLICK</button>

  <section id="load-data">
    <div class="load__data" id="load__data">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Descriptions</th>
          </tr>
        </thead>
        <tbody id="push__data">
          <!-- <tr>
            <td>1</td>
            <td>SYED AMIR ALI</td>
            <td>9534523</td>
            <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor aliquam dolores sed officia a doloribus
              cupiditate mollitia! Debitis ut eligendi atque! Eveniet dolor quidem odit reprehenderit quibusdam optio
              sunt accusamus.</td>
          </tr> -->

        </tbody>
      </table>
    </div>
  </section>
</section>
<!-- <script src="./insert-data.php"></script> -->
<script>
  $(document).ready(function() {

    function InsertData() {
      $('#insert__formdata').submit(function(event) {
        event.preventDefault();
        // alert('ok')

        var data = {
          name: $('#name').val(),
          age: +$('#age').val(),
          descriptions: $('#descriptions').val(),
        };
        var url = './get__form.php';
        console.log(data);

        $.ajax({
          url: url,
          data: data,
          method: 'POST',
          success: function(response) {
            // ReciveDataPost();
            $('#insert__formdata').trigger('reset');
            loadTable();
            // alert('This Data Inserted Successfully');

          },
          errror: function(response) {
            alert('This Data Failed Inserted, Please Try Again!');
          }
        })
      })
    }

    InsertData();

    function ReciveData() {
      $.getJSON(
        './recieve__formdata.php',
        function(data) {
          $.each(data, function(key, value) {
            $("#push__data").append(
              `<tr> <td>${value.id}</td> <td>${value.name}</td> <td>${value.age}</td> <td>${value.descriptions}</td> </tr>`
            )
          })

          // ReciveDataPost();
        }
      )
    }
    // ReciveData();
    function ReciveDataPost() {
      $.ajax({
        url: './recieve__formdata.php',
        type: 'POST',
        dataType: 'JSON',
        success: function(data) {
          $.each(data, function(key, value) {
            $("#push__data").append(
              `<tr> <td>${value.id}</td> <td>${value.name}</td> <td>${value.age}</td> <td>${value.descriptions}</td> </tr>`
            )
          })
          // $("#push__data").append(data);
        }
      })
    }

    function loadTable() {
      $.ajax({
        url: "recieve__formdata.php",
        type: "POST",
        success: function(data) {
          $("#push__data").html(data);
        }
      });
    }
    // loadTable();
    // $('#show__data').on('click', ReciveDataPost)
    ReciveDataPost();
  });
</script>


<?php include('./footer.php'); ?>


<!-- // var url = './recieve__formdata.php'

    /* $.ajax({
      url: url,
      method: 'GET',
      dataType: 'JSON',
      success: function(data) {
        // $.each(data, function(key, value) {
        for (var i = 0; i <script data.length; i++) {
          $("push__data").append(
            `<tr> <td>${data.id}</td> <td>${data.name}</td> <td>${data.age}</td> <td>${data.descriptions}</td> </tr>`
            // `<tr> <td>${value.id}</td> <td>${value.name}</td> <td>${value.age}</td> <td>${value.descriptions}</td> </tr>`
          );
        }
        // })
        console.log(data);
      }
    }) */ -->