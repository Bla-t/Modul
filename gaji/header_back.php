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

//update estimasi
$date = date('Y-m');
$up_date = mysqli_query($conn, "SELECT COUNT(nama) AS 'ttl' FROM `daftar_pegawai` WHERE `est_naikgaji` LIKE '$date%' AND `status` NOT 'tidak'");
$update = mysqli_fetch_assoc($up_date);

//est naik
if ($update['ttl'] > 0) {

  $gaji = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='3'");
  $nilgaji = mysqli_fetch_assoc($gaji);

  $naik = date_create(date('Y-m-d'));
  date_add($naik, date_interval_create_from_date_string($nilgaji['estimasi'] . 'year'));
  $est_next = date_format($naik, 'Y-m-d');

  //update
  mysqli_query($conn, "UPDATE `daftar_pegawai` SET `ms_krj` = `ms_krj` + 1, `est_naikgaji`='$est_next' WHERE `est_naikgaji` LIKE '$date%' AND `status` NOT LIKE 'tidak'");
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
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="icon" type="image/gif" href="../gamb/gam.gif" />
  <meta name="description" content="PT BST">
  <title>Modul</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="sstyle.css">
</head>
<style>
  #batas {
    border-right: 2px red;
  }
</style>

<body>
  <input type="checkbox" id="sidebar-toggle">
  <div class="sidebar">
    <div class="sidebar-header" data-toggle="tooltip" title="Home">
      <label for="sidebar-toggle" class="ti-menu-alt"></label>
      <h3 class="brand">
        <a href="index.php">
          <span class=""> Dasbor</span>
        </a>
      </h3>
    </div>
    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="daftar.php" data-toggle="tooltip" title="Tambah Pegawai">
            <span class="ti-user"></span>
            <span>daftar Pegawai</span>
          </a>
        </li>
        <li>
          <a href="tambah.php" data-toggle="tooltip" title="Rubah Data">
            <span class="ti-agenda"></span>
            <span>tambah Pegawai</span>
          </a>
        </li>
        <li>
          <a href="gol-tunjangan.php" data-toggle="tooltip" title="Daftar Pegawai">
            <span class="ti-clipboard"></span>
            <span>Gol - tunj</span>
          </a>
        </li>
        <li>
          <a href="laporan.php" data-toggle="tooltip" title="Data Member">
            <span class="ti-harddrives"></span>
            <span>Cetak</span>
          </a>
        </li>
        <?php
        // if ($milik == 'GA'){ echo'
        // <a href="distribusi.php" data-toggle="tooltip" title="Distribusi">
        // 	<span class="ti-briefcase"></span>
        // 	<span> Distribusi</span>
        // </a>';}
        //  else if($milik == 'ARM'){ echo '

        //  <a href="pem_armada.php">
        // 	<span class="ti-agenda"></span>
        // 	<span> Pemakaian</span>
        // </a>';}
        ?>
        <!--</li>
				<li>
					<a href="lap_beli.php" data-toggle="tooltip" title="Lap. Pembelian">
						<span class="ti-clipboard"></span>
						<span>Lap. Pembelian</span>
					</a>
				</li>
				<li>
					<a href="lap_pemakaian.php" data-toggle="tooltip" title="Lap.">
						<span class="ti-check-box"></span>
						<span>
							<?php
              //  if ($milik == "ARM") {
              // 	echo "Lap. Pemakaian";
              // 	}
              // else{
              // 	echo"lap. Distribusi";	
              // 	}
              ?>							
						</span>
					</a>
				</li>
				<li>
					<a href="dat_brg_serv.php">
						<span class="ti-settings"></span>
						<span>Servis</span>
					</a>
        </li>-->
      </ul>
    </div>
  </div>
  <div class="main-content">
    <header>
      <?php
      $isi_user = mysqli_query($conn, "SELECT * FROM `dat_uss` WHERE `id` = $iduser") or die(mysqli_error($conn));
      $user = mysqli_fetch_assoc($isi_user);
      $nameuser = $user['nama'];
      ?>
      <div class="search-wrapper">
        <?php
        $nameuser = $user['nama'];
        if ($_SESSION['levl'] == "sudo") {
          echo '<a href="../sup.interface/index.php"><h3>' . $level . '</h3></a>';
        } else {
          echo "<h3>" . $milik . "</h3>";
        }
        ?>
      </div>
      <div class="social-icons">
        <span style="color:#6F6F6F ;"><?php echo $nameuser; ?></span>
        <!--
			<span class="ti-bell"></span>
			<span class="ti-comment"></span>
			<span class="ti-user"></span>-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown text-light" data-toggle="dropdown" href="#"><img src="../gamb_user/<?php echo $user['gamb']; ?>" alt="<?php echo $icon_user; ?>"></a>
          <div class="dropdown-menu">
            <a class="dropdown-item font-weight-bold" href="set_profil.php"><span class="ti-user"></span> Profil</a>
            <?php
            if ($_SESSION['levl'] == "sudo") {
              echo '
								<a href="../sup.interface/index.php" class="dropdown-item"><span class="ti-link"></span>Operator</a>
								<a href="../home.php" class="dropdown-item"><span class="ti-link"></span>leasing</a>
								<a href="../stok_1/index.php" class="dropdown-item"><span class="ti-link"></span>stok</a>';
            } else {
            }
            ?>
            <a class="dropdown-item font-weight-bold" href="../ot.php"><span class="ti-power-off"></span> Keluar</a>
            <a class="dropdown-item font-weight-bold text-secondary" href="../sup.interface/pgs.php"><span class="ti-na"></span></a>
          </div>
        </li>
      </div>
    </header>
    <!-----------isi------------>
    <main>