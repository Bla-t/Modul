<?php
	session_start();
if(empty($_SESSION['username']) && empty($_SESSION['pass'])){
		header("location:index.php?pesan=gagal");
	}
else if($_SESSION['type'] != "leasing"){
		header("location:index.php?pesan=gagal");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rubah | Isi Data</title>
	<?php
	include "nav.php";
	?>
		<style type="text/css">
			.card-body{
				background-color:#404A57; 
			}
			.pjk,.ise{
				display: none;
			}
			.btn-outline-dark{
				
				background-color: #DF7B3D;				
			}
			#to2,#to3{
				display: none;
			}
			.scrols{
			    height: 350px !important;
        		overflow: auto;
			}
		</style>
</head>
<body>
	<div class="recent">
			<?php
				//$dat= date('Y-m-d');
				$no=1;
				$idne=$_GET['id'];
				$intrvl = '1 month';
	        	$jatuhtemp =  date('Y-m-d');
	        	$jthtgl =date_create($jatuhtemp);
	        	$jth_1  = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
	        	$tgle  = date_format($jth_1,'Y-m-d');
				$query = mysqli_query($conn, "SELECT * FROM `dat_leasing` WHERE `No_Pol` ='$idne'") or die(mysqli_error($conn));
				while($fetch = mysqli_fetch_array($query)){

			?>
		<form action="updet.php" method="POST" enctype="multipart/form-data">
			<div class="card">
				<div class="form-inline" style="border-bottom: 2px solid #5499C7;">
					<h3 class="font-weight-bold">No.Pol/ Lokasi Tanah : "'<?php echo $fetch['No_Pol'];?>'"</h3>&emsp;
					<a type="button" class="btn btn-warning" href="updet_leas.php" style="width: 150px;">Kembali</a>
				</div>
				<div class="row" style="border-bottom: 2px solid #5499C7;">
					<div class="col-md-6">	
						<div class="form-row">
						  <div class="col-md-5">
						      <label>Tahun Pengadaan</label>
						      <input type="hidden" name="jetip" id="jetip" value="<?php echo $fetch['jenis_leasing']?>">
						  </div>
						  <div class="col">
						  	<p class="font-weight-bold">: <?php echo date('d M, Y',strtotime($fetch['thn_pengada']));?><p>
						  </div>
						</div>
						<div class="form-row armada">
						  	<div class="col-md-5">
						      <label>No.Rangka</label>	     
						  </div>
						  <div class="col">
						  	<p class="font-weight-bold">: <?php echo $fetch['Rangka'];?></p>
						  </div>
						</div>
						<div class="form-row armada">
						    <div class="col-md-5">
						      <label>No.Mesin</label>
					        </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['Nomes'];?></p>
							</div>
						</div>
					    <div class="form-row armada">
						    <div class="col-md-5">
						      <label>Thn. Pembuatan</label>
						    </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['thn_pemb'];?></p>
						    </div>
						</div>
					    <div class="form-row armada">
						    <div class="col-md-5">
						      <label>Merek</label>
						      </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['merek'];?></p>
						      </div>
						</div>
						<div class="form-row armada">
						    <div class="col-md-5">
						      <label>Tipe</label>
						      </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['Tipe'];?></p>
						      </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-row armada">
						    <div class="col-md-5">
						      <label>Jenis</label>
						      </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['Jenis'];?></p>
						      </div>
						</div>
						<div class="form-row">
						    <div class="col-md-5">
						      <label>Leasing</label>
						      </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['leasing'];?></p>
						      </div>
						</div>
						<div class="form-row">
						    <div class="col-md-5">
						      <label>No.Kontrak Leasing</label>
						      </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['No_kontrak'];?></p>
						      </div>
						</div>
						<div class="form-row">
						    <div class="col-md-5">
						      <label>Atas Nama</label>
						      </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['atas_nama'];?></p>
						      </div>
						</div>
						<div class="form-row armada">
						    <div class="col-md-5">
						      <label>Posisi</label>
						      </div>
						    <div class="col">
						      <p class="font-weight-bold">: <?php echo $fetch['posisi'];?></p>
						      </div>
						</div>						
					</div>					
				</div>
				<div class="row aow">
					<div class="form-inline">
						<button type="button" class="btn btn-outline-dark" id="angs">Angsuran</button>&emsp;
						<button type="button" class="btn btn-outline-dark hide" id="pjk">Pajak</button>&emsp;
						<button type="button" class="btn btn-outline-dark" id="edit">Data</button>&emsp;
					</div>
					<div class="row">
						<div class="form-row">
						    <div class="col">
						      <label class="pjk">Jth.Tempo Pajak berikutnya</label>
						      <input type="hidden" name="sisang" value="<?php echo $fetch['angs_tercicil']?>">
						      <input class="form-control form-control-sm pjk" type="date" name="pjak" value="<?php echo $fetch['tgl_pajak']?>">
						      </div>
						    <div class="col">
						    	<label class="pjk">Jth.Tempo Kir berikutnya</label>
						      <input class="form-control form-control-sm pjk" type="date" name="kir" value="<?php echo $fetch['tgl_kir'];?>">
						    </div>
						</div>	
						<div class="form-row">
					    	<label class="pjk">No.uji kir</label>
					        <input class="form-control form-control-sm pjk" type="text" name="nojikir" value="<?php echo $fetch['no_uji_kir'];?>">
					    </div>
						<div class="form-row">
						    <div class="col">
						      <label class="ise">Atas Nama</label>
						      <input type="hidden" name="idida" value="<?php echo $fetch['product_id']?>">
						      <input class="form-control form-control-sm ise" type="text" name="NAM" value="<?php echo $fetch['atas_nama']?>">
						      </div>
						    <div class="col">
						    	<label class="ise">Posisi</label>
						      <input class="form-control form-control-sm ise" type="text" name="POS" value="<?php echo $fetch['posisi'];?>">
						    </div>
						</div>
						<div class="form-row">
							<div class="col">
							    <div class="custom-control custom-checkbox">
							      <input type="checkbox" class="custom-control-input ise" id="hekin" >
							      <label class="custom-control-label ise" for="hekin">Isi Harga Jual</label>
								</div>
								<input class="form-control ise" type="text" id="plat" name="harga" placeholder="Nilai" value="<?php echo $fetch['harga_jual'];?>" readonly>
							</div>
							<div class="col">
						      <div class="custom-control custom-checkbox" >
							      <input type="checkbox" class="custom-control-input ise" id="tg" >
							      <label class="custom-control-label ise" for="tg">Isi Tanggal Jual</label>
							  </div>
								<input class="form-control ise" type="date" id="plat2" name="tgl_harga" placeholder="Tanggal" value="<?php echo $fetch['tgl_jual'];?>" readonly>
						    </div>
						    <div class="col">
						    	<div class="custom-control custom-checkbox">
							      <input type="checkbox" class="custom-control-input ise" id="hek" name="jual" value="Di Jual">
							      <label class="custom-control-label ise" for="hek">Rubah Nopol / Lokasi</label>
								</div>
								<input type="hidden" name="ten" value="<?php echo $fetch['tenor'];?>">
							    <input class="form-control ise" type="text" id="nom" name="plato" placeholder="Plat Nomor" value="<?php echo $fetch['No_Pol']?>" readonly>
						    </div>						   
						</div>
					</div>
						<?php
								}
							?>
				</div>
				<div class="row" id="utang">
					<div class="row">
						<div class="custom-file">
	                        <input type="file" class="custom-file-input" name="file" id="file_gambar">
	                        <label class="custom-file-label" for="customFile">Upload Gambar</label>
	                    </div>
                    </div>
					<div class="table-responsive scrolls" id="hideble" style="border-bottom: 2px solid #E74C3C;">
						<table class="table table-hover">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Angsuran ke</th>
									<th>Jatuh Tempo</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query = mysqli_query($conn, "SELECT * FROM `dat_tenor` WHERE `status` = 'BELUM' AND `No_pol` ='$idne' AND `tanggal` <='$tgle' ORDER BY `tanggal` ASC") or die(mysqli_error($conn));
								while($fetch = mysqli_fetch_assoc($query)){
								?>									
								<tr>
										<?php
										$LAM= mysqli_query($conn,"SELECT *FROM `dat_tenor` WHERE `status` = 'BELUM' AND `No_pol` = '$idne' ORDER BY `tanggal` DESC");
										$tang = mysqli_fetch_assoc($LAM);
											?>
									<td><?php echo $no++;?>
									<input type="hidden" name="tangtam" value="<?php echo $tang['tanggal']?>">
									<input type="hidden" name="angke" value="<?php echo $tang['angsur']?>">
									</td>
									<td><input type="hidden" name="ke" value="<?php echo $fetch['angsur']?>">Angsuran ke<?php echo $fetch['angsur']?></td>
										<?php
											$TOT= mysqli_query($conn,"SELECT COUNT(status) AS 'tot' FROM `dat_tenor` WHERE `status` = 'BAYAR' AND `No_pol` = '$idne'");
											$has = mysqli_fetch_assoc($TOT);
										?>									
									<td><input type="hidden" name="sis" value="<?php echo $has['tot'];?>"><?php echo date('d M, Y',strtotime($fetch['tanggal']));?></td>
									<td><div class="form-check" id="aay">
										  <label class="form-check-label">
										  	<input type="hidden" name="buy" value="BAYAR">
										    <input type="checkbox" class="form-check-input ceyk" name="idi" id="idih" value="<?php echo $fetch['id'];?>">Bayar
										  </label>
										</div>
									</td>
								</tr>
										<?php

										}

									?>					
							</tbody>
						</table>
					</div>					
				</div>	
				<div class="form-inline">
					<input type="submit" name="SAV" class="btn btn-info" id="to1" style="width: 150px;" value="Simpan">
					<button type="submit" name="saver" class="btn btn-info" id="to2" style="width: 150px;">Simpan</button>
					<button type="submit" name="savest" class="btn btn-info" id="to3" style="width: 150px;">Simpan</button>
				</div>
			</div>	
		</form>
	</div>
