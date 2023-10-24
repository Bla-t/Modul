<?php
include "header.php";
?>
<section class="recent">
	<div class="activity-card">
		<?php

		$TOT = mysqli_query($conn, "SELECT COUNT(id_barang) AS 'tot' FROM `stok_databarang` WHERE `milik` = '$milik'");
		$has = mysqli_fetch_assoc($TOT);
		?>
		<div class="form-inline	d-flex">
			<h4> DATA BARANG "<?php echo $has['tot']; ?>" ITEM</h4>
			<a class="btn btn-info btn-sm ml-3 mb-2" href="tambah-jenisbarang.php"><span class="ti-pencil"></span> TAMBAH BARANG</a>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="input" placeholder="cari">
					<div class="input-group-append">
						<span class="input-group-text ti-search"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="table table-responsive">
			    <table class="table table-xl">
    				<thead class="thead-light">
    					<tr>
    						<th>No.</th>
    						<th>SKU</th>
    						<th>Nama</th>
    						<th>Harga</th>
    						<th>Kategori</th>
    						<th>Merk</th>
    						<th>Keterangan</th>
    						<th>acc</th>
    						<?php
    						if ($milik == "OPS") {
    							echo '<th>milik</th>';
    						}
    						?>
    						<th>Aksi</th>
    					</tr>
    				</thead>
				</table>
			</div>
			<div class="table table-responsive scroll">
				<table class="table table-xl table-hover">
					<?php
					$n = 1;
					if ($milik == "OPS") {
						$isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` ORDER BY `milik` ASC") or die(mysqli_error($conn));
					} else {
						$isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` WHERE `milik`='$milik'") or die(mysqli_error($conn));
					}

					?>
						<form method="POST" action="aksi/aksi_data-barang.php">
							<tbody id="table">
							    <?php
                					while ($data = mysqli_fetch_array($isi)) {
								?>
								<tr>
									<td><?php echo $n++ . '.'; ?></td>
									<td><?php echo $data['id_barang']; ?></td>
									<td><?php echo $data['nama_barang']; ?></td>
									<td><?php echo rupiah($data['harga_beli']); ?></td>
									<td><?php echo $data['kategori']; ?></td>
									<td><?php echo $data['merk']; ?></td>
									<td><?php echo $data['keterangan']; ?></td>
									<td><?php echo $data['acc']; ?></td>
									<?php if ($milik == "OPS") {
										echo '<td>' . $data['milik'] . '</td>';
									} ?>
									<td class="d-flex">
										<a class="btn btn-warning btn-sm ml-1" name="rubsh" href="rubah_kategori.php?id=<?php echo $data['id'] ?>" id="rubah"><span class="ti-pencil-alt" style="color: black;"></span></a>
										<button type="submit" class="btn btn-danger btn-sm ml-1" name="haps" id="hapus" value="<?php echo $data['id'] ?>"><span class="ti-trash" style="color: black;"></span></button>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</form>
				</table>
			</div>
		</div>
	</div>
	<!--<div class="summary">-->
	<!--	<div class="summary-card">-->
	<!--		<a class="btn btn-secondary btn-sm mt-2" href="tambah-jenisbarang.php" style="color: black;"><span class="ti-pencil" style="color: black;"></span> TAMBAH BARANG</a>-->
	<!--	</div>-->
	<!--</div>-->
</section>

<script type="text/javascript">
	$(document).ready(function() {
		$("#hapus").click(function() {
			if (confirm("Anda Yakin..!?")) {

			} else {
				return false;
			}
		});
	});
</script>


<!-- <form method="POST" action="">
		<div class="col-md-12">
			<div class="form-row">
			   <div class="col">
			      <label for="id_barang">id barang</label>
			      <input type="text" class="form-control isi" id="id_barang" name="" required>
			    </div>
			    <div class="col">
			      <label for="a"> Jenis</label>
			      <input type="text" class="form-control isi" id="a" name="" required>
			    </div>			    
			  </div>
			<div class="form-row">
				<div class="col">
					<label for="nama Barang">Nama Barang</label>
					<input id="nama Barang" class="form-control" name="" required>
				</div>
				<div class="col">
					<label for="harga_jual">Harga Jual</label>
					<input id="harga_jual" class="form-control" name="" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<label for="harga_beli">Harga Beli</label>
					<input id="harga_beli" class="form-control" name="" required>
				</div>
				<div class="col">
					<label for="Kategori">Kategori</label>
					<input id="Kategori" class="form-control"name="" required>
				</div>				
				<div class="col">
					<label for="tombol1"></label>
					<button id="tombol1" class="btn btn-info" style="margin-top: 2rem;"> Tambah Kategori</button>
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<label for="Keterangan">Keterangan</label>
					<textarea id="Keterangan" class="form-control"></textarea>
				</div>
			</div>
			<br/>
			<div class="form-inline">
				<button type="submit" class="btn btn-primary mb-2 mr-sm-2">Simpan</button>
				<a type="button" class="btn btn-success mb-2 mr-sm-2" href="index.php">Batal</a>					
			</div>					
		</div>
	</form> -->


<?php include "footer.php" ?>