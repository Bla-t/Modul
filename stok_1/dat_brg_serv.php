<?php include "header.php"; ?>

	<div class="form-inline"><h3>Data Servis |</h3><a href="index.php" class="btn btn-info btn-sm">Kembali</a></div>
	<section>
		<div class="activity-card">
			<br>
				<div class="col">			
	                <div class="input-group mb-3">
	                	<div class="form-inline">
						    <input type="text" class="form-control form-control-sm" id="input" placeholder="cari"> 
						</div>&emsp;	
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#form_modal" id="tmbh"> Tambah Barang</button>
					</div>
				</div>				
				<form method="POST" action="">
				<div class="table-responsive" id="ish">
					<table>
						<thead>
							<tr>
								<th>No.</th>
								<th>SKU</th>
								<th>Nama Barang</th>
								<th>Kategori</th>
								<th>Jumlah</th>
								<th>tanggal Masuk</th>
								<th>Keterangan</th>
								<th>status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$nom = 1;
							//$isi = mysqli_query($conn,"SELECT * FROM `stok_dataservis` WHERE `keterangan` = 'servis'") or die(mysqli_error($conn));
							while($kep=mysqli_fetch_array($isi)){
							 ?>							
							<tr>
								<td>.<?php echo $nom++; ?></td>
								<td><?php echo $kep['id_barang']; ?></td>
								<td><?php echo $kep['nama_barang']; ?></td>
								<td><?php echo $kep['kategori']; ?></td>
								<td><?php echo $kep['jumlah']; ?></td>
								<td><?php echo $kep['tgl_masuk']; ?></td>
								<td><?php echo $kep['status']; ?></td>
								<!-- <td><button class="btn btn-warning btn-sm" value="<?php //echo $kep[id_barang] ?>">Selesai</button></td>							 -->
							</tr>
							<?php 
							}
							 ?>
						</tbody>
					</table>
				</div>	
			</form>	
		</div>
		<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">			
			<form action="save.php" method="POST">
				<div class="modal-content">
				    <div class="modal-header bg-light">
				    	<h3>Tambah Barang Servis</h3>
    			    </div>
					<div class="modal-body bg-light">
						<div class="form-row">
						   <div class="col">
						      <label for="1">SKU :</label>
							      <select class="form-control form-control-sm">
							      	<option></option>
							      </select>
						    </div>
						    <div class="col">
						      <label for="2">Nama Barang :</label>
						      <input type="text" class="form-control s1s" id="2" name="No.pol" required>
						    </div>
						</div>
					    <div class="form-row">
						    <div class="col">
						      <label for="3">Jumlah :</label>
						      <input type="number" class="form-control s1s" id="3" name="Rangka" required>
						    </div>
						</div>
						<div class="form-row">
						    <div class="col">
						      <label for="4">Keterangan :</label>
						      <textarea class="form-control s1s" id="4" name="Nomes" required></textarea>
						    </div>
						</div>
					</div>
    				<div class="modal-footer bg-light">
    					<button type="button" class="btn btn-warning" id="btl" data-dismiss="modal">Batal</button>
    					<button name="save" class="btn btn-danger ss" id="armada"> Save</button>
    				</div>
				</div>
			</form>
		</div>
	</div>
		<div class="summary">
			<div class="summary-card">
				<div class="card-body">
					<button class="btn btn-secondary btn-sm" onclick="PrintDiv();" id="print"><span class="ti-printer"> Print</span></button>&emsp;
					<button class="btn btn-secondary btn-sm" id="import"><span class="ti-import"> Import</span></button>
				</div>
			</div>
		</div>
		<script type="text/javascript">     
				    function PrintDiv() {    
					 var divToPrint = document.getElementById('ish');
					 window.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
					  window.document.close();
					    //direct after print !!//
					   window.setTimeout(function () {
					    location.href = "dat_brg_serv.php";
					    }, 2000);
					      }
			 </script>
	</section>

<?php include "footer.php"; ?>