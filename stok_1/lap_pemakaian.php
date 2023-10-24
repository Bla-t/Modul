<?php
include "header.php";
?>
<section class="recent">
    <div class="activity-card">
        <?php
        $a = date('Y');
        $m = date('m');
        $TOT = mysqli_query($conn, "SELECT COUNT(nota) AS 'tot' FROM `stok_lappakai` WHERE `milik` = '$milik' AND `status` = 'KOMPLIT'");
        $has = mysqli_fetch_assoc($TOT);
        ?>
        <h4 style="margin-top: 1rem;">
            <?php if ($milik == "ARM") {
                echo "Laporan Pemakaian";
            } else {
                echo "Laporan Distribusi";
            } ?>
            <!--<kbd><?= $has['tot']; ?></kbd>-->
        </h4>
        <div class="row">
            <div class="col">
                <div class="form-inline mb-3">
                    <form method="POST" action="">
                        <input type="text" class="form-control" id="input" placeholder="cari">
                        <input type="hidden" name="levl" value="<?= $level; ?>">
                        <input type="hidden" name="milik" value="<?= $milik; ?>">
                        <select class="form-control" name="bulan" id="" required>
                            <?php
                            if (isset($_POST['bulan'])) {
                                echo '<option value="' . date('m') . '" selected>' . tanggal(date($_POST['bulan'])) . '</option>';
                            } else {
                                echo '<option value="' . date('m') . '" selected>' . tanggal(date('m')) . '</option>';
                            }
                            ?>
                            <?php
                            for ($bln = 1; $bln <= 12; $bln++) {
                                echo '<option value="' . $bln . '">' . tanggal(date('m', strtotime($a . '-' . $bln))) . '</option></br>';
                            }
                            ?>
                        </select>
                        <select class="form-control" name="tahun" id="" required>
                            <?php
                            if (isset($_POST['tahun'])) {
                                echo '<option value="' . $_POST['tahun'] . '" selected>' . $_POST['tahun'] . '</option>';
                            } else {
                                echo '<option selected value="' . $a . '">' . $a . '</option></br>';
                            }
                            for ($i = 2018; $i <= $a; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option></br>';
                            }
                            ?>
                        </select>
                        <input class="btn btn-primary" type="submit" name="lacak" value="Cari">
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (!isset($_POST['lacak'])) {
            if ($level == "sudo") {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_lappakai` WHERE `status` = 'KOMPLIT' AND MONTH(tgl)='$m' AND YEAR(tgl) = '$a' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
            } else {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_lappakai` WHERE `milik`='$milik' AND MONTH(tgl)='$m' AND YEAR(tgl) = '$a' AND `status` = 'KOMPLIT' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
            }
        }
        if (isset($_POST['lacak'])) {
            $bu = $_POST['bulan'];
            $th = $_POST['tahun'];
            if ($level == "sudo") {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_lappakai` WHERE `status` = 'KOMPLIT' AND MONTH(tgl)='$bu' AND YEAR(tgl) = '$th' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
            } else {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_lappakai` WHERE `milik`='$milik' AND MONTH(tgl)='$bu' AND YEAR(tgl) = '$th' AND `status` = 'KOMPLIT' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
            }
        }
        ?>
        <div class="row">
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nota</th>
                            <?php
                            if ($milik == "ARM") {
                                echo "<th>No.Pol</th>";
                            }
                            ?>
                            <th>Tot. Barang</th>
                            <th>Bayar</th>
                            <th>Keterangan</th>
                            <th>acc</th>
                            <th>tgl.Acc</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="table table-responsive scroll" id="tabp">
                <table class="table table-hover">
                    <tbody id="table">
                        <?php
                        $n = 1;
                        while ($data = mysqli_fetch_array($isi)) {
                        ?>
                            <tr>
                                <td><?= $n++ . '.'; ?></td>
                                <td><a class="text-info" href="info_pakai.php?id=<?= $data['nota'] . $data['nopol'] ?>"><?= $data['nota']; ?></a></td>
                                <?php
                                if ($milik == "ARM") {
                                    echo "<td>" . $data['nopol'] . "</td>";
                                }
                                ?>
                                <td><?= $data['jumlah']; ?> PCS</td>
                                <td><?= rupiah($data['harga_total']); ?></td>
                                <td><?= $data['keterangan']; ?></td>
                                <td><?= $data['acc']; ?></td>
                                <td><?= date('d M, Y', strtotime($data['tgl'])); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--<div class="summary">
        <div class="summary-card">
            <div class="card-body">
                <button class="btn btn-secondary" onclick="PrintDiv();"><span class="ti-printer"></span></button>&emsp;
                <button class="btn btn-secondary"><span class="ti-import"></span></button>
            </div>
        </div>
    </div>-->
    <script type="text/javascript">
        function PrintDiv() {
            var divToPrint = document.getElementById('tabp');
            window.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            window.document.close();
            //direct after print !!//
            window.setTimeout(function() {
                location.href = "lap_pemakaian.php";
            }, 2000);
        }
    </script>

</section>

<?php include "footer.php" ?>