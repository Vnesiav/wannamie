<?php
session_start();
require_once "functions.php";

if (isset($_POST["register"])) {
    if (!isset($_POST['username']) || !isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['email']) || !isset($_POST['birthdate']) || !isset($_POST['gender']) || !isset($_POST['password'])) {
        $_SESSION['error'] = "Registrasi gagal. Harap lengkapi semua data!";
    } else if (register($_POST)) {
        header("Location: login.php");
    } else if (register($_POST) === -1) {
        $_SESSION["error"] = "Username sudah terdaftar, silahkan gunakan username lain";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Wannamie</title>
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>

<body>
    <?php require_once "navbar.php" ?>

    <div class="background">
        <div class="container py-5">
            <div class="p-5 edit-profile mx-auto" style="background-color: #fff; border-radius: 15px;">
                <h1 class="text-center">Sign Up</h1>
                <form action="" method="post">
                    <?php if (isset($_SESSION["error"])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION["error"] ?>
                        </div>
                    <?php
                        unset($_SESSION["error"]);
                    endif;
                    ?>
                    <div class="form-group mt-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="firstName" class="form-label">Nama depan</label>
                        <input type="text" name="first_name" id="firstName" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="lastName" class="form-label">Nama belakang</label>
                        <input type="text" name="last_name" id="lastName" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="birthdate" class="form-label">Tanggal lahir</label>
                        <input type="date" name="birthdate" id="birthdate" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label">Jenis kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                            <label class="form-check-label" for="male">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                            <label class="form-check-label" for="female">
                                Perempuan
                            </label>
                        </div>
                        <div class="form-group mt-3">
                            <label for="gambar" class="form-label d-block">Gambar profile (opsional)</label>
                            <input type="file" name="gambar" class="form-control" value="usernull.jpg">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary bit mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once "footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>