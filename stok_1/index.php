<?php
include "header.php";
$bu = date('m');
$ta = date('Y');
$tgltext = tanggal(date('m', strtotime($ta . '-' . $bu)));
if ($level == "sudo") {
	$jumlah = mysqli_query($conn, "SELECT SUM(stok) AS 'jum' FROM `stok_databarang`") or die(mysqli_error($conn));
} else {
	$jumlah = mysqli_query($conn, "SELECT SUM(stok) AS 'jum' FROM `stok_databarang` WHERE `milik` = '$milik' AND `stok` != '0'") or die(mysqli_error($conn));
}
//$jumlah_servis= mysqli_query($conn,"SELECT SUM(stok) AS 'jum_servis' FROM `` WHERE `milik` = '$milik'") or die(mysqli_error($conn));
$tot_databarang = mysqli_fetch_assoc($jumlah);
?>
<div class="dash-cards">
	<div class="card-single">
		<a href="stok_sampingan.php" style="text-decoration: none;">
			<div class="card-body">
				<?php
				if (empty($tot_databarang['jum'])) {
					$jum = "0";
				} else {
					$jum = $tot_databarang['jum'];
				}
				?>

				<i class='bx bx-box dash-icon'></i>
				<div class="card-text">
					<h3>stok</h3>
					<h4><?= $jum . ', Pcs'; ?></h4>
				</div>
			</div>
			<div class="card-footer text-dark font-weight-bold">
				<span class="ti-angle-double-right "></span>Lihat
			</div>
		</a>
	</div>
	<div class="card-single">
		<a href="rekap_dist.php" style="text-decoration: none;">
			<div class="card-body">
				<i class='bx bxs-truck dash-icon'></i>
				<!-- <span class="ti-truck"></span> -->
				<div>
					<?php
					if ($level == "sudo") {
						$total_keluar = mysqli_query($conn, "SELECT SUM(`harga`) AS 'total_pakai' FROM `stok_isipakai` WHERE MONTH(tgl) = '$bu' AND YEAR(tgl) = '$ta'") or die(mysqli_error($conn));
					} else {
						$total_keluar = mysqli_query($conn, "SELECT SUM(`harga`) AS 'total_pakai' FROM `stok_isipakai` WHERE MONTH(tgl) = '$bu' AND YEAR(tgl) = '$ta' AND `milik` = '$milik'") or die(mysqli_error($conn));
					}
					$total_distribusi = mysqli_fetch_assoc($total_keluar);
					?>
					<h3><?php
							if ($milik == "ARM") {
								echo 'Pemakaian';
							} else {
								echo 'Distribusi';
							}
							?></h3>
					<h4><?= (empty($total_distribusi['total_pakai'])) ? rupiah(0) : rupiah($total_distribusi['total_pakai']) ;?></h4>
				</div>
			</div>
			<div class="card-footer text-dark font-weight-bold">
				<span class="ti-angle-double-right"></span>
				Lihat
			</div>
		</a>
	</div>
	<div class="card-single">
		<a href="rekap_beli.php" style="text-decoration: none;">
			<div class="card-body">
				<!-- <span class="ti-clipboard"></span> -->
				<i class='bx bx-cart dash-icon'></i>
				<div>
					<?php
					if ($level == "sudo") {
						$jumlah_pembelian = mysqli_query($conn, "SELECT SUM(`total`) AS 'total_beli' FROM `stok_isibeli` WHERE MONTH(tgl) = '$bu' AND YEAR(tgl) = '$ta'") or die(mysqli_error($conn));
					} else {
						$jumlah_pembelian = mysqli_query($conn, "SELECT SUM(`total`) AS 'total_beli' FROM `stok_isibeli` WHERE MONTH(tgl) = '$bu' AND YEAR(tgl) = '$ta' AND `milik` = '$milik'") or die(mysqli_error($conn));
					}
					$ketbeli = mysqli_fetch_assoc($jumlah_pembelian);
					?>
					<h3>Pembelian</h3>
					<h4><?= (empty($ketbeli['total_beli'])) ? rupiah(0) : rupiah($ketbeli['total_beli']); ?></h4>
				</div>
			</div>
			<div class="card-footer text-dark font-weight-bold">
				<span class="ti-angle-double-right"></span>Lihat
			</div>
		</a>
	</div>
	<!-- <div class="card-single bg-success">
		<?php
		if ($milik == "GA") {
			echo '<a href="pesan.php" style="text-decoration:none;">';
		} else {
			echo '<a href="pesan.php" style="text-decoration:none;">';
		}/*
		$tot_pesan = mysqli_query($conn, " SELECT COUNT(pesan_id) AS 'topes' FROM `pessans` WHERE `tanggap` = 'BELUM' AND `pesan_tu` ='$bse' ") or die(mysqli_error($conn));
		$cex = mysqli_fetch_assoc($tot_pesan);*/
		?>
		<div class="card-body">
			<span class="ti-email"></span>
			<div>
				<h3>Pesan</h3>
				<h4><?= $cex['topes'] ?> Pesan</h4>
			</div>
		</div>
		<div class="card-footer text-dark font-weight-bold">
			<span class="ti-angle-double-right"></span>Lihat
		</div>
		</a>
	</div> -->
