<?php
include("header.php");
include("config.php");


if (!isset($_GET['ID'])) {
    die("Package Not Found");
}

$package_id = $_GET['ID'];

$package_query = "SELECT * FROM tour_package WHERE ID='$package_id'";
$package_result = mysqli_query($db, $package_query);

$package = mysqli_fetch_assoc($package_result);

if (!$package) {
    die("Package Not Found");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $_SESSION['user_id'];

    $travel_date = $_POST['travel_date'];
    $no_of_persons = $_POST['no_of_persons'];

    $package_price = $package['price'];

    $total_amount = $package_price * $no_of_persons;

    $query = "INSERT INTO bookings
    (user_id, package_id, travel_date, no_of_persons, total_amount )
    VALUES
    ('$user_id','$package_id','$travel_date','$no_of_persons','$total_amount')";

    $result = mysqli_query($db, $query);
}

?>
<div class="position-relative" style="height:280px; overflow:hidden;">

    <!-- Package Image -->
    <img src="package_image/<?php echo $package['image']; ?>" alt="Package Image" style="width:100%; height:100%; object-fit:cover;">

    <!-- Dark Overlay -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45);">
    </div>

    <!-- Text -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">

        <p style="font-size:50px; margin-top: 0;">
            Book your destination now!
        </p>

    </div>

</div>


<div class="container-fluid py-5" style="background-color:#f5efeb;">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card border-0 shadow-lg rounded-4"
                    style="overflow:hidden;">

                    <!-- Card Heading -->
                    <div class="p-4 text-white"
                        style="background-color:#1d2d44;">

                        <h3 class="mb-2 fw-bold">
                            <i class="fas fa-plane-departure me-2"></i>
                            Complete Your Booking
                        </h3>

                        <p class="mb-0 text-white-50">
                            Get ready to explore your dream destination!
                        </p>

                    </div>

                    <div class="card-body p-4 p-md-5">

                        <form method="POST" id="enrollform">

                            <div class="row g-4">

                                <!-- Package Details -->
                                <div class="col-12">

                                    <h5 class="fw-bold mb-3"
                                        style="color:#1d2d44;">
                                        <i class="fas fa-suitcase me-2"></i>
                                        Selected Tour Package
                                    </h5>

                                    <div class="p-3 rounded-3"
                                        style="background-color:#f5efeb;">

                                        <h4 class="fw-bold mb-2">
                                            <?php echo $package['package_name']; ?>
                                        </h4>

                                        <h5 class="mb-0"
                                            style="color:#344966;">
                                            ₹<?php echo number_format($package['price']); ?>
                                            <small class="text-muted fs-6">
                                                / Person
                                            </small>
                                        </h5>

                                    </div>

                                </div>

                                <!-- Travel Information -->
                                <div class="col-12 mt-4">

                                    <h5 class="fw-bold mb-3"
                                        style="color:#1d2d44;">
                                        <i class="fas fa-calendar-check me-2"></i>
                                        Travel Information
                                    </h5>

                                </div>

                                <!-- Travel Date -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        <i class="far fa-calendar-alt me-2"
                                            style="color:#344966;"></i>
                                        Travel Date
                                    </label>

                                    <input type="date"
                                        name="travel_date"
                                        class="form-control form-control-lg"
                                        min="<?php echo date('Y-m-d'); ?>"
                                        required>

                                    <small class="text-muted">
                                        Select your preferred travel date.
                                    </small>

                                </div>

                                <!-- Number of Persons -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-users me-2"
                                            style="color:#344966;"></i>
                                        Number of Travellers
                                    </label>

                                    <input type="number"
                                        name="no_of_persons"
                                        id="persons"
                                        class="form-control form-control-lg"
                                        min="1"
                                        max="20"
                                        value="1"
                                        required>

                                    <small class="text-muted">
                                        Enter the total number of travellers.
                                    </small>

                                </div>

                                <!-- Booking Summary -->
                                <div class="col-12 mt-4">

                                    <div class="p-4 rounded-3"
                                        style="background-color:#f5efeb;">

                                        <h5 class="fw-bold mb-3"
                                            style="color:#1d2d44;">
                                            <i class="fas fa-receipt me-2"></i>
                                            Booking Summary
                                        </h5>

                                        <div class="d-flex justify-content-between mb-3">

                                            <span class="text-muted">
                                                Price Per Person
                                            </span>

                                            <strong>
                                                ₹<?php echo number_format($package['price']); ?>
                                            </strong>

                                        </div>

                                        <div class="d-flex justify-content-between mb-3">

                                            <span class="text-muted">
                                                Number of Travellers
                                            </span>

                                            <strong id="person_count">1</strong>

                                        </div>

                                        <hr>

                                        <div class="d-flex justify-content-between align-items-center">

                                            <h5 class="fw-bold mb-0"
                                                style="color:#1d2d44;">
                                                Total Amount
                                            </h5>

                                            <h3 class="fw-bold mb-0"
                                                id="total_amount"
                                                style="color:#344966;">
                                                ₹<?php echo number_format($package['price']); ?>
                                            </h3>

                                        </div>

                                    </div>

                                </div>

                                <!-- Confirm Booking -->
                                <div class="col-12 mt-4">

                                    <button type="submit"
                                        name="book_btn"
                                        id="rzp-button1"
                                        class="btn btn-lg text-white w-100 rounded-pill py-3 fw-bold"
                                        style="background-color:#1d2d44;">

                                        <i class="fas fa-lock me-2"></i>
                                        Proceed to Payment

                                        <i class="fas fa-arrow-right ms-2"></i>

                                    </button>

                                    <p class="text-center text-muted small mt-3 mb-0">
                                        <i class="fas fa-shield-alt me-1"></i>
                                        Secure payment powered by Razorpay
                                    </p>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Automatic Total Calculation -->
<script>
    const persons = document.getElementById("persons");

    const personCount = document.getElementById("person_count");

    const totalAmount = document.getElementById("total_amount");

    const price = <?php echo (float)$package['price']; ?>;

    function updateTotal() {

        let count = parseInt(persons.value) || 1;

        personCount.innerText = count;

        let total = price * count;

        totalAmount.innerText = "₹" + total.toLocaleString("en-IN");

    }

    persons.addEventListener("input", updateTotal);

    updateTotal();
</script>


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
        handler: function(response) {
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
    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }
</script>