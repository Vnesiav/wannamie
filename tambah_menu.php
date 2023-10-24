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

if (isset($_POST["submit"])) {
    if (empty($_POST["id"]) || empty($_POST["nama"]) || empty($_POST["deskripsi"]) || empty($_POST["harga"]) || empty($_POST["kategori"])) {
        echo "
            <script>
                alert('Data tidak boleh kosong')
                document.location.href = 'tambah_menu.php'
            </script>";
        exit;
    } else {
        if (insert() > 0) {
            echo "
            <script>
                alert('Data berhasil ditambahkan')
                document.location.href = 'admin.php'
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan')
                document.location.href = 'admin.php'
            </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu | Wannamie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php require_once "navbar.php" ?>

    <div class="container mt-5">
        <h1 class="text-center mb-3">Tambah Data Menu</h1>
        <form class="w-50 mx-auto" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="ramen" value="Ramen">
                    <label class="form-check-label" for="ramen">
                        Ramen
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="udon" value="Udon">
                    <label class="form-check-label" for="udon">
                        Udon
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="side-dish" value="Side Dish">
                    <label class="form-check-label" for="side-dish">
                        Side Dish
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="minuman" value="Minuman">
                    <label class="form-check-label" for="minuman">
                        Minuman
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label d-block">Gambar</label>
                <input type="file" class="form-control mt-3" id="gambar" name="gambar">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include "footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>