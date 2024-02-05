<!-- view.php -->

<?php
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/view.css">
</head>

<body class="viewcontainer">

    <div class="viwecon" >

        <div class="container">
            <div class="row viewrow ">
                <a href='viewCart.php'  class="viewcart" >View Cart</a>
                <?php
                if (isset($_POST["addCart"])) {
                    if (isset($_SESSION["cart"])) {
                        $fid_array = array_column($_SESSION["cart"], "fid");
                        if (!in_array($_GET["id"], $fid_array)) {
                            $index = count($_SESSION["cart"]);
                            $item = array(
                                'fid' => $_GET["id"],
                                'pname' => $_POST["pname"],
                                'price' => $_POST["price"],
                                'qty' => $_POST["qty"]
                            );
                            $_SESSION["cart"][$index] = $item;
                            echo "<script>alert('Product Added..');</script>";
                            header("location:viewCart.php");
                        } else {
                            echo "<script>alert('Already Added..');</script>";
                        }
                    } else {
                        $item = array(
                            'fid' => $_GET["id"],
                            'pname' => $_POST["pname"],
                            'price' => $_POST["price"],
                            'qty' => $_POST["qty"]
                        );
                        $_SESSION["cart"][0] = $item;
                        echo "<script>alert('Product Added..');</script>";
                        header("location:viewCart.php");
                    }
                }

                $sql = "select * from products where fid='{$_GET["id"]}'";
                $res = $con->query($sql);
                if ($res->num_rows > 0) {
                    echo '<form action="' . $_SERVER["REQUEST_URI"] . '" method="post">';
                    if ($row = $res->fetch_assoc()) {
                        echo  '
                    <div class="col-sm-4 col-lg-3 col-md-3 text-center imgcon ">    
                        <img src="./assert/bdimg/' . $row['img'] . '"  alt="" class="img-responsive viewimg " >
                        <p><strong><a href="#" class="fname" >' . $row['fname'] . '</a></strong></p>
                        <h4 class="price"> Rs.' . $row['price'] . '</h4>
                        <h4 class="text"> Rs.' . $row['tdiscription'] . '</h4>
                        
                        <p><input type="text"  placeholder="Enter Qty" name="qty"  class="form-control"></p>
                        <p><input type="hidden"  name="pname" value="' . $row['fname'] . '" class="form-control"></p>
                        <p><input type="hidden"  name="price" value="' . $row['price'] . '" class="form-control"></p>
                        <p><input type="submit" name="addCart" class="btn btn-success" value="Add to Cart"></p>
                    </div>
                    ';
                    }
                    echo '</form>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>