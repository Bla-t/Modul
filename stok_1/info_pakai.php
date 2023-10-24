<?php
include "header.php";
?>
<section class="recent">
	<?php
	$nota_tempel = $_GET['id'];
	$nota = substr($nota_tempel, 0, 18);
	$npl = substr($nota_tempel, 18, 11);
	$print = substr($nota_tempel, 0, 3);
	$num = 1;
	$query = mysqli_query($conn, "SELECT * FROM `stok_isipakai` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
	$sum = mysqli_query($conn, "SELECT SUM(harga) AS 'ttl' FROM `stok_isipakai` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
	$total_harga = mysqli_fetch_assoc($sum);
	?>
	<input type="hidden" id="nota" value="<?= $nota_tempel; ?>">
	<input type="hidden" id="milk" value="<?= $print; ?>">
	<div class="activity-card">
		<h3>Nota
			<?php if ($milik == "ARM") {
				echo "Pemakaian";
			} else {
				echo "Distribusi";
			} ?> : <?php echo $nota; ?> |
		</h3>
		<div class="form-inline" style="border-bottom: 2px solid #bbbb;">
			<a class="btn btn-warning btn-sm mb-2" href="lap_pemakaian.php">Kembali</a>
			<button class="btn btn-info ml-2 mb-2" onclick="PrintDiv();"><span class="ti-printer" style="color: black;"></span></button>
			<form method="get" action="aksi/excel.php">
				<a href="aksi/excel.php?nota=<?= $nota  . '&&extr=' . $milik . '&&nopol=' . $npl; ?>" class="btn btn-success ml-1 mb-2">
					<span class="ti-import" style="color: black;">
					</span>
				</a>
			</form>
		</div>
		<?php
		$nop_pol = mysqli_query($conn, " SELECT * FROM `stok_member` WHERE `nopol` = '$npl'") or die(mysqli_error($conn));
		while ($nopol = mysqli_fetch_array($nop_pol)) {

		?>
			<div id="print">
				<div class="row" style="border-bottom: 1px solid #cccc;">
					<div class="col">
						<p><span class="font-weight-bold">No. Nota : </span><?php echo $nota; ?></p>
						<p><span class="font-weight-bold">No. Mesin : </span><?php echo $nopol['nomesin']; ?></p>
					</div>
					<div class="col">
						<p><span class="font-weight-bold">No.Polisi :</span> <?php echo $nopol['nopol']; ?></p>
						<p><span class="font-weight-bold">Jenis :</span> <?php echo $nopol['jenis']; ?></p>
					</div>
				</div>
			<?php } ?>
			<div class="table table-responsive table-xl" id="tabp">
				<table class="table table-hover">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>SKU</th>
							<th>Nama</th>
							<th>jumlah</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($rinci = mysqli_fetch_array($query)) { ?>
							<tr>
								<td><?php echo $num++; ?></td>
								<td><?php echo $rinci['kode_barang']; ?></td>
								<td><?php echo $rinci['nama']; ?></td>
								<td><?php echo $rinci['jumlah']; ?> Pcs</td>
								<td><?php echo rupiah($rinci['harga']); ?></td>
							</tr>
						<?php } ?>
						<tr>
							<?php
							for ($i = 0; $i <= 2; $i++) {
								echo '<td style="border:none;"' . $i . '></td>';
							}
							?>
							<td>Total : </td>
							<td><?= rupiah($total_harga['ttl']); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			</div>
	</div>
</section>

<script type="text/javascript">
	function PrintDiv() {
		var divToPrint = document.getElementById('print');
		var divduwa = document.getElementById('tabp');
		var nota = document.getElementById('nota').value;
		var milk = document.getElementById('milk').value;
		if (milk == "SRV") {
			window.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');

		} else {
			window.document.write('<html><body onload="window.print()">' + divduwa.innerHTML + '</html>');
		}
		window.document.close();
		//direct after print !!//
		window.setTimeout(function() {
			location.href = "info_pakai.php?id=" + nota;
		}, 2000);
	}
</script>
<?php
include "footer.php";
?>