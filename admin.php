<?php
session_start();
require_once "functions.php";
if (!isset($_SESSION["login"]) || $_SESSION['level'] !== "admin") {
    echo "<script>
            alert('Anda tidak punya akses ke halaman ini!')
            window.location.href = 'index.php'
        </script>";
    exit;
}

$showMenu = "SELECT * FROM menu";
$hasil = $db->prepare($showMenu);
$hasil->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Wannamie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
</head>

<body>
    <?php require_once "navbar.php" ?>

    <div class="background">
        <div class="container pb-5">
            <h1 class="text-center py-5">Daftar Menu</h1>
            <table id="table-admin" data-toggle="table" data-pagination="true" data-search="true" class="text-center table-admin">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Tindakan</th>
                </tr>
                <?php $i = 0 ?>
                <?php while ($row = $hasil->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td>
                            <?= $row['id'] ?>
                        </td>
                        <td>
                            <?= $row['nama'] ?>
                        </td>
                        <td>
                            <?= $row['deskripsi'] ?>
                        </td>
                        <td>
                            Rp. <?= $row['harga'] ?>
                        </td>
                        <td>
                            <?= $row['kategori'] ?>
                        </td>
                        <td>
                            <img src="img/gambarMenu/<?= $row['gambar'] ?>" alt="<?= $row['gambar'] ?>" width="50" height="50" alt="<?= $row['gambar'] ?>">
                        </td>
                        <td><a href="edit_menu.php?id=<?= $row['id'] ?>" class="edit-btn">Edit</a><br><a href="hapus_menu.php?id=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a></td>
                    </tr>
                    <?php $i++ ?>
                <?php endwhile; ?>
            </table>
            <h6>Jumlah menu: <?= $i ?></h6>
            <a href="tambah_menu.php">
                <button class="btn btn-primary bit mt-3">Tambah Data</button>
            </a>
        </div>
    </div>
    <?php require_once "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        $('#table-admin').bootstrapTable({
            pagination: true,
            search: true
        })
    </script>
</body>

</html>