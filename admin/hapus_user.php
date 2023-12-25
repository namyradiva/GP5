<?php
session_start();

if( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

if( hapususer($id) > 0 ) {
    echo "
            <script>
                    alert('user berhasil dihapus!');
                    document.location.href = 'users.php';
            </script>
        ";
} else {
    echo "
            <script>
                    alert('user gagal dihapus!');
                    document.location.href = 'users.php';
            </script>
        ";
}

?>