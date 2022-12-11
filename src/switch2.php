<?php include('./header.php'); ?>
<section class="insert-formdata-sec">

  <form action="" method="POST" class="insert-formdata" id="insert__formdata">
    <div class="heading">
      <h1>Insert Data to Make an <span>api</span></h1>
    </div>
    <hr class="fdhr">
    <div class="inp-group">
      <label for="" class="title-label">Inter Your Switch Name</label>
      <label for="" class="colon-label">:</label>
      <input required placeholder="@Example: LED 1" value="LED " type="text" class="input-sec" name="switch_name" id="switch_name">
    </div>

    <div class="inp-group">
      <label for="" class="title-label">Inter Your Switch Value</label>
      <label for="" class="colon-label">:</label>
      <input required placeholder="@Example: 1" max="1" min="0" value="1" type="number" class="input-sec" name="switch_value" id="switch_value">
    </div>

    <div class="inp-group">
      <input type="submit" name="insert__data" value="Add Data" class="submit-btn">
    </div>
  </form>

  <div class="btn-container">
    <div class="btn-group switch__group" id="switch__group__1" switch="1">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>

    <div class="btn-group switch__group" id="switch__group__2" switch="2">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
    <div class="btn-group switch__group" id="switch__group__3" switch="3">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
    <div class="btn-group switch__group" id="switch__group__4" switch="4">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
    <div class="btn-group switch__group" id="switch__group__5" switch="5">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
    <div class="btn-group switch__group" id="switch__group__6" switch="6">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
    <div class="btn-group switch__group" id="switch__group__7" switch="7">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
    <div class="btn-group switch__group" id="switch__group__8" switch="8">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
    <div class="btn-group switch__group" id="switch__group__9" switch="9">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
    <div class="btn-group switch__group" id="switch__group__10" switch="10">
      <button class="btn-simple-on hidden" switch_value="0" id="switchon">ON</button>
      <button class="btn-simple-off hidden" switch_value="1" id="switchoff">OFF</button>
    </div>
  </div>

  <div class="w-full mt-5 mb-3 mx-5 flex flex-row gap-10 justify-around items-center" id="next__page"></div>
  <section id="load-data">
    <div class="load__data" id="load__data">
      <!-- !!!Text -->
    </div>
  </section>
</section>
<script>
  $(document).ready(function() {

    function InsertData() {
      $('#insert__formdata').submit(function(event) {
        event.preventDefault();
        var data = {
          switch_name: $('#switch_name').val(),
          switch_value: +$('#switch_value').val(),
        };
        var url = './insert__switch__form.php';
        console.log(data);

        $.ajax({
          url: url,
          data: data,
          method: 'POST',
          success: function(response) {
            $('#insert__formdata').trigger('reset');
            loadTable();
          },
          errror: function(response) {
            alert('This Data Failed Inserted, Please Try Again!');
          }
        })
      })
    }

    InsertData();

    function loadTable() {
      $.ajax({
        url: "recieve__switch__formdata.php",
        type: "POST",
        success: function(data) {
          $("#load__data").html(data);
        }
      });
    }
    loadTable();
    // TODO NEXT EVOLUTION

    function Switch(switch_id) {
      let switch_ = $(switch_id);
      let switchdb_id = +switch_.attr("switch");
      let switchOn = $(`${switch_id} #switchon`);
      let switchOff = $(`${switch_id} #switchoff`);
      let switchOnVal = +switchOn.attr("switch_value");
      let switchOffVal = +switchOff.attr("switch_value");
      console.log(switch_, switchOn, switchOff, switchdb_id, switchOnVal, switchOffVal);

      switchOn.on('click', function() {
        $.ajax({
          url: './switch__controll.php',
          type: 'POST',
          data: {
            sewitch_val: switchOnVal,
            switch_id: switchdb_id
          },
          success: function(response) {
            updateSwitchValue(switchdb_id);
            loadTable();
            switchOff.removeClass('hidden');
            switchOn.addClass('hidden');
          }
        })
      })

      switchOff.on('click', function() {
        $.ajax({
          url: './switch__controll.php',
          type: 'POST',
          data: {
            sewitch_val: switchOffVal,
            switch_id: switchdb_id
          },
          success: function(response) {
            updateSwitchValue(switchdb_id);
            loadTable();
            switchOn.removeClass('hidden');
            switchOff.addClass('hidden');
          }
        })
      })

      function updateSwitchValue(switchdb_id) {
        $.ajax({
          url: './get__controll__switch.php',
          type: 'POST',
          data: {
            switch_id: switchdb_id
          },
          dataType: 'JSON',
          success: function(response) {
            let data = Object.assign({}, ...response);
            console.log(data.switch_value);
            let rep = data.switch_name;
            $("#next__page").html(
              `<i id="copy__api" class='bx bxs-copy px-2 py-1 rounded-full bg-green-500 text-slate-900 duration-300 hover:bg-blue-700 hover:text-slate-100 text-2xl'></i>
              <a href="./get__json__api.php?auth_token=${data.uniqe_id}&dataStream=${+data.id}">http://localhost/MySQL-api/src/get__json__api.php?auth_token=${data.uniqe_id}&dataStream=${+data.id}</a>`
            );
            $('#copy__api').on('click', function() {
              navigator.clipboard.writeText(`http://localhost/MySQL-api/src/get__json__api.php?auth_token=${data.uniqe_id}&dataStream=${+data.id}`);
            });
          }
        })
      }

      function getSwitchID(switchID) {
        $.ajax({
          url: './get__switch__sid.php',
          data: {
            switch_id: switchID
          },
          type: 'POST',
          dataType: 'JSON',
          success: function(response) {
            let data = Object.assign({}, ...response);
            if (data.switch_value == '0') {
              switchOn.addClass('hidden');
              switchOff.removeClass('hidden');
            } else if (data.switch_value == '1') {
              switchOff.addClass('hidden');
              switchOn.removeClass('hidden');
            }
          }
        });
      }
      getSwitchID(switchdb_id)
    }

    for (var btnn = 1; btnn <= $('.switch__group').length; btnn++) {
      Switch(`#switch__group__${btnn}`);
    }

    // TODO NEXT! EVOLUTION

  });
</script>


<?php include('./footer.php'); ?>