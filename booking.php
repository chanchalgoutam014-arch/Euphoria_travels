<?php
include("header.php");
include("config.php");

if (!isset($_SESSION["email"])) {
    header("Location: ./login.php?msg=Login First");
    exit();
}

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
<div class="position-relative" style="height:500px; overflow:hidden;">

    <!-- Package Image -->
    <img src="package_image/<?php echo $package['image']; ?>" alt="Package Image" style="width:100%; height:100%; object-fit:cover;">

    <!-- Dark Overlay -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45);">
    </div>

    <!-- Text -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">

        <p style="font-size:50px; ">
            Book your destination now!
        </p>

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