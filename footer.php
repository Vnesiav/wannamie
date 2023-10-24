<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
</head>

<body>
    <div id="loader">
        <img src="img/logo/Spin ramen spin!.gif" alt="Loading..." id="loading-gif">
    </div>
    <footer class="bg-light text-center text-lg-start">
        <div class="logoFooter text-center pt-5 pb-4">
            <a href="about_us.php">
                <img src="img/logo/png/logo-no-background.png" alt="wannamie">
            </a>
        </div>
        <div class="detailsFooter text-center py-2">
            <div class="address px-5">
                <p class="footer-title mb-0">ADDRESS</p>
                <p class="my-0">Universitas Multimedia Nusantara</p>
            </div>
            <div class="contact px-5">
                <p class="footer-title mb-0">CONTACT US</p>
                <p class="my-0">021-9989283</p>
            </div>
            <div class="openHours px-5">
                <p class="footer-title m-0">OPEN HOURS</p>
                <p class="my-0">Everyday | 10 AM - 6 AM</p>
            </div>
            <div class="socialmedia px-5">
                <p class="footer-title mb-0">SOCIAL MEDIA</p>
                <a href="https://www.instagram.com/yourwooff/" target="_blank" class="instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/watch?v=vx4kLgnFexo" target="_blank" class="youtube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://twitter.com/yourtwitter" target="_blank" class="twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.facebook.com/yourpage" target="_blank" class="facebook">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://github.com/Vnesiav" target="_blank" class="github">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>
        <hr class="w-100">
        <p class="mb-2 text-center" style="color: #523a26;">&copy; 2023 wannamie. All rights reserved.</p>
    </footer>
    <script>
        window.addEventListener('load', function() {
            document.getElementById('loader').style.display = 'none';
        }, 500);
    </script>
</body>

</html>