</body>
<?php
    if($_SESSION['levl'] == "admin" || $_SESSION['levl'] == "operator"){
        
        include'footer.php';
    }
    else if($_SESSION['levl'] == "sudo"){
        
        include'footer.php';
    }
    else{
        
    }
?>

<script type="text/javascript">
       /*$('#file_gambar').bind('change', function() {

		  //this.files[0].size gets the size of your file.
		  alert(this.files[0].size);

		});*/

////////////////////////////////////////////////////////////////////
			//////  testing upload ///////
        /*$('input[type=file]').change(function(){
				var ext = $('#upload_file').val().split('.').pop().toLowerCase();
				//Allowed file types
				if($.inArray(ext, ['gif','png','jpg','jpeg', 'docx', 'doc', 'pdf', 'rtf', 'ppt', 'txt', 'odt']) == -1) {
					alert('The file type is invalid!');
					$('#upload_file').val("");
				}
		 
		//Tested in Firefox and Google Chorme
		sizee = $("#upload_file")[0].files[0].size; //file size in bytes
		sizee = sizee / 1024; //file size in Kb
		sizee = sizee / 1024; //file size in Mb
		 
				//file size more than 10Mb
				if (sizee &gt; 10) {
					alert("Maximum file size is 10Mb");
					return false;
				}  
				else {
				//Ajax code to upload file to server
				}
		});*/

