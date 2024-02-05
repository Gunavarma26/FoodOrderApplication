<!-- admin_home.php -->

<?php
include "./config.php";

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $delete_sql = "DELETE FROM products WHERE fid = $delete_id";
    if ($con->query($delete_sql) === TRUE) {
        // Item deleted successfully, you can add further actions if needed
    } else {
        echo "Error: " . $delete_sql . "<br>" . $con->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../odr/insert.html">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../odr/insert.html">Add Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contactshow.php">Messages</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-primary" onclick="logout(event)" type="submit"> Logout </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Carousel -->

    <div style=" margin-top: 10px; ">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assert/chick.jpg" class="d-block w-100 " style="height: 450px; " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assert/stick.jpg" class="d-block w-100" style="height: 450px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assert/burger.jpg" class="d-block w-100" style="height: 450px;" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <!-- CARDS -->
    <div class="cart_continer">

        <div class="container">
            <div class="row">
                <?php
                $sql = "select * from products";
                $res = $con->query($sql);
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo  '
                <div id="cartcont" class="col-sm-4 col-lg-3 col-md-3 text-center">
                    <img src="./assert/bdimg/' . $row['img'] . '" alt="" class="cartimg"  width="250" height="200" >
                    <p><strong>' . $row['fname'] . '</strong></p>
                    <p>' . $row['tdiscription'] . '</p>
                    <h4 class="text-danger mt-auto"> Rs.' . $row['price'] . '</h4>
                    <p>
                        <a href="edit_product.php?id=' . $row['fid'] . '" class="btn btn-primary mt-auto" style="width: 75px;" >Edit</a>
                        <a href="?delete_id=' . $row['fid'] . '" class="btn btn-danger mt-auto"  >Delete</a>
                    </p>
                </div>';
                    }
                }
                ?>
            </div>
        </div>


    </div>


    <!-- Off canva -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

        </div>
    </div>

    <!-- FOOTER -->

    <div class="blockcode">
        <footer class="shadow">
            <div class="d-flex justify-content-between align-items-center mx-auto py-4 flex-wrap" style="width: 80%">
                <a href="/#" class="d-flex align-items-center p-0 text-dark">
                    <img src="./assert/bdimg/tasty.webp" alt="logo" style="height: 60px; border-radius: 80% ">

                    <span class="ms-4 h5 font-weight-bold logotxt ">TastyDelight</span>
                </a>
                <small>&copy; Devwares, 2024. All rights reserved.</small>
                <div>
                    <button class="btn btn-dark btn-flat p-2">
                        <i class="fab fa-facebook"></i>
                    </button>
                    <button class="btn btn-dark btn-flat p-2">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="btn btn-dark btn-flat p-2">
                        <i class="fab fa-instagram"></i>
                    </button>

                </div>
            </div>
        </footer>
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