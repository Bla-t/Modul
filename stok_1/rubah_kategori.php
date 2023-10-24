<?php
include "header.php";
?>
<h3>RUBAH DATA BARANG</h3>
<div class="recent">
	<div class="activity-card">
		<form method="POST" action="aksi/aksi_data-barang.php">
			<?php
			$id = $_GET['id'];
			$rubah = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `id`='$id'") or die(mysqli_error($conn));
			while ($isi = mysqli_fetch_array($rubah)) {
			?>
				<div class="col-md-12">
					<div class="form-row">
						<div class="col">
							<label for="id_barang">SKU :</label>
							<input type="hidden" name="id" value="<?php echo $isi['id'] ?>">
							<input type="text" class="form-control isi" id="id_barang" name="barcod" value="<?php echo $isi['id_barang'] ?>" required readonly>
						</div>
						<div class="col">
							<label for="a">Nama :</label>
							<input type="text" class="form-control isi" id="a" name="nama" value="<?php echo $isi['nama_barang'] ?>" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<label for="nama Barang">Merk :</label>
							<input type="text" id="nama Barang" class="form-control" name="merk" value="<?php echo $isi['merk'] ?>" required>
						</div>
						<div class="col">
							<label for="harga_jual">Harga Beli :</label>
							<input type="number" id="harga_jual" class="form-control" name="harga_beli" value="<?php echo $isi['harga_beli'] ?>" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<label for="Kategori">Kategori :</label>
							<select id="Kategori" class="form-control" name="kategori" required>
								<option style="color:#D2D2D2;" selected><?php echo $isi['kategori']; ?></option>
								<?php

								$ops = mysqli_query($conn, "SELECT * FROM `stok_kategor` WHERE `milik` = '$milik' ORDER BY(nama) ASC") or die(mysqli_error($conn));
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
							<textarea id="Keterangan" class="form-control" name="ket"><?php echo $isi['keterangan'] ?></textarea>
						</div>
					</div><br />
				</div>
			<?php } ?>
	</div>
</div>
<div class="form-inline mt-3">
	<button type="submit" class="btn btn-primary mb-2 mr-sm-2" name="rubah_data">Simpan</button>
	<a type="button" class="btn btn-primary mb-2 mr-sm-2" href="data_barang.php">Batal</a>
</div>
</form>