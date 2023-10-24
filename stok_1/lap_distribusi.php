<?php
include "header.php";
?>
<section class="recent">
    <div class="activity-card">
        <?php
        $TOT = mysqli_query($conn, "SELECT COUNT(nota) AS 'tot' FROM `stok_lappakai` WHERE `milik` = '$milik' AND `status` = 'KOMPLIT'");
        $has = mysqli_fetch_assoc($TOT);
        ?>
        <h4 style="margin-top: 1rem;"> Laporan Distribusi <kbd><?php echo $has['tot']; ?></kbd></h4>
        <div class="col-md-5">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="input" placeholder="cari">
                <div class="input-group-append">
                    <span class="input-group-text ti-search"></span>
                </div>
            </div>
        </div>
        <div class="table table-responsive scroll" id="tabp">
            <table class="table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nota</th>
                        <th>No.Polisi</th>
                        <th>Tot.Pemakaian</th>
                        <th>Bayar</th>
                        <th>Keterangan</th>
                        <th>acc</th>
                        <th>tgl.Pemakaian</th>
                    </tr>
                </thead>
                <?php
                $n = 1;
                $isi = mysqli_query($conn, " SELECT * FROM `stok_lappakai` WHERE `milik`='$milik' AND `status` = 'KOMPLIT' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
                while ($data = mysqli_fetch_array($isi)) {

                ?>
                    <form method="POST" action="aksi/aksi_data-barang.php">
                        <tbody id="table">
                            <tr>
                                <td><?php echo $n++ . '.'; ?></td>
                                <td><a class="text-decoration-none" href="info_pakai.php?id=<?php echo $data['nota'] . $data['nopol'] ?>"><?php echo $data['nota']; ?></a></td>
                                <td><?php echo $data['nopol']; ?></td>
                                <td><?php echo $data['jumlah']; ?> PCS</td>
                                <td><?php echo rupiah($data['harga_total']); ?></td>
                                <td><?php echo $data['keterangan']; ?></td>
                                <td><?php echo $data['acc']; ?></td>
                                <td><?php echo date('d M, Y', strtotime($data['tgl'])); ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </form>
            </table>
        </div>
    </div>
    <div class="summary">
        <div class="summary-card">
            <div class="card-body">
                <button class="btn btn-secondary" onclick="PrintDiv();"><span class="ti-printer"></span></button>&emsp;
                <button class="btn btn-secondary"><span class="ti-import"></span></button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function PrintDiv() {
            var divToPrint = document.getElementById('tabp');
            window.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            window.document.close();
            //direct after print !!//
            window.setTimeout(function() {
                location.href = "lap_beli.php";
            }, 2000);
        }
    </script>

</section>

<?php include "footer.php" ?>