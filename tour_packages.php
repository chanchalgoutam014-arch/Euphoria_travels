<?php
include("header.php");
include("config.php");

$query = "SELECT * FROM tour_package";
$result = mysqli_query($db, $query);


while ($row = mysqli_fetch_assoc($result)) {
?>

<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Available Packages</h1>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container py-5">
        <div class="row g-4">

            <!-- Package Card -->
            <div class="col-lg-4">
                <div class="card h-100 shadow-lg border-0 rounded-4">

                    <div class="card-body d-flex flex-column">

                        <!-- Image -->
                        <img src="package_image/<?php echo $row['image']; ?>" class="img-fluid rounded-4 mb-3" alt="Package Image">

                        <!-- Package Name -->
                        <h3 class="fw-bold"><?php echo $row['package_name']; ?></h3>

                        <!-- Price -->
                        <h4 class="fw-bold text-primary">₹<?php echo $row['price']; ?></h4>

                        <!-- Duration -->
                        <p class="text-muted"><?php echo $row['duration']; ?></p>

                        <!-- Description -->
                        <p><?php echo $row['description']; ?></p>

                        <!-- Button -->
                        <div class="mt-auto">
                            <a href="#" class="btn btn-primary w-100 rounded-pill">
                                View Details
                            </a>
                        </div>

                    </div>
                <?php } ?>
                </div>
            </div>


            <?php include("footer.php"); ?>