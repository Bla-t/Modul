<?php 	
	include "header.php";
?>
	<h3>DATA PLAT NOMOR</h3>
		<section class="recent">			
            <div class="activity-card">            	
            	<?php             		

            		$TOT= mysqli_query($conn,"SELECT COUNT(id) AS 'tot' FROM `stok_member`");
					$has = mysqli_fetch_assoc($TOT);
            	 ?>
                <h4> Plat Nomor <kbd><?php echo $has['tot']; ?></kbd></h4>
                <div class="col-md-5">
	                <div class="input-group mb-3">
					    <input type="text" class="form-control" id="input" placeholder="cari">
					    <div class="input-group-append">
					      <span class="input-group-text ti-search"></span>
					    </div>
					</div>
				</div>				
                <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nopol</th>
                            <th>merk</th>
                            <th>Jenis</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <?php 
                    	$n=1;
                    	$isi=mysqli_query($conn," SELECT * FROM `stok_member`")or die(mysqli_error($conn));
                    	while($data=mysqli_fetch_array($isi)){

                     ?>
	                <form method="POST" action="aksi/aksi_data-barang.php">
                    <tbody id="table">
                        <tr>
                            <td><input type="hidden" name="id_nopol" value="<?php echo $data['id']?>"><?php echo '.'.$n++; ?></td>
                            <td><?php echo $data['nopol'];?></td>
                            <td><?php echo $data['merk'];?></td>
                            <td><?php echo $data['jenis'];?></td>
                            <td>
                            	<a class="btn btn-warning btn-sm" name="rubsh" href="rubah_kategori.php?id=<?php echo $data['id']?>" id="rubah">Rubah</a>
                                <button type="submit" class="btn btn-danger btn-sm" id="cek" value="<?php echo $data['id'];?>" name="haps_nopol" id="hapus">Hapus</button>
				            </td>
                        </tr>
                    <?php }?>
                    </tbody>
	                </form>
                </table>
                </div>
            </div>
            <div class="summary">
                <div class="summary-card"><br>
                   <a class="btn btn-info" href="member.php"><span class="ti-pencil"></span> Tambah Plat</a> 
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cek").click(function(){
                    if(confirm("yakin")){
                            
                    }
                    else{
                        return false;
                    }
                    
                });
            });
        </script>


	<?php include "footer.php" ?>