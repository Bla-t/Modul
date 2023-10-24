<?php
date_default_timezone_set('Asia/Jakarta');
require 'config.php';
//$dat= date('Y-m-d');
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM `dat_leasing` WHERE `Keterangan` NOT LIKE 'TERJUAL' AND `jenis_leasing`='TANAH' ORDER BY `thn_pengada` ASC") or die(mysqli_error($conn));
while ($fetch = mysqli_fetch_array($query)) {
?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><input type="hidden" value="<?php $fetch['product_id'] ?>"><a name="id" class="font-weight-bold target" href="edit_isi.php?id=<?php echo $fetch['No_Pol']; ?>" target=""><?php echo $fetch['No_Pol'] ?></a>
		</td>
		<td><?php echo $fetch['atas_nama'] ?></td>
		<td><?php echo $fetch['Keterangan'] ?></td>
	</tr>

<?php
}
/*if(ISSET($_POST['filter'])){
	require 'config.php';
	$date = $_POST['date'];
	$query = mysqli_query($conn, "SELECT * FROM `dat_tenor`  WHERE `status` = 'BELUM' AND MONTH(tanggal) ='$date' ORDER BY `tanggal` ASC") or die(mysqli_error());
	while($fetch = mysqli_fetch_array($query)){
		?>
		<tr>
			<td style="color: white;"><?php echo $no++?></td>
			<td data-toggle="modal" data-target="#form_modal"><a class="target"><?php echo $fetch['No_pol']?></a></td>
			<td>Angs ke <?php echo $fetch['angsur']?></td>
			<td><?php echo date('d M, Y', strtotime($fetch['tanggal']))?></td>
		</tr>	
		<?php		
	}
}*/
?>