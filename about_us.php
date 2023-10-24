<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Wannamie</title>
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        
        .about-container {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding-top: 50px;
            background-color: #ffffff;
        }

        h1,
        h2 {
            color: #343a40;
        }

        p {
            color: #6c757d;
        }

        hr {
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <?php require_once "navbar.php" ?>
    <div class="background">
        <div class="container py-5" style="max-width: 700px;">
            <div class="about-container mx-auto text-center py-5 p-5" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="pt-1" data-aos="fade-up" data-aos-duration="1000">Wannamie</h1>
                <p class="pb-3" data-aos="fade-up" data-aos-duration="1000">Selamat datang di wannamie, tempat terbaik untuk menikmati hidangan ramen Jepang yang lezat.
                    Kami berkomitmen untuk menyajikan hidangan ramen terbaik yang dapat memuaskan hasrat Anda akan cita rasa Jepang yang otentik.
                    Di wannamie, kami menggabungkan resep tradisional dengan bahan-bahan segar dan berkualitas tinggi untuk memberikan pengalaman bersantap yang tak terlupakan bagi Anda.</p>
                <hr />
                <h2 class="pt-2" data-aos="fade-up" data-aos-duration="1000">Cerita Kami</h2>
                <p class="pb-3" data-aos="fade-up" data-aos-duration="1000">wannamie didirikan oleh tim penggemar makanan yang jatuh cinta pada seni pembuatan ramen.
                    Terinspirasi oleh budaya ramen yang kaya dan beragam, kami memutuskan untuk membawa harta kuliner ini ke meja Anda.</p>
                <hr />
                <h2 class="pt-2" data-aos="fade-up" data-aos-duration="1000">Ramen Kami</h2>
                <p class="pb-3" data-aos="fade-up" data-aos-duration="1000">Ramen kami adalah buah dari cinta. Kami membuat mie kami sendiri di tempat,
                    dan kaldu kami direbus selama berjam-jam untuk mencapai keseimbangan rasa yang sempurna.
                    Baik Anda lebih suka tonkotsu klasik, miso pedas, dan opsi vegetarian, kami memiliki mangkuk ramen untuk setiap selera.</p>
                <hr />
                <h2 class="pt-2" data-aos="fade-up" data-aos-duration="1000">Kunjungi Kami</h2>
                <p class="pb-1" data-aos="fade-up" data-aos-duration="1000">Datang dan kunjungi restoran kami untuk merasakan keajaiban ramen wannamie dengan mata kepala sendiri.
                    Kami sangat menantikan kesempatan untuk melayani Anda dan berbagi essensi masakan Jepang dengan kreasi ramen lezat kami.</p>
                    <hr />
                <h2 class="pt-2" data-aos="fade-up" data-aos-duration="1000">Kelompok 5</h2>
                <p class="pb-1" data-aos="fade-up" data-aos-duration="1000">Angelima Khosina 00000067456 | Ryu Ivan Wijaya 00000065448 <br> Vianca Vanesia Barhan 00000065031 | Walter Adrian Samuel 00000067030</p>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>

</html>