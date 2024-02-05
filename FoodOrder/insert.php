<!-- // insert.php -->

<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "food"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare data for insertion
$fname = $_POST['fname'];   
$tdiscription = $_POST['tdiscription'];
$price = $_POST['price'];
$img = $_FILES['img']['name']; 

// Upload image to server
$target_dir = "./assert/bdimg/"; 
$target_file = $target_dir . basename($_FILES["img"]["name"]);

move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

// SQL query to insert data into database
$sql = "INSERT INTO products (fname, tdiscription, price, img) VALUES ('$fname', '$tdiscription', '$price', '$img')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
