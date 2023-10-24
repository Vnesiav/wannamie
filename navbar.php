<?php 
require_once "functions.php";

if (isset($_SESSION["login"])) {
    if (isset($_SESSION["login"])) {
        $query = "SELECT * FROM akun WHERE username = ? OR email = ?";
        $stmt = $db->prepare($query);
        if ($stmt->execute([$username, $username])) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $_SESSION["profilePict"] = $row['gambar'];
            }
        }
    }    
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid nav-wrap">
            <a class="navbar-brand mt-lg-0 p-3 d-flex align-items-center" href="index.php">
                <img src="img/logo/png/logo-no-background.png" alt="Wannamie" loading="lazy" />
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon top-bar"></span>
                <span class="toggler-icon middle-bar"></span>
                <span class="toggler-icon bottom-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <?php if (isset($_SESSION["level"]) && $_SESSION["level"] === "admin") : ?>
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link">Admin</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategory" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategory">
                            <li><a class="dropdown-item" href="index.php?kategori=Ramen">Ramen</a></li>
                            <li><a class="dropdown-item" href="index.php?kategori=Udon">Udon</a></li>
                            <li><a class="dropdown-item" href="index.php?kategori=Side Dish">Side dish</a></li>
                            <li><a class="dropdown-item" href="index.php?kategori=Minuman">Drinks</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <?php if (isset($_SESSION["id"])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (!isset($_SESSION["profilePict"]) || $_SESSION["profilePict"] === "usernull.jpg") : ?>
                                    <img src="img/gambarProfile/usernull.jpg" alt="userProfile" class="profile-navbar">
                                <?php else : ?>
                                    <img src="img/gambarProfile/<?= $_SESSION["profilePict"] ?>" alt="userProfile" class="profile-navbar">
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                                <li><a class="dropdown-item" href="edit_profile.php?username=<?= $_SESSION['login'] ?>">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php elseif (!isset($_SESSION["login"]) || $_SESSION["login"] === "false" || !isset($_SESSION["profilePict"])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>