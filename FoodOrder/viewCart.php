<!-- viewCart.php -->

<?php
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Food</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <!-- NAVBAR -->
   
    <nav style="height: 75px;" class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div>
                <img src="./assert/bdimg/tasty.webp" alt="logo" style="height: 60px; border-radius: 80% ">
                <a class="navbar-brand logotxt " href="#">TastyDelight</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="./user_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.html">CountactUs</a>
                    </li>
                    
                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-primary" onclick="logout(event)" type="submit"> Logout </button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <!-- <h1>Cart Items</h1> -->
            <hr>
            <!-- <a href='index.php'>Home</a> -->
            <table class='table'>
                <tr>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                <?php
                if (isset($_GET["del"])) {
                    foreach ($_SESSION["cart"] as $keys => $values) {
                        if ($values["fid"] == $_GET["del"]) {
                            unset($_SESSION["cart"][$keys]);
                        }
                    }
                }
                if (!empty($_SESSION["cart"])) {
                    $total = 0;
                    foreach ($_SESSION["cart"] as $keys => $values) {
                        $amt = $values["qty"] * $values["price"];
                        $total += $amt;
                        echo "
                        <tr>
                            <td>{$values["pname"]}</td>
                            <td>{$values["qty"]}</td>
                            <td>{$values["price"]}</td>
                            <td>{$amt}</td>
                            <td><a href='viewCart.php?del={$values["fid"]}'>Remove</a></td>
                        </tr>
                        ";
                    }
                    echo "
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>{$total}</td>
                    </tr>";
                } else {
                    echo " <div> 
                                <h1>NO ITEM IN THE CATR </h1>
                            </div>";
                }
                ?>


            </table>

        </div>
    </div>

    <script>
        function logout(event) {
            event.preventDefault();
            window.location.href = './login_signup/index.php';
        }
    </script>
   

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>