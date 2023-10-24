<html>
<table border="1">
	<tr>
		<th>No.</th>
		<th>No.Polisi/Lokasi</th>
		<th>Atas Nama</th>
		<th>Posisi</th>
		<th>Thn.Pengadaan</th>
		<th>No.Rangka</th>
		<th>No.mesin</th>
		<th>Thn.Pembuatan</th>
		<th>Merek</th>
		<th>Tipe</th>
		<th>Jenis</th>
		<th>No.Uji Kir</th>
		<th>Nama Leasing</th>
		<th>No.Kontrak</th>
		<th>Harga Beli</th>
		<th>DP</th>
		<th>Tenor</th>
		<th>Sisa Angsuran</th>
		<th>Angsuran</th>
		<th>Nilai. Aset</th>
		<th>Hutang Aset</th>
		<th>Status</th>
	</tr>

	<?php
	include 'config.php';
	$no = 1;
	$beli = mysqli_query($conn, "SELECT SUM(harga_beli) AS 'totbeli' FROM `dat_leasing` WHERE `Keterangan` = 'LUNAS'") or die(mysqli_error($conn));
	$hargabeli = mysqli_fetch_assoc($beli);

	$query = mysqli_query($conn, "SELECT * FROM `dat_leasing` WHERE `Keterangan` = 'LUNAS'") or die(mysqli_error($conn));
	while ($fetch = mysqli_fetch_assoc($query)) {
		$tgl = tgl(date('Y-m', strtotime($fetch['thn_pengada'])));
		$harbel = rupiah($fetch['harga_beli']);
		$depe = rupiah($fetch['Depe']);
		$sisang = $fetch['tenor'] - $fetch['angs_tercicil'];
		$hutas = rupiah(($fetch['tenor'] - $fetch['angs_tercicil']) * $fetch['harga_angs']);
		echo '
		<tr>
			<td>' . $no++ . '</td>
			<td>' . $fetch['No_Pol'] . '</td>
			<td>' . $fetch['atas_nama'] . '</td>
			<td>' . $fetch['posisi'] . '</td>
			<td>' . $tgl . '</td>
			<td>' . $fetch['Rangka'] . '</td>
			<td>' . $fetch['Nomes'] . '</td>
			<td>' . $fetch['thn_pemb'] . '</td>
			<td>' . $fetch['merek'] . '</td>
			<td>' . $fetch['Tipe'] . '</td>
			<td>' . $fetch['Jenis'] . '</td>
			<td>' . $fetch['no_uji_kir'] . '</td>
			<td>' . $fetch['leasing'] . '</td>
			<td>' . $fetch['No_kontrak'] . '</td>
			<td>' . rupiah($fetch['harga_beli']) . '</td>
			<td>' . $fetch['Depe'] . '</td>
			<td>' . $fetch['tenor'] . '</td>
			<td>' . $sisang . '</td>
			<td>' . rupiah($fetch['harga_angs']) . '</td>
			<td>' . rupiah($fetch['harga_beli']) . '</td>
			<td>' . $hutas . '</td>			
			<td>' . $fetch['Keterangan'] . '</td>
		</tr>';
	}
	echo '<tr>';
	for ($i = 0; $i <= 12; $i++) {
		echo '<td id="' . $i . '" style="border:none;"></td>';
	}
	echo '<td style="border:none;">Total :</td>';
	echo '
				<td>' . rupiah($hargabeli['totbeli']) . '</td>
				<td></td>';
	echo '</tr>';
	function rupiah($angka)
	{

		$hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}

	function tgl($tanggal)
	{
		$bulan = array(
			1 =>
			'Jan',
			'Feb',
			'Mar',
			'Apr',
			'Mei',
			'Juni',
			'Juli',
			'Agus',
			'Sept',
			'Okt',
			'Nov',
			'Des'
		);
		$pecahkan = explode('-', $tanggal);

		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun

		return $bulan[(int)$pecahkan[1]] . ', ' . $pecahkan[0];
	}
	?>
</table>

</html>