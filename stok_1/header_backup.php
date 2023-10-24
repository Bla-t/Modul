<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "config.php";
session_start();
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
	<link rel="icon" type="image/gif" href="../gamb/gam.gif" />
	<meta name="description" content="PT BST">
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

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
			<ul><?php
					if ($milik == "ARM") {

						echo '<li>
					<a href="data_member.php" data-toggle="tooltip" title="Data Member">
						<span class="ti-truck"></span>
						<span>Plat Nomor</span>
					</a>
				</li>';
					} else {
					}
					?>
				<li>
					<a href="data_barang.php" data-toggle="tooltip" title="Data Barang">
						<span class="ti-package"></span>
						<span>Data Barang</span>
					</a>
				</li>
				<li>
					<a href="menu_pembelian.php" data-toggle="tooltip" title="Pembelian">
						<span class="ti-wallet"></span>
						<span>Pembelian</span>
					</a>
				</li>
				<li>
					<?php
					if ($milik == 'GA') {
						echo '
						<a href="distribusi.php" data-toggle="tooltip" title="Distribusi">
							<span class="ti-briefcase"></span>
							<span> Distribusi</span>
						</a>';
					} else if ($milik == 'ARM') {
						echo '
						 <a href="pem_armada.php">
							<span class="ti-agenda"></span>
							<span> Pemakaian</span>
						</a>';
					} else {
					}
					?>
				</li>
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
							if ($milik == "ARM") {
								echo "Lap. Pemakaian";
							} else {
								echo "lap. Distribusi";
							}
							?>
						</span>
					</a>
				</li>
				<li>
					<?php
					if ($milik == 'GA') {
						echo '
						<a href="dat_brg_serv.php">
							<span class="ti-settings"></span>
							<span>Servis</span>
						</a>';
					}
					?>
				</li>
				<?php
				if ($milik == 'GA') {
					echo '
					<li>
						<a href="caridat.php">
							<span class="ti-search"></span>
							<span>Cari</span>
						</a>
					</li>';
				}
				?>
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
					echo '<a href="../sup.interface/index.php"><h3>' . $level . '</h3></a>';
				} else {
					echo "<h3>" . $milik . "</h3>";
				}
				?>
			</div>
			<div class="social-icons">
				<span style="color:#6F6F6F ;"><?php echo $nameuser; ?></span>
				<!--
			<span class="ti-comment"></span>
			<span class="ti-user"></span>-->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown text-light" data-toggle="dropdown" href=""><img src="../gamb_user/<?= $gam; ?>" alt="<?php echo $icon_user; ?>"></a>
					<div class="dropdown-menu">
						<a class="dropdown-item font-weight-bold" href="prof.php"><span class="ti-user"></span> Profil</a>
						<?php
						if ($_SESSION['levl'] == "sudo") {
							echo '
								<a href="../sup.interface/index.php" class="dropdown-item"><span class="ti-link"></span>Operator</a>
								<a href="../home.php" class="dropdown-item"><span class="ti-link"></span>leasing</a>
								<a href="../gaji/index.php" class="dropdown-item"><span class="ti-link"></span>gaji</a>';
						} else {
						}
						?>
						<a class="dropdown-item font-weight-bold" href="../ot.php"><span class="ti-power-off"></span> Keluar</a>
					</div>
				</li>
			</div>
		</header>
		<!-----------isi------------>
		<main>