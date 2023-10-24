<?php
if(ISSET($_POST['filt'])){
	$no =1;
	$cark = $_POST['carih'];
	$query = mysqli_query($conn, "SELECT * FROM `cek_dat`  WHERE `nopol` = '$cark' ORDER BY `tgl` DESC") or die(mysqli_error($conn));
	while($fetch = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo date('d M, Y',strtotime($fetch['tgl']))?></td>
			<td><?php echo date('H:i:s',strtotime($fetch['tgl']))?></td>
			<td><?php echo $fetch['aksi']?></td>
			<td><?php echo $fetch['petugas']?></td>
		</tr>	
		<?php		
	}
}
?>