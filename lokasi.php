<?php
require 'functions.php';

?>
<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="Indra Styawantoro">

  <!-- Title -->
  <title>Safe Life-Safe Route</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-4">
      <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
        <!-- judul halaman -->
        <div class="d-flex align-items-center me-md-auto">
          <i class="bi-geo-alt-fill text-success me-3 fs-3"></i>
          <h1 class="h5 pt-2">Titik Evakuasi</h1>
        </div>
        <!-- breadcrumbs -->
        <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php"><i class="bi-house-fill text-success"></i></a></li>
              <li class="breadcrumb-item" aria-current="page">Dashboard</li>
              <li class="breadcrumb-item" aria-current="page">Titik Evakuasi</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="table-responsive">
          <div align="right">
              <a href="peta.php" class="btn btn-primary mb-3">Unduh Peta Evakuasi</a>
          </div>
            <table id="tabel-antrian" class="table table-bordered table-striped table-hover" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lokasi</th>
                  <th>Alamat</th>
                  <th>Keterangan</th>
                  <th>Lokasi</th>
                </tr>
              </thead>
              <?php
                      $sql="SELECT * FROM rute";

                      $hasil=mysqli_query($conn,$sql);
                      $no=0;
                      while ($data = mysqli_fetch_array($hasil)) {
                          $no++;

                          ?>
                          <tbody>
                          <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $data["nama"]; ?></td>
                              <td><?php echo $data["alamat"];   ?></td>
                              <td><?php echo $data["keterangan"];   ?></td>
                              <td><a href="<?php echo $data['titik']; ?>"target="_blank" class="btn btn-success" role="button">Lihat di Google Maps ></a></td>
                          </tr>
                          </tbody>
                          <?php
                      }
                      ?>
            </table>
          </div>
          <div align="right">
              <a href="index.php" class="btn btn-danger">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container">
      <hr class="my-4">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2023 - Group Project 5. All rights reserved.
      </div>
    </div>
  </footer>


  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

</body>

</html>