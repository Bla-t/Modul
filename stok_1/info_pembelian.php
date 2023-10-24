<?php
include "header.php";
?>
<section class="recent">
	<?php
	$nota = $_GET['id'];
	$num = 1;
	$query = mysqli_query($conn, "SELECT * FROM `stok_isibeli` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
	$sum = mysqli_query($conn, "SELECT SUM(total) AS 'ttl' FROM `stok_isibeli` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
	$total_harga = mysqli_fetch_assoc($sum);
	?>
	<input type="hidden" id="nota" value="<?php echo $nota; ?>">
	<div class="activity-card">
		<h3>Nota Pembelian : <?php echo $nota; ?> |</h3>
		<div class="form-inline">
			<a class="btn btn-warning btn-sm mb-2" href="lap_beli.php">Kembali</a>
			<button class="btn btn-info ml-1 mb-2" onclick="PrintDiv();"><span class="ti-printer" style="color: black;"></span></button>
			<form method="get" action="aksi/excel.php">
				<a href="aksi/excel.php?nota=<?= $nota ?>&&extr=beli" class="btn btn-success ml-1 mb-2">
					<span class="ti-import" style="color: black;">
					</span>
				</a>
			</form>
		</div>
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
							<td><?php echo rupiah($rinci['total']); ?></td>
						</tr>
					<?php } ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>Total :</td>
						<td> <?= rupiah($total_harga['ttl']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script type="text/javascript">
	function PrintDiv() {
		var divToPrint = document.getElementById('tabp');
		var nota = document.getElementById('nota').value;
		window.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
		window.document.close();
		//direct after print !!//
		window.setTimeout(function() {
			location.href = "info_pembelian.php?id=" + nota;
		}, 2000);
	}
</script>
<?php
include "footer.php";
?>