</div>

<?php
if ($level == "sudo") {
	$TOT = mysqli_query($conn, "SELECT COUNT(id_barang) AS 'tot' FROM `stok_databarang` ORDER BY `milik` ASC");
} else {
	$TOT = mysqli_query($conn, "SELECT COUNT(id_barang) AS 'tot' FROM `stok_databarang` WHERE `milik` = '$milik'");
}
$has = mysqli_fetch_assoc($TOT);
?>
<section class="recent">
	<div class="activity-card">
		<h3>DAFTAR STOK "<?= $has['tot']; ?>" ITEM</h3>
		<div class="col-md-5">
			<div class="input-group mb-3">
				<input type="text" class="form-control" id="input" placeholder="cari item">
				<div class="input-group-append">
					<span class="input-group-text ti-search"></span>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="thead-light">
					<tr>
						<th>No.</th>
						<th>SKU</th>
						<th>Nama</th>
						<th>merk</th>
						<th>Kategori</th>
						<th>harga</th>
						<th>Jumlah Stok</th>
						<?php
						if ($level == "sudo") {
							echo '<th>milik</th>';
							# code...
						}
						// if($milik == 'GA'){ echo('<th>Jumlah Perbaikan</th>');}else if($milik == 'ARM'){}
						?>

					</tr>
				</thead>
			</table>
		</div>
		<div class="table-responsive scroll" id="tabp">
			<table class="table table-hover">
				<tbody id="table">
					<?php
					$n = 1;
					if ($level == "sudo") {
						$isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` ORDER BY `milik` ASC") or die(mysqli_error($conn));
					} else {
						$isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` WHERE `milik`='$milik' ORDER BY `kategori` ASC") or die(mysqli_error($conn));
					}
					while ($data = mysqli_fetch_array($isi)) {

					?>
						<tr>
							<td><?= $n++ . '.'; ?></td>
							<td><?= $data['id_barang']; ?></td>
							<td><?= $data['nama_barang']; ?></td>
							<td><?= $data['merk'] ?></td>
							<td><?= $data['kategori']; ?></td>
							<td><?= rupiah($data['harga_beli']); ?></td>
							<td><?= $data['stok']; ?> pcs</td>
							<?php
							if ($level == "sudo") {
								echo '<td>' . $data['milik'] . '</td>';
							}
							// if($milik == 'GA'){ echo('<td>'.$data['status'].' Pcs</td>');}else if($milik == 'ARM'){}
							?>

						</tr>
					<?php
					}
					/*$tes = mysqli_query($conn, "SELECT `nama_barang` SUM(harga_beli*stok) AS totes FROM `stok_databarang`") or die(mysqli_error($conn));
					$cek = mysqli_fetch_assoc($tes);*/
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="summary">
		<div class="summary-card">
			<div class="card-body">
				<button class="btn btn-info print" onclick="PrintDiv();" id="print"><i class='bx bxs-printer'> Print</i></button>
				<!-- <a href="aksi/excel.php?extr=DBR&tgl=<?= tanggal(date('d,m, Y')); ?>&tipe =<?= $milik; ?>" class="btn btn-secondary" id="import"><span class="ti-import"></span> Import</a> -->
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function PrintDiv() {
			var divToPrint = document.getElementById('tabp');
			window.document.write('<html><body onload="window.print()" style="font-family:Poppins, sans-serif">' + divToPrint.innerHTML + '</html>');
			window.document.close();
			window.location.href = "location: index.php";
			//direct after print !!//
			window.setTimeout(function() {
				location.href = "index.php";
			}, 1000);
		}
	</script>
</section>
<?php include "footer.php" ?>