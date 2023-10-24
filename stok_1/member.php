<?php 
	include "header.php" 
?>
	<h3>ISI NOMOR POLISI BARU</h3>
	<div class="recent">
		<div class="activity-card">
			<form method="POST" action="aksi/aksi_data-barang.php">
				<div class="col-md-12">
					<div class="form-row">
					   <div class="col">
					      <label for="id_barang">Nopol :</label>
					      <input type="text" class="form-control isi" id="id_barang" name="Nopol" required>
					    </div>
					    <div class="col">
					      <label for="a">No.mesin</label>
					      <input type="text" class="form-control isi" id="a" name="nomes" required>
					    </div>			    
					  </div>
					<div class="form-row">
						<div class="col">
							<label for="nama Barang">Merk :</label>
							<input type="text" id="nama Barang" class="form-control" name="merek" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<label for="Keterangan">jenis</label>
							<input type="text" id="Keterangan" class="form-control" name="ket2">
						</div>
					</div><br/>										
				</div>
		</div>
	</div>
	<div class="form-inline">
		<button type="submit" class="btn btn-secondary mb-2 mr-sm-2" name="simpanna">Simpan</button>
		<a type="button" class="btn btn-secondary mb-2 mr-sm-2" href="data_member.php">Batal</a>					
	</div>
			</form>
	<?php include "footer.php" ?>