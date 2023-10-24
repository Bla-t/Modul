<?php
session_start();
if(empty($_SESSION['username']) && empty($_SESSION['pass'])){
		header("location:index.php?pesan=gagal");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rincian Data</title>
		<?php
			include "nav.php";
		?>
		<style type="text/css">
			.pjk,.ise{
				display: none;
			}
			.btn-outline-dark{
				
				background-color: #DF7B3D;				
			}
			#to2,#to3{
				display: none;
			}
			.scrol1s{
			    height: 450px !important;
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
			$tgle = date('Y-m-d');
			$query = mysqli_query($conn, "SELECT * FROM `dat_leasing` WHERE `No_Pol` ='$idne'") or die(mysqli_error($conn));
			while($fetch = mysqli_fetch_array($query)){

		?>
		<form action="updet.php" method="POST" enctype="multipart/form-data">
			<div class="card">
				<div class="form-inline" style="border-bottom: 1px solid #bbbb">
					<h3 class="font-weight-bold">No.Pol/ Lokasi Tanah : "'<?php echo $fetch['No_Pol'];?>'"</h3>
					<a type="button" class="btn btn-warning font-weight-bold" href="rekap.php" style="width: 150px;">Kembali</a>
				</div>
				<div class="row" style="border-bottom: 1px solid #bbbb">	
					<div class="col-md-6">
						<div class="form-row">
						  <div class="col-md-5">
						      <label>Tahun Pengadaan</label>
						      <input type="hidden" name="jetip" id="jetip" value="<?php echo $fetch['jenis_leasing']?>">
						  </div>
						  <div class="col">
						  	<p class="font-weight-bold">: <?php echo date('d M, Y',strtotime($fetch['thn_pengada']));?></p>
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
				<div class="row">
					<!--<div class="form-row">-->
					<!--    <div class="col">-->
					<!--      <label class="pjk">Jth.Tempo Pajak berikutnya</label>-->
					<!--      <input type="hidden" name="sisang" value="<?php echo $fetch['angs_tercicil']?>">-->
					<!--      <input class="form-control pjk" type="date" name="pjak" value="<?php echo $fetch['tgl_pajak']?>">-->
					<!--      </div>-->
					<!--    <div class="col">-->
					<!--    	<label class="pjk">Jth.Tempo Kir berikutnya</label>-->
					<!--      <input class="form-control pjk" type="date" name="kir" value="<?php echo $fetch['tgl_kir'];?>">-->
					<!--    </div>-->
					<!--</div>	-->
					<!--<div class="form-row">-->
					<!--    	<label class="pjk">No.uji kir</label>-->
					<!--      <input class="form-control pjk" type="text" name="nojikir" value="<?php echo $fetch['no_uji_kir'];?>">-->
				 <!--   </div>-->
					<!--<div class="form-row">-->
					<!--    <div class="col">-->
					<!--      <label class="ise">Atas Nama</label>-->
					<!--      <input type="hidden" name="idida" value="<?php echo $fetch['product_id']?>">-->
					<!--      <input class="form-control ise" type="text" name="NAM" value="<?php echo $fetch['atas_nama']?>">-->
					<!--      </div>-->
					<!--    <div class="col">-->
					<!--    	<label class="ise">Posisi</label>-->
					<!--      <input class="form-control ise" type="text" name="POS" value="<?php echo $fetch['posisi'];?>">-->
					<!--    </div>-->
					<!--</div>-->
					<!--<div class="form-row">-->
					<!--	<div class="col">								-->
					<!--	     <div class="custom-control custom-checkbox">-->
					<!--	      <input type="checkbox" class="custom-control-input ise" id="hekin" >-->
					<!--	      <label class="custom-control-label ise" for="hekin">Rubah No. Plat</label>-->
					<!--	  </div>-->
					<!--		<input class="form-control ise" type="text" id="plat" name="plato" value="<?php echo $fetch['No_Pol'];?>" readonly>-->
					<!--    </div>-->
					<!--    <div class="col">-->
					<!--    	 <div class="custom-control custom-checkbox">-->
					<!--	      <input type="checkbox" class="custom-control-input ise" id="hek" name="jual" value="Di Jual">-->
					<!--	      <label class="custom-control-label ise" for="hek">Isi Harga Jual</label>-->
					<!--	  </div>-->
					<!--	  <input type="hidden" name="ten" value="<?php echo $fetch['tenor'];?>">-->
					<!--      <input class="form-control ise" type="text" id="nom" name="harga" placeholder="Nilai" value="<?php echo $fetch['harga_jual']?>" readonly>-->
					<!--    </div>						   -->
					<!--</div>-->
					<?php
							}

						?>
					<!-- <div class="form-row fils">	
					</div> -->
					<div class="table-responsive scrolls" id="hideble">
						<table class="table table-hover ">
							<thead class="thead-light">
								<tr>
									<th>No.</th>
									<th>Angsuran ke</th>
									<th>Jatuh Tempo</th>
									<th>status</th>
									<th>tanggal bayar</th>
									<th>file gambar</th>
								</tr>
							</thead>
							<tbody>		
								<?php
								$query = mysqli_query($conn, "SELECT * FROM `dat_tenor` WHERE `No_pol` ='$idne' AND `status`='BAYAR' ORDER BY `tanggal` ASC") or die(mysqli_error($conn));
								while($fetche = mysqli_fetch_array($query)){
								if ($fetche['status'] =="BAYAR"){
								    $stat="Terbayar";
								}
								?>			
						
								<tr style="color:#CBF10A; ">
									<td><?php echo $no++;?></td>
									<td>Angsuran ke<?php echo $fetche['angsur']?></td>	
									<td><?php echo date('d M, Y',strtotime($fetche['tanggal']))?></td>
									<td><?php echo $stat?></td>
									<td><?php echo date('d M, Y',strtotime($fetche['tgl_byr'])) ?></td>
									<td><img src="gamb/leasArmada/<?php echo $fetche['file_gambar'];?>" class="rounded leea" width="60" height="40">
		    							<img src="gamb/leasTanah/<?php echo $fetche['file_gambar'];?>" class="rounded tantan" width="60" height="40">
									</td>
								</tr>
									<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>	
		</form>
	</div>
</body>
<?php
    if($_SESSION['levl'] == 'admin'){
        
        include'footer.php';
    }
    else if($_SESSION['levl'] == "operator"){
        
        include'footer.php';
    }
    else{
        
    }
?>

<script type="text/javascript">
            
    $(document).ready(function(){
        $("#to1").click(function(){
          if(confirm("anda yakin.!?")){
              
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
            $(".leea").hide();
        }
        else{
            $(".armada").show();
            $(".tantan").hide();
        }
    });      
   
            
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>

</html>
