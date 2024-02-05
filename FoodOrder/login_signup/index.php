<!-- login.html -->
<?php
$con = new mysqli("localhost", "root", "", "food");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link rel="stylesheet" href="../css//login.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

</head>

<body>
    <div class="login">

        <?php
        if (isset($_POST["ulogin"])) {
            $sql = "select * from user where UNAME='{$_POST["uname"]}' and UPASS='{$_POST["upass"]}'";
            $res = $con->query($sql);
            if ($res->num_rows > 0) {
                $ro = $res->fetch_assoc();
                $_SESSION["UID"] = $ro["UID"];
                $_SESSION["UNAME"] = $ro["UNAME"];
                echo "<script>window.open('../user_home.php','_self');</script>";
            } else {
                echo "<div class='error'>Invalid Username or Password</div>";
            }
        }
        if (isset($_GET["mes"])) {
            echo "<div class='error'>{$_GET["mes"]}</div>";
        }

        ?>
        <div class="loginimgdiv">
            <img src="../assert/log2.jpg" class="loginimg" alt="img">
        </div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logincontainer">

            <div class='logjob'>
                <span class='job'>Tasty</span><span class='search'>Delight</span>
            </div>
            <div>
                <span style='font-family: cursive; font-size: 16px; font-weight: 555; color: gray;'>Welcome back &#x1F44B; </span>
                <p style='font-family: cursive; font-size: 16px; font-weight: 555; color: gray;'>Login to your account below</p>
            </div>

            <div class="logform">
                <!-- <h2 id="login">Login</h2> -->
                <div class="inbox">
                    <input type="text" placeholder="User Name" name="uname" required class="input">
                </div>

                <div class="inbox">
                    <input type="password" placeholder="Password " id="pass" name="upass" required class="input">
                    <span class="icon" onclick="password()">
                        <!-- <i class="fa fa-eye" aria-hidden="true" id="open"></i> -->
                        <!-- <i class="fa fa-eye-slash" aria-hidden="true" id="close"></i> -->
                    </span>
                </div>
                <button type="submit" name="ulogin" class="btn">Login</button>
                <h3>Don't have an account? <a href="./signup.html">Signup</a></h3>
            </div>
            <h3 class="admin"> Are you an administrator? <a href="./alogin.php">Admin Login</a></h3>
        </form>

    </div>
    <script src="../script/login.js"></script>
</body>

</html>