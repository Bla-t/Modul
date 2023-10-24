<?php
include "nav.php";
$gaji_awal = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` = '2'");
$ga = mysqli_fetch_assoc($gaji_awal);
$um_awal = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id` = '1'");
$u = mysqli_fetch_assoc($um_awal);
// $tabel = mysqli_query($conn, "SELECT * FROM `gaji_daftar`") or die(mysqli_error($conn));
// $cekis = mysqli_fetch_assoc($tabel);
// $date = date('Y-m-d');
// if ($date = $cekis['est_naik']) {
//   //settt
//   $jabplus = $cekis['masa_kerja'];
//   $dateup = date_create($cekis['est_naik']);
//   date_add($dateup, date_interval_create_from_date_string('1year'));
//   $setup = date_format($dateup, 'Y-m-d');
//   //update_database
//   // mysqli_query($conn, "UPDATE `gaji_daftar` SET `masa_kerja` + 1, `est_naik`='$setup' WHERE `est_naik`='$date'") or die(mysqli_error($conn));
// } else {
//   echo "errrrrrr";
// }
?>
<section>
  <div class="activity-card">
    <div class="form-inline d-flex">
      <h3>Data Karyawan </h3>
      <!--<button class="btn btn-sm btn-info ml-1 mb-1" data-toggle="modal" data-target="#myModal">tambah</button>-->
    </div>
    <div class="col">
      <div class="form-inline d-flex">
        <input class="form-control form-control-sm mb-2" type="text" id="myInpt" placeholder="cari">
      </div>
    </div><br>
    <!--tabel  -->
    <div class="col">
      <div class="x-scroll">
        <div class="div1"></div>
      </div>
      <div class="x-scroll2">
        <div class="table-responsive table-sm div2">
          <table class="table table-hover" id="respon">
            <thead class="thead-dark">
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat </th>
                <th>Pendidikan Terakhir</th>
                <th>NIB</th>
                <th>Cabang</th>
                <th>Jabatan</th>
                <th>kode jabatan</th>
                <th>Masa Kerja</th>
                <th>tahun bergabung</th>
                <th>Gaji</th>
                <th>UM / Hari</th>
                <th>BPJS kesehatan</th>
                <th>BPJS jht</th>
                <th>Kas Bon</th>
                <th>status</th>
                <th>keterangan</th>
                <th>aksi</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="myTabl">
              <?php
              $no = 1;
              $tabel1 = mysqli_query($conn, "SELECT * FROM `daftar_pegawai` ORDER BY `id` ASC") or die(mysqli_error($conn));
              while ($lup = mysqli_fetch_array($tabel1)) {

                $kode = '00' . $lup['ko_jbtn'];

                /// gaji pokok
                $gajii = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='2'");
                $gaji_pk = mysqli_fetch_assoc($gajii);

                //kenaikan /thun
                $gaji = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='3'");
                $tm_g = mysqli_fetch_assoc($gaji);

                //tunjangan gaji
                $tunjg = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `golongan` = '$kode'");
                $t_gaji = mysqli_fetch_assoc($tunjg);

                //get kebutuhan um
                //um interval
                $msakrj = $lup['ms_krj'];
                $r = mysqli_query($conn, "SELECT * FROM `gaji_tmbahum`");
                $num = mysqli_num_rows($r);
                if ($num > 0) {
                  while ($row = mysqli_fetch_assoc($r)) {
                    $arrum[] = array('masa' => $row['msa_krja'], 'nom' => $row['nominal']);
                  }
                }

                //um pokok
                $ums = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id` ='1'");
                $nilums = mysqli_fetch_assoc($ums); //tambahan um

                //tunjangan
                $tunjum = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `golongan` ='$kode'");
                $tunj_um = mysqli_fetch_assoc($tunjum);

                ///hitungs
                $gjs = ($tm_g['tonase'] * $msakrj) + $gaji_pk['tonase'] + $t_gaji['tunjangan'];

                $um = $nilums['tonase'] + $tunj_um['tunjangan'] + $arrum[$msakrj]['nom'];

                if ($lup['status'] == "tidak") {
                  echo '<tr style="background-color:#760000;">';
                } else if ($lup['status'] == "cuti") {
                  echo '<tr style="background-color:#CE6100;">';
                } else {
                  echo '<tr>';
                }
              ?>
                <form action="" method="POST">
                  <td><?= $no++ ?>.</td>
                  <td><?= $lup['nama'] ?></td>
                  <td style="font-size: 0.8rem;"><?= $lup['alamat']; ?></td>
                  <td><?= $lup['pddk'] ?></td>
                  <td><?= $lup['nib'] ?></td>
                  <td><?= $lup['cbg'] ?></td>
                  <td><?= $lup['jbtn'] ?></td>
                  <td>00<?= $lup['ko_jbtn'] ?></td>
                  <td><?= $lup['ms_krj'] ?> thn</td>
                  <td><?= $lup['th_gb'] ?></td>
                  <td><?= rupiah($gjs) ?></td>
                  <td><?= rupiah($um) ?></td>
                  <td><?= rupiah($lup['bpjs_k']) ?></td>
                  <td><?= rupiah($lup['bpjs_jht']) ?></td>
                  <td><?= rupiah($lup['kas_bon']) ?></td>
                  <td><?= $lup['status'] ?></td>
                  <?php
                  if (empty($lup['keterangan'])) {
                    $ket = '-';
                  } else {
                    $ket =  $lup['keterangan'];
                  }

                  ?>
                  <td><?= $ket ?></td>
                  <td>
                    <a href="../gaji/edit_pegawai.php?id=<?= $lup['id']; ?>" class="btn btn-sm btn-outline-warning aksi" ><span class="ti-settings"></span></a>
                  </td>
                  <td>
                    <a href="updell.php?id=<?= $lup['id']; ?>" class="btn btn-sm btn-outline-danger ml-1 haphap" id="haphap"><span class="ti-trash"></span></a>
                  </td>
                </form>
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
  <!-- modals -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pegawai</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="POST">
            <div class="form-row">
              <div class="col">
                <label for="nama"> Nama : </label>
                <input type="text" id="nama" name="nama" class="form-control" required>
              </div>
              <div class="col">
                <label for="degre"> Pendidikan Terakhir : </label>
                <input type="text" id="degre" name="pddk" class="form-control" required>
              </div>
              <div class="col">
                <label for="gol"> golongan : </label>
                <select type="date" id="gol" name="slec" class="form-control" required>
                  <option value="" selected disabled> pilih</option>
                  <option value="baru">staff baru</option>
                  <option value="staff">staff</option>
                  <option value="nonstaff">nonstaff</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="join"> Tanggal Masuk : </label>
                <input type="date" id="join" name="tgl" class="form-control" required>
              </div>
              <div class="col">
                <label for="NIB"> NIB : </label>
                <input type="text" id="NIB" name="nib" class="form-control" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="alamat"> Alamat : </label>
                <textarea type="text" id="alamat" name="almt" class="form-control" required></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="cabang"> Cabang : </label>
                <input type="text" id="cabang" name="cbg" class="form-control" required>
              </div>
              <div class="col">
                <?php
                $ceks = mysqli_query($conn, "SELECT * FROM `gaji_jabatan` ORDER BY `id`");
                ?>
                <label for="jabatan"> Jabatan : </label>
                <select class="form-control" name="jbtn" id="jabatan" required>
                  <option value="" selected disabled>pilih jabatan</option>
                  <?php
                  while ($jab = mysqli_fetch_array($ceks)) {
                  ?>
                    <option value="<?= $jab['kode'] . $jab['jabatan']; ?>"><?= $jab['jabatan'] . '||' . $jab['kode']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" id="acc" name="tambah_karyawan" class="btn btn-outline-primary btn-sm">simpan</button>
          <?php
          if (isset($_POST['tambah_karyawan'])) {
            $th = date('Y');
            $mth = date('m');
            $name = $_POST['nama'];
            $pddk = $_POST['pddk'];
            $join = $_POST['tgl'];
            $mnth = date('m', strtotime($join));

            $sstm = date('m-d', strtotime($join));

            if ($_POST['slec'] == "nonstaff") {
              $gabsn = $_POST['tgl'];
              $jo_in = date('Y-m-d');
              $tipe = "nonstaff";
              if ($mth != $mnth) {
                $masuk = ($th - date('Y', strtotime($join))) - 1;
                $ms_krj = round($masuk, 0, PHP_ROUND_HALF_DOWN);
              } else {
                $masuk = ($th - date('Y', strtotime($join))) - 1;
                $ms_krj = round($masuk, 0, PHP_ROUND_HALF_DOWN);
              }
              $esstmss = date('Y') - 1 . '-' . $sstm;
            } else if ($_POST['slec'] == "staff") {
              $gabsn = '0000-00-00';
              $jo_in = $_POST['tgl'];
              $tipe = "staff";
              if ($mth != $mnth) {
                $ms_krj = ($th - date('Y', strtotime($join))) - 1;
              } else {
                $ms_krj = ($th - date('Y', strtotime($join))) - 1;
              }
              $esstmss = date('Y') - 1 . '-' . $sstm;
            } else {
              $gabsn = '0000-00-00';
              $jo_in = $_POST['tgl'];
              $tipe = "staff";
              $ms_krj = $th - date('Y', strtotime($join));
              $esstmss = date('Y') . '-' . $sstm;
            }
            $nib = $_POST['nib'];
            $almt = $_POST['almt'];
            $cbg = $_POST['cbg'];
            $ko = $_POST['jbtn'];
            $jbtn = substr($ko, 3);
            $ko_jbtn = substr($ko, 0, 3);

            //estimasi kenaikan
            $date = date_create(date('Y-m-d', strtotime($esstmss)));
            date_add($date, date_interval_create_from_date_string('1 year'));
            $est_naik = date_format($date, 'Y-m-d');

            mysqli_query($conn, "INSERT INTO `daftar_pegawai` (nama,alamat,pddk,nib,cbg,jbtn,ko_jbtn,ms_krj,tipe,gb_nonstaff,th_gb,est_naikgaji,status) VALUE('$name','$almt','$pddk','$nib','$cbg','$jbtn','$ko_jbtn','$ms_krj','$tipe','$gabsn','$jo_in','$est_naik','aktif')") or die(mysqli_error($conn));
            echo '<script>window.location.href="daftar.php?akoens=yups";</script>';
          }
          ?>
          </form>
          <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>

    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#myInpt").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTabl tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
      $("#myInpt").focus();
    });
    $(function() {
      $(".x-scroll").scroll(function() {
        $(".x-scroll2").scrollLeft($(".x-scroll").scrollLeft());
      });
      $(".x-scroll2").scroll(function() {
        $(".x-scroll").scrollLeft($(".x-scroll2").scrollLeft());
      });
    });
  </script>
</section>

<?php
include "footer.php";

?>