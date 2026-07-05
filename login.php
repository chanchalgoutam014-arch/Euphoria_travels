<?php

include("header.php");
include("config.php");

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Step 1: Check Email
    $checkEmail = mysqli_query($db, "SELECT * FROM user WHERE email='$email'");

    if (mysqli_num_rows($checkEmail) == 0) {
        header("Location: login.php?msg=No account found with this email. Please register first.&type=warning");
        exit();
    }

    // Step 2: Check Password
    $checkLogin = mysqli_query($db, "SELECT * FROM user WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($checkLogin) > 0) {
        session_start();

        $row = mysqli_fetch_assoc($checkLogin);

        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['email'] = $row['email'];

        header("Location:index.php");
        exit();
    } else {
        header("Location: login.php?msg=Incorrect password. Please try again.&type=danger");
        exit();
    }
}

if (isset($_POST["login_btn"])) {

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $query = "SELECT * FROM `user` WHERE `email` = '$email' and `password` = '$password'";

    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {

        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $row['ID'];
        $_SESSION["email"] = $row['email'];

        echo "<script>window.location.assign('index.php?msg=login sucessfully')</script>";
    } else {

        echo "<script>window.location.assign('login.php?msg=login unsucessfully')</script>";
    }
}

?>

<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Login</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form method="POST" class="contact-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-black" for="email">Email address</label>
                                <input name="email" type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label class="text-black">Password</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="text-center mt-3">
                                <button name="login_btn" type="submit" class="btn btn-primary mb-5">
                                    Login
                                </button>
                            </div>
                            <div class="text-center mt-3">

                                <p class="mb-0">

                                    New to Euphoria Travels?

                                    <a href="register.php" class="text-primary font-weight-bold">

                                        Register Now

                                    </a>

                                </p>

                            </div>
                </form>
                <?php
                if (isset($_GET['msg'])) {
                    $class = "alert-info";

                    if (isset($_GET['type'])) {
                        if ($_GET['type'] == "warning") {
                            $class = "alert-warning";
                        } elseif ($_GET['type'] == "danger") {
                            $class = "alert-danger";
                        }
                    }
                ?>

                    <div class="alert <?php echo $class; ?> mt-3">

                        <?php echo $_GET['msg']; ?>

                        <?php
                        if (isset($_GET['type']) && $_GET['type'] == "warning") {
                        ?>
                            <br>
                            <a href="register.php" class="font-weight-bold">
                                Create a New Account
                            </a>
                        <?php
                        }
                        ?>

                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php

include("footer.php");

?>