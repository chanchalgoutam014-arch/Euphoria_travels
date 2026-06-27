<?php
include("header.php");
include("config.php");

if(!isset($_GET['ID'])){
    die("Package Not Found");
}

$package_id = $_GET['ID'];

$package_query = "SELECT * FROM tour_package WHERE ID='$package_id'";
$package_result = mysqli_query($db,$package_query);

$package = mysqli_fetch_assoc($package_result);

if(!$package){
    die("Package Not Found");
}

if(isset($_POST['book_btn'])){

    $user_id = $_SESSION['user_id'];

    $travel_date = $_POST['travel_date'];
    $no_of_persons = $_POST['no_of_persons'];

    $package_price = $package['price'];

    $total_amount = $package_price * $no_of_persons;

    $query = "INSERT INTO bookings
    (user_id, package_id, travel_date, no_of_persons, total_amount )
    VALUES
    ('$user_id','$package_id','$travel_date','$no_of_persons','$total_amount')";

    $result = mysqli_query($db,$query);

    if($result){
        echo "<script>alert('Booking Successful');window.location='index.php';</script>";
    }
    else{
        echo "Booking Failed";
    }
}

?>
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Book your destination now!</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">

    <h2><?php echo $package['package_name']; ?></h2>

    <p>
        Price Per Person :
        ₹<?php echo $package['price']; ?>
    </p>

    <form method="POST">

        <div class="mb-3">
            <label>Travel Date</label>
            <input type="date" name="travel_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Number of Persons</label>
            <input type="number" name="no_of_persons" min="1" class="form-control" required>
        </div>

        <button type="submit" name="book_btn" class="btn btn-success">Confirm Booking</button>

    </form>

</div>

<?php

include("footer.php");
?>