<?php
session_start();
require_once "functions.php";

if (!isset($_GET["kategori"])) {
    $ramen = "SELECT * FROM menu WHERE kategori = 'Ramen'";
    $hasilRamen = $db->prepare($ramen);
    $hasilRamen->execute();

    $udon = "SELECT * FROM menu WHERE kategori = 'Udon'";
    $hasilUdon = $db->prepare($udon);
    $hasilUdon->execute();

    $sideDish = "SELECT * FROM menu WHERE kategori = 'Side Dish'";
    $hasilSideDish = $db->prepare($sideDish);
    $hasilSideDish->execute();

    $minuman = "SELECT * FROM menu WHERE kategori = 'Minuman'";
    $hasilMinuman = $db->prepare($minuman);
    $hasilMinuman->execute();
} else if ($_GET["kategori"] === "Ramen") {
    $ramen = "SELECT * FROM menu WHERE kategori = 'Ramen'";
    $hasilRamen = $db->prepare($ramen);
    $hasilRamen->execute();
} else if ($_GET["kategori"] === "Udon") {
    $udon = "SELECT * FROM menu WHERE kategori = 'Udon'";
    $hasilUdon = $db->prepare($udon);
    $hasilUdon->execute();
} else if ($_GET["kategori"] === "Side Dish") {
    $sideDish = "SELECT * FROM menu WHERE kategori = 'Side Dish'";
    $hasilSideDish = $db->prepare($sideDish);
    $hasilSideDish->execute();
} else if ($_GET["kategori"] === "Minuman") {
    $minuman = "SELECT * FROM menu WHERE kategori = 'Minuman'";
    $hasilMinuman = $db->prepare($minuman);
    $hasilMinuman->execute();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Wannamie</title>
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
            <?php if (isset($hasilRamen) && isset($hasilUdon) && isset($hasilSideDish) && isset($hasilMinuman)) : ?>
                <div class="carousel mb-5 mx-auto d-flex align-items-center justify-content-center">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/carousel/carousel1.png" class="d-block w-100" alt="carousel1" style="border-radius: 25px">
                            </div>
                            <div class="carousel-item">
                                <img src="img/carousel/carousel2.png" class="d-block w-100" alt="carousel2" style="border-radius: 25px">
                            </div>
                            <div class="carousel-item">
                                <img src="img/carousel/carousel3.png" class="d-block w-100" alt="carousel3" style="border-radius: 25px">
                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#productCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#productCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            <?php endif; ?>
            <?php if (isset($hasilRamen)) : ?>
                <h1 class="text-center pt-5 py-3 fw-bold" data-aos="flip-up">Ramen</h1>
                <div class="d-flex justify-content-center flex-wrap">
                    <?php foreach ($hasilRamen as $row) : ?>
                        <a href="menu_details.php?nama=<?= $row['nama'] ?>" class="mx-auto" style="text-decoration: none; color: black" data-aos="fade-down">
                            <div class="product-card d-flex justify-content-center align-items-center flex-column">
                                <img src="img/gambarMenu/<?= $row['gambar'] ?>" class="product-img" alt="<?= $row['nama'] ?>">
                                <h5 class="product-title"><?= $row['nama'] ?></h5>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($hasilUdon)) : ?>
                <h1 class="text-center pt-5 py-3 fw-bold" data-aos="flip-up">Udon</h1>
                <div class="d-flex justify-content-center flex-wrap">
                    <?php foreach ($hasilUdon as $row) : ?>
                        <a href="menu_details.php?nama=<?= $row['nama'] ?>" class="mx-auto" style="text-decoration: none; color: black" data-aos="fade-down">
                            <div class="product-card d-flex justify-content-center align-items-center flex-column">
                                <img src="img/gambarMenu/<?= $row['gambar'] ?>" class="product-img" alt="<?= $row['nama'] ?>">
                                <h5 class="product-title"><?= $row['nama'] ?></h5>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($hasilSideDish)) : ?>
                <h1 class="text-center pt-5 py-3 fw-bold" data-aos="flip-up">Side Dish</h1>
                <div class="d-flex justify-content-center flex-wrap">
                    <?php foreach ($hasilSideDish as $row) : ?>
                        <a href="menu_details.php?nama=<?= $row['nama'] ?>" class="mx-auto" style="text-decoration: none; color: black" data-aos="fade-down">
                            <div class="product-card d-flex justify-content-center align-items-center flex-column">
                                <img src="img/gambarMenu/<?= $row['gambar'] ?>" class="product-img" alt="<?= $row['nama'] ?>">
                                <h5 class="product-title"><?= $row['nama'] ?></h5>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($hasilMinuman)) : ?>
                <h1 class="text-center pt-5 py-3 fw-bold" data-aos="flip-up">Minuman</h1>
                <div class="d-flex justify-content-center flex-wrap">
                    <?php foreach ($hasilMinuman as $row) : ?>
                        <a href="menu_details.php?nama=<?= $row['nama'] ?>" class="mx-auto" style="text-decoration: none; color: black" data-aos="fade-down">
                            <div class="product-card d-flex justify-content-center align-items-center flex-column">
                                <img src="img/gambarMenu/<?= $row['gambar'] ?>" class="product-img" alt="<?= $row['nama'] ?>">
                                <h5 class="product-title"><?= $row['nama'] ?></h5>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    require_once "footer.php";
    ?>

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