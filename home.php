<?php
include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Home | Data Leasing</title>
	<style type="text/css">
		.asie,
		.ceky,
		.ceki,
		.tanah,
		#tanah {
			display: none;
		}
	</style>
</head>

<body>
	<div class="recent">
		<?php
		if (isset($_GET['yes'])) {

			echo ('
	          <div class="alert alert-success alert-dismissible fade show text-center">
	              <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <strong>Data Baru</strong> Berhasil di Tambahkan.
	          </div>');
		} else if (isset($_GET['aye'])) {

			echo ('
          <div class="alert alert-info alert-dismissible fade show text-center">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Pembayaran Angsuran</strong> Berhasil.
          </div>');
		} else if (isset($_GET['eye'])) {

			echo ('
          <div class="alert alert-warning alert-dismissible fade show text-center">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Pajak/ Kir</strong> Telah di Rubah.
          </div>');
		} else if (isset($_GET['uye'])) {

			echo ('
          <div class="alert alert-primary alert-dismissible fade show text-center">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Keterangan</strong> Telah di Rubah.
          </div>');
		}
		if (isset($_GET['ow'])) {

			echo ('
	          <div class="alert alert-success alert-dismissible fade show text-center">
	              <button type="button" class="close" data-dismiss="alert">&times;</button>
	              <strong>Profil</strong> Berhasil di Perbarui.
	          </div>');
		} else {
		}
		?>
		<div class="row">
			<div class="card bg-secondary">
				<div class="col">
					<div class="form-inline">
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#form_modal" id="tmbh"> Tambah Pengadaan</button>&emsp;
						<a class="btn btn-secondary btn-sm" href="home.php">Tampilkan Semua</a>
					</div><br />
					<input class="form-control form-control-sm" id="myInput" type="text" placeholder="Cari.." value="">
				</div>
			</div>
			<div class="col">
				<h4 class="text-right font-weight-normal"><?php echo tgln(date('Y-m-d')); ?></h4>
			</div>
		</div>
		<!-- <h1 class="text-right">AWAL</h1> -->
	</div>
	<div class="card">
		<div class="row caek">
			<div class="col-md-5">
				<label class="font-weight-normal">
					<h2>Leasing</h2>
				</label>
				<div class="scroll table-responsive">
					<table class="table table-hover">
						<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>No.Polisi/ Lokasi Tanah</th>
								<th>Angsuran</th>
								<th>Sisa Angsuran</th>
								<th>Jatuh Tempo</th>
							</tr>
						</thead>
						<tbody id="Aset">
							<?php include 'filter.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-4">
				<label class="font-weight-normal">
					<h2>Pajak</h2>
				</label>
				<div class="scroll table-responsive">
					<table class="table table-hover">
						<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>No.Pol</th>
								<th>Pajak/Thn & STNK</th>
							</tr>
						</thead>
						<tbody id="Pajak">
							<?php include 'filter_pajak.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-3">
				<label class="font-weight-normal">
					<h2>Kir</h2>
				</label>
				<div class="scroll table-responsive">
					<table class="table table-hover">
						<thead class="thead-light">
							<tr>
								<th>No.</th>
								<th>No.Pol</th>
								<th>Kir</th>
							</tr>
						</thead>
						<tbody id="Kir">
							<?php include 'filter_kir.php'; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<form action="save.php" method="POST">
				<div class="modal-content">
					<div class="modal-header bg-light">
						<div class="form-inline">
							<input type="button" class="btn btn-dark mb-2 mr-sm-2" id="arm" name="tip1" value="ARMADA">
							<input type="button" class="btn btn-dark mb-2 mr-sm-2" id="tan" name="tip2" value="TANAH">
						</div>
					</div>
					<div class="modal-body bg-light armada">
						<div class="row">
							<div class="col-md-6">
								<div class="form-row">
									<div class="col">
										<label for="1">Tahun Pengadaan</label>
										<input type="date" class="form-control s1s" id="1" name="thn_pngadn" required>
									</div>
									<div class="col">
										<label for="2">No.Pol / Alamat</label>
										<input type="text" class="form-control s1s" id="2" name="No.pol" required>
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="3">No.Rangka</label>
										<input type="text" class="form-control s1s" id="3" name="Rangka" required>
									</div>
									<div class="col">
										<label for="4">No.Mesin</label>
										<input type="text" class="form-control s1s" id="4" name="Nomes" required>
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="5">Thn.Pembuatan</label>
										<input type="text" class="form-control s1s" id="5" name="thn.pem" required>
									</div>
									<div class="col">
										<label for="6">Merek</label>
										<input type="text" class="form-control s1s" id="6" name="merek" required>
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="7">Tipe</label>
										<input type="text" class="form-control s1s" id="7" name="tipe" required>
									</div>
									<div class="col">
										<label for="8">Jenis</label>
										<input type="text" class="form-control s1s" id="8" name="jenis" required>
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="1s">Atas nama</label>
										<input type="text" class="form-control s1s" id="1s" name="ats_nma" required>
									</div>
									<div class="col">
										<label for="2s">Lokasi</label>
										<input type="text" class="form-control s1s" id="2s" name="Posisi" required>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-row">
									<div class="col">
										<label for="9">Pembayaran </label>
										<select class="form-control s1s" name="Pembayaran" id="9" onchange="pin();" required>
											<option value="" selected disabled>Pilih</option>
											<option value="LUNAS">Tunai</option>
											<option value="LEASING">Leasing</option>
										</select>
									</div>
									<div class="col" id="tun" style="display: none;">
										<label for="10">Harga Tunai </label>
										<input type="number" class="form-control" id="10" name="harga_tunai">
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="97" class="ase">Nama Leasing </label>
										<input type="text" class="form-control ase" id="97" name="leasing">
									</div>
									<div class="col">
										<label for="81" class="ase">No.kontrak </label>
										<input type="text" class="form-control ase" id="81" name="no_kontrak">
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="71" class="ase">Harga Beli </label>
										<input type="number" class="form-control ase" id="71" name="harga_beli">
									</div>
									<div class="col">
										<label for="82" class="ase">DP </label>
										<input type="number" class="form-control ase" id="82" name="dp">
									</div>
									<div class="col">
										<label for="73" class="ase">Tenor </label>
										<input type="text" class="form-control ase" id="73" name="tenor">
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="83" class="ase">Angsuran </label>
										<input type="number" class="form-control ase" id="83" name="angsuran">
									</div>
									<div class="col">
										<label for="58" class="ase">Jth.Tempo Pertama</label>
										<input type="date" class="form-control ase" id="58" name="jthtemp">
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="713">Pajak</label>
										<input type="date" class="form-control" id="713" name="pajak">
									</div>
									<div class="col">
										<label for="853">kir</label>
										<input type="date" class="form-control" id="853" name="kir">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body bg-light tanah">
						<div class="row-md-6">
							<div class="form-row">
								<div class="col">
									<label for="ex">Tahun Pengadaan</label>
									<input type="date" class="form-control isi" id="ex" name="pngadn_tnh" required>
								</div>
								<div class="col">
									<label for="a">Lokasi</label>
									<input type="text" class="form-control isi" id="a" name="lok" required>
								</div>
								<div class="col">
									<label for="ce">Atas Nama</label>
									<input type="text" class="form-control isi" id="ce" name="atsnma" required>
								</div>
							</div>
						</div>
						<div class="row-md-6">
							<div class="form-row">
								<div class="col">
									<label for="yrt">Pembayaran </label>
									<select class="form-control isi" name="pems" id="yrt" onchange="pil2();" required>
										<option value="" selected disabled>Pilih</option>
										<option value="LUNAS">Tunai</option>
										<option value="LEASING">Leasing</option>
									</select>
								</div>
								<div class="col" id="cuks" style="display: none;">
									<label for="adwer">Harga Tunai </label>
									<input type="number" class="form-control" id="adwer" name="hartun">
								</div>
							</div>
						</div>
						<div class="row-md-6">
							<div class="form-row">
								<div class="col">
									<label for="fsd" class="asie">Nama Leasing </label>
									<input type="text" class="form-control asie" id="fsd" name="lees">
								</div>
								<div class="col">
									<label for="hfg" class="asie">No.kontrak </label>
									<input type="text" class="form-control asie" id="hfg" name="nokontrak">
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<label for="zxc" class="asie">Harga Beli </label>
									<input type="number" class="form-control asie" id="zxc" name="harbels">
								</div>
								<div class="col">
									<label for="iyo" class="asie">DP </label>
									<input type="number" class="form-control asie" id="iyo" name="depeh">
								</div>
								<div class="col">
									<label for="astrf" class="asie">Tenor </label>
									<input type="text" class="form-control asie" id="astrf" name="tenr">
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<label for="cats" class="asie">Angsuran </label>
									<input type="number" class="form-control asie" id="cats" name="anges">
								</div>
								<div class="col">
									<label for="qsd" class="asie">Jth.Tempo Pertama</label>
									<input type="date" class="form-control asie" id="qsd" name="themp">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer bg-light">
						<button type="button" class="btn btn-warning" id="btl" data-dismiss="modal">Batal</button>
						<button name="save" class="btn btn-danger ss" id="armada"> Save</button>
						<button name="savee" class="btn btn-danger ss" id="tanah"> Save</button>
					</div>
				</div>
			</form>
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

		}

		function pil2() {
			var tan = document.getElementById('yrt').value;
			if (tan == "LUNAS") {
				$('#cuks').css('display', 'block');
				$('.asie').css('display', 'none');
			} else if (tan == "LEASING") {
				$('#cuks').css('display', 'none');
				$('.asie').css('display', 'block');

			}
		}



		$(document).ready(function() {
			/*form batal= ilang isinya*/
			$("input[type=text]").keyup(function() {
				$(this).val($(this).val().toUpperCase());
			});
			$("#btl").on("click", function(event) {
				$(".form-control").val("");
			});

			/*tombol-tombolan css*/
			$("#tamp").click(function() {
				$(".ceky").show();
				$(".ceki").show();
				$("#myInput").hide();
				$(".caek").hide();
			});
			$("#angs").click(function() {
				$(".pjk").hide();
				$(".tabel").show();
			});

			$(".isi").removeAttr("required");

			$("#arm").click(function() {
				$(".armada").show();
				$("#armada").show();
				$(".tanah").hide();
				$("#tanah").hide();
				$(".isi").removeAttr("required");
			});
			$("#tan").click(function() {
				$(".tanah").show();
				$("#tanah").show();
				$(".armada").hide();
				$("#armada").hide();
				$(".s1s").removeAttr("required");
			});

			/*alert butoone*/
			$("#tanah").click(function() {
				if (confirm("anda yakin.!?")) {

				} else {
					return false;
				}
			});
			$("#armada").click(function() {
				if (confirm("anda yakin.!?")) {

				} else {
					return false;
				}
			});


		});
	</script>
</body>
<footer>
	<?php
	include 'footer.php'; ?>
</footer>

</html>