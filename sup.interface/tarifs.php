<?php
include "nav.php";
$cek = mysqli_query($conn, "SELECT * FROM `daerah_tarif` ORDER BY `nama_daerah`") or die(mysqli_error($conn));
?>
<section>
  <div class="activity-card">
    <h3>EDIT || TAMBAH DAERAH TARIF</h3>
    <div class="row">
      <div class="col">
        <div class="form-inline d-flex">
          <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="modal" data-target="#tambah">tambah</button>
          <a href="tambahdaerah.php" class="btn btn-warning btn-sm ml-1"><span class="ti-plus" style="font-weight:bold;"></span> daerah</a>
        </div>
      </div>
    </div>
    <!-- The Modal dari -->
    <div class="modal fade" id="tambah">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tambah ||</h4>
            <form action="" method="POST">
              <select class="form-control form-control-sm" name="pilihan" id="pilihan" required>
                <option value="">pilih</option>
                <option value="dari">Dari</option>
                <option value="tujuan">Tujuan</option>
              </select>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-row">
              <div class="col">
                <label for="nama"> Nama cabang : </label>
                <input type="text" id="nama" name="nama" class="form-control" required>
              </div>
              <div class="col">
                <label for="user"> kode : </label>
                <input type="text" id="user" name="kode" class="form-control capslock" required>
              </div>
              <div class="col">
                <label for="lvl"> daerah : </label>
                <select id="lvl" name="daerah" class="form-control" required>
                  <option value="" selected disabled>Pilih</option>
                  <?php
                  while ($is = mysqli_fetch_array($cek)) {
                  ?>
                    <option value="<?= $is['kode'] ?>"><?= $is['nama_daerah'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col">
                  <label for="stat">stat</label>
                  <select id="stat" name="stat" class="form-control" required>
                      <option value="">pilih</option>
                      <option value="aktif">aktif</option>
                      <option value="nonaktif">nonaktif</option>
                  </select>
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" name="tambpil" class="btn btn-primary btn-sm">simpan</button>
            <?php
            if (isset($_POST['tambpil'])) {
              $id = rand(340,604);
              $kode = $_POST['kode'];
              $nama = $_POST['nama'];
              $daerah = $_POST['daerah'];
              $stat = $_POST['stat'];
              if ($_POST['pilihan'] == "dari") {
                mysqli_query($conn, "INSERT INTO `cek_dari` (id,kode,nama,daerah,stat) VALUE('$id','$kode','$nama','$daerah','$stat')") or die(mysqli_error($conn));
                
                //API//
                $url = 'http://api.bst-ekspres.com';
                $data = array('ket_insert' => 'dari','id'=> $id,'kode' => $kode, 'nama' => $nama, 'daerah' => $daerah, 'stat' => $stat);
                
                // use key 'http' even if you send the request to https://...
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data)
                    )
                );
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                if ($result === FALSE) { $vardump = var_dump($result); }
                
              } else if ($_POST['pilihan'] == "tujuan") {
                mysqli_query($conn, "INSERT INTO `cek_tujuan` (id,kode,nama,daerah,stat) VALUE('$id','$kode','$nama','$daerah','$stat')") or die(mysqli_error($conn));
                
                //API//
                $url = 'http://api.bst-ekspres.com';
                $data = array('ket_insert' => 'tujuan','id' => $id,'kode' => $kode, 'nama' => $nama, 'daerah' => $daerah, 'stat' => $stat);
                
                // use key 'http' even if you send the request to https://...
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data)
                    )
                );
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                if ($result === FALSE) { var_dump($result); }
              }
              echo "<script>window.location.href='tarifs.php?tar=yay';</script>";
              exit;
            }
            ?>
            </form>
            <button type="button" class="btn btn-warning btn-sm" id="tdk" data-dismiss="modal">Batal</button>
          </div>

        </div>
      </div>
    </div><br>
    <div class="row d-flex">
      <div class="col">
        <h4>Dari</h4>
        <input class="form-control mb-2" type="text" id="input" placeholder="cari. ..  .">
        <div class="table table-responsive scroll">
          <table class="table-hover">
            <thead class="thead-dark">
              <tr>
                <th>no</th>
                <th>nama</th>
                <th>kode</th>
                <th>daerah</th>
                <th>status</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody id="table">
              <?php
              $no = 1;
              $dari = mysqli_query($conn, "SELECT * FROM `cek_dari`") or die(mysqli_error($conn));
              while ($isi = mysqli_fetch_array($dari)) {
              ?>
                <tr>
                    <td><?= $no++ ?>. </td>
                    <td><?= $isi['nama'] ?></td>
                    <td><?= $isi['kode'] ?></td>
                    <td><?= $isi['daerah'] ?></td>
                    <td><?= $isi['stat'] ?></td>
                    <td class="d-flex">
                      <a href="edit_daritujuan.php?id=<?= $isi['id'] ?>" class="btn btn-sm btn-outline-warning">
                        <span class="ti-settings">
                          </span>
                      </a>
                      <a href="updell.php?hapusdari&id_dari=<?=$isi['id']?>&name=<?=$isi['nama']?>" class="btn btn-sm btn-outline-danger ml-1 del">
                        <span class="ti-trash">
                          </span>
                      </a>
                      <!--<button class="btn btn-sm btn-outline-danger ml-1 del" name="tomhap">-->
                      <!--  <input type="hidden" name="hapusdari" value="<?= $isi['nama'] ?>">-->
                      <!--  <spa class="ti-trash"></span>-->
                      <!--</button>-->
                    </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col">
        <h4>Tujuan</h4>
        <input class="form-control mb-2" type="text" id="input1" placeholder="cari. ..  .">
        <div class="table table-responsive scroll">
          <table class="table-hover table-sm">
            <thead class="thead-dark">
              <tr>
                <th>no</th>
                <th>nama</th>
                <th>kode</th>
                <th>daerah</th>
                <th>status</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody id="table1">
              <?php
              $no = 1;
              $tujuan = mysqli_query($conn, "SELECT * FROM `cek_tujuan`") or die(mysqli_error($conn));
              while ($isi2 = mysqli_fetch_array($tujuan)) {
              ?>
                <tr>
                    <td><?= $no++ ?>. </td>
                    <td><?= $isi2['nama'] ?></td>
                    <td><?= $isi2['kode'] ?></td>
                    <td><?= $isi2['daerah'] ?></td>
                    <td><?= $isi2['stat'] ?></td>
                    <td class="d-flex">
                      <a href="edit_daritujuan.php?id1=<?= $isi2['id'] ?>" class="btn btn-outline-warning btn-sm"><span class="ti-settings"></span></a>
                      <a href="updell.php?hapustujuan&id_tujuan=<?= $isi2['id'] ?>&name=<?=$isi2['nama']?>" class="btn btn-outline-danger btn-sm ml-1 delh"><span class="ti-trash"></span></a>
                      <!--<button class="btn btn-outline-danger btn-sm ml-1 delh" name="tombha"><input type="hidden" name="hapustujuan" value="<?= $isi2['id'] ?>"><span class="ti-trash"></span></button>-->
                    </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include "footer.php";
?>