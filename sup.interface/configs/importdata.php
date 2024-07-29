<?php 
 
// Load the database configuration file 
include_once '../configs/dbconect.php'; 
 
// Include PhpSpreadsheet library autoloader 
require_once '../vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Reader\Xlsx; 
 
if(isset($_POST['importSubmit'])){ 
     
    // Allowed mime types 
    $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
     
    // Validate whether selected file is a Excel file 
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)){ 
         
        // If the file is uploaded 
        if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
            $reader = new Xlsx(); 
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
            $worksheet = $spreadsheet->getActiveSheet();  
            $worksheet_arr = $worksheet->toArray(); 
 
            // Remove header row 
            unset($worksheet_arr[0]); 
 
            foreach($worksheet_arr as $row){ 
                $dari = $row[0]; 
                $tujuan = $row[1]; 
                $min1_10 = $row[2];
                $kons1_10 = $row[3];
                $kg1_10 = $row[4];
                $min11_20 = $row[5];
                $kons11_20 = $row[6];
                $kg11_20 = $row[7];
                $min21_50 = $row[8];
                $kons21_50 = $row[9];
                $kg21_50 = $row[10];
                $min51_100 = $row[11];
                $kons51_100	= $row[12];
                $kg51_100 = $row[13];
                $min101 = $row[14];
                $kons101 = $row[15];
                $kg101 = $row[16];
                $kubikasi = $row[17];
                $estimasi = $row[18];
 
                // Check whether member already exists in the database with the same email 
                $prevQuery = "SELECT `id` FROM `tarif_prod_6r` WHERE `dari` = '$dari' AND tujuan = '$tujuan'";
                $prevResult = $db->query($prevQuery);
                if($prevResult->num_rows  > 0){ 
                    $fetch = mysqli_fetch_array($prevResult);
                    $id = $fetch['id'];
                    // Update member data in the database 
                    $db->query("UPDATE `tarif_prod_6r` SET `dari` = '".$dari."', `tujuan` = '".$tujuan."', `min1-10` = '$min1_10', `kons1-10` = '$kons1_10', `kg1-10` = '$kg1_10', `min11-20` = '$min11_20', `kons11-20` = '$kons11_20', `kg11-20` = '$kg11_20', `min21-50` = '$min21_50', `kons21-50` = '$kons21_50', `kg21-50` = '$kg21_50', `min51-100` = '$min51_100', `kons51-100` = '$kons51_100', `kg51-100` = '$kg51_100', `min101` = '$min101', `kons101` = '$kons101', `kg101` = '$kg101', `kubikasi` = '$kubikasi', `estimasi` = '$estimasi', `tanggal_rubah` = NOW() WHERE `id` = '$id'"); 
                }else{ 
                    // Insert member data in the database 
                    $db->query("INSERT INTO `tarif_prod_6r` (`dari`, `tujuan`, `min1-10`, `kons1-10`, `kg1-10`, `min11-20`, `kons11-20`, `kg11-20`, `min21-50`, `kons21-50`, `kg21-50`, `min51-100`, `kons51-100`, `kg51-100`, `min101`, `kons101`, `kg101`, `kubikasi`, `estimasi`, `tanggal_rubah` ) VALUES ('$dari', '$tujuan', '$min1_10', '$kons1_10', '$kg1_10', '$min11_20' , '$kons11_20' , '$kg11_20' , '$min21_50' , '$kons21_50' , '$kg21_50' , '$min51_100' , '$kons51_100' , '$kg51_100' , '$min101' , '$kons101' , '$kg101' , '$kubikasi' , '$estimasi' , NOW())"); 
                } 
            } 
             
            $qstring = '?status=succ'; 
        }else{ 
            $qstring = '?status=err'; 
        } 
    }else{ 
        $qstring = '?status=invalid_file'; 
    } 
} 
 
// Redirect to the listing page 
header("Location: ../settings_tarif.php".$qstring); 
 
?>