<?php
session_start();

if( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}

require '../functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$titik = query("SELECT * FROM rute WHERE id = '$id'")[0];



// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'titik.php';
            </script>
        ";
    } else {
        echo "
            <script>
                    alert('data gagal diubah!');
                    document.location.href = 'titik.php';
            </script>
        ";
    }
  
  }

?>

<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>SESAR - Admin</title>
        <!-- bootstrap 5 css -->
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
          crossorigin="anonymous"
        />
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
        <style>
          li {
            list-style: none;
            margin: 20px 0 20px 0;
          }

          a {
            text-decoration: none;
          }

          .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: -300px;
            transition: 0.4s;
          }

          .active-main-content {
            margin-left: 250px;
          }

          .active-sidebar {
            margin-left: 0;
          }

          #main-content {
            transition: 0.4s;
          }
        </style>
      </head>
      <body>
        <div>
          <div class="sidebar p-4 bg-primary" id="sidebar">
            <h4 class="mb-5 text-white"><img src="https://siakad-filkom.uniss.ac.id/assets/img/logo.png" height="42"/><span style="margin-left:10px; font-size:18px">Sistem Informasi</span></h4>
            <li>
              <a class="text-white" href="index.php">
                <i class="fa-solid fa-desktop mr-2"></i>
                Beranda
              </a>
            </li>
            <li>
              <a class="text-white" href="titik.php">
                <i class="fa-solid fa-user mr-2"></i>
                Titik Evakuasi
              </a>
            </li>
            <li>
              <a class="text-white" href="peta.php">
                <i class="fa-solid fa-map mr-2"></i>
                Peta Evakuasi
              </a>
            </li>
            <li>
              <a class="text-white" href="users.php">
                <i class="fa-solid fa-users mr-2"></i>
                Manajemen User
              </a>
            </li>
            <li>
              <a class="text-white" href="logout.php">
                <i class="fa-solid fa-power-off mr-2"></i>
                Logout
              </a>
            </li>
          </div>
        </div>
        <section class="p-4" id="main-content">
          <button class="btn btn-primary mb-3" id="button-toggle">
            <i class="bi bi-list"></i>
          </button>

            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Content Row -->
            <div class="row">
              <div class="justify-content-center">
                <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
                    <div class="card-body">
                        <h3 class="text-center mb-3">Ubah Data</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" 
                            value="<?= $titik["id"]; ?>">
                            <div class="form-group">
                                <label for="nama">Nama :</label>
                                <input type="text" class="form-control" name="nama" id="nama" 
                                    required  value="<?= $titik["nama"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat :</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" 
                                    required  value="<?= $titik["alamat"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="titik">Titik :</label>
                                <input type="text" class="form-control" name="titik" id="titik"
                                    value="<?= $titik["titik"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan :</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan"
                                    value="<?= $titik["keterangan"]; ?>">
                            </div>
                            <div align="right">
                                <a href="titik.php" class="btn btn-danger">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
            
        </section>
        <!-- Optional JavaScript -->
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="http20//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        
        <script>
        // event will be executed when the toggle-button is clicked
          document.getElementById("button-toggle").addEventListener("click", () => {

            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");

            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
          });
        </script>
      </body>
    </html>