<?php
date_default_timezone_set('Asia/Jakarta');
	$no=1;
	//$dat= date('m');
	$query = mysqli_query($conn, "SELECT * FROM `dat_leasing` WHERE `Keterangan` = 'TERJUAL'") or die(mysqli_error($conn));
	while($fetch = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?php echo $no++?></td>
			<td><a class="font-weight-bold text-decoration-none target" href="rinci_leas.php?id=<?php echo $fetch['No_Pol'];?>"><?php echo $fetch['No_Pol']?></td>
			<td><?php echo $fetch['atas_nama']?></td>
			<td><?php echo $fetch['posisi']?></td>
			<td><?php echo date('Y',strtotime($fetch['thn_pengada']));?></td>
			<td><?php echo $fetch['Rangka'] ?></td>
			<td><?php echo $fetch['Nomes'] ?></td>
			<td><?php echo $fetch['thn_pemb'] ?></td>
			<td><?php echo $fetch['merek'] ?></td>
			<td><?php echo $fetch['Tipe'] ?></td>
			<td><?php echo $fetch['Jenis'] ?></td>
			<td><?php echo $fetch['no_uji_kir']?></td>
			<td><?php echo $fetch['leasing'] ?></td>
			<td><?php echo $fetch['No_kontrak'] ?></td>
			<td><?php echo rupiah($fetch['harga_beli'])?></td>
			<td><?php echo rupiah($fetch['Depe'])?></td>
			<td><?php echo $fetch['tenor'] ?></td>
			<td><?php echo $fetch['tenor'] - $fetch['angs_tercicil'] ?></td>
			<td><?php echo rupiah($fetch['harga_angs'])?></td>
			<td><?php echo rupiah($fetch['angs_tercicil'] *$fetch['harga_angs'] + $fetch['Depe'])?></td>
			<td><?php echo rupiah(($fetch['tenor'] - $fetch['angs_tercicil']) * $fetch['harga_angs']) ?></td>
			<td><?php echo rupiah($fetch['harga_jual'])?></td>
			<td><?php echo date('Y-m-d',strtotime($fetch['tgl_jual']));?></td>
			<td><?php echo $fetch['Keterangan'] ?></td>
		</tr>
		<?php
	}
?>