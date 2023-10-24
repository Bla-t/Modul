	<?php
	include 'config.php';
	if (isset($_POST['SKU'])) {
		$nota = $_POST['nota'];
		$sku = $_POST['SKU'];
		$barang = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `id_barang`='$sku' ");
		while ($cek = mysqli_fetch_array($barang)) { ?>
			<form method="POST" action="aksi/updet_stok.php">
				<input type="hidden" name="nomor_nota" value="<?php echo $id_nota; ?>">
				<div class="row" style="border-top: 2px solid #E67E22;">
					<div class="form-row">
						<div class="col">
							<label for="brng">Nama Barang</label>
							<input type="text" name="nama_pakai" id="brg" class="form-control form-control-sm" value="<?php echo $cek['nama_barang']; ?>" readonly>
							<input type="hidden" name="kategori" value="<?php echo $cek['kategori']; ?>">
						</div>
						<div class="col">
							<label for="stokc">Sisa Stok</label>
							<input type="hidden" name="id_pakai" id="id_barang" value="<?php echo $cek['id_barang']; ?>">
							<input type="number" value="<?php echo $cek['stok']; ?>" name="stok_pakai" id="stokc" class="form-control form-control-sm" readonly>
						</div>
						<div class="col">
							<label for="rego"> Harga</label>
							<input type="number" value="<?php echo $cek['harga_beli']; ?>" name="harga_pakai" id="rego" class="form-control form-control-sm" readonly>
						</div>
						<div class="col">
							<label for="cont"> Jumlah</label>
							<input type="number" name="jumlah_pakai" id="cont" class="form-control form-control-sm">
						</div>
					</div>
				</div>
					<div class="row mt-2">
        				<button class="btn btn-success btn-sm" name="pemakaian" id="simpan_1"><span class="ti-clip"></span> Tambahkan</button>
					</div>
		<?php }
	}
		?>
			</form>
			<?php if (!isset($_POST['SKU'])) { ?>
				<div class="row" style="border-top: 2px solid #E67E22;">
					<div class="form-row">
						<div class="col">
							<label for="brng">Nama Barang</label>
							<input type="text" name="" id="brg" class="form-control form-control-sm" placeholder="nama" readonly>
						</div>
						<div class="col">
							<label for="stokc">Sisa Stok</label>
							<input type="number" placeholder="0" name="" id="stokcs" class="form-control form-control-sm" readonly>
						</div>
						<div class="col">
							<label for="rego"> Harga</label>
							<input class="form-control form-control-sm"></input>
						</div>
						<div class="col">
							<label for="cont"> Jumlah</label>
							<input type="number" placeholder="0" name="harga" id="count" class="form-control form-control-sm">
						</div>
					</div>
				<?php } ?>
				</div>
				</section>
				<section class="recent">
					<div class="activity-card" style="border-top: 2px solid red;">
						<h4>Daftar Pemakaian</h4>
						<form method="POST" action="aksi/updet_stok.php">
							<div class="table table-responsive">
								<table class="table table-hover">
									<thead class="thead-light">
										<tr>
											<th>No.</th>
											<th>Nama Barang</th>
											<th>Jumlah</th>
											<th>Harga Total</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$num = 1;
										$isilaporan = mysqli_query($conn, "SELECT * FROM `stok_isipakai` WHERE `nota` = '$id_nota'");
										while ($silap = mysqli_fetch_array($isilaporan)) {
											$barang = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `nama_barang`='$silap[nama]'");
											$stok = mysqli_fetch_assoc($barang);
											//id stok
											//var_dump($stok['id']);
											$juml1 = $silap['jumlah'];
											$juml0 = $stok['stok'];
											//id pengeluaran
											//var_dump($silap['id']);
								// 			echo $juml1 . ' >> ' . $juml0 . ' &&';
										?>
											<tr>
												<td><input type="hidden" name="nomnota" value="<?= $silap['nota']; ?>"><?php echo $num++; ?>.</td>
												<td><input type="hidden" class="sku_barang" value="<?= $silap['kode_barang']; ?>"><?php echo $silap['nama']; ?></td>
												<td><?php echo $silap['jumlah']; ?> Pcs</td>
												<input type="hidden" name="juml" value="<?= $silap['id'] ?>">
												<td><input type="hidden" name="idibarang" value="<?= $stok['id']; ?>"><?php echo rupiah($silap['harga']); ?></td>
												<td><a href="aksi/updet_stok.php?<?= 'idb=' . $stok['id'] . '&jml1=' . $juml1 . '&jml2=' . $juml0 . '&nota=' . $silap['nota'] . '&ipak=' . $silap['id']; ?>" class="btn btn-danger btn-sm" name="hapusisi" value="<?= $silap['id'] ?>"><span class="ti ti-trash" style="color: black;"></span></a>
												</td>
											</tr>
										<?php }
										?>
									</tbody>
									<?php
									$totalisi = mysqli_query($conn, "SELECT SUM(Jumlah) AS 'total_jumlah' FROM `stok_isipakai` WHERE `nota`='$id_nota'");
									$jum = mysqli_fetch_assoc($totalisi);
									$harga_nota = mysqli_query($conn, "SELECT SUM(harga) AS 'totalnota' FROM `stok_isipakai` WHERE `nota` = '$id_nota'");
									$tot_nota = mysqli_fetch_assoc($harga_nota);
									?>
								</table>
								<input type="hidden" name="total_harga" value="<?php echo $tot_nota['totalnota']; ?>">
								<input type="hidden" name="jumlahisi" id="cekjum" value="<?php echo $jum['total_jumlah']; ?>">
							</div>

							<div class="row" style="border-top: 2px solid #3498DB;">
								<input type="hidden" name="nextnota" value="<?php echo $id_nota; ?>">
								<label for="keterangan">Keterangan :</label>
								<textarea class="form-control" id="keterangan" name="keterangan_nota"></textarea>
							</div>
							<div class="row">
								<button class="btn btn-primary btn-sm mt-2" id="simpann" name="pemakaian_simpan" value="<?php echo $id_nota; ?>">Simpan</button>
								<!-- <div class="col">
										<button class="btn btn-danger btn-sm" id="batal" name="batal_nota">batal</button>
									</div> -->
							</div>
						</form>
					</div>
				</section>
				<script>
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
						$("#cont").keyup(function() {
							var stk = $("#stokc").val();
							if (parseInt($(this).val()) > stk) {
								$("#simpan_1").prop('disabled', true);
								alert("Data Barang kurang.!!");
								return false;


							} else {
								$("#simpan_1").prop('disabled', false);
							}
							return true;
						});
						$(function() {
							if ($("#stokc").val() == 0) {
								$("#simpan_1, #cont").prop('disabled', true);
								alert("Stok ( " + $("#brg").val() + " ) sudah Habis.!!");
								return false;

							} else {
								$("#simpan_1, #cont").prop('disabled', false);
							}
							return true;

						});
					});
					$(function() {
						$("#simpann").click(function() {
							var isi = $("#cekjum").val();
							if (isi == "") {
								alert("tidak ada transaksi.!");
								return false;
							} else if (confirm("Anda Yakin.?")) {

							} else {
								return false;
							}
							return true;
						});
						$("#batal").click(function() {
							var isi = $("#cekjum").val();
							if (isi > 0) {
								alert("Anda Yakin.?");
								return false;
							} else if ($(this) = 0) {
								location.href = "pemakaian_armada.php";
							}
							return true;
						});
						$("#simpan_1").click(function() {
							var isi = $("#cont").val();
							if (isi == "0") {
								alert("Jumlah Barang tidak boleh '0' ");
								return false;
							}
							return true;
						});
					});
				</script>