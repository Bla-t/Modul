<?php
include "header.php";
$a = date('Y');
$m = date('m');
?>
<section class="recent">
	<div class="activity-card">
		<h4 style="margin-top: 1rem;"> Laporan Pembelian</h4>
		<div class="row">
			<div class="col">
				<div class="form-inline mb-3">
					<form method="POST" action="">
						<input type="text" class="form-control" id="input" placeholder="cari">
						<input type="hidden" name="levl" value="<?= $level; ?>">
						<input type="hidden" name="milik" value="<?= $milik; ?>">
						<select class="form-control" name="bulan" id="" required>
							<?php
							if (isset($_POST['bulan'])) {
								echo '<option value="' . date('m') . '" selected>' . tgln(date($_POST['bulan'])) . '</option>';
							} else {
								echo '<option value="' . date('m') . '" selected>' . tgln(date('m')) . '</option>';
							}
							?>
							<?php
							for ($bln = 1; $bln <= 12; $bln++) {
								echo '<option value="' . $bln . '">' . tgln(date('m', strtotime($a . '-' . $bln))) . '</option></br>';
							}
							?>
						</select>
						<select class="form-control" name="tahun" id="" required>
							<?php
							if (isset($_POST['tahun'])) {
								echo '<option selected value="' . $_POST['tahun'] . '">' . $_POST['tahun'] . '</option></br>';
							} else {
								echo '<option selected value="' . $a . '">' . $a . '</option></br>';
							}
							for ($i = 2018; $i <= $a; $i++) {
								echo '<option value="' . $i . '">' . $i . '</option></br>';
							}
							?>
						</select>
						<input class="btn btn-primary" type="submit" name="lacak" value="Cari">
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="table table-responsive">
				<table class="table table-xl">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Nota</th>
							<th>Tot.Transaksi</th>
							<th>Bayar</th>
							<th>Keterangan</th>
							<th>acc</th>
							<th>tgl.transaksi</th>
						</tr>
					</thead>
				</table>
			</div>
			<?php
    			if (!isset($_POST['lacak'])) {
    				if ($level == "sudo") {
    					$isi = mysqli_query($conn, " SELECT * FROM `stok_lapbeli` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
    				} else {
    					$isi = mysqli_query($conn, " SELECT * FROM `stok_lapbeli` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a' AND `milik`='$milik' AND `status` NOT LIKE 'BELUM' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
    				}
    			}
    			if (isset($_POST['lacak'])) {
    				$bul = $_POST['bulan'];
    				$thn = $_POST['tahun'];
    				if ($level == "sudo") {
    					$isi = mysqli_query($conn, " SELECT * FROM `stok_lapbeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
    				} else {
    					$isi = mysqli_query($conn, " SELECT * FROM `stok_lapbeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' AND `milik`='$milik' AND `status` NOT LIKE 'BELUM' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
    				}
    			}
			?>
			<div class="table table-responsive scroll">
				<table class="table table-xl table-hover">
						<!--<form method="POST" action="aksi/aksi_data-barang.php">-->
					<tbody id="table">
					 <?php
    					$n = 1;
    					while ($data = mysqli_fetch_array($isi)) {
							?>
							<tr>
									<td><?php echo $n++ . '.'; ?></td>
									<td><a class="text-info" href="info_pembelian.php?id=<?php echo $data['nota'] ?>"><?php echo $data['nota']; ?></a></td>
									<td><?php echo $data['jumlah']; ?> TRX</td>
									<td><?php echo rupiah($data['harga_total']); ?></td>
									<td><?php echo $data['keterangan']; ?></td>
									<td><?php echo $data['acc']; ?></td>
									<td><?php echo date('d M, Y', strtotime($data['tgl'])); ?></td>
								</tr>
							<?php } ?>
					</tbody>
						<!--</form>-->
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function PrintDiv() {
			var divToPrint = document.getElementById('tabp');
			window.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
			window.document.close();
			//direct after print !!//
			window.setTimeout(function() {
				location.href = "lap_beli.php";
			}, 2000);
		}
	</script>

</section>

<?php include "footer.php" ?>