<?php
date_default_timezone_set('Asia/Jakarta');
	$intrvl = '14 days';
	$jatuhtemp =  date('Y-m-d');
	$jthtgl =date_create($jatuhtemp);
	$jth_1  = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
	$dat  = date_format($jth_1,'Y-m-d');
	$no=1;
	$query = mysqli_query($conn, "SELECT * FROM `dat_tenor` WHERE `status` = 'BELUM' AND `tanggal` <= '$dat' ORDER BY `tanggal` ASC ") or die(mysqli_error($conn));
	while($fetch = mysqli_fetch_array($query)){
		$nopol= $fetch['No_pol'];
		?>
		<tr>
			<td><?php echo $no++?>.</td>
			<td><a class="font-weight-bolder target" style="color: #935116;" href="edit_isi.php?id=<?php echo $fetch['No_pol'];?>"><?php echo $fetch['No_pol']?></a>
			</td>
			<td>Angs ke <?php echo $fetch['angsur']?></td>
			<td class="text-center">
				<?php
					$ten= mysqli_query($conn,"SELECT *FROM `dat_leasing` WHERE `No_pol` = '$nopol'") or die(mysqli_error($conn));
					$en = mysqli_fetch_assoc($ten);
					 echo $en['tenor'] - $en['angs_tercicil'] ?> Kali</td>
			<td><?php echo date('d M, Y', strtotime($fetch['tanggal']))?></td>
		</tr>
		<?php
	}
	?>