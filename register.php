<?php

include("header.php");
include("config.php");

if (isset($_POST["register_btn"])) {

    $F_name = $_POST["F_name"];
    $L_name = $_POST["L_name"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $contact = $_POST["contact"];
    $address = $_POST["address"];

    $query = "INSERT INTO `user`(`F_name`, `L_name`, `email`, `password`, `contact`, `address`) VALUES ('$F_name','$L_name','$email','$password','$contact','$address')";

    $result = mysqli_query($db, $query);

    if ($result) {

        echo "<script>window.location.assign('index.php?msg=login sucessfully')</script>";
    } else {

        echo ("not added");
    }
}

?>

<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Register</h1>
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
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">First name</label>
                                <input name="F_name" type="text" class="form-control" id="fname">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-black" for="lname">Last name</label>
                                <input name="L_name" type="text" class="form-control" id="lname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label class="text-black">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="text-black">Contact</label>
                        <input name="contact" type="number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="text-black">Address</label>
                        <textarea name="address" class="form-control" cols="30" rows="5"></textarea>
                    </div>

                    <div class="text-center mt-3">
                        <button name="register_btn" type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

include("footer.php");

?>