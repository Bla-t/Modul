<?php
	require_once 'config.php';
	date_default_timezone_set('Asia/Jakarta');
	session_start();
	if($_SESSION['levl']==""){
			header("location:index.php?pesan=gagal");
		}
	
	if(ISSET($_POST['save'])){
		$thn = $_POST['thn_pngadn'];
		$npol = $_POST['No_pol'];
		$rangka = $_POST['Rangka'];
		$nomes = $_POST['Nomes'];
		$thn_pem = $_POST['thn_pem'];
		$merek = $_POST['merek'];
		$tipe = $_POST['tipe'];
		$jenis = $_POST['jenis'];
		$mode = "ARMADA";
		            if(!empty($_POST['harga_tunai'])){
                		$harga_tunai = $_POST['harga_tunai'];
		            }
		            else{
		                $harga_tunai ="0";
		            }
		if(empty($_POST['leasing'])){ $leasing = "-";} else{ $leasing = $_POST['leasing']; }
		if(empty($_POST['no_kontrak'])){$no_kont = "-";} else{$no_kont =$_POST['no_kontrak'];}
		if(empty($_POST['harga_beli'])){$harga_bel = '0' + $_POST['harga_tunai'];} else{$harga_bel = $_POST['harga_beli'] + $_POST['harga_tunai'];}
		if(empty($_POST['dp'])){$depe = '0';} else{$depe = $_POST['dp'];}
		if(empty($_POST['tenor'])){$tenor = '0';} else{$tenor = $_POST['tenor'];}
		if(empty($_POST['angsuran'])){$angsuran = '0';}else{$angsuran = $_POST['angsuran'];}
		          if(!empty($_POST['pajak'])){      
                		$pjk = $_POST['pajak'];
                		
                		
    		          }
		          else{
		              $pjk ="0000-00-00";
		              
		          }
    		      if(!empty($_POST['kir'])){
    		          $kir = $_POST['kir'];
    		          
    		      }
    		      else{
    		          $kir ="0000-00-00";
    		      }
		$ket = $_POST['Pembayaran'];
		$atsnma = $_POST['ats_nma'];
		$posisi = $_POST['Posisi'];
		$tgl = date('Y-m-d');
		$jm = date('H:i:s');
		$pet = $_SESSION['nama'];

			//interval jatuh tempo
			$tgel = $_POST['jthtemp'];
			$pcah =explode("-",$tgel);
			if($pcah[2] > 28){
		            $jatuhtemp = date('Y-m-d',strtotime('-2 days',strtotime($tgel)));            
		        }
		        else{
		            $jatuhtemp =$_POST['jthtemp'];
		        }
		$intrvl = '1 month';
		$jthtgl= date_create($jatuhtemp);
		$jth_1 = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
		$isi_1 = date_format($jth_1,'Y-m-d');
		$jth_2 = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
		$isi_2 = date_format($jth_2,'Y-m-d');

		/*
		$ = $_POST[''];
		$ = $_POST[''];*/

		$yes =
		mysqli_query($conn, "INSERT INTO `dat_leasing`
			(thn_pengada,No_Pol,Rangka,Nomes,thn_pemb,merek,Tipe,Jenis,harga_tunai,leasing,No_kontrak,harga_beli,Depe,tenor,harga_angs,tgl_pajak,tgl_kir,Keterangan,atas_nama,posisi,jenis_leasing)
			 VALUES('$thn','$npol','$rangka','$nomes','$thn_pem','$merek','$tipe','$jenis','$harga_tunai','$leasing','$no_kont','$harga_bel','$depe','$tenor','$angsuran','$pjk','$kir','$ket','$atsnma','$posisi','$mode')") or die(mysqli_error($conn));

		if ($ket == 'LEASING') {
	
				mysqli_query(
					$conn,"INSERT INTO `dat_tenor` (No_pol,angsur,tanggal,status) VALUES 
					('$npol','1','$jatuhtemp','BELUM'),
					('$npol','2','$isi_1','BELUM'),
					('$npol','3','$isi_2','BELUM')"
				) or die(mysqli_error($conn));
		}

		mysqli_query($conn,"INSERT INTO `cek_dat` (tgl,nopol,aksi,petugas) VALUES ('$tgl','$npol','Tambah data: No_pol: $npol, No rangka: $rangka, No mesin: $nomes, Thn: $thn_pem, Merek: $merek, Tipe: $tipe, Jenis: $jenis, Harga beli(Tunai): $harga_tunai, Nama Leasing: $leasing, No kontrak: $no_kont, Tenor: $tenor, Angsuran: $angsuran, ($ket)','$pet')") or die(mysqli_error($conn));
		
		header('location: home.php?yes=$yes');
	}
	if(ISSET($_POST['savee'])){
		$thn = $_POST['pngadn_tnh'];
		$loks = $_POST['lok'];
		$mode ="TANAH";
		            if(!empty($_POST['hartun'])){
                		$harga_tunai = $_POST['hartun'];
		            }
		            else{
		                $harga_tunai ="0";
		            }
		if(empty($_POST['lees'])){ $leasing = "-";} else{ $leasing = $_POST['lees']; }
		if(empty($_POST['nokontrak'])){$no_kont = "-";} else{$no_kont =$_POST['nokontrak'];}
		if(empty($_POST['harbels'])){$harga_bel = 0 + $_POST['hartun'];} else{$harga_bel = $_POST['harbels'] + $_POST['hartun'];}
		if(empty($_POST['depeh'])){$depe = "0";} else{$depe = $_POST['depeh'];}
		if(empty($_POST['tenr'])){$tenor = "0";} else{$tenor = $_POST['tenr'];}
		if(empty($_POST['anges'])){$angsuran = "0";}else{$angsuran = $_POST['anges'];}
		$ket = $_POST['pems'];
		$atsnma = $_POST['atsnma'];
		$tgl = date('Y-m-d');
		$jm = date('H:i:s');
		$pet = $_SESSION['nama'];

			//interval jatuh tempo
		$intrvl = '1 month';
		$jatuhtemp = $_POST['themp'];
		$jthtgl= date_create($jatuhtemp);
		$jth_1 = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
		$isi_1 = date_format($jth_1,'Y-m-d');
		$jth_2 = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
		$isi_2 = date_format($jth_2,'Y-m-d');

		/*
		$ = $_POST[''];
		$ = $_POST[''];*/

		$yes =
		mysqli_query($conn, "INSERT INTO `dat_leasing`
			(thn_pengada,No_Pol,harga_tunai,leasing,No_kontrak,harga_beli,Depe,tenor,harga_angs,Keterangan,atas_nama,jenis_leasing)
			 VALUES('$thn', '$loks', '$harga_tunai', '$leasing', '$no_kont', '$harga_bel', '$depe', '$tenor', '$angsuran', '$ket', '$atsnma', '$mode')") or die(mysqli_error($conn));

		if ($ket == 'LEASING') {
	
				mysqli_query(
					$conn,"INSERT INTO `dat_tenor` (No_pol,angsur,tanggal,status) VALUES 
					('$loks','1','$jatuhtemp','BELUM'),
					('$loks','2','$isi_1','BELUM'),
					('$loks','3','$isi_2','BELUM')"
				) or die(mysqli_error($conn));
		}

		mysqli_query($conn,"INSERT INTO `cek_dat` (tgl,nopol,aksi,petugas) VALUES ('$tgl','$loks','Tambah data: Lokasi: $loks, Harga beli(Tunai): $harga_tunai, Nama Leasing: $leasing, No kontrak: $no_kont, Tenor: $tenor, Angsuran: $angsuran, ($ket)','$pet')") or die(mysqli_error($conn));
		
		header('location: home.php?yes=$yes');
	}
	
?>