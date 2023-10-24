<?php
  include 'config.php';
  error_reporting(0);
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
      <!-- <div class="cursor"></div> -->
</head>
      <?php
      if($_SESSION['levl'] == "admin" || $_SESSION['levl'] == "operator"){
        echo('<link rel="stylesheet" href="css/body.css">');
          }
      else if($_SESSION['levl'] == "sudo"){
          
          echo('<link rel="stylesheet" href="css/sud.css">');
          
      }
      else if($_SESSION['levl'] == "visitor"){
          echo ('<link rel="stylesheet" href="css/body-pengunjung.css">');
      }
         function tgl($tanggal){
        $bulan = array (
          1 =>'Jan','Feb','Mar','Apr','Mei','Juni','Juli','Agus','Sept','Okt','Nov','Des');
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
       
        return $bulan[ (int)$pecahkan[1] ] . ', ' . $pecahkan[0];
      }
    ?>
    <style type="text/css">
      .font-italic {
          font-size: 15px;
          background-color:#950000;
          border-radius: 5%;
      }
       .cursor {
      position: fixed;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background-color: #f5f5f5;
      pointer-events: none;
      mix-blend-mode: difference;
      z-index: 110000000;    
      transition: transform 0.2s;
    }
    </style>
  <?php
    if($_SESSION['levl'] == "sudo"){
        echo "<style>body{
            background: url(backgrond/bek3.jpg)fixed;
        }</style>";        
    }
    else if($_SESSION['levl'] == "admin"){
        echo "<style>body{
            background-color:#585858;
        }
        h2{
            color: #353535;
        }</style>";
    }
     else if($_SESSION['levl'] == "operator"){

        echo"<style>body{
              background-color: #736458;
          }
          h2{
              color: #353535;
          }</style>";
    }
     else if($_SESSION['levl'] == "visitor"){
        echo "<style>body{
            background-color: #9A9A9A;
        }
        h2{
            color: #353535;
        }</style>";
    }


    $iti = $_SESSION['ID'];
    $kue = mysqli_query($conn, "SELECT * FROM `dat_uss` WHERE `id`='$iti'") or die(mysqli_error($conn));
    while($pet = mysqli_fetch_array($kue)){
    ?>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="updet_leas.php">Update Data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rekap.php">Rekap</a>
      </li>
      <?php
         if ($_SESSION['levl']=="sudo"){
      ?>
      <li class="nav-item">
          <a class="nav-link" href="sup.interface/index.php">ŸÆ▬</a>
      </li>
      <?php 
        }
        else{}
        ?>      
    </ul>
    <ul class="navbar-nav"> 
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle font-weight-bold font-italic" href="" id="navbardrop" data-toggle="dropdown">
        <?php echo $pet['nama'];?>
      </a>
  <?php
       }
       ?>
      <div class="dropdown-menu bg-secondary">
        <a class="dropdown-item" href="profil_a.php">Profil</a>
        <a class="dropdown-item" href="ot.php">logout</a>
      </div>
    </li>
    </ul>
  </div>  
</nav>
<!--<script>
      //costum cursor//
    $(document).ready(function(){
      var cursor = $(".cursor");

      $(window).mousemove(function(e) {
          cursor.css({
              top: e.clientY - cursor.height() /2,
              left: e.clientX - cursor.width() /2
          });
      });

      $(window)
          .mouseleave(function() {
              cursor.css({
                  opacity: "0"
              });
          })
          .mouseenter(function() {
              cursor.css({
                  opacity: "1"
              });
          });

      $("a")
          .mouseenter(function() {
              cursor.css({
                  transform: "scale(2.2)"
              });
          })
          .mouseleave(function() {
              cursor.css({
                  transform: "scale(1)"
              });
          });
       $(".btn")
          .mouseenter(function() {
              cursor.css({
                  transform: "scale(2.2)"
              });
          })
          .mouseleave(function() {
              cursor.css({
                  transform: "scale(1)"
              });
          });

      $(window)
          .mousedown(function() {
              cursor.css({
                  transform: "scale(.2)"
              });
          })
          .mouseup(function() {
              cursor.css({
                  transform: "scale(1)"
              });
          });
    });
</script>-->
</html>
