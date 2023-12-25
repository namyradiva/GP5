<?php
session_start();

if( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}

require '../functions.php';

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
            <h4 class="mb-5 text-white"><i class="fa-solid fa-chart-pie"></i><span style="margin-left:10px; font-size:18px">Sistem Informasi</span></h4>
            <li>
              <a class="text-white" href="index.php">
                <i class="fa-solid fa-desktop mr-2"></i>
                Beranda
              </a>
            </li>
            <li>
              <a class="text-white" href="titik.php">
                <i class="fa-solid fa-location-dot mr-2"></i>
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
          <div align="left">
            <div class="card border-light" style="width: 30rem;">
              <div class="card-body">
                <h3 class="card-text mb-4"><strong>Manajemen User</strong></h3>
              </div>
            </div>
          </div>

          <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Content Row -->
            <div class="row">
            <table class="table table-bordered table-hover border">
                    <br>
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $sql="SELECT * FROM users";

                    $hasil=mysqli_query($conn,$sql);
                    $no=0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;

                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data["nama"]; ?></td>
                            <td><?php echo $data["username"];   ?></td>
                            <td>
                                <a href="hapus_user.php?id=<?php echo $data['id_user']; ?>" class="btn btn-danger" role="button">Hapus</a>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
                <div align="right">
                 <a href="index.php" class="btn btn-danger">Kembali</a>
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