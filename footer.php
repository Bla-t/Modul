</main>
</div>
</body> 
<script>
$(document).ready(function(){
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
});

///***content reload page***//

  var time = new Date().getTime();
  $(document.body).bind("mousemove keypress", function(e) {
    time = new Date().getTime();
  });

  function refresh() {
    if (new Date().getTime() - time >= 60000)
      window.location.reload(true);
    else
      setTimeout(refresh, 10000);
  }

  setTimeout(refresh, 10000);

  //#endregion
  
  /////////////////
  var serverClock = jQuery(".jm");
    if (serverClock.length > 0) {
        showServerTime(serverClock, serverClock.text());
    }
     
    function showServerTime(obj, time) {
        var parts   = time.split(":"),
            newTime = new Date();

        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));

        var timeDifference  = new Date().getTime() - newTime.getTime();

        var methods = { 
            displayTime: function () {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([
                    methods.leadZeros(now.getHours(), 2),
                    methods.leadZeros(now.getMinutes(), 2),
                    methods.leadZeros(now.getSeconds(), 2)
                ].join(":"));
                setTimeout(methods.displayTime, 500);
            },
     
            leadZeros: function (time, width) {
                while (String(time).length < width) {
                    time = "0" + time;
                }
                return time;
            }
        }
        methods.displayTime();
    }

    $(document).ready(function(){
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
        });
    
        function pin(){

            var pil = document.getElementById("9").value;
            
            if(pil == "LUNAS" ){
                
               $('#tun').css('display','block');
               $('.ase').css('display','none');               
            }
            else if(pil == "LEASING"){
               $('#tun').css('display','none');
               $('.ase').css('display','block');
                
            }
            else {
               display.none;
            }


        }
        //uppercase. . . . ! !
        /*$(document).ready(function () {  
          $("input[type=text]").keyup(function () {  
              $(this).val($(this).val().toUpperCase());  
          });  
        });*/

        $(document).ready(function(){
            $("#pjk").click(function(){
                $(".pjk").show();
                $("#utang ").hide();
                $(".ise").hide();
                $("#to2").show();
                $("#to3").hide();
                $("#to1").hide();
                $(".fils").hide();
            });
            $("#angs").click(function(){
                $(".pjk").hide();
                $("#utang ").show();
                $(".ise").hide();
                $("#to1").show();
                $("#to3").hide();
                $("#to2").hide();
                $(".fils").show();
            });
            $("#edit").click(function(){
                $(".pjk").hide();
                $("#utang ").hide();
                $(".ise").show();
                $("#to3").show();
                $("#to2").hide();
                $("#to1").hide();   
                $(".fils").hide();
            });
            
        });

        $(function() {
              enable_cb1();
              $("#hek").click(enable_cb1);
              enable_cb();
              $("#hekin").click(enable_cb);
              enable_cb2();
              $("#tg").click(enable_cb2);
            });

            function enable_cb1() {
              if (this.checked) {
                $("#nom").removeAttr("readonly");
               }
              else {
                $("#nom").attr("readonly", true);
              }
            }
            function enable_cb() {
              if (this.checked) {
                $("#plat").removeAttr("readonly");
               }
              else {
                $("#plat").attr("readonly", true);
              }
            }       
            function enable_cb2(){
               if(this.checked){
                    $("#plat2").removeAttr("readonly");
                }
               else{
                    $("#plat2").attr("readonly",true);
               }
            }              

        // var pil1 = document.getElementById('');
        // var pil2 = document.getElementById('');
        // var pil3 = document.getElementById('');
        
    
    </script>
    </html>