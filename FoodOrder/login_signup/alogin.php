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
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

</head>

<body>
    <div class="continre">

        <?php
        if (isset($_POST["alogin"])) {
            $sql = "select * from admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
            $res = $con->query($sql);
            if ($res->num_rows > 0) {
                $ro = $res->fetch_assoc();
                $_SESSION["AID"] = $ro["AID"];
                $_SESSION["ANAME"] = $ro["ANAME"];
                echo "<script>window.open('../admin_home.php','_self');</script>";
            } else {
                echo "<div class='error'>Invalid Username or Password</div>";
            }
        }
        if (isset($_GET["mes"])) {
            echo "<div class='error'>{$_GET["mes"]}</div>";
        }

        ?>

        <div class="loginimgdiv">
            <img src="../assert/log.jpg" class="loginimg" alt="img">
        </div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logincontainer">
            <div class="logform">
                <h2 id="login">Admin Login</h2>
                <div class="inbox">
                    <input type="text" placeholder="User Name" name="aname" required class="input">
                </div>

                <div class="inbox">
                    <input type="password" placeholder="Password " id="pass" name="apass" required class="input">
                    <span class="icon" onclick="password()">
                        <!-- <i class="fa fa-eye" aria-hidden="true" id="open"></i> -->
                        <!-- <i class="fa fa-eye-slash" aria-hidden="true" id="close"></i> -->
                    </span>
                </div>

                <button type="submit" name="alogin" class="btn">Login</button>
                <h3> <a href="./index.php">User Login</a></h3>
            </div>
        </form>


    </div>
    <script src="../script/login.js"></script>
</body>

</html>