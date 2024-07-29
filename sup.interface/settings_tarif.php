<?php 
// Load the database configuration file 
include_once 'configs/dbconect.php'; 
include 'nav.php';
// Get status message 
if(!empty($_GET['status'])){ 
    switch($_GET['status']){ 
        case 'succ': 
            $emji = '👍 👍 Great.!!';
            $statusType = 'alert-success'; 
            $statusMsg = 'data has been imported successfully.'; 
            break; 
        case 'err': 
            $emji = '💀 💀 Oh nooo.!!';
            $statusType = 'alert-danger'; 
            $statusMsg = 'Something went wrong, please try again.'; 
            break; 
        case 'invalid_file': 
            $emji = '😱 😱 Daayymmnn.!!!';
            $statusType = 'alert-danger'; 
            $statusMsg = 'Please upload a valid Excel file.'; 
            break; 
        default: 
            $emji = '🐌 🐌 🐌 🐌';
            $statusType = ''; 
            $statusMsg = ''; 
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Import Excel File Data with PHP</title>

<!-- Bootstrap library -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Stylesheet file -->
<link rel="stylesheet" href="assets/style.css">

<style>
    .area_view{
        height: 560px;
    }
</style>
</head>
<body>
    <div class="container-fluid">
        <!-- Display status message -->
        <?php if(!empty($statusMsg)){ ?>
            <div class="row">
                <div class="col p-3">
                    <div class="alert <?= $statusType; ?> alert-dismissible fade show" role="alert">
                      <strong><?= $emji ;?>  </strong> <?= $statusMsg ;?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <!-- Import link -->
            <!-- <div class="col head">
                <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import Excel</a>
            </div> -->
            <!-- Excel file upload form -->
            <div class="col">
                <form action="configs/importdata.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label for="fileInput" class="visually-hidden">File</label>
                            <input type="file" class="form-control" name="file" id="fileInput" required/>
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
                        </div>
                        <div class="col">
                            <a href="configs/export.php" class="btn btn-success" style="background-color:#155F1B;">Export Excel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <input class="form-control mb-2" type="text" id="input" placeholder="cari. ..  .">
            <!-- Data list table -->
            <div class="table-responsive area_view">
                <table class="table table-sm table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Dari</th>
                            <th>Tujuan</th>
                            <th>minimal(1)</th>
                            <th>konst(1)</th>
                            <th>kg(1)</th>
                            <th>minimal(2)</th>
                            <th>konst(2)</th>
                            <th>kg(2)</th>
                            <th>minimal(3)</th>
                            <th>konst(3)</th>
                            <th>kg(3)</th>
                            <th>minimal(4)</th>
                            <th>konst(4)</th>
                            <th>kg(4)</th>
                            <th>minimal(5)</th>
                            <th>konst(5)</th>
                            <th>kg(5)</th>
                            <th>kubikasi m³</th>
                            <th>estimasi</th>
                        </tr>
                    </thead>
                    <tbody id="table">
                    <?php 
                    // Get member rows 
                    $result = $db->query("SELECT * FROM tarif_prod_6r ORDER BY dari ASC"); 
                    if($result->num_rows > 0){ 
                        $i=0; 
                        while($row = $result->fetch_assoc()){ 
                        $i++; 
                    ?>
                        <tr>
                            <td><?= $i; ?> .</td>
                            <td><?= $row['dari']; ?></td>
                            <td><?= $row['tujuan']; ?></td>
                            <td><?= $row['min1-10']; ?></td>
                            <td><?= $row['kons1-10']; ?></td>
                            <td><?= $row['kg1-10']; ?></td>
                            <td><?= $row['min11-20']; ?></td>
                            <td><?= $row['kons11-20']; ?></td>
                            <td><?= $row['kg11-20']; ?></td>
                            <td><?= $row['min21-50']; ?></td>
                            <td><?= $row['kons21-50']; ?></td>
                            <td><?= $row['kg21-50']; ?></td>
                            <td><?= $row['min51-100']; ?></td>
                            <td><?= $row['kons51-100']; ?></td>
                            <td><?= $row['kg51-100']; ?></td>
                            <td><?= $row['min101']; ?></td>
                            <td><?= $row['kons101']; ?></td>
                            <td><?= $row['kg101']; ?></td>
                            <td><?= $row['kubikasi']; ?></td>
                            <td><?= $row['estimasi']; ?></td>
                            <!-- <td><?= $row['rubah_data']; ?></td> -->
                        </tr>
                    <?php } }else{ ?>
                        <tr><td colspan="7">No member(s) found...</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <?php
		include 'footer.php';
		?>
</footer>
</html>