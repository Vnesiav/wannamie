<?php 
session_start();
require "functions.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] !== "admin") {
    echo "<script>
            alert('Anda tidak punya akses ke halaman ini!');
            window.location.href = 'login.php'; 
        </script>";
    exit;
}

$id = $_GET["id"];

if (delete_menu($id) > 0) {
    echo "
        <script>
            alert('Menu berhasil dihapus')
            window.location.href = 'index.php'
        </script>";
} else {
    echo "
        <script>
            alert('Menu gagal dihapus')
            window.location.href = 'index.php'
        </script>";
}

?>