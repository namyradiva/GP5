<?php
// koneksi ke database
$server = "localhost";
$user = "root";
$pass = "";
$database = "sesar";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $titik = htmlspecialchars($data["titik"]);
    $keterangan = htmlspecialchars($data["keterangan"]);


    $query = "INSERT INTO rute
                VALUES
                ('', '$nama', '$alamat', '$titik', '$keterangan')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function uploadpeta($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $desa = htmlspecialchars($data["desa"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO peta
                VALUES
                ('', '$desa', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function upload() {
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }


    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpname, '../img/' . $namaFileBaru);

    return $namaFileBaru;
 

}

function hapuspeta($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM peta WHERE id_file = '$id'");
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM rute WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $titik = htmlspecialchars($data["titik"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $query = "UPDATE rute SET
                nama = '$nama',
                alamat = '$alamat',
                titik = '$titik',
                keterangan = '$keterangan'
            WHERE id = '$id'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, 
        $data["password"]);
        
        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username 
            FROM users WHERE username = '$username'");
        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                alert('username sudah terdaftar');
                </script>";
                return false;
        }

    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$nama', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

function hapususer($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id_user = '$id'");
    return mysqli_affected_rows($conn);
}

?>