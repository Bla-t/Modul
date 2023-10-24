<?php
if (isset($_POST['lunas'])) {

	// Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");

	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=data-leasing (lunas).xls");

	// Tambahkan table
	include 'excel_lunas.php';
}

if (isset($_POST['leasing'])) {

	// Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");

	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=data-leasing(Hutang).xls");

	// Tambahkan table
	include 'excel_leasing.php';
}

if (isset($_POST['terjoeal'])) {

	// Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");

	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=data-leasing(Terjual).xls");

	// Tambahkan table
	include 'excel_terjual.php';
}
/* //koneksi kedatabase
 
include 'config.php';

    $output='';
    
if(isset($_POST['exleasing'])){

   $query = "SELECT * FROM `dat_leasing` WHERE `Keterangan` = 'LEASING'";

   $result = mysqli_query($conn, $query);

   if(mysqli_num_rows($result) > 0){

      $output .= '<table class="table" bordered="1"> 

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

                </tr>';

      while($fetch = mysqli_fetch_array($result)){

         $output .= '<tr> 
                       <td>'.$no++.'</td>
            			<td>'.$fetch["No_Pol"].'</td>
            			<td>'.$fetch["atas_nama"].'</td>
            			<td>'.$fetch["posisi"].'</td>
            			<td>'.date("Y-m",strtotime($fetch["thn_pengada"])).'</td>
            			<td>'.$fetch["Rangka"].'</td>
            			<td>'.$fetch["Nomes"] .'</td>
            			<td>'.$fetch["thn_pemb"].'</td>
            			<td>'.$fetch["merek"].'</td>
            			<td>'.$fetch["Tipe"] .'</td>
            			<td>'.$fetch["Jenis"] .'</td>
            			<td>'.$fetch["no_uji_kir"].'</td>
            			<td>'.$fetch["leasing"].'</td>
            			<td>'.$fetch["No_kontrak"].'</td>
            			<td>'.$fetch["harga_beli"].'/td>
            			<td>'.$fetch["Depe"].'</td>
            			<td>'.$fetch["tenor"].'</td>
            			<td>'.$fetch["tenor"] - $fetch["angs_tercicil"].'</td>
                    </tr>';

         }

      $output .= '</table>';

      header('Content-Type: application/vnd.ms-excel');

      header('Content-Disposition: attachment; filename=data.xls');

      echo $output;

   }

}

/*
 // nama file
 $filename= "Tabel_Leasing".".xls";

 //header info for browser
 header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    //menampilkan data sebagai array dari tabel produk
 $out=array();
 $sql = mysqli_query($conn,"SELECT * FROM `dat_leasing` WHERE `Keterangan` = 'LEASING'");
 while($data = mysqli_fetch_assoc($sql)) $out[] = $data;

 $show_coloumn = false;
 foreach($out as $record) {
 if(!$show_coloumn) {
 //menampilkan nama kolom di baris pertama
 echo implode("\t", array_keys($record)) . "\n";
 $show_coloumn = true;
 }
 // looping data dari database
 echo implode("\t", array_values($record)) . "\n";
 } 
 exit;*//*
 
 	function rupiah($angka){
	
	$hasil_rupiah = "Rp." . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
	}
	
	 function tgl($tanggal){
    $bulan = array (
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
   
    return $bulan[ (int)$pecahkan[1] ] . ', ' . $pecahkan[0];
  }
 
 
 */
