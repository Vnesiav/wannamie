<?php
session_start();
require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['menu_id'])) {
        $menu_id = $_POST['menu_id'];
        $menu_name = $_POST['menu_name'];
        $menu_price = $_POST['menu_price'];
        $menu_image = $_POST['menu_image'];
        $quantity = $_POST['quantity'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$menu_id])) {
            if (isset($_SESSION['cart'][$menu_id]['quantity'])) {
                $_SESSION['cart'][$menu_id]['quantity'] += $quantity;
            } else {
                $_SESSION['cart'][$menu_id]['quantity'] = $quantity;
            }
        } else {
            $_SESSION['cart'][$menu_id] = [
                'menu_name' => $menu_name,
                'menu_price' => $menu_price,
                'menu_image' => $menu_image,
                'quantity' => $quantity,
            ];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['menu_id'])) {
    $menu_id = $_POST['menu_id'];
    $quantity = $_POST['quantity'];

    header('Location: cart.php');
    exit;
}

if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
}

if (isset($_POST['checkout'])) {
    $_SESSION['cart'] = [];
    $_SESSION['success_message'] = "Product(s) have been successfully checked out!";
}

?>

<?php require_once "navbar.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Wannamie</title>
    <link rel="icon" type="image/x-icon" href="img/logo/png/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
</head>

<body>
    <?php require_once "navbar.php" ?>

    <div class="background">
        <div class="container pt-4">
            <div class="backButton mb-3">
                <a href="index.php" class="back-link text-muted text-decoration-none">
                    <i class="fas fa-arrow-left"></i> MENU
                </a>
            </div>
            <?php if (isset($_SESSION['success_message'])) : ?>
            <div class="alert alert-success"><?= $_SESSION['success_message'] ?></div>
            <div style="height: 600px;"></div>
            <?php unset($_SESSION['success_message']); ?>
            <?php elseif (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
            <h2 class="text-center mb-1">Your Cart</h2>
            <div class="row justify-content-center">
                <?php
                $totalPrice = 0;
                foreach ($_SESSION['cart'] as $item_id => $item) :
                ?>
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img src='img/gambarMenu/<?= $item['menu_image'] ?>' class='card-img-top' alt='<?= $item['menu_name'] ?>'>
                        <div class="card-body">
                            <h5 class='card-title'><?= $item['menu_name'] ?></h5>
                            <p class='card-text'>Rp. <?= $item['menu_price'] ?></p>
                            <p class='card-text'>Quantity: <?= $item['quantity']; ?></p>
                            <a href='cart.php?remove_id=<?= $item_id; ?>' class='btn btn-danger but'>Remove</a>
                        </div>
                    </div>
                </div>
                <?php
                $subtotal = $item['menu_price'] * $item['quantity'];
                $totalPrice += $subtotal;
                endforeach;
                ?>

                <div class="col-md-14 mb-5">
                    <div class="CartCard" style="max-width: 100%;">
                        <div class="card-body text-center">
                            <form method="post" action="cart.php">
                                <p class='card-text' style="font-size: 17px;"><b>Total Price: </b >Rp.
                                    <?= number_format($totalPrice) ?></p>
                                <button type='submit' name='checkout' class='btn btn-success bit'>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php else : ?>
                <div class="d-flex justify-content-center flex-column">
                    <h1 class="text-center mt-5 mb-4">Your Cart</h1>
                    <div style="height: 20px;"></div>
                    <div class="text-center mt-5">
                        <h4>Your cart is empty.</h4>
                    </div>
                    <div style="height: 600px;"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php require_once "footer.php"; ?>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
