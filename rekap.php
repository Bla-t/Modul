<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
	header("location:index.php?pesan=gagal");
} else if ($_SESSION['type'] == "stok") {
	header("location:index.php?pesan=gagal");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Rekap | Data Leasing</title>
	<?php
	date_default_timezone_set('Asia/Jakarta');
	include 'nav.php';
	?>
	<style type="text/css">
		.card-body {
			background-color: #3D6487;
		}

		#pjk,
		#tear {
			display: none;
		}
	</style>
</head>

<body>
	<div class="recent">
		<!-- div class="row" >
			<div class="col">
			<h4><kbd id="jm" class="text-right font-weight-normal"><?php //echo date('H:i:s');
																															?></kbd></h4>
			</div>
			<h1 class="text-right">AWAL</h1> 
		</div><br/> -->
		<div class="row">
			<div class="col-md-6">
				<div class="card bg-secondary">
					<!-- <a class="btn btn-info" href="index.php">Tampilkan Semua</a> -->
					<div class="form-inline">
						<button class="btn btn-warning btn-sm" id="as">Aset Lunas</button>&emsp;
						<button class="btn btn-danger btn-sm" id="paj">Aset Leasing </button>&emsp;
						<button class="btn btn-info btn-sm" id="terj">aset Terjual</button>&emsp;
					</div>
					<br />
					<input class="form-control form-control-sm" id="myInput" type="text" placeholder="Cari.." value="">
				</div>
			</div>
			<div class="col-md-6">
				<h5 class="text-right font-weight-normal"><?php echo date('H:i'); ?></h5>
			</div>
		</div>
		<form method="POST" action="donlod_leasing.php">
			<div class="card">
				<div class="row-md-4" id="aset">
					<div class="form-inline">
						<h3>LUNAS</h3>&emsp;
						<input type="submit" class="btn btn-success btn-sm" id="lns" name="lunas" value="Download (.xls)">
					</div>
					<div class="scrolls table-responsive">
						<table class="table table-hover">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>No.Polisi/Lokasi</th>
									<th>Atas Nama</th>
									<th>Posisi</th>
									<th>Thn.Peng</th>
									<th>No.Rangka</th>
									<th>No.mesin</th>
									<th>Thn.Pemb</th>
									<th>Merek</th>
									<th>Tipe</th>
									<th>Jenis</th>
									<th>No.Uji Kir</th>
									<th>Nama Lesg</th>
									<th>No.Kontrak</th>
									<th>Harga Beli</th>
									<th>DP</th>
									<th>Tenor</th>
									<th>Sisa Agsrn</th>
									<th>Angsuran</th>
									<th>Nilai. Aset</th>
									<th>Hutang Aset</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="Aset">
								<?php include 'aset_lunas.php'; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row-md-4" id="pajak" style="display: none;">
					<div class="form-inline">
						<h3>LEASING</h3>&emsp;
						<input type="submit" class="btn btn-success btn-sm" id="pjk" name="leasing" value="Download (.xls)">
					</div>
					<div class="scrolls table-responsive">
						<table class="table table-hover ">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>No.Polisi/Lokasi</th>
									<th>Atas Nama</th>
									<th>Posisi</th>
									<th>Thn.Peng</th>
									<th>No.Rangka</th>
									<th>No.mesin</th>
									<th>Thn.Pemb</th>
									<th>Merek</th>
									<th>Tipe</th>
									<th>Jenis</th>
									<th>No.Uji Kir</th>
									<th>Nama Lesg</th>
									<th>No.Kontrak</th>
									<th>Harga Beli</th>
									<th>DP</th>
									<th>Tenor</th>
									<th>Sisa Agsrn</th>
									<th>Angsuran</th>
									<th>Nilai Aset</th>
									<th>Hutang Aset</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="Kir">
								<?php include 'aset_leasi.php' ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row-md-4" id="terjal" style="display: none;">
					<div class="form-inline">
						<h3>Terjual</h3>&emsp;
						<input type="submit" class="btn btn-success btn-sm" id="tear" name="terjoeal" value="Download (.xls)">
					</div>
					<div class="scrolls table-responsive">
						<table class="table table-hover ">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>No.Polisi/Lokasi</th>
									<th>Atas Nama</th>
									<th>Posisi</th>
									<th>Thn.Peng</th>
									<th>No.Rangka</th>
									<th>No.mesin</th>
									<th>Thn.Pemb</th>
									<th>Merek</th>
									<th>Tipe</th>
									<th>Jenis</th>
									<th>No.Uji Kir</th>
									<th>Nama Lesg</th>
									<th>No.Kontrak</th>
									<th>Harga Beli</th>
									<th>DP</th>
									<th>Tenor</th>
									<th>Sisa Agsrn</th>
									<th>Angsuran</th>
									<th>Nilai Aset</th>
									<th>Hutang Aset</th>
									<th>Harga Terjual</th>
									<th>Tanggal Jual</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="Kir">
								<?php include 'aset_leasi_terjual.php' ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#as").click(function() {
				$("#pajak").hide();
				$("#aset").show();
				$("#lns").show();
				$("#pjk").hide();
				$("#terjal").hide();
				$("#tear").hide();

			});
			$("#paj").click(function() {
				$("#aset").hide();
				$("#pajak").show();
				$("#pjk").show();
				$("#lns").hide();
				$("#terjal").hide();
				$("#tear").hide();


			});
			$("#terj").click(function() {
				$("#aset").hide();
				$("#pajak").hide();
				$("#pjk").hide();
				$("#lns").hide();
				$("#terjal").show();
				$("#tear").show();


			});
			// $("#").click(function(){
			// 	$("#").show();
			// 	$("#").show();

			// });
		});
	</script>
	<?php
	// 	function rupiah($angka){

	// $hasil_rupiah = "Rp." . number_format($angka,0,',','.');
	// return $hasil_rupiah; 
	//}
	?>
</body>
<footer>
	<?php
	include 'footer.php';
	?>
</footer>

</html>