</main>
</div>
<script src="script.js"></script>
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
  $(document).ready(function() {
    //cekk is.!!

    $("#simps").click(function() {
      if (confirm("anda yakin..?")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
    $("#simpan").click(function() {
      if (confirm("anda yakin..?")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
    $("#acc").click(function() {
      if (confirm("anda yakin..?")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
    $("#eks").click(function() {
      if (confirm("anda yakin..?")) {
        return true;
      } else {
        return false;
      }
      return true;
    });

    //status textarea selector
    /*$("#stat").on('change', function() {
      var stat = $(this).val();
      if (stat == 'resign') {
        $(".alsn").css('display', 'block');
      } else {
        $(".alsn").css('display', 'none');

      }
    });
    var cekstat = $("#stat").val();
    if (cekstat == 'resign') {
      $(".alsn").css('display', 'block');

    }*/
    //search guide.!!
    $("#input").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > 10)
      });
    });
    //move to uppercase.!!
    /*$(".form-control").keyup(function () {  
             $(this).val($(this).val().toUpperCase());  
         });*/
    ///***content reload page***//

    var time = new Date().getTime();
    $(document.body).bind("mousemove keypress", function(e) {
      time = new Date().getTime();

      function refresh() {
        if (new Date().getTime() - time >= 60000)
          window.location.reload(true);
        else
          setTimeout(refresh, 30000);
      }

      //setTimeout(refresh, 30000);
    });
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

  /*$(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#Aset tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      $("#Pajak tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      $("#Kir tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });*/


  //uppercase. . . . ! !
  $(document).ready(function() {
    $("input[type=text]").keyup(function() {
      $(this).val($(this).val().toUpperCase());
    });
  });

  // var pil1 = document.getElementById('');
  // var pil2 = document.getElementById('');
  // var pil3 = document.getElementById('');
</script>
</body>

</html>