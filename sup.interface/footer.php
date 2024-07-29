</main>
</div>
<script src="scrp.js"></script>
<script>
  $(document).ready(function() {

    $('#tipe').select2()

    //konfirmmer
    $(".hapusakuns, .simpanes, .hilank, .simps, .hils, .del, .delh, .hils, .ceks, .stok, .laps, .haphap").click(function() {
      if (confirm("anda yakin..?")) {
        return true;
      } else {
        return false;
      }
      return true;
    });

    //search guide.!!
    $("#input").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
    $("#input1").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table1 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
    
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#Aset tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
      $("#Pajak tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
      $("#Kir tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
      $("#akoen tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });

    // move to uppercase.!!
    $(".capslock").keyup(function() {
      $(this).val($(this).val().toUpperCase());
    });

    ///input tidak jadi
    $("#tdk, #batal, .close").on("click", function(event) {
      $(".form-control").val("");
    });
  });


  ///content reload page///
  var time = new Date().getTime();
  $(document.body).bind("mousemove keypress ",function(e) {
    var time = new Date().getTime();

    function refresh() {
      if (new Date().getTime() - time >= 3500000)
        window.location.reload(true);
      else
        setTimeout(refresh, 1800000);
    }

    setTimeout(refresh, 1800000);
  });
  
  /////////////////
  var serverClock = jQuery(".jm");
  if (serverClock.length > 0) {
    showServerTime(serverClock, serverClock.text());
  }

  function showServerTime(obj, time) {
    var parts = time.split(":"),
      newTime = new Date();

    newTime.setHours(parseInt(parts[0], 10));
    newTime.setMinutes(parseInt(parts[1], 10));
    newTime.setSeconds(parseInt(parts[2], 10));

    var timeDifference = new Date().getTime() - newTime.getTime();

    var methods = {
      displayTime: function() {
        var now = new Date(new Date().getTime() - timeDifference);
        obj.text([
          methods.leadZeros(now.getHours(), 2),
          methods.leadZeros(now.getMinutes(), 2),
          methods.leadZeros(now.getSeconds(), 2)
        ].join(":"));
        setTimeout(methods.displayTime, 500);
      },

      leadZeros: function(time, width) {
        while (String(time).length < width) {
          time = "0" + time;
        }
        return time;
      }
    }
    methods.displayTime();
  }
</script>
</body>

</html>