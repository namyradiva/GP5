<?php

require '../functions.php';


    $titik = $_POST['titik'];
    $desa = $_POST['desa'];
    $lokasi = $_POST['lokasi'];
    $nama = $_FILES['peta']['name'];
    // $peta = $_POST['peta'];
    // $nama2 = $_FILES['peta']['tmp_name'];
    // $x = explode('.', $nama);
    // var_dump($x[1]);
    // echo($nama2);

    // die;
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['peta']['tmp_name'];	
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, 'gambar/'.$nama);
            mysqli_query($conn,"INSERT into rute values('','$titik','$desa','$lokasi','$nama')");
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }

// mysqli_query($conn,"INSERT into rute values('','$titik','$desa','$lokasi')");


header("location:../lokasi.php");



?>