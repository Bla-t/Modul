<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
	header("location:index.php?pesan=gagal");
}
?>

<head>
	<title>Data Leasing</title>
	<?php
	include "nav.php";
	?>
	<style type="text/css">
		.scrolled {
			height: 400px !important;
			overflow: auto;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card bg-secondary">
					<div class="card-body">
						<form method="POST" action="">
							<div class="form-inline">
								<div class="col">
									<input type="text" name="carih" class="form-control form-control-sm ceky" required="required" placeholder="CARI RIWAYAT DATA">
								</div>
								<div class="col">
									<button type="submit" class="btn btn-danger btn-sm ceky" name="filt">Cari</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h3 class="text-right"><?php echo tgl(date('Y-m-d')); ?></h3>
			</div>
		</div>
		<!-- <h1 class="text-right">AWAL</h1> -->
		<div class="row ceki">
			<div class="col-md-12">
				<?php

				$cet = $_POST['carih'];
				$cuy = mysqli_query($conn, "SELECT * FROM `cek_dat` WHERE `nopol` = '$cet'") or die(mysqli_query($conn));
				$get = mysqli_fetch_array($cuy);
				if (!empty($get['nopol'])) {
				?>
					<label class="font-weight-normal">
						<h2>Daftar Riwayat "'<?php echo $get['nopol']; ?>'"</h2>
					</label>
				<?php
				} else if ($cet !== $get['nopol']) {
				?>
					<label class="font-weight-normal">
						<h2>Data "'<?php echo $_POST['carih']; ?>'" tidak ada</h2>
					</label>
				<?php
				} else if (empty($cet)) {
				?>
					<label class="font-weight-normal">
						<h2></h2>
					</label>

				<?php
				}
				?>
				<div class="scrolled table-responsive">
					<table class="table table-light table-hover">
						<thead class="thead-dark">
							<tr>
								<th>No.</th>
								<th>Tanggal</th>
								<th>Waktu</th>
								<th>Keterangan</th>
								<th>Petugas</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'cari_ish.php' ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function pin() {
			var pil = document.getElementById('9').value;
			if (pil == "LUNAS") {

				$('#tun').css('display', 'block');
				$('.ase').css('display', 'none');
			} else if (pil == "LEASING") {
				$('#tun').css('display', 'none');
				$('.ase').css('display', 'block');

			}
			/*else if(pil=="pilih") {
			   $('#tun').css('display','none');
			   $('.ase').css('display','none');
			}*/
		}

		$(document).ready(function() {
			$("input[type=text]").keyup(function() {
				$(this).val($(this).val().toUpperCase());
			});
			$("#btl").on("click", function(event) {
				$(".form-control").val("");
			});
		});

		$(document).ready(function() {
			$("#tamp").click(function() {
				$(".ceki").show();
				$("#myInput").hide();
				$(".caek").hide();
			});
			$("#angs").click(function() {
				$(".pjk").hide();
				$(".tabel").show();
			});

		});
	</script>
	<?php

	?>
</body>
<footer>
	<?php
	include 'footer.php'; ?>
</footer>

</html>