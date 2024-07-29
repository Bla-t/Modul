<?php 
 
// Load the database configuration file 
include_once '../configs/dbconect.php'; 
 
// Include XLSX generator library 
require_once '../assets/PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "Data_Tarif_Operasional__" . date('Y-m-d') . ".xlsx"; 
 
// Define column names 
$excelData[] = array('dari','tujuan','min1-10'	,'kons1-10'	,'kg1-10','min11-20','kons11-20','kg11-20','min21-50','kons21-50','kg21-50','min51-100','kons51-100','kg51-100','min101','kons101','kg101','kubikasi','estimasi','last_update'); 
 
// Fetch records from database and store in an array 
$query = $db->query("SELECT * FROM tarif_prod_6r ORDER BY id ASC"); 
if($query->num_rows > 0){ 
    // $num = 1;
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['dari'], $row['tujuan'], $row['min1-10'], $row['kons1-10'], $row['kg1-10'], $row['min11-20'],$row['kons11-20'], $row['kg11-20'], $row['min21-50'], $row['kons21-50'], $row['kg21-50'], $row['min51-100'], $row['kons51-100'], $row['kg51-100'], $row['min101'], $row['kons101'], $row['kg101'], $row['kubikasi'], $row['estimasi'], $row['tanggal_rubah']);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>