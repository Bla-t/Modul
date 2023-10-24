<?php
date_default_timezone_set('Asia/Jakarta');
include 'nav.php';
?>
<title>SupuS. . . ! !</title>
<style type="text/css">
	.stel {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>

<body>
	<div class="activity-card">
		<?php
		if (isset($_GET['gud'])) {

			if ($_GET['gud'] == "gud") {
				echo ('
    	          <div class="alert alert-success alert-dismissible fade show text-center">
    	              <button type="button" class="close" data-dismiss="alert">&times;</button>
    	              <strong>Update </strong>okeh.
    	          </div>');
			} else if ($_GET['gud'] == "yet") {

				echo ('
    	          <div class="alert alert-warning alert-dismissible fade show text-center">
    	              <button type="button" class="close" data-dismiss="alert">&times;</button>
    	              <strong>Terhapuzz</strong> loohh . . . !!
    	          </div>');
			}
		}
		if (isset($_GET['aye'])) {

			if ($_GET['aye'] == "aye") {
				echo ('
    	          <div class="alert alert-warning alert-dismissible fade show text-center">
    	              <button type="button" class="close" data-dismiss="alert">&times;</button>
    	              <strong>Gak jadi  </strong>sukses.
    	          </div>');
			} else if ($_GET['aye'] == "yet") {

				echo ('
    	          <div class="alert alert-warning alert-dismissible fade show text-center">
    	              <button type="button" class="close" data-dismiss="alert">&times;</button>
    	              <strong>Terhapuzz</strong> loohh . . . !!
    	          </div>');
			}
		}
		?>
		<div class="row">
			<div class="col-md-4">
				<div class="card bg-dark stel">
					<div class="form-group">
						<label for="#myInput">Cari</label>
						<input class="form-control form-control-sm" id="myInput" type="text">
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<h3 class="text-right">
					<p class="font-weight-normal"><?php echo tgl(date('Y-m-d')); ?></p>
					<p class="font-weight-normal jm"><?php echo date('H:i:s'); ?></p>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label class="font-weight-normal">
					<h2>Leasing Armada</h2>
				</label>
				<div class="table table-responsive table-sm scroll">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th>No.</th>
								<th>No.Pol</th>
								<th>Merek</th>
								<th>Jenis</th>
								<th>Keterangan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody id="Aset">
							<?php
							include 'sup_armada.php'
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-6">
				<label class="font-weight-normal">
					<h2>Leasing Tanah</h2>
				</label>
				<div class="table table-responsive table-sm scroll">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th>No.</th>
								<th>Lokasi</th>
								<th>Atas Nama</th>
								<th>Keterangan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody id="Pajak">
							<?php include 'sup_tanah.php' ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">

	</script>
	<footer>
		<?php
		include 'footer.php';
		?>
	</footer>

	</html>