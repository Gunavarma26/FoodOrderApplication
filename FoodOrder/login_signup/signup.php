<!-- // signup.php -->

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
$uname = $_POST['UNAME'];   
$upass = $_POST['UPASS'];

// SQL query to insert data into database
$sql = "INSERT INTO user (UNAME, UPASS) VALUES ('$uname', '$upass')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
