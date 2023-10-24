<?php
include "header.php";
?>
<section>
  <div class="card" style="background-color:lightblue">
    <div class="d-flex justify-content-center">
      <h4>Golongan dan Tunjangan pegawai</h4>
    </div>
  </div>
  <div class="row">
    <div class="col" style="margin-top:3px">
      <div class="card">
        <div class="form-inline d-flex">
          <h5 class="mt-1">estimasi gaji</h5>
          <!-- <a href="edit_golongan.php?method=tambah&&type=jabatan" class="btn btn-sm btn-info ml-2"> </a> -->
        </div>
        <div class="row">
          <div class="table-responsive" style="height: 180px;">
            <table class="table table-hover">
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
                  $x = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `golongan` ='' AND `tipe` = 'staff'");
                  while ($xe = mysqli_fetch_array($x)) {
                  ?>
                    <td><?= $nose++; ?>.</td>
                    <td><?= rupiah($xe['tonase']); ?></td>
                    <td><?= $xe['estimasi']; ?> tahun</td>
                    <td>
                      <div class="form-inline d-flex">
                        <a href="edit_golongan.php?method=edit&&type=tonase_gaji&&id=<?= $xe['id']; ?>" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                        <!-- <a href="" class="btn btn-sm btn-danger ml-1"><span class=" bx bxs-trash"></span></a> -->
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
          <h5 class="mt-1">estimasi uang makan</h5>
          <!-- <a href="edit_golongan.php?method=tambah&&type=jabatan" class="btn btn-sm btn-info ml-2">+ jabatan</a> -->
        </div>
        <div class="row">
          <div class="table-responsive" style="height: 180px;">
            <table class="table table-hover">
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
                $cs = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id`='1' AND `tipe` = 'staff'");
                while ($cek = mysqli_fetch_assoc($cs)) {
                ?>
                  <tr>
                    <td><?= $nom++; ?>.</td>
                    <td><?= $cek['estimasi']; ?> tahun</td>
                    <td><?= rupiah($cek['tonase']); ?></td>
                    <td>
                      <div class="form-inline d-flex">
                        <a href="edit_golongan.php?method=edit&&type=tonase_um&&id=<?= $cek['id']; ?>" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                        <!-- <a href="" class="btn btn-sm btn-danger ml-1"><span class=" bx bxs-trash"></span></a> -->
                      </div>
                    </td>
                  </tr>
                <?php
                }
                $num = 2;
                $cse = mysqli_query($conn, "SELECT * FROM `gaji_tmbahum` WHERE `tipe` = 'staff' ORDER BY `id` ");
                while ($ceks = mysqli_fetch_assoc($cse)) {
                ?>
                  <tr>
                    <td><?= $num++; ?>.</td>
                    <td><?= $ceks['msa_krja']; ?> tahun</td>
                    <td><?= rupiah($ceks['nominal']); ?></td>
                    <td>
                      <div class="form-inline d-flex">
                        <a href="edit_golongan.php?method=edit&&type=um_bnyak&&id=<?= $ceks['id']; ?>" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                        <!-- <a href="" class="btn btn-sm btn-danger ml-1"><span class=" bx bxs-trash"></span></a> -->
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
          <a href="edit_golongan.php?method=tambah&&type=gaji&&kls=staff" class="btn btn-sm btn-info ml-2">+ golongan</a>
        </div>
        <div class="row" style="overflow-x: auto; height : 250px;">
          <div class="table-responsive">
            <table class="table table-sm table-hover">
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
                $a = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `tonase`='' AND `tipe` = 'staff' ORDER BY `golongan`");
                while ($is = mysqli_fetch_array($a)) {
                ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td class="gga"><?= $is['golongan']; ?></td>
                    <td class="tuga"><?= rupiah($is['tunjangan']); ?></td>
                    <td>
                      <a href="edit_golongan.php?method=edit&&type=gaji&&id=<?= $is['id']; ?>" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                    </td>
                    <td>
                      <a href="edit_golongan.php?method=hapus&&type=gaji&&id=<?= $is['id']; ?>" id="gaji" class="btn btn-sm btn-danger ml-1 gaji"><span class="bx bxs-trash"></span></a>
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
          <a href="edit_golongan.php?method=tambah&&type=um&&kls=staff" class="btn btn-sm btn-info ml-2">+ golongan</a>
        </div>
        <div class="row" style="overflow-x: auto; height : 250px;">
          <div class="table-responsive">
            <table class="table table-sm table-hover">
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
                  $b = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `tonase` ='' AND `tipe` = 'staff' ORDER BY `golongan`");
                  while ($be = mysqli_fetch_array($b)) {
                  ?>
                    <td><?= $nom++; ?>.</td>
                    <td class="gga"><?= $be['golongan']; ?></td>
                    <td class="tuga"><?= rupiah($be['tunjangan']); ?></td>
                    <td>
                      <a href="edit_golongan.php?method=edit&&type=um&&id=<?= $be['id']; ?>" class="btn btn-sm btn-info"><span class="bx bxs-cog"></span></a>
                    </td>
                    <td>
                      <a href="edit_golongan.php?method=hapus&&type=um&&id=<?= $be['id']; ?>" id="um" class="btn btn-sm btn-danger ml-1 um"><span class="bx bxs-trash"></span></a>
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
          <a href="edit_golongan.php?method=tambah&&type=jabatan&&kls=staff" class="btn btn-sm btn-info ml-2">+ jabatan</a>
        </div>
        <div class="row" style="overflow-x: auto; height : 250px;">
          <div class="table-responsive">
            <table class="table table-sm table-hover">
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
                  $c = mysqli_query($conn, "SELECT * FROM `gaji_jabatan` WHERE `tipe` = 'staff' ORDER BY `id` ");
                  while ($ce = mysqli_fetch_array($c)) {

                  ?>
                    <td><?= $nos++; ?>.</td>
                    <td class="gga"><?= $ce['jabatan']; ?></td>
                    <td class="tuga"><?= $ce['kode']; ?></td>
                    <td>
                      <a href="edit_golongan.php?method=edit&&type=jabatan&&id=<?= $ce['id']; ?>" class="btn btn-sm btn-warning"><span class="bx bxs-cog"></span></a>
                    </td>
                    <td>
                      <a href="edit_golongan.php?method=hapus&&type=jabatan&&id=<?= $ce['id']; ?>" id="jabatan" class="btn btn-sm btn-danger ml-1 jabatan"><span class=" bx bxs-trash"></span></a>
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
    $(".gaji, .um, .jabatan").click(function() {
      // var gol = $(".gga").text();
      // var tunj = $(".tuga").text();
      if (confirm("golongan dan tunjangan akan di hapus..??")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
    /*$(".um").click(function() {
      var gol = $(".gga1").text();
      var tunj = $(".tuga1").text();
      if (confirm("golongan " + gol + ", tunjangan  " + tunj + " akan di hapus..!!??")) {
        return true;
      } else {
        return false;
      }
      return true;
    });
    $(".jabatan").click(function() {
      var gol = $(".gga2").text();
      var tunj = $(".tuga2").text();
      if (confirm("jabatan " + gol + ", pendidikan " + tunj + " akan di hapus..!!?")) {
        return true;
      } else {
        return false;
      }
      return true;
    });*/
  });
</script>
<?php
include "footer.php";
?>