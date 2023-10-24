<?php
date_default_timezone_set('Asia/Jakarta');
//$dat= date('Y-m-d');
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM `dat_leasing` WHERE  `jenis_leasing`='ARMADA' ORDER BY `thn_pengada` ASC") or die(mysqli_error($conn));
while ($fetch = mysqli_fetch_array($query)) {
?>
	<tr>
		<form method="POST" action="updell.php">
			<td><?php echo $no++ ?></td>
			<td>
				<input type="hidden" value="<?php echo $fetch['product_id'] ?>" name="aisd">
				<input type="hidden" name="id" value="<?php echo $fetch['No_Pol'] ?>">
				<a class="text-warning text-decoration-none target" href="edit_sup.php?id=<?php echo $fetch['No_Pol']; ?>" target=""><?php echo $fetch['No_Pol'] ?></a>
			</td>
			<td><?php echo $fetch['merek'] ?></td>
			<td><?php echo $fetch['Jenis'] ?></td>
			<td><input class="form-control form-control-sm" name="ket" value="<?php echo $fetch['Keterangan'] ?>" onkeyup="this.value = this.value.toUpperCase()"></td>
			<td class="d-flex">
				<button class="btn btn-outline-warning btn-sm ml-1" name="smp"><span class="ti-save"></span></button>
				<button class="btn btn-outline-danger btn-sm ml-1" name="delt"><span class="ti-trash"></span></button>
			</td>
		</form>
	</tr>

<?php
}

?>