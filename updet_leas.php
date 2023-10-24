<?php
session_start();
if(empty($_SESSION['username']) && empty($_SESSION['pass'])){
		header("location:index.php?pesan=gagal");
	}
else if($_SESSION['type'] == "stok"){
		header("location:index.php?pesan=gagal");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update | Data Leasing</title>
	<?php
		date_default_timezone_set('Asia/Jakarta');
		include 'nav.php';
	?>
</head>
<body> 	
	<style type="text/css">
		.target{
			color: #035959;
		}
	</style>
	<div class="recent">
		<div class="row">	
			<div class="col-md-6">
				<div class="card bg-dark">
					<div class="form-row">
						<a class="btn btn-secondary btn-sm" href="updet_leas.php">Tampilkan Semua</a>
					</div><br/>
					<div class="form-row">
						<input class="form-control form-control-sm" id="myInput" type="text" placeholder="Cari..">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h5 class="text-right font-weight-normal"><?php echo tgln(date('Y-m-d')).'<br/>'. date('H:i');?></h5>
			</div>
		</div>
		<div class="card">
			<div class="row">
				<div class="col">
					<h3>Leasing Armada</h3>
					<div class="scroll responsive">
						<table class="table table-hover">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>No.Pol</th>
									<th>Merek</th>
									<th>Jenis</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody id="Aset">
								<?php
								include 'update_datleas.php';
							?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col">
					<h3>Leasing Tanah</h3>
					<div class="scroll table-responsive">
						<table class="table table-hover">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Lokasi</th>
									<th>Atas Nama</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody id="Pajak">
								<?php include 'leas_tanah.php';?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>		
</body>
<footer>
	<?php
		include 'footer.php';
	?>
</footer>
</html>