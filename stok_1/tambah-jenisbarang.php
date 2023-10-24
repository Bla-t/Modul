<?php
include "header.php";

if (isset($_GET['gag'])) {
	echo '<div class="alert alert-danger alert-dismissible fade show text-center">
		              <button type="button" class="close" data-dismiss="alert">&times;</button>
		              <strong>Data barang </strong> sudah ada.!!
		          </div>';
}
?>

<div class="recent">
	<div class="activity-card">
<h3>ISI DATA BARANG BARU</h3>
		<form method="POST" action="aksi/aksi_data-barang.php">
			<div class="col-md-12" style="padding-top: 1rem;">
				<div class="form-row">
					<div class="col">
						<label for="id_barang">SKU :</label>
						<input type="text" class="form-control isi" id="id_barang" name="barcod" required>
					</div>
					<div class="col">
						<label for="a">Nama :</label>
						<input type="text" class="form-control isi" id="a" name="nama" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<label for="nama Barang">Merk :</label>
						<input type="text" id="nama Barang" class="form-control" name="merk" required>
					</div>
					<div class="col">
						<label for="harga_jual">Harga :</label>
						<input type="number" id="harga_beli" class="form-control" name="harga_beli" value="0" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<label for="Kategori">Kategori :</label>
						<select id="Kategori" class="form-control" name="kategori" required>
							<option style="color:#D2D2D2;" selected disabled></option>
							<?php
							$bag = $_SESSION['bagian'];
							$ops = mysqli_query($conn, "SELECT * FROM `stok_kategor` WHERE `milik` = '$bag' ORDER BY(nama) ASC") or die(mysqli_error($conn));
							while ($isi = mysqli_fetch_array($ops)) {
							?>
								<option> <?php echo $isi['nama']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col">
						<a style="margin-top: 2rem;" id="Kategori" class="btn btn-primary" href="kategori_id.php"> Tambah Kategori</a>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<label for="Keterangan">Keterangan :</label>
						<textarea id="Keterangan" class="form-control" name="ket" ></textarea>
					</div>
				</div><br />
			</div>
	</div>
</div>
<div class="form-inline">
	<button type="submit" class="btn btn-secondary mt-2 mr-2" name="simpan">Simpan</button>
	<a type="button" class="btn btn-secondary mt-2 sm-2" href="data_barang.php">Batal</a>
</div>
</form>
<?php include "footer.php" ?>