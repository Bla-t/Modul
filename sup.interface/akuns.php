<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
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
<style type="text/css">
</style>

<body>
	<?php
	$isi = $_GET['id'];
	?>
	<div class="activity-card">
		<?php
		if (isset($_GET['akoens'])) {

			if ($_GET['akoens'] == "ups") {
				echo ('
    	          <div class="alert alert-success alert-dismissible fade show text-center">
    	              <button type="button" class="close" data-dismiss="alert">&times;</button>
    	              Update<strong> Username</strong> okeh. . . ! !
    	          </div>');
			} else if ($_GET['akoens'] == "haps") {

				echo ('
    	          <div class="alert alert-warning alert-dismissible fade show text-center">
    	              <button type="button" class="close" data-dismiss="alert">&times;</button>
    	              <strong>Terhapuzz</strong> loohh . . . !!
    	          </div>');
			} else if ($_GET['akoens'] == "yups") {

				echo ('
    	          <div class="alert alert-info alert-dismissible fade show text-center">
    	              <button type="button" class="close" data-dismiss="alert">&times;</button>
    	              <strong>Tambah</strong> okay . . . !!
    	          </div>');
			}
		}
		?>
		<div class="row">
			<div class="col-md-4">
				<div class="card bg-dark">
    				<div class="form-group">
    					<label for="#myInput">Cari Akun</label>
    					<input class="form-control form-control-sm" id="myInput" type="text">
    				</div>
				</div>
			</div>
			<div class="col-md-8">
				<h3 class="text-right">
					<p class="font-weight-normal"><?= tgl(date('Y-m-d')); ?></p>
					<p class="font-weight-normal jm"><?= date('H:i:s'); ?></p>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-11">
				<label class="font-weight-normal">
					<h2>akun-akun</h2>
				</label>
				<button type="button" class="btn btn-info btn-sm ml-1 mb-1" data-toggle="modal" data-target="#myModal">Tambah +
				</button>

				<!-- The Modal -->
				<div class="modal fade" id="myModal">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Tambah Akun</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form action="" method="POST">
									<div class="form-row">
										<div class="col">
											<label for="nama"> Nama : </label>
											<input type="text" id="nama" name="nama" class="form-control" required>
										</div>
										<div class="col">
											<label for="user"> Username : </label>
											<input type="text" id="user" name="username" class="form-control" required>
										</div>
										<div class="col">
											<label for="lvl"> Level : </label>
											<select id="lvl" name="level" class="form-control" required>
												<option value="" selected disabled>Pilih</option>
												<option value="admin">admin</option>
												<option value="visitor">pengawas</option>
												<option value="operator">operator</option>
												<option value="sudo">operator user</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="col">
											<label for="bag"> Bagian : </label>
											<select id="bag" name="bagian" class="form-control" required>
												<option value="" selected disabled>Pilih</option>
												<option value="ADM">Leasing</option>
												<option value="GA">Stok Ga</option>
												<option value="ARM">Stok Armada</option>
												<option value="GAJI">Gaji</option>
												<option value="OPS">Operator user</option>
											</select>
										</div>
										<div class="col">
											<label for="type"> type : </label>
											<select id="type" name="type" class="form-control" required>
												<option value="" selected disabled>Pilih</option>
												<option value="leasing">Leasing</option>
												<option value="stok">Stok</option>
												<option value="supus">Operator user</option>
												<option value="gaji">Operator Gaji</option>
											</select>
										</div>
										<div class="col">
											<label for="cabs"> Cabang: </label>
											<input type="text" id="cabs" name="cbs" class="form-control" required>
										</div>
										<div class="col">
											<label for="pass"> Password: </label>
											<input type="password" id="pass" name="psd" class="form-control" required>
										</div>
									</div>
							</div>

							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="submit" name="tambah_user" class="btn btn-primary btn-sm">simpan</button>
								<?php
								if (isset($_POST['tambah_user'])) {
									$name = $_POST['nama'];
									$username = $_POST['username'];
									$livel = $_POST['level'];
									$bags = $_POST['bagian'];
									$taipe = $_POST['type'];
									$paseword = $_POST['psd'];
									$cab = $_POST['cbs'];
									mysqli_query($conn, "INSERT INTO `dat_uss` (nama,username,password,levl,bagian,type,cabang) VALUE('$name','$username','$paseword','$livel','$bags','$taipe','$cab')") or die(mysqli_error($conn));
									echo "<script>window.location.href='akuns.php?akoens=yups';</script>";
									exit;
								}
								?>
								</form>
								<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" id="batal">Batal</button>
							</div>

						</div>
					</div>
				</div>
				<div class="table table-responsive table-sm scroll">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th>No.</th>
								<th>Level</th>
								<th>Nama</th>
								<th>bagian</th>
								<th>tipe</th>
								<th>Username</th>
								<th>Password</th>
								<th>Cabang</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody id="akoen">
							<?php
							$no = 1;
							$akoen = mysqli_query($conn, "SELECT * FROM `dat_uss`") or die(mysqli_error($conn));
							while ($catch = mysqli_fetch_array($akoen)) {
							?>
								<tr>
									<form method="POST" action="updell.php">
										<td><?= $no++; ?></td>
										<td><?= $catch['levl']; ?></td>
										<td><?= $catch['nama']; ?></td>
										<td><?= $catch['bagian']; ?></td>
										<td><?= $catch['type']; ?></td>
										<td><?= $catch['username']; ?></td>
										<td><?= $catch['password']; ?></td>
										<td><?= $catch['cabang']; ?></td>
										<td>
											<button class="btn btn-danger btn-sm hapusakuns" name="haps"><input type="hidden" name="hii" value="<?= $catch['id'] ?>"><span class="ti-trash"></span></button>
										</td>
									</form>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">

	</script>
</body>
<footer>
	<?php
	include 'footer.php';
	?>
</footer>

</html>