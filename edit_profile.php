<?php
session_start();
require_once "functions.php";

if (!isset($_SESSION["login"]) || !isset($_GET["username"]) || $_SESSION["login"] !== $_GET["username"]) {
    echo "<script>
            alert('Anda tidak punya akses ke halaman ini!');
            window.location.href = 'index.php';
        </script>";
    exit;
}

if (isset($_POST["submit"])) {
    if (update_profile($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil di update');
                window.location.href = 'index.php';
            </script>";
    } else {
        echo "
        <script>
            alert('Data gagal di update');
            window.location.href = 'index.php';
        </script>";
    }
}

$username = $_GET["username"];
$showProfile = "SELECT * FROM akun WHERE username = ?";
$hasil = $db->prepare($showProfile);
$hasil->execute([$username]);

$row = $hasil->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $username ?> | Wannamie</title>
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>

<body>
    <?php require_once "navbar.php" ?>
    <div class="background">
        <div class="container">
            <div class=" mx-auto py-5">
                <div class="px-5 edit-profile pt-2 mx-auto" style="background-color: #ffffff; border-radius: 15px;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h2 class="mt-5 form-center">My Profile</h2>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="gambarLama" value="<?= $row['gambar'] ?>">
                        <div class="form-group mt-4 form-center">
                            <label for="profilePict" class="d-block">Profile image</label>
                            <img src="img/gambarProfile/<?= $row['gambar'] ?>" alt="<?= $row['username'] ?>" width="100" height="100" style="border-radius: 50%; margin-top: 10px">
                            <input type="file" name="gambar" id="profilePict" class="form-control mt-3">
                        </div>
                        <div class="form-group mt-3">
                            <label for="nama" class="form-label">Username: <?= $row['username'] ?></label>
                        </div>
                        <div class="form-group mt-3">
                            <label for="first_name" class="form-label">Nama depan</label>
                            <input type="text" name="first_name" id="first_name" value="<?= $row['first_name'] ?>" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="last_name" class="form-label">Nama belakang</label>
                            <input type="text" name="last_name" id="last_name" value="<?= $row['last_name'] ?>" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="date" class="form-label">Tanggal lahir</label>
                            <input type="date" name="birthdate" id="date" class="form-control" value="<?= $row['birthdate'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label">Jenis kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="laki" value="M" <?= ($row['gender'] == 'M') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="laki">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="perempuan" value="M" <?= ($row['gender'] == 'F') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "footer.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>