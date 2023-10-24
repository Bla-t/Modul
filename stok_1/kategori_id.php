<?php 
include "header.php";
?>
<h3> TAMBAH KATEGORI</h3>
<div class="recent">
	<div class="activity-card"><br/>
		<form method="POST" action="aksi/aksi_data-barang.php">
			<div class="row">
			<div class="col-md-6">
				<label for="kata"> Kategori</label>
				<input id="kata" type="text" name="kateg" class="form-control" placeholder="isi kategori" ><br/>
				<button class="btn btn-success" name="simpkat">Simpan</button>
				<a class="btn btn-warning" href="tambah-jenisbarang.php"> Kembali</a>
			</div>
			<div class="col-md-6">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kategori</th>
							<th>pilihan</th>
						</tr>						
					</thead>					
					<tbody>
						<?php 						
						$nom=1;
						$kat=mysqli_query($conn,"SELECT * FROM `stok_kategor` WHERE `milik` ='$milik' ORDER BY (nama) ASC") or die(mysqli_error($conn));
						while ($gori = mysqli_fetch_array($kat)) {
					 ?>
						<tr>
						    <!--<input type="hidden" name="id" value="<?php echo $gori['id']; ?>">-->
							<td><?php echo $nom++; ?></td>
							<td><?php echo $gori['nama']; ?></td>
							<td><a href="aksi/aksi_data-barang.php?hapus=<?= $gori['id'];?>" class="btn btn-danger btn-sm" name="hapus">Hapus</a></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>				
			</div>
		</div><br/>
		</form>
	</div>
</div>



<?php
include "footer.php";

?>