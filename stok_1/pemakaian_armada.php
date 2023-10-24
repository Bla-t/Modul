<?php
include 'header.php'; ?>
<section class="recent">
	<div class="activity-card">
		<div class="form-inline" style="border-bottom: 2px solid grey;">
			<h4>Form Pemakaian</h4>
			<a href="<?php if ($milik == 'GA') {
									echo 'distribusi.php';
								} else {
									echo 'pem_armada.php';
								} ?>" class="btn btn-warning btn-sm ml-1 mb-2">Kembali</a>
		</div>
		<?php
		$id_nota = $_GET['nota'];

		($cek_nota = mysqli_query($conn, "SELECT * FROM `stok_lappakai` WHERE `nota` ='$id_nota' AND `milik` = '$milik'")) or die(mysqli_error($conn));
		?>
		<form method="POST" action="">
			<div class="row">
				<!-- <div class="col"> -->
				<!-- <div class="form-row" style="border-bottom: 2px solid #5D6D7E;"> -->
				<!--<div class="col">							
							<label for="tgl">No.pol</label>							
							<select id="tgl" class="form-control" type="text" name="plat1" required>
								<?php
								//if (isset($_POST['plat1'])) {echo '<option selected>'.$_POST['plat1'].'</option>';}else{echo '<option disabled selected></option>'; }
								/*$member = mysqli_query($conn,"SELECT * FROM `stok_member` ORDER BY `nopol` ASC") or die(mysqli_error($conn));
							while($plat = mysqli_fetch_array($member)){
							 ?>
							 <option value="<?php echo $plat['nopol'];?>"><?php echo $plat['nopol'].' | '.$plat['jenis']; ?></option>
							<?php } */
								?>
							</select>
						</div>-->
				<?php while ($nota_isi = mysqli_fetch_array($cek_nota)) { ?>
					<div class="col">
						<h4>No nota : <?php echo $nota_isi['nota']; ?></h4>
					</div>
					<div class="col">
						<?php if ($milik == 'ARM') {
							echo '<h4>Plat Nomor :' . $nota_isi['nopol'] . '</h4>';
						} ?>
					</div>
				<?php } ?>
				<!-- </div> -->
				<!-- </div> -->
			</div>
			<div class="row">
				<div class="col mb-2">
					<label for="car">Barcode/SKU :</label>
					<select class="form-control selectpicker border mr-1" data-live-search="true" id="car" name="SKU" required title="pilih barang">
						<!--<option value="" selected disabled>Pilih Barang</option>-->
						<?php if (isset($_POST['SKU'])) {
							echo '<option selected>' . $_POST['SKU'] . '</option>';
						} else {
							echo '<option selected disabled></option>';
						} ?>
						<?php
						($ktegori = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `milik`='$milik' ORDER BY (nama_barang) ASC")) or die(mysqli_error($conn));
						while ($isis = mysqli_fetch_array($ktegori)) { ?>
							<option class="isi_sku" value="<?php echo $isis['id_barang']; ?>"><?php echo $isis['id_barang'] .' | ' .$isis['nama_barang']; ?></option>
						<?php }	?>
					</select>
				</div>
				<div class="col">
					<button style="margin-top: 2rem;" class="btn btn-warning" id="cekisi" name="cari">cari</button>
				</div>
			</div>
		</form>
		<?php include 'filter_armada-pakai.php'; ?>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#cont, #rego").keyup(function() {
					var harga = $("#rego").val();
					var jumlah = $("#cont").val();

					var total = parseInt(harga) * parseInt(jumlah);
					$("#total").val(total);
				});


			});
		</script>


		<?php include 'footer.php';
		?>