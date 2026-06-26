<?php

include("./admin/adminHeader.php");
include("config.php");

if (isset($_POST["login_btn"])) {

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $query = "SELECT * FROM `admin` WHERE `email` = '$email' and `password` = '$password'";

    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result)>0) {

    session_start();
    $row=mysqli_fetch_assoc($result);
    $_SESSION["user_ID"] = $row['ID'];
    $_SESSION["email"] = $row['email'];
      
     echo "<script>window.location.assign('admin_dashboard.php?msg=login sucessfully')</script>";
    
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
                    <h1 class="mb-0">Admin Login</h1>
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
                </form>
            </div>
        </div>
    </div>
</div>
<?php

include("adminFooter.php");

?>