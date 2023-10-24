<?php
include "header.php";
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
    <div class="col">
      <div class="row">
        <div class="col">
          <div class="form-inline d-flex">
            <h3>Daftar Data Karyawan Staff</h3>
            <!-- <button class="btn btn-sm btn-info ml-2 mb-2" data-toggle="modal" data-target="#myModal">tambah</button> -->
          </div>
        </div>
      </div><br>
      <form action="" method="post">
        <div class="row">
          <div class="col">
            <div class="form-inline d-flex">
              <a href="daftar.php" class="btn btn-sm btn-primary"> Staff</a>
              <a href="daft_nonstaf.php" class="btn btn-sm btn-info ml-2">Nonstaff</a>
            </div>
          </div>
          <div class="form-inline d-flex">
            <div class="col">
              <input class="form-control form-control-sm" type="text" id="myInpt" placeholder="cari">
              <select name="filter" id="filter" class="form-control form-control-sm" onchange="this.form.submit();">
                <option value="" selected disabled>filter per cabang</option>
                <?php
                $filt = mysqli_query($conn, "SELECT `cbg` FROM `daftar_pegawai` WHERE `tipe` ='staff' GROUP BY `cbg` ORDER BY MIN(`cbg`) ASC") or die(mysqli_error($conn));
                while ($isfilt = mysqli_fetch_array($filt)) {
                ?>
                  <option value="<?= $isfilt['cbg']; ?>"><?= $isfilt['cbg']; ?></option>
                <?php
                };
                ?>
              </select>
              <!-- <input class="form-control form-control-sm ml-2" type="text" placeholder="filter"> -->
            </div>
          </div>
        </div><br>
      </form>
    </div>
    <!--jika netnot || bener(tertambahkan) -->
    <div class="col">
      <?php
      if (isset($_GET['akoens'])) {
        if ($_GET['akoens'] == 'netnot') {
      ?>
          <div class="alert alert-danger alert-dismissible fade show text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><strong>NIB di temukan</strong> data Karyawan sudah ada</p>
          </div>
        <?php
        } else if ($_GET['akoens'] == 'yups') {
        ?>
          <div class="alert alert-success alert-dismissible fade show text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><strong>NIB berhasil di buat</strong> data Karyawan Berhasil di buat </p>
          </div>
      <?php
        }
      }
      ?>
    </div>
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
                <th>NIB</th>
                <th>Nama</th>
                <th>ttl.</th>
                <th>Umur</th>
                <th>Alamat KTP</th>
                <th>Alamat Sekarang</th>
                <th>KK/KTP</th>
                <th>No.HP</th>
                <th>Pendidikan Terakhir</th>
                <th>Nama Pasangan</th>
                <th>Jumlah Anak</th>
                <th>Cabang</th>
                <th>Jabatan</th>
                <th>kode jabatan</th>
                <th>Masa Kerja</th>
                <th>tahun bergabung</th>
                <th>Gaji</th>
                <th>UM / Hari</th>
                <!-- <th>BPJS kesehatan</th>
                <th>BPJS jht</th>
                <th>Kas Bon</th> -->
                <th>status</th>
                <th>keterangan</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody id="myTabl">
              <?php
              if (isset($_POST['filter'])) {
                $tabel1 = mysqli_query($conn, "SELECT * FROM `daftar_pegawai` WHERE `cbg` = '$_POST[filter]' AND `tipe` ='staff' ORDER BY `nib` ASC ") or die(mysqli_error($conn));
              }
              if (!isset($_POST['filter'])) {
                $tabel1 = mysqli_query($conn, "SELECT * FROM `daftar_pegawai` WHERE `tipe` ='staff' ORDER BY `nib` ASC") or die(mysqli_error($conn));
              }
              $no = 1;
              while ($lup = mysqli_fetch_array($tabel1)) {
                  
                //hitung umur
                $tgllhir = new DateTime($lup['tgl_lahir']);
                $noe = new DateTime();
                $umur = $noe->diff($tgllhir);
                if($lup['tgl_lahir'] =='0000-00-00'){
                    $age = '-';
                }else{
                    $age = $umur->y;
                }
                
                //ttl
                if(empty($lup['tmpt_l']) && $lup['tgl_lahir'] == '0000-00-00'){
                   $ttl= '-';
                }else{
                   $ttl= $lup['tmpt_l'] . '. ' . tgl($lup['tgl_lahir']);
                    
                }

                //kode jabatan
                $kode = '00' . $lup['ko_jbtn'];

                /// gaji pokok
                $gajii = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='2' AND `tipe` ='staff'");
                $gaji_pk = mysqli_fetch_assoc($gajii);

                //kenaikan /thun
                $gaji = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='3' AND `tipe` ='staff'");
                $tm_g = mysqli_fetch_assoc($gaji);

                //tunjangan gaji
                $tunjg = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `golongan` = '$kode' AND `tipe` ='staff'");
                $t_gaji = mysqli_fetch_assoc($tunjg);

                //get kebutuhan um
                //um interval
                $msakrj = $lup['ms_krj'];
                $r = mysqli_query($conn, "SELECT * FROM `gaji_tmbahum` WHERE `tipe` ='staff'");
                $num = mysqli_num_rows($r);
                if ($num > 0) {
                  while ($row = mysqli_fetch_assoc($r)) {
                    $arrum[] = array('masa' => $row['msa_krja'], 'nom' => $row['nominal']);
                  }
                }

                //um pokok
                $ums = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id` ='1' AND `tipe` ='staff'");
                $nilums = mysqli_fetch_assoc($ums); //tambahan um

                //tunjangan
                $tunjum = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `golongan` ='$kode' AND `tipe` ='staff'");
                $tunj_um = mysqli_fetch_assoc($tunjum);

                ///hitungs
                $gjs = ($tm_g['tonase'] * $msakrj) + $gaji_pk['tonase'] + $t_gaji['tunjangan'];

                $um = $nilums['tonase'] + $tunj_um['tunjangan'] + $arrum[$msakrj]['nom'];

                if ($lup['status'] == "Resign") {
                  echo '<tr style="background-color:#FF482E;">';
                } /*else if ($lup['status'] == "cuti") {
                  echo '<tr style="background-color:#FFF1B2;">';
                }*/ else {
                  echo '<tr>';
                }
              ?>
                <form action="index.php" method="POST">
                  <td><?= $no++ ?>.</td>
                  <td><?= $lup['nib'] ?></td>
                  <td>
                    <a href="edit_pegawai.php?id=<?= $lup['id']; ?>&&tipe=<?= $lup['tipe']; ?>" style="font-weight:bolder; text-decoration:none; color:#4B4B4B;"><?= $lup['nama'] ?></a>
                  </td>
                  <td><?= $ttl; ?></td>
                  <td style="font-size: 0.8rem;"><?= $age ?> thn</td>
                  <td style="font-size: 0.8rem;"><?= $lup['almt_ktp']; ?>.</td>
                  <td style="font-size: 0.8rem;">
                    <?php
                    if ($lup['alamat'] == "-") {
                      echo $lup['almt_ktp'];
                    } else if (empty($lup['alamat'])) {
                      echo '-';
                    } else {
                      echo $lup['alamat'];
                    }
                    ?>
                  </td>
                  <!-- <td style="font-size: 0.8rem;"></td> -->
                  <td style="font-size: 0.8rem;">
                    <p><?= substr($lup['kk_ktp'], 0, 16) . '/ <br> ' . substr($lup['kk_ktp'], 17); ?></p>
                  </td>
                  <td><?= $lup['n_hp'] ?></td>
                  <td><?= $lup['pddk'] ?></td>
                  <td><?= $lup['nma_psng'] ?></td>
                  <td><?= $lup['juml_anak'] ?> Orang</td>
                  <td><?= $lup['cbg'] ?></td>
                  <td><?= $lup['jbtn'] ?></td>
                  <td>00<?= $lup['ko_jbtn'] ?></td>
                  <td><?= $lup['ms_krj'] ?> thn</td>
                  <td><?= $lup['th_gb'] ?></td>
                  <td><?= rupiah($gjs) ?></td>
                  <td><?= rupiah($um) ?></td>
                  <!-- <td><?= rupiah($lup['bpjs_k']) ?></td>
                  <td><?= rupiah($lup['bpjs_jht']) ?></td>
                  <td><?= rupiah($lup['kas_bon']) ?></td> -->
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
                    <a href="edit_pegawai.php?id=<?= $lup['id']; ?> &&tipe=<?= $lup['tipe']; ?>" class="btn btn-sm aksi" style="background-color:#9DCBB8 ;"><span class="bx bxs-cog"></span></a>
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

  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content" style="background-color: #9AB7AE;">

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
          <button type="submit" id="acc" name="tambah_karyawan" class="btn btn-primary btn-sm">simpan</button>
          <?php
          if (isset($_POST['tambah_karyawan'])) {
            //isi post method
            $nib = $_POST['nib'];
            $th = date('Y');
            $mth = date('m');
            $name = $_POST['nama'];
            $pddk = $_POST['pddk'];
            $join = $_POST['tgl'];
            $almt = $_POST['almt'];
            $cbg = $_POST['cbg'];
            $ko = $_POST['jbtn'];
            $mnth = date('m', strtotime($join));
            $yth = date('Y', strtotime($join));
            $sstm = date('m-d', strtotime($join));

            ///cek ada sama tidak
            $cesk = mysqli_query($conn, "SELECT COUNT(nib) AS 'jlh' FROM `daftar_pegawai` WHERE `nib` = '$nib'") or die(mysqli_error($conn));
            $jlh = mysqli_fetch_assoc($cesk);


            if ($jlh['jlh'] > 0) {
              //jika ada sama
              echo '<script>window.location.href="daftar.php?akoens=netnot";</script>';
            } else {
              ////jika tidak ada sama
              if ($_POST['slec'] == "promosi") {

                $gabsn = $_POST['tgl'];
                $jo_in = date('Y-m-d');
                $tipe = "nonstaff";
                if ($mth != $mnth) {
                  $masuk = ($th - $yth) - 1;
                  $ms_krj = round($masuk, 0, PHP_ROUND_HALF_DOWN);
                } else {
                  $masuk = $th - $yth;
                  $ms_krj = round($masuk, 0, PHP_ROUND_HALF_DOWN);
                }
                $esstmss = date('Y') . '-' . $sstm;
              } else if ($_POST['slec'] == "staff") {
                $gabsn = '0000-00-00';
                $jo_in = $_POST['tgl'];
                $tipe = "staff";
                if ($th != $yth) {
                  if ($mth != $mnth) {
                    $ms_krj = ($th - $yth) - 1;
                    $esstmss = date('Y') - 1 . '-' . $sstm;
                  } else {
                    $ms_krj = ($th - $yth);
                    # code...
                    $esstmss = date('Y') . '-' . $sstm;
                  }
                } else {
                  $ms_krj = $th - $yth;
                  $esstmss = date('Y') . '-' . $sstm;
                }
              } //else {
              //   $gabsn = '0000-00-00';
              //   $jo_in = $_POST['tgl'];
              //   $tipe = "staff";
              //   $ms_krj = $th - date('Y', strtotime($join));
              //   $esstmss = date('Y') . '-' . $sstm;
              // }

              $jbtn = substr($ko, 3);
              $ko_jbtn = substr($ko, 0, 3);

              //estimasi kenaikan
              $date = date_create(date('Y-m-d', strtotime($esstmss)));
              date_add($date, date_interval_create_from_date_string('1 year'));
              $est_naik = date_format($date, 'Y-m-d');

              mysqli_query($conn, "INSERT INTO `daftar_pegawai` (nama,alamat,pddk,nib,cbg,jbtn,ko_jbtn,ms_krj,tipe,gb_nonstaff,th_gb,est_naikgaji,status) VALUE('$name','$almt','$pddk','$nib','$cbg','$jbtn','$ko_jbtn','$ms_krj','$tipe','$gabsn','$jo_in','$est_naik','aktif')") or die(mysqli_error($conn));
              echo '<script>window.location.href="daftar.php?akoens=yups";</script>';
            }
          }
          ?>
          </form>
          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batal</button>
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