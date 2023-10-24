<?php
session_start();
if(empty($_SESSION['username']) && empty($_SESSION['pass'])){
	session_destroy();
		header("location:index.php?pesan=gagal");
	}
else if ($_SESSION['type'] == "stok") {
	session_destroy();
	header("location:index.php?pesan=gagal");
}
	?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Riwayat | Data Leasing</title>
	<?php	
	include "nav.php";	
	?>
	<style type="text/css">	
	</style>
</head>
<body>
	<div class="recent">
		<div class="row">
			<div class="col-md-6">
				<div class="card bg-secondary">
					<form method="POST" action="">
						<div class="form-inline">
							<input type="text" name="carih" class="form-control form-control-sm ceky" required="required">&emsp;
							<button type="submit" class="btn btn-danger btn-sm ceky" name="filt">Cari</button>
						</div>
					</form>
				</div>		
			</div>
			<div class="col-md-6">
				<h5 class="text-right font-weight-normal"><?php echo tgln(date('Y-m-d'));?></h5>
			</div>
			<!-- <h1 class="text-right">AWAL</h1> -->
		</div>		
		<div class="row ceki">
			<div class="col-md-12">
				<?php
					include 'config.php';

					$cet = $_POST['carih'];					
					$cuy = mysqli_query($conn,"SELECT * FROM `cek_dat` WHERE `nopol` = '$cet'") OR die(mysqli_query($conn));
					$get = mysqli_fetch_array($cuy);
					if(!empty($get['nopol'])){
				?>
				<label class="font-weight-normal"><h2>Daftar Riwayat "'<?php echo $get['nopol'];?>'"</h2></label>
				<?php
					}
					else if($cet !== $get['nopol']){
						?>
				<label class="font-weight-normal"><h2>Data "'<?php echo $_POST['carih'];?>'" tidak ada</h2></label>
				<?php
					}
					else if (empty($cet)) {
						?>
						<label class="font-weight-normal"><h2></h2></label>
						
					<?php
					}
					?>
				<div class="scroll table-responsive">
				<table class="table table-hover">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Tanggal</th>
							<th>Waktu</th>
							<th>Keterangan</th>
							<th>Petugas</th>							
						</tr>
					</thead>
					<tbody>
						<?php include 'cari_ish.php'?>
					</tbody>
				</table>
				</div>
			</div>			
		</div>
	</div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		function pin(){
		var pil= document.getElementById('9').value;
		if(pil == "LUNAS" ){
                
               $('#tun').css('display','block');
               $('.ase').css('display','none');               
            }
            else if(pil == "LEASING"){
               $('#tun').css('display','none');
               $('.ase').css('display','block');
                
            }
            /*else if(pil=="pilih") {
               $('#tun').css('display','none');
               $('.ase').css('display','none');
            }*/
        }

	        $(document).ready(function () {  
		        $("input[type=text]").keyup(function () {  
		            $(this).val($(this).val().toUpperCase());  
		        });  
		        $("#btl").on("click",function(event){
		        	$(".form-control").val("");
		        });
		    });

        $(document).ready(function(){
			$("#tamp").click(function(){
				$(".ceki").show();
				$("#myInput").hide();
				$(".caek").hide();
			});
			$("#angs").click(function(){
				$(".pjk").hide();
				$(".tabel").show();	
			});
			
		});
	</script>
</body>
<footer>
	<?php
	include 'footer.php';?>
</footer>
</html>