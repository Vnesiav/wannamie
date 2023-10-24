<?php
session_start();
require_once "functions.php";

if (isset($_POST["submit"])) {
    if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['password2']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $_SESSION['error'] = "Ganti password gagal. Harap lengkapi semua data!";
    } else if ($_POST["password"] === $_POST["password2"]) {
        if (forgot_pass($_POST)) {
            echo "<script>
                    alert('Password berhasil diganti!');
                    document.location.href = 'login.php'; 
                </script>";
        } else {
            $_SESSION["error"] = "Ganti password gagal. Silakan coba lagi atau hubungi administrator.";
        }
    } else {
        $_SESSION["error"] = "Password tidak sama!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password || To Do List</title>
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
            <div class="edit-profile py-5 mx-auto">
                <h1 class="text-center mt-5">Ganti Password</h1>
                <form action="" method="post">
                    <?php if (isset($_SESSION["error"])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION["error"] ?>
                        </div>
                    <?php
                        unset($_SESSION["error"]);
                    endif;
                    ?>
                    <div class="form-group mt-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" />
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="form-label">Password baru</label>
                        <input type="password" name="password" id="password" class="form-control" />
                    </div>
                    <div class="form-group mt-3">
                        <label for="password2" class="form-label">Konfirmasi password</label>
                        <input type="password" name="password2" id="password2" class="form-control" />
                    </div>
                    <button type="submit" name="submit" class="btn but mt-4">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once "footer.php" ?>
</body>

</html>