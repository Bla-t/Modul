<?php
include "header.php";
?>
<section>
	<div class="activity-card">
		<h3> Nota Distribusi</h3>
		<div class="row mb-2">
			<form method="POST" action="aksi/aksi_data-barang.php">
				<?php
				$not = 'DIS-' . $milik . date('ymd');
				$query = "SELECT max(nota) AS 'last' FROM `stok_lappakai` WHERE `nota` LIKE '$not%'";
				$hasil = mysqli_query($conn, $query);
				$data  = mysqli_fetch_array($hasil);
				$lastNoTransaksi = strval($data['last']);

				// baca nomor urut transaksi dari id transaksi terakhir	
				$lastNoUrut = substr($lastNoTransaksi, 14, 4);

				// nomor urut ditambah 1
				$nextNoUrut = intval($lastNoUrut) + 1;

				// membuat format nomor transaksi berikutnya
				$next = sprintf('%04s', $nextNoUrut);

				//nota database
				$nextNoTransaksi = $not . sprintf('-' . '%04s', $nextNoUrut);
				?>
				<div class="col">
					<label for="kartu">No. Nota</label>
					<div class="form-inline">
						<input type="hidden" name="nota" value="<?php echo $nextNoTransaksi ?>">
						<input id="nota" class="form-control form-control-sm" type="number" name="" value="<?php echo $next; ?>" readonly>
						<button class="btn btn-success btn-sm ml-2" name="nota_pakai" id="simpan_pakai">simpan</button>
					</div>
				</div>
			</form>
		</div>
		<div class="row" style="border-top: 4px solid grey;">
			<h4> Daftar Nota</h4>
			<div class="table table-responsive table-xl">
				<table class="table table-hover">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>No. Nota</th>
							<th>Jumlah isi</th>
							<th>Tanggal</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$data = mysqli_query($conn, "SELECT * FROM `stok_lappakai` WHERE `nota` LIKE 'DIS-%' AND `status` NOT LIKE 'KOMPLIT' ORDER BY (nota) ASC ") or die(mysqli_error($conn));
						while ($isi_data = mysqli_fetch_array($data)) {
							$id_nota = $isi_data['nota'];

						?>
							<tr>
								<td><?php echo $no++; ?>.</td>
								<td>
									<a href="pemakaian_armada.php?nota=<?php echo $isi_data['nota'] ?>" class="text-info"><?php echo $isi_data['nota'] ?></a>
								</td>
								<?php
								if ($milik == "ARM") {
									echo '<td><input type="hidden" name="kode" class="no_pol" value="' . $isi_data['nopol'] . '"></td>';
								}
								$Jums = mysqli_query($conn, "SELECT SUM(jumlah) AS 'jum_tot' FROM `stok_isipakai` WHERE `nota` = '$id_nota'") or die(mysqli_error($conn));
								$tot_jums = mysqli_fetch_assoc($Jums);

								?>
								<td><?php if ($tot_jums['jum_tot']) {
											echo $tot_jums['jum_tot'];
										} else {
											echo 0;
										} ?> pcs</td>
								<td> <?php echo $isi_data['tgl'] ?></td>
								<td>
									<?php

									$que = mysqli_query($conn, "SELECT COUNT(nota) AS 'tot' FROM `stok_isipakai` WHERE `nota` = '$id_nota'") or die(mysqli_error($conn));
									$cek_ada = mysqli_fetch_assoc($que);



									if (empty($cek_ada['tot'])) {
										echo '<span class="ti-clipboard text-info font-weight-bold"><span class="font-weight-bold"> Kosong</span></span>';
									} else {
										echo '<span class="ti-receipt text-success font-weight-bold"><span class="font-weight-bold"> Ada isi</span></span>';
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