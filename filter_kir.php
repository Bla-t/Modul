<?php
date_default_timezone_set('Asia/Jakarta');
	$intrvl = '14 days';
	$jatuhtemp =  date('Y-m-d');
	$jthtgl  = date_create($jatuhtemp);
	$jth_1 = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
	$dat = date_format($jth_1,'Y-m-d');
	$no=1;
	$query = mysqli_query($conn, "SELECT * FROM `dat_leasing` WHERE `jenis_leasing`='ARMADA' AND `Keterangan`NOT LIKE 'TERJUAL' AND `tgl_kir` <= '$dat' ORDER BY `tgl_kir` ASC") or die(mysqli_error($conn));
	while($fetch = mysqli_fetch_array($query)){
		?>		
		<tr>
			<td><?php echo $no++ ?>.</td>
			<td><a class="font-weight-bolder" style="color: #935116;" href="edit_isi.php?id=<?php echo $fetch['No_Pol'];?>" target=""><?php echo $fetch['No_Pol'];?></a></td>
			<td><?php echo date('d M, Y', strtotime($fetch['tgl_kir']))?></td>
		</tr>
		<?php
	}
?>

