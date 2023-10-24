<?php
session_start();
require "functions.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] !== "admin") {
    echo "<script>
            alert('Anda tidak punya akses ke halaman ini!')
            window.location.href = 'index.php'
        </script>";
    exit();
}

if (!isset($_GET["id"])) {
    echo "<script>
            alert('Menu tidak ditemukan')
            window.location.href = 'admin.php'
        </script>";
    exit();
}

$id_menu = $_GET["id"];
$get_menu = "SELECT * FROM menu WHERE id = ?";
$hasil = $db->prepare($get_menu);
$hasil->execute([$id_menu]);
$row = $hasil->fetch(PDO::FETCH_ASSOC);

if ($row["id"] != $id_menu) {
    echo "<script>
            alert('Menu tidak ditemukan')
            window.location.href = 'admin.php'
        </script>";
    exit();
}

if (isset($_POST["submit"])) {
    if (update_menu($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil di update')
                document.location.href = 'admin.php'
            </script>";
    } else {
        echo "
        <script>
            alert('Data gagal di update')
            document.location.href = 'admin.php'
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu | Wannamie</title>
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
</head>

<body>
    <?php require_once "navbar.php" ?>

    <div class="container">
        <form action="" method="post" class="w-50 mx-auto" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="gambarLama" value="<?= $row['gambar'] ?>">
            <div class="form-group mt-5">
                <label for="nama-menu" class="form-label">Nama menu</label>
                <input type="text" name="nama" id="nama-menu" class="form-control" value="<?= $row['nama'] ?>">
            </div>
            <div class="form-group mt-3">
                <label for="deskripsi" class="form-label">Deskripsi Menu</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"><?= $row['deskripsi'] ?></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" value="<?= $row['harga'] ?>" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label class="form-label">Kategori</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="ramen" value="Ramen" <?= ($row['kategori'] == 'Ramen') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="ramen">
                        Ramen
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="udon" value="Udon" <?= ($row['kategori'] == 'Udon') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="udon">
                        Udon
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="side-dish" value="Side Dish" <?= ($row['kategori'] == 'Side Dish') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="side-dish">
                        Side Dish
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="minuman" value="Minuman" <?= ($row['kategori'] == 'Minuman') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="minuman">
                        Minuman
                    </label>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="gambar" class="form-label d-block">Gambar</label>
                <img src="img/gambarMenu/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>" width="100">
                <input type="file" name="gambar" id="gambar" class="form-control mt-3">
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <?php require_once "footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>