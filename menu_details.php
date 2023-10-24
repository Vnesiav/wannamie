<?php
session_start();
require_once "functions.php";

if (isset($_GET['nama'])) {
    $nama_menu = $_GET['nama'];
    $query = "SELECT * FROM menu WHERE nama = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$nama_menu]);
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($menu) {
        $nama = $menu['nama'];
        $deskripsi = $menu['deskripsi'];
        $harga = $menu['harga'];
        $kategori = $menu['kategori'];

        $query_kategori = "SELECT * FROM menu WHERE kategori = ? AND nama <> ? ORDER BY RAND() LIMIT 4";
        $stmt_kategori = $db->prepare($query_kategori);
        $stmt_kategori->execute([$kategori, $nama]);
    } else {
        header("location: index.php");
    }
} else {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nama ?> | Wannamie</title>
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>

<body>
    <?php require_once "navbar.php" ?>

    <div class="background pb-5">
        <div class="background-product" style="background-color: rgba(255, 255, 255, 0.6)">
            <div class="container pt-5">
                <div class="backButton">
                    <a href="index.php" class="back-link text-muted text-decoration-none">
                        <p style="font-weight: 600; font-size: 18px; margin: 0;"><i class="fas fa-arrow-left"></i> MENU</p>
                    </a>
                </div>
                <div class="container">
                    <div class="menuDetails py-2 p-md-5 mx-auto">
                        <div class="image-container mb-3">
                            <img src="img/gambarMenu/<?= $menu['gambar'] ?>" class="gambarmenu" alt="<?= $nama ?>" width="200" height="200">
                        </div>
                        <div class="text-container">
                            <h1 class="card-title"><?= $nama ?></h1>
                            <p class="card-text mt-1"><?= $deskripsi ?></p>
                            <p class="card-text">Rp. <?= $harga ?></p>
                            <form id="orderForm" action="<?php echo isset($_SESSION['id']) ? 'cart.php' : 'login.php'; ?>" method="post">
                                <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">
                                <input type="hidden" name="menu_name" value="<?= $nama ?>">
                                <input type="hidden" name="menu_price" value="<?= $harga ?>">
                                <input type="hidden" name="menu_image" value="<?= $menu['gambar'] ?>">
                                <div class="input-group mb-3">
                                    <label for="quantity" class="input-group-text">Quantity</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control custom-input" value="1" min="1" max="50" autocomplete="off">
                                </div>
                                <button type="submit" class="btn d-flex align-items-center justify-content-center but mb-5">
                                    <img src="img/gambarMenu/<?= $menu['gambar'] ?>" alt="<?= $nama ?>" class="img-beep" width="50" height="50"> 
                                    <p class="m-0">Pesan Sekarang</p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h1 class="text-center my-4">Rekomendasi Menu</h1>
            <div class="d-flex justify-content-center flex-wrap">
                <?php while ($menu_kategori = $stmt_kategori->fetch(PDO::FETCH_ASSOC)) : ?>
                    <a href="menu_details.php?nama=<?= $menu_kategori['nama'] ?>" class="mx-auto" style="text-decoration: none; color: black" data-aos="fade-down">
                        <div class="product-card d-flex justify-content-center align-items-center flex-column">
                            <img src="img/gambarMenu/<?= $menu_kategori['gambar'] ?>" class="product-img" alt="<?= $menu_kategori['nama'] ?>">
                            <h5 class="product-title"><?= $menu_kategori['nama'] ?></h5>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            duration: 800,
            offset: 100,
            easing: 'ease',
            once: true
        });
    </script>
</body>

</html>

<?php
require_once "footer.php";
?>