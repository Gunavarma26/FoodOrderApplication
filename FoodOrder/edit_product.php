<!-- edit_product.php -->

<?php
include "./config.php";

// Check if product ID is provided
if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];

    // Retrieve product details from the database based on the provided ID
    $edit_sql = "SELECT * FROM products WHERE fid = $edit_id";
    $result = $con->query($edit_sql);

    // Check if product exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch product details
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/edit.css">
    <title>Edit Product</title>
</head>

<body>

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
                        <a class="nav-link " href="./admin_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../odr/insert.html">Add Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contactshow.php">Messages</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-edit" onclick="logout(event)" type="submit"> Logout </button>
                </form>
            </div>
        </div>
    </nav>


    <form class="editfrom" method="post" action="update_product.php" enctype="multipart/form-data">
        <h2 style="text-align: center; font-style:italic;" >EDIT DATAS HERE</h2>
        <input type="hidden" name="id" value="<?php echo $row['fid']; ?>">
        <div class="mb-3">
            <label for="fname" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['fname']; ?>">
        </div>
        <div class="mb-3">
            <label for="tdiscription" class="form-label">Description</label>
            <textarea class="form-control" id="tdiscription" name="tdiscription"><?php echo $row['tdiscription']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label>Current Image:</label><br>
            <img class="editimg" src="./assert/bdimg/<?php echo $row['img']; ?>" alt="Current Image" style="max-width: 200px;">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script>
        function logout(event) {
            event.preventDefault();
            window.location.href = './login_signup/index.php';
        }
    </script>

</body>

</html>
<?php
    } else {
        echo "Product not found!";
    }
} else {
    echo "Product ID not provided!";
}
?>
