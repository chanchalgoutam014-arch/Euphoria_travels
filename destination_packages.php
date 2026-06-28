<?php
include("header.php");
include("config.php");


$destination_id = $_GET['ID'];

/* Destination Details */
$destination_query = "SELECT * FROM destinations WHERE ID='$destination_id'";
$destination_result = mysqli_query($db, $destination_query);
$destination = mysqli_fetch_assoc($destination_result);

/* Packages of that Destination */
$package_query = "SELECT * FROM tour_package WHERE destination_id='$destination_id'";
$package_result = mysqli_query($db, $package_query);
?>
<div class="position-relative" style="height:500px; overflow:hidden;">


    <img src="destination_image/<?php echo $destination['image']; ?>" style="width:100%; height:100%; object-fit:cover;">

    <!-- Dark Overlay -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45);">
    </div>

    <!-- Text -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">

        <h1 class="mb-0" style="font-size:50px; "> <?php echo $destination['destination_name']; ?></h1>

    </div>

</div>
<div class="container py-5">

    <h2 class="text-center mb-4">
        Packages
    </h2>

    <div class="row">

        <?php while ($package = mysqli_fetch_assoc($package_result)) { ?>

            <div class="col-md-4 mb-4">

                <div class="card shadow h-100">

                    <img src="package_image/<?php echo $package['image']; ?>"
                        class="card-img-top"
                        style="height:250px; object-fit:cover;">

                    <div class="card-body">

                        <h5><?php echo $package['package_name']; ?></h5>

                        <p>
                            <?php echo substr($package['description'], 0, 100); ?>...
                        </p>

                        <p>
                            <strong>Duration:</strong>
                            <?php echo $package['duration']; ?>
                        </p>

                        <p>
                            <strong>₹<?php echo $package['price']; ?></strong>
                        </p>

                        <a href="booking.php?ID=<?php echo $package['ID']; ?>"
                            class="btn btn-success px-4">
                            Book Now
                        </a>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

<?php include("footer.php"); ?>