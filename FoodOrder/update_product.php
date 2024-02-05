<!-- update_product.php -->


<?php
include "./config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['id'], $_POST['fname'], $_POST['tdiscription'], $_POST['price'])) {
        // Sanitize input data
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $tdiscription = $_POST['tdiscription'];
        $price = $_POST['price'];

        // Update query
        $update_sql = "UPDATE products SET fname='$fname', tdiscription='$tdiscription', price='$price' WHERE fid='$id'";

        if ($con->query($update_sql) === TRUE) {
            // Redirect back to the admin page after successful update
            header("Location: admin_home.php");
            exit();
        } else {
            echo "Error updating record: " . $con->error;
        }
    } else {
        echo "All fields are required!";
    }
} else {
    // Redirect to the admin page if accessed directly without form submission
    header("Location: admin_home.php");
    exit();
}
?>
