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
      <input required placeholder="@Example: LED 1" value=" LED " type="text" class="input-sec" name="switch_name"
        id="switch_name">
    </div>

    <div class="inp-group">
      <label for="" class="title-label">Inter Your Switch Value</label>
      <label for="" class="colon-label">:</label>
      <input required placeholder="@Example: 1" max="1" min="0" value="1" type="number" class="input-sec"
        name="switch_value" id="switch_value">
    </div>

    <div class="inp-group">
      <input type="submit" name="insert__data" value="Add Data" class="submit-btn">
    </div>
  </form>

  <button
    class="shwo-data ring-4 ring-offset-2 ring-slate-400 bg-teal-500 px-2 p-[2px] rounded-sm tracking-wide duration-300 hover:tracking-widest text-slate-200 text-xl uppercase font-bold my-3 hover:bg-lime-500 hover:text-slate-900"
    id="show__data">CLICK</button>

  <div class="btn-container">
    <div class="btn-group switch__group" id="switch__group__1">
      <button class="btn-simple-on hidden" id="switchon">ON</button>
      <button class="btn-simple-off hidden" id="switchoff">OFF</button>
    </div>

    <div class="btn-group switch__group" id="switch__group__1">
      <button class="btn-simple-on" id="switch">ON</button>
      <button class="btn-simple-off" id="switch">OFF</button>
    </div>

    <div class="btn-group switch__group" id="switch__group__1">
      <button class="btn-simple-on" id="switch">ON</button>
      <button class="btn-simple-off" id="switch">OFF</button>
    </div>
  </div>

  <section id="load-data">
    <div class="load__data" id="load__data">
      <!-- !!!Text -->
    </div>
  </section>
  <div id="next__page"></div>
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

  function SwitchON(switchID, switchVal) {
    $('#switchon').on('click', function() {
      $.ajax({
        url: './switch__controll.php',
        type: 'POST',
        data: {
          sewitch_val: switchVal,
          switch_id: switchID
        },
        success: function(response) {
          loadTable();
          getSwitchID(switchID);
          updateSwitchValue(1);
          // $('#switchon').removeClass('hidden');
          // $('#switchoff').addClass('hidden');
        }
      })
    })
  }

  SwitchON(1, 1);

  function SwitchOFF(switchID, switchVal) {
    $('#switchoff').on('click', function() {
      $.ajax({
        url: './switch__controll.php',
        type: 'POST',
        data: {
          sewitch_val: switchVal,
          switch_id: switchID
        },
        success: function(response) {
          loadTable();
          getSwitchID(switchID);
          updateSwitchValue(switchID);
          // $('#switchoff').removeClass('hidden');
          // $('#switchon').addClass('hidden');
        }
      })
    })
  }

  SwitchOFF(1, 0);

  function updateSwitchValue(switchID) {
    $.ajax({
      url: './get__controll__switch.php',
      type: 'POST',
      data: {
        switch_id: switchID
      },
      dataType: 'JSON',
      success: function(response) {
        console.log(response);
        let data = Object.assign({}, ...response);
        getSwitchID(switchID);
        console.log(data.switch_value);
        $("#next__page").html(
          `<a href="./test.php?${data.id}&${data.uniqe_id}&${data.switch_name}&${data.switch_value}">GO NEXT</a>`
        );
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
        console.log(response);
        let data = Object.assign({}, ...response);
        if (data.switch_value == '1') {
          $('#switchon').removeClass('hidden');
          $('#switchoff').addClass('hidden');
        } else if (data.switch_value == '0') {
          $('#switchoff').removeClass('hidden');
          $('#switchon').addClass('hidden');
        }
      }
    })
  }


});
</script>


<?php include('./footer.php'); ?>