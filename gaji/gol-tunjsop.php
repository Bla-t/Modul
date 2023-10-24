<?php
include "header.php";
?>
<section>
  <div class="card" style="background-color:moccasin">
    <div class="d-flex justify-content-center">
      <h4>Golongan dan Tunjangan Nonstaff</h4>
    </div>
  </div>
  <div class="row">
    <div class="col" style="margin-top:3px">
      <div class="card">
        <div class="form-inline d-flex">
          <h5 class="mt-1">estimasi gaji Sopir</h5>
          <a href="edit_golongansop.php?method=tambah&&type=estigaj&&tipe=nonstaff" class="btn btn-sm btn-info ml-2">+ estimasi gaji </a>
        </div>
        <div class="row">
          <div class="table-responsive" style="height: 180px;">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>no.</th>
                  <th>jumlah</th>
                  <th>estimasi</th>
                  <th>edit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $nose = 1;
                  $x = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `golongan` ='0' AND `tipe` = 'nonstaff' ORDER BY `estimasi` DESC");
                  while ($xe = mysqli_fetch_array($x)) {
                  ?>
                    <td><?= $nose++; ?>.</td>
                    <td><?= rupiah($xe['tonase']); ?></td>
                    <td><?= $xe['estimasi']; ?> tahun</td>
                    <td>
                      <div class="form-inline d-flex">
                        <a href="edit_golongansop.php?method=edit&&type=tonase_gaji&&id=<?= $xe['id']; ?>&&tipe=nonstaff" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                        <!-- <a href="" class="btn btn-sm btn-danger ml-1"><span class=" ti-trash"></span></a> -->
                      </div>
                    </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col" style="margin-top:3px">
      <div class="card">
        <div class="form-inline d-flex">
          <h5 class="mt-1">Estimasi UM Sopir</h5>
          <!--<a href="edit_golongansop.php?method=tambah&&type=jabatan" class="btn btn-sm btn-info ml-2">+ estimasi um</a>-->
        </div>
        <div class="row">
          <div class="table-responsive" style="height: 180px;">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>no.</th>
                  <th>estimasi</th>
                  <th>nominal</th>
                  <th>edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $nom = 1;
                $cs = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `golongan`='' AND `tipe` = 'nonstaff' ORDER BY `estimasi` DESC");
                while ($cek = mysqli_fetch_assoc($cs)) {
                ?>
                  <tr>
                    <td><?= $nom++; ?>.</td>
                    <td><?= $cek['estimasi']; ?> tahun</td>
                    <td><?= rupiah($cek['tonase']); ?></td>
                    <td>
                      <div class="form-inline d-flex">
                        <a href="edit_golongansop.php?method=edit&&type=tonase_um&&id=<?= $cek['id']; ?>&&tipe=nonstaff" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                        <!-- <a href="" class="btn btn-sm btn-danger ml-1"><span class=" ti-trash"></span></a> -->
                      </div>
                    </td>
                  </tr>
                <?php
                }
                $num = 2;
                $cse = mysqli_query($conn, "SELECT * FROM `gaji_tmbahum` WHERE `tipe` = 'nonstaff' ORDER BY `id` ");
                while ($ceks = mysqli_fetch_assoc($cse)) {
                ?>
                  <tr>
                    <td><?= $num++; ?>.</td>
                    <td><?= $ceks['msa_krja']; ?> tahun</td>
                    <td><?= rupiah($ceks['nominal']); ?></td>
                    <td>
                      <div class="form-inline d-flex">
                        <a href="edit_golongansop.php?method=edit&&type=um_bnyak&&id=<?= $ceks['id']; ?>&&tipe=nonstaff" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                        <!-- <a href="" class="btn btn-sm btn-danger ml-1"><span class=" ti-trash"></span></a> -->
                      </div>
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
  </div>
  <div class="row">
    <div class="col" style="margin-top:3px">
      <div class="card">
        <div class="form-inline d-flex">
          <h5 class="mt-1">Gaji / Golongan</h5>
          <a href="edit_golongansop.php?method=tambah&&type=gaji&&tipe=nonstaff" class="btn btn-sm btn-info ml-2">+ golongan</a>
        </div>
        <div class="row" style="overflow-x: auto; height : 250px;">
          <div class="table-responsive">
            <table class="table table-sm">
              <thead class="thead-dark">
                <tr>
                  <th>no.</th>
                  <th>Golongan</th>
                  <th>Tunjangan</th>
                  <th>edit</th>
                  <th>dell</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $a = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `tonase`='NULL' AND `tipe` = 'nonstaff' ORDER BY `golongan`");
                while ($is = mysqli_fetch_array($a)) {
                ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td id="gga"><?= $is['golongan']; ?></td>
                    <td id="tuga"><?= rupiah($is['tunjangan']); ?></td>
                    <td>
                      <a href="edit_golongansop.php?method=edit&&type=gaji&&id=<?= $is['id']; ?>&&tipe=nonstaff" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                    </td>
                    <td>
                      <a href="edit_golongansop.php?method=hapus&&type=gaji&&id=<?= $is['id']; ?>&&tipe=nonstaff" id="gaji" class="btn btn-sm btn-danger ml-1"><span class="bx bxs-trash"></span></a>
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
    <div class="col" style="margin-top:3px">
      <div class="card">
        <div class="form-inline d-flex">
          <h5 class="mt-1">UM / Golongan</h5>
          <a href="edit_golongansop.php?method=tambah&&type=um&&tipe=nonstaff" class="btn btn-sm btn-info ml-2">+ golongan</a>
        </div>
        <div class="row" style="overflow-x: auto; height : 250px;">
          <div class="table-responsive">
            <table class="table table-sm">
              <thead class="thead-dark">
                <tr>
                  <th>no.</th>
                  <th>Golongan</th>
                  <th>Tunjangan</th>
                  <th>edit</th>
                  <th>dell</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $nom = 1;
                  $b = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `tonase` ='' AND `tipe` = 'nonstaff' ORDER BY `golongan`");
                  while ($be = mysqli_fetch_array($b)) {
                  ?>
                    <td><?= $nom++; ?>.</td>
                    <td id="gga1"><?= $be['golongan']; ?></td>
                    <td id="tuga1"><?= rupiah($be['tunjangan']); ?></td>
                    <td>
                      <a href="edit_golongansop.php?method=edit&&type=um&&id=<?= $be['id']; ?>&&tipe=nonstaff" class="btn btn-sm btn-info"><span class="bx bxs-cog"></span></a>
                    </td>
                    <td>
                      <a href="edit_golongansop.php?method=hapus&&type=um&&id=<?= $be['id']; ?>&&tipe=nonstaff" id="um" class="btn btn-sm btn-danger ml-1"><span class="bx bxs-trash"></span></a>
                    </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col" style="margin-top:3px">
      <div class="card">
        <div class="form-inline d-flex">
          <h5 class="mt-1">Jabatan</h5>
          <a href="edit_golongansop.php?method=tambah&&type=jabatan&&tipe=nonstaff" class="btn btn-sm btn-info ml-2">+ jabatan</a>
        </div>
        <div class="row" style="overflow-x: auto; height : 250px;">
          <div class="table-responsive">
            <table class="table table-sm">
              <thead class="thead-dark">
                <tr>
                  <th>no.</th>
                  <th>Jabatan</th>
                  <th>Kode</th>
                  <th>edit</th>
                  <th>dell</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $nos = 1;
                  $c = mysqli_query($conn, "SELECT * FROM `gaji_jabatan` WHERE `tipe` = 'nonstaff' ORDER BY `id` ");
                  while ($ce = mysqli_fetch_array($c)) {

                  ?>
                    <td><?= $nos++; ?>.</td>
                    <td id="gga2"><?= $ce['jabatan']; ?></td>
                    <td id="gga2"><?= $ce['kode']; ?></td>
                    <td>
                      <a href="edit_golongansop.php?method=edit&&type=jabatan&&id=<?= $ce['id']; ?>&&tipe=nonstaff" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                    </td>
                    <td>
                      <a href="edit_golongansop.php?method=hapus&&type=jabatan&&id=<?= $ce['id']; ?>&&tipe=nonstaff" id="jabatan" class="btn btn-sm btn-danger ml-1"><span class="bx bxs-trash"></span></a>
                    </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    $("#gaji").click(function() {
      var gol = $("#gga").text();
      var tunj = $("#tuga").text();
      if (confirm("golongan " + gol + ", tunjangan " + tunj + " akan di hapus..??")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
    $("#um").click(function() {
      var gol = $("#gga1").text();
      var tunj = $("#tuga1").text();
      if (confirm("golongan " + gol + ", tunjangan  " + tunj + " akan di hapus..!!??")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
    $("#jabatan").click(function() {
      var gol = $("#gga2").text();
      var tunj = $("#tuga2").text();
      if (confirm("jabatan " + gol + ", pendidikan " + tunj + " akan di hapus..!!?")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
  });
</script>
<?php
include "footer.php";
?>