<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR 404 PAGE NOT FOUND</title>
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7Rxnatzjc7DSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url(https://cdn.dribbble.com/users/1092276/screenshots/11672531/media/ab64d5a0ba6fc837bbfadcf0eab0f1e6.gif) no-repeat center center;
        background-size: cover;
    }

    .four_zero_four_bg {
        text-align: center;
        background-color: rgba(255, 255, 255, 0.5);
        width: 90%;
        color: #523a26;
        max-width: 900px;
        padding: 20px;
        border-radius: 10px;
        margin: 20px;
    }

    .four_zero_four_bg h1 {
        font-size: 6.5vw;
    }

    .four_zero_four_bg h3 {
        font-size: 3vw;
    }

    .four_zero_four_bg p {
        font-size: 2vw;
    }

    .link_404 {
        color: #523a26;
        background: peachpuff;
        text-decoration: none;
        display: inline-block;
        padding: 10px 20px;
    }

    @media (max-width: 768px) {
        .four_zero_four_bg h1, h3, .four_zero_four_bg p, .link_404 {
            font-size: 4vw;
        }
    }
</style>
<body>
    <div class="four_zero_four_bg">
        <h1 class="text-center">404</h1>
        <h3 class="h2">Looks like you're lost</h3>
        <p>The page you are looking for is not available!</p>
        <a href="index.php" class="link_404">Go to Home</a>
    </div>
</body>
</html>
