<?php include "nav.php";
$cek_daerah = mysqli_query($conn, "SELECT * FROM `daerah_tarif` ORDER BY `nama_daerah`") or die(mysqli_error($conn));
$cek = $_GET['id'];
$cek2 = $_GET['id1'];
if ($cek) {
  $tipe = "dari";
  $aa = mysqli_query($conn, "SELECT * FROM `cek_dari` WHERE `id` ='$cek'") or die(mysqli_error($conn));
} elseif ($cek2) {
  $tipe = "tujuan";
  $aa = mysqli_query($conn, "SELECT * FROM `cek_tujuan` WHERE `id`='$cek2'") or die(mysqli_error($conn));
}
$mil = mysqli_fetch_assoc($aa);
// $http = 'http://api.bst-ekspres.com/?index=ed';
?>
<section>
  <div class="activity-card">
    <div class="row">
      <div class="form-inline d-flex" style="border-bottom: solid aquamarine 3px;">
        <h4 class="mt-1">
        <?php
          if ($cek) {
            echo 'Edit Data Dari |'. $mil['nama'].'| ';
          } else if ($cek2) {
            echo 'Edit Data tujuan |' . $mil['nama'].'| ';
          }
          ?>
        </h4>
        <a href="tarifs.php" class="btn btn-info btn-sm ml-4">Kembali</a>
      </div>
    </div><br>
    <div class="row">
      <form action="" method="POST">
        <div class="form-inline d-flex">
          <label for="nama" class="ml-1">nama :</label>
          <input type="hidden" name="id" value="<?= $mil['id'] ?>">
          <input id="id_nama" name="nama_lama" class="form-control form-control-sm ml-1" type="hidden" value="<?= $mil['nama'] ?>">
          <input id="nama" name="nama" class="form-control form-control-sm ml-1" type="text" value="<?= $mil['nama'] ?>">
          <label for="kode" class="ml-1">Kode :</label>
          <input id="kode" name="kode" class="form-control form-control-sm ml-1" type="text" value="<?= $mil['kode'] ?>">
          <label for="daerah" class="ml-1">Daerah :</label>
          <select id="daerah" name="daerah" class="form-control" required>
                  <option value="<?= $mil['daerah']?>" selected><?= $mil['daerah']?></option>
                  <?php
                  while ($is = mysqli_fetch_array($cek_daerah)) {
                  ?>
                    <option value="<?= $is['kode'] ?>"><?= $is['nama_daerah'] ?></option>
                  <?php
                  }
                  ?>
                </select>
          <label for="stat" class="ml-1">status :</label>
          <select class="form-control form-control-sm" id="stat" name="stat">
              <option value="<?=$mil['stat']?>" selected ><?=$mil['stat']?></option>
              <option value="aktif">aktif</option>
              <option value="nonaktif">nonaktif</option>
              <option value="tes">tes</option>
          </select>
          <button type="submit" name="ceks" class="btn btn-primary btn-sm ml-4 ceks"><input type="hidden" name="sips" value="<?= $tipe ?>">simpan</button>
        </div>
     </form>
        <?php
       switch(isset($_POST['sips'])){
            case 'dari' :
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $nama_index = $_POST['nama_lama'];
                $kode = $_POST['kode'];
                $daerah = $_POST['daerah'];
                $status = $_POST['stat'];
                
                
                $query = mysqli_query($conn, "UPDATE `cek_dari` SET `kode`='$kode',`nama` = '$nama',`daerah`='$daerah',`stat` ='$status' WHERE `id`='$id'") or die(mysqli_error($conn));
                
                $url = 'http://api.bst-ekspres.com/?edit';
                $data = array('ket' => 'dari','id' => $nama_index, 'nama' => $nama, 'kode' => $kode, 'daerah' => $daerah, 'stat' => $status);
                $ch = curl_init();
        
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                
                // In real life you should use something like:
                // curl_setopt($ch, CURLOPT_POSTFIELDS, 
                //          http_build_query(array('postvar1' => 'value1')));
                
                // Receive server response ...
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
                $result = curl_exec($ch);
                
                curl_close($ch);
                //Execute the request.
                curl_close($curl);
                // ($result == 'OK') ? header("location : tarifs.php?200") : header("location : tarifs.php?500");
                header("Location : ../tarifs.php");
                // echo "<script>window.location.href='tarifs.php?500'</script>";
                break;
            case 'tujuan' :
                $id = $_POST['id'];
                    $nama = $_POST['nama'];
                    $nama_index = $_POST['nama_lama'];
                    $kode = $_POST['kode'];
                    $daerah = $_POST['daerah'];
                    $status = $_POST['stat'];
        
                    mysqli_query($conn, "UPDATE `cek_tujuan` SET `kode`='$kode',`nama` = '$nama',`daerah`='$daerah',`stat` ='$status' WHERE `id`='$id'") or die(mysqli_error($conn));
                        echo "<script>window.location.href='../tarifs.php?500';</script>";
                    $url = 'http://api.bst-ekspres.com/?edit';
                    $data = array('ket' => 'tujuan','id' => $nama_index, 'nama' => $nama, 'kode' => $kode, 'daerah' => $daerah, 'stat' => $status);
                    $ch = curl_init();
        
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    
                    // In real life you should use something like:
                    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
                    //          http_build_query(array('postvar1' => 'value1')));
                    
                    // Receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                    $result = curl_exec($ch);
                    
                    curl_close($ch);
                    //Execute the request.
                    curl_close($curl);
                        // ($result != "OK") ? $redirect = "<script>window.location.href='../tarifs.php?500';</script>" : $redirect = "<script>window.location.href='../tarifs.php?200';</script>";
                        // header("location : ../tarifs.php");
                break;
        }
        ?>
    </div>
  </div>
</section>

<?php include "footer.php"; ?>