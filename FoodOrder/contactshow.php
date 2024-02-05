<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/contact.css">
    <title>Contact List</title>
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
                        <a class="nav-link " href="./admin_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../odr/insert.html">Add Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Messages</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-primary" onclick="logout(event)" type="submit"> Logout </button>
                </form>
            </div>
        </div>
    </nav>


    <h1>Contact List</h1>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from database
    $sql = "SELECT * FROM contacts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="showmessage">' .
                '<p>Name: ' . $row["name"] . '</p>' .
                '<p>Email: ' . $row["email"] . '</p>' .
                '<p>Message: ' . $row["message"] . '</p>' .
                '<hr>' .
                '</div>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <script>
        function logout(event) {
            event.preventDefault();
            window.location.href = './login_signup/index.php';
        }
    </script>

</body>

</html>