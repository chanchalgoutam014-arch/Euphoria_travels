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

if($_SERVER['REQUEST_METHOD'] == 'POST'){

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

    <form method="POST" id="enrollform">

        <div class="mb-3">
            <label>Travel Date</label>
            <input type="date" name="travel_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Number of Persons</label>
            <input type="number" name="no_of_persons" min="1" class="form-control" required>
        </div>

        <button type="submit" name="book_btn" id="rzp-button1" class="btn btn-success">Confirm Booking</button>

    </form>

</div>

<?php

include("footer.php");
?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_TCq0HiDbRGNnXu", // Enter the Key ID generated from the Dashboard
    "amount": <?php echo $total_amount * 100; ?>, // Amount is in currency subunits. 
    "currency": "INR",
    "name": "Acme Corp", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    handler: function (response){
        document.getElementById("enrollform").submit();
    },
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": "Gaurav Kumar", //your customer's name
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210" //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>