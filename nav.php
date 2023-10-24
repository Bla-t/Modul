<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "config.php";
date_default_timezone_set('Asia/Jakarta');
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
	session_destroy();
	header("location:index.php?pesan=kick");
} else if ($_SESSION['type'] != "leasing" && $_SESSION['type'] != "supus") {
	session_destroy();
	header("location:index.php?pesan=cit");
}
/////tanggal/////
function tgln($tanggal)
{
	$bulan = array(
		1 =>
		'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ', ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

///////rupiah/////
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
	$gam = 'icon_none.png';
} else {
	$gam = $_SESSION['gamb'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" type="image/gif" href="../gamb/gam.gif" />
	<meta name="description" content="PT BST">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- <script>
		$(document).ready(function() {
			setTimeout(function() {
				location.reload();
			}, 300000);
		});
	</script> -->
</head>

<body>
	<input type="checkbox" id="sidebar-toggle">
	<div class="sidebar">
		<div class="sidebar-header" data-toggle="tooltip" title="Home">
			<label for="sidebar-toggle" class="ti-menu-alt"></label>
			<h3 class="brand">
				<a href="home.php">
					<span class="">Dasbor</span>
				</a>
			</h3>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="updet_leas.php">
						<span class="ti-package"></span>
						<span>Update Data</span>
					</a>
				</li>
				<li>
					<a href="rekap.php">
						<span class="ti-wallet"></span>
						<span>Rekap</span>
					</a>
				</li>
				<li>
					<a href="carih.php">
						<span class="ti-search"></span>
						<span> Traking</span>
					</a>
				</li>
				<?php
				if ($level == "sudo") {
					echo '				 
				<li>
					<a href="#">
						<span class="ti-user"></span>
						<span>Users</span>
					</a>
				</li>';
				}
				?>
				<!--<li><?php
								/*if ($milik == 'GA'){echo
						'<a href="">
						<span class="ti-import"></span>
						<span>Lap. Distribusi</span>
					</a>';} 
					else if($milik == 'ARM'){ echo
						'<a href="lap_pemakaian.php">
						<span class="ti-import"></span>
						<span>Lap. Pemakaian</span>
					</a>';} */ ?>
				</li>
				<li>
					<a href="">
						<span class="ti-printer"></span>
						<span>text</span>
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
			?>
			<div class="search-wrapper">
				<?php
				$nameuser = $user['nama'];
				if ($_SESSION['levl'] == "sudo") {
					echo '<a href="sup.interface/index.php"><h3>' . $level . '</h3></a>';
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
					<a class="nav-link dropdown text-light" data-toggle="dropdown" href=""><img class="gambars" src="gamb_user/<?= $gam; ?>" alt="kosong"></a>
					<div class="dropdown-menu">
						<a class="dropdown-item font-weight-bold" href="profil_a.php"><span class="ti-user"></span> Profil</a>
						<?php
						if ($_SESSION['levl'] == "sudo") {
							echo '
								<a href="sup.interface/index.php" class="dropdown-item"><span class="ti-link"></span>Operator</a>
								<a href="stok_1/index.php" class="dropdown-item"><span class="ti-link"></span>Stok</a>
								<a href="gaji/index.php" class="dropdown-item"><span class="ti-link"></span>Gaji</a>';
						} else {
						}
						?>
						<a class="dropdown-item font-weight-bold" href="ot.php"><span class="ti-power-off"></span> Keluar</a>
					</div>
				</li>
			</div>
		</header>
		<!-----------isi------------>
		<main>