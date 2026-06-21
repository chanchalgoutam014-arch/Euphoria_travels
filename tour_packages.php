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

                <div class="col-md-4 mb-4">

                    <div class="card h-100">

                        <img src="package_image/<?php echo $package['image']; ?>" class="card-img-top" height="250">

                        <div class="card-body">

                            <h5 class="card-title"><?php echo $package['package_name']; ?></h5>

                            <p class="card-text"><?php echo $package['description']; ?></p>

                            <p><strong>Duration:</strong><?php echo $package['duration']; ?></p>

                            <p><strong>Price:</strong>₹<?php echo $package['price']; ?></p>

                            <a href="booking.php?package_id=<?php echo $package['ID']; ?>" class="btn btn-primary">Book Now</a>

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