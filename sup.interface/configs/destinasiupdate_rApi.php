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
          
        