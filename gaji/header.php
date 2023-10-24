<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
date_default_timezone_set('Asia/Jakarta');
include "../config.php";
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
  header("location:../index.php?pesan=kick");
} else if ($_SESSION['type'] != "gaji" && $_SESSION['type'] != "supus") {
  session_destroy();
  header("location:../index.php?pesan=cit");
}
///numfor
function rupiah($angka)
{

  $hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
}

/////// LOGIN TIPE ///////////////
$level = $_SESSION['levl'];
$username = $_SESSION['nama'];
$milik = $_SESSION['bagian'];
$iduser = $_SESSION['ID'];
if (empty($_SESSION['gamb'])) {
  $gam = "icon_none.png";
} else {
  $gam = $_SESSION['gamb'];
}


function tgl($tanggal)
{
  $bulan = array(
    1 =>
    'Jan',
    'Feb',
    'Mar',
    'Apr',
    'Mei',
    'Juni',
    'Juli',
    'Agus',
    'Sept',
    'Okt',
    'Nov',
    'Des'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ', ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Protoype | Gaji</title>
  <link rel="icon" type="image/png" href="gamb/dwn.png" />
  <!-- Fontawesome CDN Link -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Boxiocns CDN Link -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"> -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <link rel="stylesheet" href="stylest.css">
</head>

<body>
  <div class="sidebar closed">
    <div class="logo-details">
      <i class='bx bx-layer'></i>
      <span class="logo_name"> GAJI~</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">DASHBOARD</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php">HOME</a></li>
        </ul>
      </li>
      <li>
        <a href="daftar.php">
          <i class='bx bx-user'></i>
          <!-- <i class='bx bx-pie-chart-alt-2'></i> -->
          <span class="link_name">DAFTAR PEGAWAI</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="daftar.php">STAFF</a></li>
        </ul>
      </li>
      <li>
        <a href="tambah.php">
          <i class='bx bx-user-plus'></i>
          <span class="link_name">TAMBAH PEGAWAI</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="tambah.php">TAMBAH PEGAWAI</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-receipt'></i>
            <span class="link_name">GOL - TUNJ</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">GOL - TUNJANGAN</a></li>
          <li><a href="gol-tunjangan.php">STAFF</a></li>
          <li><a href="gol-tunjsop.php">NON STAFF</a></li>
        </ul>
      </li>
      <li>
        <a href="laporan.php">
          <i class='bx bx-line-chart'></i>
          <span class="link_name">LAPORAN CETAK</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="laporan.php">LAPORAN</a></li>
        </ul>
      </li>
      <!--<li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug'></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass'></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>-->
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-cog'></i>
            <span class="link_name">SETTINGS</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">SETTING</a></li>
          <li><a href="set_profil.php">AKUN</a></li>
          <!-- <li><a href="#">Stok</a></li>
          <li><a href="#">Operator</a></li> -->
        </ul>
      </li>
      <?php
      if ($_SESSION['levl'] == "sudo") {
      ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class='bx bx-coffee'></i>
              <span class="link_name">MASUK KE</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">MASUK KE</a></li>
            <li><a href="../home.php">LEASING</a></li>
            <li><a href="../stok_1/index.php">STOK</a></li>
            <li><a href="../sup.interface/index.php">OPERATOR</a></li>
          </ul>
        </li>
      <?php
      }
      $isi_user = mysqli_query($conn, "SELECT * FROM `dat_uss` WHERE `id` = $iduser") or die(mysqli_error($conn));
      $user = mysqli_fetch_assoc($isi_user);
      $nameuser = $user['nama'];
      if (empty($user['gamb'])) {
        $pict = 'icon_none.png';
      } else {
        $pict = $user['gamb'];
      }
      ?>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <a href="../ot.php" data-toggle="tooltip" title="log_out.?" data-placement="right">
              <img src="../gamb_user/<?= $pict; ?>" alt="profileImg">
            </a>
          </div>
          <div class="name-job">
            <div class="profile_name"><?= $nameuser; ?></div>
            <div class="job"><?= $user['levl']; ?></div>
          </div>
          <a href="../ot.php" data-toggle="tooltip" title="keluar.?" data-placement="top">
            <i class='bx bx-log-out'></i>
          </a>
        </div>
      </li>
    </ul>
  </div>
  <header class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">MENU</span>
    </div>
  </header>
  <main class="mains">