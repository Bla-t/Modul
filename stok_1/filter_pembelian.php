	<?php
	include "config.php";

	if (isset($_POST['SKU'])) {
		$nota = $_POST['nota'];
		$sku = $_POST['SKU'];
		$barang = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `id_barang`='$sku'") or die(mysqli_error($conn));
		while ($cek = mysqli_fetch_array($barang)) {
	?>
			<form method="POST" action="aksi/updet_stok.php">
				<input type="hidden" name="nota1" value="<?php echo $nota; ?>">
				<div class="row" style="border-top: 2px solid #E67E22;">
					<div class="col">
						<div class="form-row">
							<div class="col-section">
								<label for="brng">Nama Barang</label>
								<input type="text" name="nama" id="brg" class="form-control form-control-sm " value="<?php echo $cek['nama_barang']; ?>" readonly>
								<input type="hidden" name="merk" value="<?php echo $cek['merk']; ?>">
								<input type="hidden" name="kategori" value="<?php echo $cek['kategori']; ?>">
							</div>
							<div class="col-section">
								<label for="stokc">Sisa Stok</label>
								<input type="hidden" name="id" id="id_barang" value="<?php echo $cek['id_barang']; ?>">
								<input type="number" value="<?php echo $cek['stok']; ?>" name="stok" id="stokc" class="form-control form-control-sm" readonly>
							</div>
							<div class="col-section">
								<label for="rego"> Harga</label>
								<input type="number" value="<?php echo $cek['harga_beli']; ?>" name="harga" id="rego" class="form-control form-control-sm" readonly>
							</div>
							<div class="col-section">
								<label for="cont"> Jumlah Beli</label>
								<input type="number" value="" name="jumblah" id="cont" class="form-control form-control-sm">
							</div>
							<div class="col-section">
								<label for="total"> Total Harga</label>
								<input type="number" value="0" name="harga_total" id="total" class="form-control form-control-sm" readonly>
							</div>
						</div>
						<button class="btn btn-warning btn-sm mt-3" name="stoksmpn" id="simpan_1"><span class="ti-shopping-cart" style="color: black;"></span> Tambahkan</button>
					</div>
				</div>
		<?php
		}
	}
		?>
			</form>
			<?php
			if (!isset($_POST['SKU'])) {
			?>
				<div class="row" style="border-top: 2px solid #E67E22;">
					<div class="form-row">
						<div class="col-section">
							<label for="brng">Nama Barang</label>
							<input type="text" name="" id="brg" class="form-control form-control-sm" placeholder="nama" readonly>
						</div>
						<div class=" col-section">
							<label for="stokc">Sisa Stok</label>
							<input type="number" placeholder="0" name="" id="stokc" class="form-control form-control-sm" readonly>
						</div>
						<div class=" col-section">
							<label for="rego"> Harga</label>
							<input type="number" placeholder="0" name="" id="rego" class="form-control form-control-sm" readonly>
						</div>
						<div class=" col-section">
							<label for="cont"> Jumlah Beli</label>
							<input type="number" placeholder="0" name="harga" id="cont" class="form-control form-control-sm">
						</div>
						<div class=" col-section">
							<label for="total"> Total Harga</label>
							<input type="number" placeholder="0" name="" id="total" class="form-control form-control-sm" readonly>
						</div>
					</div>
				<?php
			}
				?>
				</div>
				</section>
				<section class="recent">
					<div class="activity-card" style="border-top: 2px solid red;">
						<h4>Daftar Pembelian</h4>
						<form method="POST" action="aksi/updet_stok.php">
							<div class=" table table-responsive table-xl">
								<table class="table table-hover">
									<thead class="thead-light">
										<tr>
											<th>No.</th>
											<th>Kode Barang</th>
											<th>Nama Barang</th>
											<th>Harga Satuan</th>
											<th>Jumlah Beli</th>
											<th>Total Bayar</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody id="table">
										<?php
										/*$id_nota= mysqli_query($conn, " SELECT * FROM  `stok_isibeli` ")or die(mysqli_error($conn));
									$id= mysqli_fetch_assoc($id_nota);*/
										$id_nota = $nextNoTransaksi;
										$num = 1;
										$isilaporan = mysqli_query($conn, "SELECT * FROM `stok_isibeli` WHERE `nota` = '$id_nota'") or die(mysqli_error($conn));
										while ($silap = mysqli_fetch_array($isilaporan)) {
										?>
											<tr>
												<td><?php echo $num++; ?></td>
												<td><?php echo $silap['kode_barang']; ?><input type="hidden" name="kode" class="sku_barang" value="<?php echo $silap['kode_barang']; ?>"></td>
												<td><?php echo $silap['nama']; ?></td>

												<?php
												$sku = $silap['kode_barang'];
												$barang = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `id_barang`='$sku' ") or die(mysqli_error($conn));
												$stok = mysqli_fetch_assoc($barang);
												?>

												<input type="hidden" name="stok_kurang" value="<?php echo $stok['stok']; ?>">
												<td><?php echo rupiah($silap['harga']); ?></td>
												<td><?php echo $silap['jumlah']; ?><input type="hidden" name="jumlah" value="<?php echo $silap['jumlah']; ?>"> Pcs</td>
												<td><?php echo rupiah($silap['total']); ?></td>
												<td><button class="btn btn-danger btn-sm" name="hapus_isi" value="<?php echo $silap['id']; ?>"><span class="ti-trash" style="color: black;"></span></button></td>
											</tr> <?php } ?>
									</tbody>
									<?php
									$totalisi = mysqli_query($conn, "SELECT COUNT(Jumlah) AS 'total_jumlah' FROM `stok_isibeli` WHERE `nota`='$id_nota'") or die(mysqli_error($conn));
									$jum = mysqli_fetch_assoc($totalisi);

									$harga_nota = mysqli_query($conn, "SELECT SUM(total) AS 'totalnota' FROM `stok_isibeli` WHERE `nota` = '$nextNoTransaksi'") or die(mysqli_error($conn));
									$tot_nota = mysqli_fetch_assoc($harga_nota);
									?>
								</table>
								<input type="hidden" name="total_nota" value="<?php echo $tot_nota['totalnota']; ?>">
								<input type="hidden" name="jumlahisi" id="cekjum" value="<?php echo $jum['total_jumlah']; ?>">
							</div>
							<div class="row" style="border-top: 2px solid #3498DB;">
								<input type="hidden" name="nextnota" value="<?php echo $id_nota; ?>">
								<label for="keterangan">Keterangan :</label>
								<textarea class="form-control" id="keterangan" name="keterangan_nota"></textarea>
							</div>
							<div class="row">
								<button class="btn btn-primary btn-sm mt-2" id="simpann" name="simpan_nota">Simpan</button>
							</div>
						</form>
					</div>
				</section>
				<script>
					/*$(document).ready(function(){
							$("#car").on("change",function () {
								var sku1 = $(this).val();
						        var sku2 = $(".sku_barang").val();
						        if (sku1 == sku2) {
						            alert("Data Barang sudah ada.!!");
						            return false;
						        }
						        else{
						        	this.form.submit();
						        }
						        return true;
						    });
						});*/
					$(document).ready(function() {
						$("#car").on("change", function() {
							var sku1 = $(this).val();
							var sku2 = $(".sku_barang").each(function() {
								if ($(this).val() == sku1) {
									$("#cekisi").prop('disabled', true);
									alert("Data Barang sudah ada.!!");
									return false;
								} else {
									$("#cekisi").prop('disabled', false);
								}
								return true;

							});
						});
					});

					$(function() {
						$("#simpann").click(function() {
							var isi = $("#cekjum").val();
							if (isi == "0") {
								alert("tidak ada transaksi.!");
								return false;
							} else if (confirm("Anda Yakin.?")) {

							} else {
								return false;
							}
							return true;
						});
						$("#simpan_1").click(function() {
							var isi = $("#cont").val();
							if (isi == "0") {
								alert("Jumlah Barang tidak boleh ' 0 / kosong '..! ");
								return false;
							}
							return true;
						});
					});
				</script>