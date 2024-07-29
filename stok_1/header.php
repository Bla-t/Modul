<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "config.php";
session_start();
include "session.php";
function tanggal($tanggal)
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

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" type="image/gif" href="../gamb/gam.gif" />
	<meta name="description" content="PT BST">
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
	<!-- <link rel="stylesheet" href="sttyle.css"> -->
	<link rel="stylesheet" type="text/css" href="sttyle.css">
</head>
<div class="sidebar closed">
	<div class="logo-details">
		<i class='bx bx-layer'></i>
		<span class="logo_name"><?= $username; ?></span>
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
			<a href="data_barang.php">
				<i class='bx bxs-briefcase-alt-2'></i>
				<!-- <i class='bx bx-pie-chart-alt-2'></i> -->
				<span class="link_name">DATA BARANG</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="data_barang.php">DATA BARANG</a></li>
			</ul>
		</li>
		<li>
			<a href="menu_pembelian.php">
				<i class='bx bxs-cart'></i>
				<!-- <i class='bx bx-cart-download'></i> -->
				<span class="link_name">PEMBELIAN</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="menu_pembelian.php">PEMBELIAN</a></li>
			</ul>
		</li>
		<li>
			<a href="distribusi.php">
				<i class='bx bxs-truck'></i>
				<!-- <i class='bx bx-pie-chart-alt-2'></i> -->
				<span class="link_name">DISTRIBUSI</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="distribusi.php">DISTRIBUSI</a></li>
			</ul>
		</li>
		<li>
			<a href="lap_beli.php">
				<i class='bx bxs-user-badge'></i>
				<!-- <i class='bx bx-pie-chart-alt-2'></i> -->
				<span class="link_name">LAP.PEMBELIAN</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="lap_beli.php">LAP.PEMBELIAN</a></li>
			</ul>
		</li>
		<li>
			<a href="lap_pemakaian.php">
				<i class='bx bx-list-check'></i>
				<span class="link_name">LAP.DISTRIBUSI</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="lap_pemakaian.php">LAP.DISTRIBUSI</a></li>
			</ul>
		</li>
		<!--<li>
			<a href="dat_brg_serv.php">
				<i class='bx bxs-cog'></i>
				<span class="link_name">SERVIS</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="dat_brg_serv.php">SERVIS</a></li>
			</ul>
		</li>
		<li>
			<a href="caridat.php">
				<i class='bx bx-file-find'></i>
				<span class="link_name">CARI</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="caridat.php">CARI</a></li>
			</ul>
		</li>-->
		<li>
			<div class="iocn-link">
				<a href="#">
					<!-- <i class='bx bx-cog'></i> -->
					<i class='bx bxs-user-detail'></i>
					<span class="link_name">SETTING</span>
				</a>
				<i class='bx bxs-chevron-down arrow'></i>
			</div>
			<ul class="sub-menu">
				<li><a class="link_name" href="#">SETTING</a></li>
				<li><a href="prof.php">AKUN</a></li>
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
						<span class="link_name">LOGIN TO</span>
					</a>
					<i class='bx bxs-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link_name" href="#">MASUK KE</a></li>
					<li><a href="../home.php">LEASING</a></li>
					<li><a href="../stok_1/index.php">STOK</a></li>
					<li><a href="../gaji/index.php">GAJI</a></li>
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
		<span class="text">Menu</span>
		<span class="text-right date"><?= tanggal(date('Y-m-d')) . '  |  ' . date('H:i');  ?></span>
	</div>
</header>
<main class="mains">