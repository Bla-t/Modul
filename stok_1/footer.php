</main>
<script src="scrp.js"></script>
<script>
  $(document).ready(function() {
    //search guide.!!
    $("#input").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    //move to uppercase.!!
     $("input[type=text]").keyup(function () {  
              $(this).val($(this).val().toUpperCase());  
          });
    /*$('[data-toggle="tooltip"]').tooltip();*/
    $("#hapoes").click(function() {
      if (confirm("yakin...?")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
    var time = new Date().getTime();
    $(document.body).bind("mousemove keypress", function(e) {
      time = new Date().getTime();
    });

    function refresh() {
      if (new Date().getTime() - time >= 60000) {
        window.location.reload(true);
      } else {
        setTimeout(refresh, 30000);
      }
      setTimeout(refresh, 30000);
    }
  });
</script>
</body>

</html>