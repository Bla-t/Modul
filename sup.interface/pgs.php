<?php
include "nav.php";
?>
<section>
  <div class="row">
    <div class="form-inline d-flex">
      <button class="btn btn-secondary btn-sm" id="towew"> towewew</button>
      <button class="btn btn-danger btn-sm ml-2" id="yutub"><span class="ti-youtube"></span></button>
      <button class="btn btn-secondary btn-sm ml-2" id="as">???</button>
    </div>
  </div>

  <div class="embed-responsive embed-responsive-16by9" id="toweww">
    <iframe class="embed-responsive-item" src="https://www.google.co.id/maps/@-6.2652416,106.954752,13z?hl=id"></iframe>
  </div>
  <div class="embed-responsive embed-responsive-21by9" id="yutubs">
    <iframe class="embed-responsive-item" src="https://html5.gamedistribution.com/da901db358b44d62ba8f35c9ff031a19/?gp=1&siteid=79&channelid=2&siteLocale=en-US&spilStorageId=56835991682&gd_sdk_referrer_url=https%253A%252F%252Fwww.agame.com%252Fgame%252Fsniper-reloaded" allowfullscreen></iframe>
  </div>
  <!--https://warbrokers.io/game3d.php?nick=guest&autoJoin=true&classic=true-->
  <div class="embed-responsive embed-responsive-21by9" id="aa">
    <iframe class="embed-responsive-item" src="https://html5.gamedistribution.com/rvvASMiM/a3fe479299424b918341894d7a2d59ee/?gp=1&siteid=79&channelid=2&siteLocale=en-US&spilStorageId=49236131061&gd_sdk_referrer_url=https%253A%252F%252Fwww.agame.com%252Fgame%252Fsiren-apocalyptic&gd_zone_config=eyJwYXJlbnRVUkwiOiJodHRwczovL3d3dy5hZ2FtZS5jb20vZ2FtZS9zaXJlbi1hcG9jYWx5cHRpYyIsInBhcmVudERvbWFpbiI6Imh0dHBzOi8vd3d3LmFnYW1lLmNvbS9nYW1lL3NpcmVuLWFwb2NhbHlwdGljIiwidG9wRG9tYWluIjoiYWdhbWUuY29tIiwiaGFzSW1wcmVzc2lvbiI6dHJ1ZSwibG9hZGVyRW5hYmxlZCI6dHJ1ZSwiaG9zdCI6Imh0bWw1LmdhbWVkaXN0cmlidXRpb24uY29tIiwidmVyc2lvbiI6IjEuNS4wIn0%253D" allowfullscreen></iframe>
  </div>
</section>
<script>
  $(document).ready(function() {
    $("#toweww").show();
    $("#yutubs").hide();
    $("#aa").hide();
    $("#towew").click(function() {
      $("#toweww").show();
      $("#yutubs").hide();
      $("#aa").hide();
    });
    $("#yutub").click(function() {
      $("#toweww").hide();
      $("#yutubs").show();
      $("#aa").hide();
    });
    $("#as").click(function() {
      $("#toweww").hide();
      $("#yutubs").hide();
      $("#aa").show();
    });
  });
</script>
</body>

</html>