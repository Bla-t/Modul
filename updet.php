<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	include 'config.php';
	session_start();	
	if(empty($_SESSION['levl']) && empty($_SESSION['pass'])){
			header("location:index.php?pesan=gagal");
		}
	date_default_timezone_set('Asia/Jakarta');


	if(isset($_POST['SAV'])){
		$id1 = $_POST['idida'];
		$idi2 = $_POST['idi'];				
		$ganplat =$_POST['plato'];
		$tgl_tran = date('Y-m-d H:i:s');	
		$tenor = $_POST['ten'];	
		$angsuran = $_POST['buy'];
		$pet = $_SESSION['nama'];
		    $angsur = mysqli_query($conn,"SELECT * FROM `dat_tenor` WHERE `id` ='$idi2'") or die(mysqli_error($conn));
		     $id_angsur = mysqli_fetch_assoc($angsur);
				if(!empty($idi2)){
					$sisang = $_POST['sis']+1;
					$keb = $id_angsur['angsur'];
					
					$intrvl = '1 month';
					$jatuhtemp = $_POST['tangtam'];
					$jthtgl= date_create($jatuhtemp);
					$jth_1 = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
					$isi_1 = date_format($jth_1,'Y-m-d');
					$jth_2 = date_add($jthtgl,date_interval_create_from_date_string($intrvl));
					$isi_2 = date_format($jth_2,'Y-m-d');
					$ten1 =$_POST['angke'] + 1;
					$ten2 =$_POST['angke'] + 2;

					mysqli_query(
					$conn,"INSERT INTO `dat_tenor` (No_pol,angsur,tanggal,status) VALUES 
					('$ganplat','$ten1','$isi_1','BELUM'),
					('$ganplat','$ten2','$isi_2','BELUM')"
    				) or die(mysqli_error($conn));
					
				}
				else if(empty($idi2)){
					$sisang = $_POST['sisang'];
				}
		
				if ($sisang == $tenor) {
				$ket = 'LUNAS';

				mysqli_query($conn,"DELETE FROM `dat_tenor` WHERE `No_pol`='$ganplat' AND `angsur`>'$tenor'")or die(mysqli_error($conn));

				} 
				else if($sisang !== $_POST['ten']){
				$ket = 'LEASING';
				}
			$jep = $_POST['jetip'];
                
                $rand = rand();
                $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    			$nama = $_FILES['file']['name'];
    			$x = explode('.', $nama);
    			$ekstensi = strtolower(end($x));
    			$ukuran	= $_FILES['file']['size'];
    			$file_tmp = $_FILES['file']['tmp_name'];
    			$xx=$rand.'_'.$nama;
    			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    				if($ukuran < 2044070 && $jep == "ARMADA"){			
    					move_uploaded_file($file_tmp, 'gamb/leasArmada/'.$rand.'_'.$nama);
    					
    				}
    				else if($ukuran < 2044070 && $jep == "TANAH"){
    					move_uploaded_file($file_tmp,'gamb/leasTanah/'.$rand.'_'.$nama);
    					
    				}
    				else{
                        echo" ukuran terlalu besar. . !!";    				    
    				}
    			}
    			else{
    			    echo"jenis tidak di perbolehkan";
    			}
    			   
    			   
    			
                
                mysqli_query($conn,"UPDATE `dat_tenor` SET `status`='$angsuran', `tgl_byr`='$tgl_tran', `file_gambar`='$xx' WHERE `id`='$idi2'") or die(mysqli_error($conn));
               
        		mysqli_query($conn,"UPDATE `dat_leasing` SET `angs_tercicil`='$sisang',`Keterangan` = '$ket' WHERE `product_id` ='$id1'") or die(mysqli_error($conn));
        		
        		 mysqli_query($conn,"INSERT INTO `cek_dat` (tgl,nopol,aksi,petugas) VALUES ('$tgl_tran','$ganplat','Bayar Angsuran ke $keb','$pet') ") or die(mysqli_error($conn));
         				
        		
        		header("location:home.php?aye=aye");
                		/*
		$ = $_POST[''];
		$ = $_POST[''];*/
	
		///keterangan
    
		///record
    // 	mysqli_query($koneksi,"INSERT INTO dat_leasing SET status='', tgl_byr='', minim3='$minim' WHERE id='$id'");
    	
    
	}
	
	if (isset($_POST['saver'])) {
		$id1 = $_POST['idida'];
		$ganplat =$_POST['plato'];
                  if(!empty($_POST['pjak'])){     
                      
                		$pjk = $_POST['pjak'];
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
    		      if(!empty($_POST['nojikir'])){
                    $nojikir= $_POST['nojikir'];
    		      }
    		      else{
    		          $nojikir = "0";
    		      }
		$tgl_tran = date('Y-m-d H:i:s');
		$pet = $_SESSION['nama'];
		$yes=
		mysqli_query($conn,"UPDATE `dat_leasing` SET `tgl_pajak`='$pjk', `tgl_kir`='$kir', `no_uji_kir`='$nojikir' WHERE `product_id` ='$id1'") or die(mysqli_error($conn));

		mysqli_query($conn,"INSERT INTO `cek_dat` (tgl,nopol,aksi,petugas) VALUES ('$tgl_tran','$ganplat','Rubah Jatuh tempo => Pajak : $pjk, Kir : $kir, No.uji_kir : $nojikir','$pet') ") or die(mysqli_error($conn));

		header('location: home.php?eye=$yes');

	}

	if (isset($_POST['savest'])) {
		$tgl_tran = date('Y-m-d H:i:s');
		$pet = $_SESSION['nama'];
		$id1 = $_POST['idida'];
		$ganplat =$_POST['plato'];
		$atsnma = $_POST['NAM'];
		$posisi = $_POST['POS'];
		$dol =$_POST['harga'];
		$tglhar=$_POST['tgl_harga'];
		        	if(!empty($dol)){
						$ket = 'TERJUAL';
						mysqli_query($conn,"DELETE FROM `dat_tenor` WHERE  `No_Pol`='$ganplat' AND `status`='BELUM'") or die(mysqli_error($conn));
						}
				else{
				    $ket ='LEASING';
				}
		$yes=
		mysqli_query($conn,"UPDATE `dat_leasing` SET  `No_Pol`='$ganplat', `atas_nama`='$atsnma', `posisi`='$posisi', `harga_jual`='$dol',`Keterangan` ='$ket',`tgl_jual` = '$tglhar' WHERE `product_id` ='$id1'") or die(mysqli_error($conn));

		mysqli_query($conn,"INSERT INTO `cek_dat` (tgl,nopol,aksi,petugas) VALUES ('$tgl_tran','$ganplat','Rubah Keterangan ==> Plat nomor : $ganplat, Atas Nama : $atsnma, Posisi : $posisi, Harga Jual: $dol, Tanggal Jual : $tglhar', '$pet') ") or die(mysqli_error($conn));

				header('location: home.php?uye=$yes');
	}
	
		
	 function rupiah($angka){
	
	$hasil_rupiah = "Rp." . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
	}
?>