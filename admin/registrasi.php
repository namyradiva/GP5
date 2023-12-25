<?php

require '../functions.php';

if( isset($_POST["submit"]) ) {
    
    // cek apakah data berhasil ditambahkan atau tidak
    if( registrasi($_POST) > 0 ) {
        echo "
            <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'login.php';
            </script>
        ";
    } else {
        echo "
            <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'login.php';
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">
              <div class="justify-content-center">
                <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
                    <div class="card-body">
                      <h3 class="text-center mb-3">Form Registrasi</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama :</label>
                                <input type="text" class="form-control" name="nama" id="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username :</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Password :</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div align="right">
                                <a href="login.php" class="btn btn-danger">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
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