///////////////////////////////////////////////
    $(document).ready(function(){
        $("#to1").click(function(){
          if(confirm("anda yakin.!?")){          	
            //   $('.ceyk').change(function() {
            //     $('.ceyk').val($(this).is(':checked'));
              if(!$(".ceyk").is(":checked")){
                  alert("Angsuran Kosong. . . !");
                  return false;
              }
              else if ($("#file_gambar").val() == ""){
	          	alert("gambar kosong");
	              return false;
	          }
              else{
              	return true;
              }
          }
          else{
          	return false;
          }
        });
        
        $("#to2").click(function(){
          if(confirm("anda yakin.!?")){
              
          }
          else{
              return false;
          }
        });
        
        $("#to3").click(function(){
          if(confirm("anda yakin.!?")){
             
          }
          else{
              return false;
          }
        });
        
        
        if ($("#jetip").val() != 'ARMADA'){
            $(".armada").hide();
            $(".hide").hide();
        }
        else{
            $(".armada").show();            
        }
    });      
// 	$(function() {
// 		  enable_cb1();
// 		  $("#idih").click(enable_cb1);
// 		});
// 		function enable_cb1() {
// 			  if (this.$("input:checkbox:not(:checked)")) {
// 			    alert("File gambar / Angsuran Kosong");
// 			    return false;
// 			   }
// 			  else{
// 			  }
// 			  return true;
// 			}	
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>

</html>
