<?php
include 'header.php';
?>
<section class="recent">
	<div class="activity-card">
		<h4 style="border-bottom: 2px solid grey; ">Form Pembelian</h4>
		<form method="POST" action="" name="satu" id="cari_data">
			<div class="row">
				<div class="col-md-8">
					<div class="form-row">
						<?php
						$not = 'NP-' . $milik . date('ymd');
						$query = "SELECT max(nota) AS last FROM `stok_lapbeli` WHERE `nota` LIKE '$not%' AND `status` NOT LIKE 'BELUM'";
						$hasil = mysqli_query($conn, $query);
						$data  = mysqli_fetch_array($hasil);
						$lastNoTransaksi = strval($data['last']);

						// baca nomor urut transaksi dari id transaksi terakhir

						if ($milik == "GA") {
							$lastNoUrut = substr($lastNoTransaksi, 13, 4);
						} else if ($milik == "ARM") {
							$lastNoUrut = substr($lastNoTransaksi, 14, 4);
						}

						// nomor urut ditambah 1
						$nextNoUrut = intval($lastNoUrut) + 1;

						// membuat format nomor transaksi berikutnya
						$next = sprintf('%04s', $nextNoUrut);
						//nota database
						$nextNoTransaksi = $not . sprintf('-' . '%04s', $nextNoUrut);
						?>
						<div class="col">
							<label for="nota">No nota:</label>
							<input type="hidden" name="nota" value="<?php echo $nextNoTransaksi ?>">
							<input id="nota" class="form-control" type="number" name="" value="<?php echo $next; ?>" readonly>
						</div>
						<div class="col">
							<label for="tgl"> Tgl. nota</label>
							<input id="tgl" class="form-control" type="text" name="tglnota" value="<?php echo date('Y-d-m'); ?>" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="car">Barcode/SKU :</label>
							<div class="form-inline mb-3">
								<select class="form-control selectpicker border mr-1" data-live-search="true" id="car" name="SKU" required>
									<?php if (isset($_POST['SKU'])) {
										echo '<option selected>' . $_POST['SKU'] . '</option>';
									} else {
										echo '<option selected disabled value="">Nama  Barang</option>';
									} ?>
									<?php
									$ktegori = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `milik`='$milik' ORDER BY (nama_barang) ASC") or die(mysqli_error($conn));
									while ($isis = mysqli_fetch_array($ktegori)) {
									?>
										<option class="isi_sku" value="<?php echo $isis['id_barang'] ?>"><?php echo $isis['id_barang'] . ' | ' . $isis['nama_barang']; ?></option>
									<?php } ?>
								</select>
								<button class="btn btn-warning" id="cekisi" name="cari">cari</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-light">
						<?php
						$harga_nota = mysqli_query($conn, "SELECT SUM(total) AS 'totalnota' FROM `stok_isibeli` WHERE `nota` = '$nextNoTransaksi'") or die(mysqli_error($conn));
						$tot_nota = mysqli_fetch_assoc($harga_nota);
						?>
						<h3 class="text-center " style="font-size: 1.6rem;"><?=(empty($tot_nota['totalnota'])) ? rupiah(0) : rupiah($tot_nota['totalnota']); ?></h3>
						<input type="hidden" name="total_nota" value="<?php echo $tot_nota['totalnota']; ?>">
					</div>
				</div>
			</div>
		</form>
		<?php include "filter_pembelian.php"; ?>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#cont, #rego").keyup(function() {
					var harga = $("#rego").val();
					var jumlah = $("#cont").val();

					var total = parseInt(harga) * parseInt(jumlah);
					$("#total").val(total);
				});


			});
		</script>


		<?php
		include 'footer.php';
		?>