<?php
$dsn = "mysql:host=localhost;dbname=wannamie";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}   

function uploadGambar() {
    $fileGambar = $_FILES["gambar"]["name"];
    $tmpGambar = $_FILES["gambar"]["tmp_name"];

    $fileExt = explode(".", $fileGambar);
    $fileExt = strtolower(end($fileExt));

    if ($fileExt === "jpg" || $fileExt === "jpeg" || $fileExt === "png" || $fileExt === "webp") {
        move_uploaded_file($tmpGambar, "img/gambarMenu/" . $fileGambar);
        return $fileGambar;
    } else {
        echo "<script>
                alert('Format file yang diupload bukan gambar!');
            </script>";
        exit;
    }
}

function uploadProfile() {
    $fileGambar = $_FILES["gambar"]["name"];
    $tmpGambar = $_FILES["gambar"]["tmp_name"];

    $fileExt = explode(".", $fileGambar);
    $fileExt = strtolower(end($fileExt));

    if ($fileExt === "jpg" || $fileExt === "jpeg" || $fileExt === "png" || $fileExt === "webp") {
        move_uploaded_file($tmpGambar, "img/gambarProfile/" . $fileGambar);
        return $fileGambar;
    } else {
        echo "<script>
                alert('Format file yang diupload bukan gambar!');
            </script>";
        exit;
    }
}

function duplicateUser($username)
{
    global $db;

    $duplicate = "SELECT * FROM akun WHERE username = ?";
    $stmt = $db->prepare($duplicate);
    $stmt->execute([$username]);

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        return true;
    } else {
        return false;
    }
}
function register($data)
{
    global $db;
    $username = htmlspecialchars($data["username"]);
    $namaDepan = htmlspecialchars($data["first_name"]);
    $namaLast = htmlspecialchars($data["last_name"]);
    $email = htmlspecialchars($data["email"]);
    $tanggalLahir = htmlspecialchars($data["birthdate"]);
    $password = htmlspecialchars($data["password"]);
    $gender = htmlspecialchars($data["gender"]);
    $gambar = htmlspecialchars($data["gambar"]);

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = uploadProfile();
    } else {
        $gambar = "usernull.jpg";
    }

    $en_pass = password_hash($password, PASSWORD_DEFAULT);
    if (duplicateUser($username)) {
        return -1;
    } else {
        $insert = "INSERT INTO akun (username, first_name, last_name, email, password, birthdate, gender, gambar) 
                    VALUES (?, ?, ?, ?, ?, ? , ?, ?)";
        $result = $db->prepare($insert);
        $result->execute([$username, $namaDepan, $namaLast, $email, $en_pass, $tanggalLahir, $gender, $gambar]);
        return true;
    }
}

function duplicateMenu($nama)
{
    global $db;

    $duplicate = "SELECT * FROM menu WHERE nama = ?";
    $stmt = $db->prepare($duplicate);
    $stmt->execute([$nama]);

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        return true;
    } else {
        return false;
    }
}

function insert() {
    global $db;

    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga = htmlspecialchars($_POST['harga']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $gambar = uploadGambar();

    if (!$gambar) {
        return false;
    }

    if (duplicateMenu($nama)) {
        echo "<script>
                alert('Menu sudah terdaftar, silahkan gunakan nama lain');
            </script>";
        return false;
    } else {
        $insert = "INSERT INTO menu (id, nama, deskripsi, harga, kategori, gambar) 
                    VALUES (?, ?, ?, ?, ?, ?)";
        $result = $db->prepare($insert);
        $result->execute([$id, $nama, $deskripsi, $harga, $kategori, $gambar]);
        return true;
    }
}

function update_menu($data) {
    global $db;

    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga = htmlspecialchars($data["harga"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $gambar = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $data['gambarLama'];
    } else {
        $gambar = uploadGambar();
    }

    $update = "UPDATE menu SET nama = ?, deskripsi = ?, harga = ?, kategori = ?, gambar = ? WHERE id = ?";
    $result = $db->prepare($update);
    $result->execute([$nama, $deskripsi, $harga, $kategori, $gambar, $id]);
    return true;
}

function delete_menu($id) {
    global $db;

    $delete = "DELETE FROM menu WHERE id = ?";
    $result = $db->prepare($delete);
    return $result->execute([$id]);
}

function update_profile($data) {
    global $db;

    $id = htmlspecialchars($_POST["id"]);
    $namaDepan = htmlspecialchars($_POST["first_name"]);
    $namaBelakang = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $birthdate = htmlspecialchars($_POST["birthdate"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $gambar = htmlspecialchars($_POST["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $data['gambarLama'];
    } else {
        $gambar = uploadProfile();
    }

    $update = "UPDATE akun SET first_name = ?, last_name = ?, email = ?, birthdate = ?, gender = ?, gambar = ? WHERE id = ?";
    $result = $db->prepare($update);
    $result->execute([$namaDepan, $namaBelakang, $email, $birthdate, $gender, $gambar, $id]);
    $_SESSION["profilePict"] = $gambar;
    return true;
}

function forgot_pass($data)
{
    global $db;
    
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $en_pass = password_hash($password, PASSWORD_DEFAULT);
    $update = "UPDATE akun SET password = ? WHERE username = ?";
    $stmt = $db->prepare($update);
    $stmt->execute([$en_pass, $username]);
    return true;
}
