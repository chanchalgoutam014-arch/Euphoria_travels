<?php

include("config.php");
include("header.php");

if (!isset($_GET['ID'])) {
    die("Destination not found");
}
$destination_id = $_GET['ID'];

/* Destination Fetch */

$destination_query = "SELECT * FROM destinations WHERE ID ='$destination_id'";

$destination_result = mysqli_query($db, $destination_query);

$destination = mysqli_fetch_assoc($destination_result);

?>

<div class="container mt-5">

    <!-- Destination Section -->

    <div class="row mb-5">

        <div class="col-md-6">

            <img src="destination_image/<?php echo $destination['image']; ?>" class="img-fluid rounded">

        </div>

        <div class="col-md-6">

            <h2><?php echo $destination['destination_name']; ?></h2>

            <p><?php echo $destination['description']; ?></p>

            <p><strong>Category:</strong><?php echo $destination['category']; ?></p>

        </div>

    </div>

    <!-- Packages Section -->

    <h3 class="mb-4">Available Packages</h3>

    <div class="row">

        <?php

        $package_query = "SELECT * FROM tour_package WHERE destination_id ='$destination_id'";

        $package_result = mysqli_query($db, $package_query);

        if (mysqli_num_rows($package_result) > 0) {
            while ($package = mysqli_fetch_assoc($package_result)) {
        ?>

                <div class="container py-5">
    
    <div class="text-center mb-5">
        <h2>Tour Packages</h2>
        <p class="text-muted">Choose your perfect travel package</p>
    </div>

    <div class="row g-4">

        <!-- Basic Package -->
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <span class="badge rounded-pill text-bg-light border">
                        Basic
                    </span>

                    <h1 class="fw-bold mt-3">₹9,999</h1>
                    <p class="text-muted">3 Days / 2 Nights</p>

                    <div class="border rounded-4 p-3 mb-4">
                        <h5 class="mb-0">Leh Tour</h5>
                        <small class="text-muted">Hotel + Transport</small>
                    </div>

                    <ul class="list-unstyled">
                        <li class="mb-2">✔ Hotel Stay</li>
                        <li class="mb-2">✔ Breakfast Included</li>
                        <li class="mb-2">✔ Sightseeing</li>
                        <li class="mb-2">✔ Shared Transport</li>
                    </ul>

                    <hr>

                    <a href="#" class="btn btn-light w-100 rounded-pill">
                        Book Now
                    </a>

                </div>
            </div>
        </div>

        <!-- Premium Package -->
        <div class="col-lg-4">
            <div class="card h-100 border border-3 border-primary shadow rounded-4">
                <div class="card-body p-4">

                    <span class="badge rounded-pill bg-primary">
                        Most Popular
                    </span>

                    <h1 class="fw-bold text-primary mt-3">₹24,999</h1>
                    <p class="text-muted">7 Days / 6 Nights</p>

                    <div class="border rounded-4 p-3 mb-4">
                        <h5 class="mb-0">Dubai Tour</h5>
                        <small class="text-muted">4★ Hotel + Flights</small>
                    </div>

                    <ul class="list-unstyled">
                        <li class="mb-2">✔ Everything in Basic</li>
                        <li class="mb-2">✔ Airport Pickup</li>
                        <li class="mb-2">✔ Guided Tours</li>
                        <li class="mb-2">✔ Priority Support</li>
                    </ul>

                    <hr>

                    <a href="#" class="btn btn-primary w-100 rounded-pill">
                        Book Premium
                    </a>

                </div>
            </div>
        </div>

        <!-- Luxury Package -->
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <span class="badge rounded-pill bg-dark">
                        Luxury
                    </span>

                    <h1 class="fw-bold mt-3">₹49,999</h1>
                    <p class="text-muted">10 Days / 9 Nights</p>

                    <div class="border rounded-4 p-3 mb-4">
                        <h5 class="mb-0">Tokyo Tour</h5>
                        <small class="text-muted">5★ Resort + Guide</small>
                    </div>

                    <ul class="list-unstyled">
                        <li class="mb-2">✔ Everything in Premium</li>
                        <li class="mb-2">✔ Private Transport</li>
                        <li class="mb-2">✔ Luxury Resort</li>
                        <li class="mb-2">✔ VIP Experiences</li>
                    </ul>

                    <hr>

                    <a href="#" class="btn btn-dark w-100 rounded-pill">
                        Book Luxury
                    </a>

                </div>
            </div>
        </div>

    </div>
</div>

        <?php
            }
        } else {
            echo "<p>No packages available.</p>";
        }
        ?>

    </div>

</div>

<?php include("footer.php"); ?>