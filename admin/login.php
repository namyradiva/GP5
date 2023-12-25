<?php 
session_start();
require '../functions.php';


if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE 
        username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["username"] = true;


            header("Location: index.php");
            exit;
        }
    }

    $error = true;


}

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" type="text/css" href="style.css">

 <title>Login Admin</title>
</head>
<body>
 <!-- <div class="alert alert-warning" role="alert">
  <?php echo $_SESSION['error']?>
 </div> -->

 <div class="container">
  <form action="" method="POST" class="login-email">
   <p class="login-text" style="font-size: 2rem; font-weight: 800;">Safe Life-Safe Route</p>
   <h3 align="center">Login Form</h3><br><br>
   <div class="input-group">
    <input type="text" placeholder="Username" name="username" required>
   </div>
   <div class="input-group">
    <input type="password" placeholder="Password" name="password" required>
   </div>
   <div class="input-group">
    <button name="login" class="btn">Login</button>
   </div>
   <br>
   <p align="center">Belum Memiliki Akun? Daftar <a href="registrasi.php">Di Sini</a></p>
  </form>
 </div>
</body>
</html>