<?php
include "header.php";
?>
<section>
	<div class="activity-card">
		<h3> Nota Pemakaian</h3>
		<form method="POST" action="aksi/aksi_data-barang.php">
			<div class="row">

				<?php
				$not = 'SRV-' . $milik . date('ymd');
				$query = "SELECT max(nota) AS last FROM `stok_lappakai` WHERE `nota` LIKE '$not%'";
				$hasil = mysqli_query($conn, $query);
				$data  = mysqli_fetch_array($hasil);
				$lastNoTransaksi = $data['last'];

				// baca nomor urut transaksi dari id transaksi terakhir	
				if ($milik == "ARM") {
					$lastNoUrut = substr($lastNoTransaksi, 14, 4);
				}

				// nomor urut ditambah 1
				$nextNoUrut = $lastNoUrut + 1;

				// membuat format nomor transaksi berikutnya
				$next = sprintf('%04s', $nextNoUrut);

				//nota database
				$nextNoTransaksi = $not . sprintf('-' . '%04s', $nextNoUrut);
				?>
				<div class="col-md-3">
					<label for="kartu">No. Nota</label>
					<input type="hidden" name="nota" value="<?php echo $nextNoTransaksi ?>">
					<input id="nota" class="form-control" type="number" name="" value="<?php echo $next; ?>" readonly>
				</div>
				<div class="col-md-3">
					<label for="plat_nomor">Plat</label>
					<select class="form-control form-control-sm" name="plat" id="plat" required>
						<?php
						if (isset($_POST['plat'])) {
							echo '<option disabled selected value="<?php $_POST[plat] ?>">' . $_POST['plat'] . '</option>';
						} else {
							echo '<option disabled selected value="" >Plat Nomor</option>';
						}

						$member = mysqli_query($conn, "SELECT * FROM `stok_member` ORDER BY `nopol` ASC") or die(mysqli_error($conn));
						while ($plat = mysqli_fetch_array($member)) {
						?>
							<option value="<?php echo $plat['nopol']; ?>"><?php echo $plat['nopol'] . ' | ' . $plat['jenis']; ?></option>
						<?php
							//nota database
							$nextNoTransaksi = $not . sprintf('/' . '%04s', $nextNoUrut);
						}
						?>
					</select>
				</div>
				<div class="col-md-3" style="top: 1.9rem;">
					<button class="btn btn-success btn-sm" name="nota_pakai" id="simpan_pakai">simpan</button>
				</div>
		</form>
	</div>
	<div class="row" style="border-top: 4px solid grey;">
		<h4> Daftar Nota</h4>
		<div class="table table-responsive table-sm table-hover">
			<?php

			?>
			<table>
				<thead class="thead-dark">
					<tr>
						<th>No.</th>
						<th>No. Nota</th>
						<th>No.polisi</th>
						<th>Jumlah Isi</th>
						<th>Tanggal</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$data = mysqli_query($conn, "SELECT * FROM `stok_lappakai` WHERE `nota` LIKE 'SRV-%' AND `status` NOT LIKE 'KOMPLIT' ORDER BY (nota) ASC ") or die(mysqli_error($conn));
					while ($isi_data = mysqli_fetch_array($data)) {
						$id_nota = $isi_data['nota'];

					?>
						<tr>
							<td><?php echo $no++; ?>.</td>
							<td>
								<a href="pemakaian_armada.php?nota=<?php echo $isi_data['nota'] ?>" class="text-success"><?php echo $isi_data['nota'] ?></a>
							</td>
							<td><?php echo $isi_data['nopol'] ?><input type="hidden" name="kode" class="no_pol" value="<?php echo $isi_data['nopol']; ?>"></td>

							<?php
							$isi_barang = mysqli_query($conn, "SELECT SUM(jumlah) AS 'totisi' FROM `stok_isipakai` WHERE `nota` = '$id_nota'") or die(mysqli_error($conn));
							$isi = mysqli_fetch_assoc($isi_barang);
							?>

							<td>
								<?php if ($isi['totisi']) {
									echo $isi['totisi'];
								} else {
									echo 0;
								} ?> Pcs
							</td>
							<td> <?php echo $isi_data['tgl'] ?></td>
							<td>
								<?php

								$que = mysqli_query($conn, "SELECT COUNT(nota) AS 'tot' FROM `stok_isipakai` WHERE `nota` = '$id_nota'") or die(mysqli_error($conn));
								$cek_ada = mysqli_fetch_assoc($que);



								if (empty($cek_ada['tot'])) {
									echo '<span class="ti-clipboard text-info"><span class="font-weight-bold"> Kosong</span></span>';
								} else {
									echo '<span class="ti-receipt text-success font-weight-bold"><span class="font-weight-bold"> Ada Isi</span></span>';
								}

								?>

							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		$("#plat").on("change", function() {
			var nop1 = $(this).val();
			var nop2 = $(".no_pol").val();
			if (nop1 == nop2) {
				alert("Plat Nomor sudah ada.!!");
				return false;
			} else {}
			return true;
		});
	});
</script>
<?php

include "footer.php";
?>