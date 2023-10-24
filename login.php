<?php
session_start();
require_once "functions.php";

$userNotFound = false;
$captchaError = false;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userNotFound = false;
    $captchaError = false;
}

$status = 'danger';

if (isset($_SESSION["level"])) {
    header("location: index.php");
}

if (isset($_POST['submit'])) {
    if (!isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["captcha_code"]) || $_POST["username"] === "" || $_POST["password"] === "" || $_POST["captcha_code"] === "") {
        $_SESSION["errorLogin"] = "Login gagal. Harap lengkapi semua data!";
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $captchaCode = $_SESSION['captcha'];
    $user_captcha_code = $_POST['captcha_code'];

    if (empty($username) || empty($password) || empty($user_captcha_code)) {
        $statusMsg = 'All fields are required.';
    } else {
        if ($user_captcha_code === $captchaCode) {
            $status = 'success';
            $statusMsg = 'Captcha code verified successfully!';
            $login = "SELECT * FROM akun WHERE username = ? OR email = ?";
            $stmt = $db->prepare($login);
            $stmt->execute([$username, $username]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                $userNotFound = true;
            } else {
                $user_id = $row['id'];
                if (!password_verify($password, $row['password'])) {
                    $_SESSION["wrongPass"] = "Password salah. Silahkan coba lag.";
                } else {
                    $_SESSION["id"] = $user_id;
                    if ($username === "admin" && password_verify($password, $row['password'])) {
                        $_SESSION['level'] = "admin";
                        $_SESSION["login"] = "admin";
                        if ($row['gambar'] === NULL) {
                            $_SESSION["profilePict"] = "usernull.jpg";
                        } else {
                            $_SESSION["profilePict"] = $row['gambar'];
                        }
                        header('location: index.php');
                    } else {
                        $_SESSION['level'] = "user";
                        $_SESSION["login"] = $row['username'];
                        if ($row['gambar'] === NULL) {
                            $_SESSION["profilePict"] = "usernull.jpg";
                        } else {
                            $_SESSION["profilePict"] = $row['gambar'];
                        }
                        header('location: index.php');
                    }
                    exit;
                }
            }
        } else {
            $captchaError = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | WANNAMIE</title>
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>

<body>
    <?php require_once "navbar.php" ?>
    <div class="background lo">
        <div class="container edit-profile mx-auto py-5 p-3 p-xs-4">
            <div class="p-5" style="background-color: #fff; border-radius: 15px">
                <h1 class="mx-auto text-center l1">Login</h1>
                <form action="" method="POST">
                    <?php if (isset($_SESSION["errorLogin"])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION["errorLogin"] ?>
                        </div>
                    <?php
                        unset($_SESSION["errorLogin"]);
                    endif; ?>
                    <div class="form-group mt-3">
                        <label for="username">Username atau Email</label>
                        <input type="text" name="username" id="username" class="form-control" />
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" />
                    </div>
                    <?php if (isset($_SESSION['wrongPass'])) : ?>
                        <div class="alert alert-danger mt-3"><?= $_SESSION['wrongPass'] ?></div>
                    <?php
                        unset($_SESSION['wrongPass']);
                    endif;
                    ?>
                    <?php if ($userNotFound) : ?>
                        <div class="alert alert-danger mt-3">Username atau email tidak ditemukan.</div>
                    <?php endif; ?>
                    <div class="form-group mt-3">
                        <label for="captcha">Captcha</label>
                        <input type="text" class="form-control" name="captcha_code">
                        <img src="captcha.php" id="capImage" class="mt-3">
                        <?php if ($captchaError) : ?>
                            <div class="alert alert-danger mt-3">Captcha yang dimasukkan salah.</div>
                        <?php endif; ?>
                        <p class="mt-3">Can't read the image? Click here to <a href="javascript:void(0);" class="text-decoration-none link" onclick="javascript:document.getElementById('capImage').src='captcha.php';">refresh</a>.</p>
                        <button type="submit" name="submit" class="btn btn-primary bit">Login</button>
                        <p class="login-lost mt-3">Tidak punya akun?
                            <a href="register.php" class="text-decoration-none text-gray link">Registrasi akun</a>
                        </p>
                        <p class="">Lupa password?
                            <a href="forget_pass.php" class="text-decoration-none text-gray link">Klik disini!</a>
                        </p>
                    </div>
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