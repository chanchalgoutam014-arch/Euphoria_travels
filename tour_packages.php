<?php
include("header.php");
include("config.php");

$query = "SELECT * FROM tour_package";
$result = mysqli_query($db, $query);



?>

<div class="position-relative" style="height:500px; overflow:hidden;">


    <img src="./images/pexels-kagan-859109088-20320071.jpg" alt="Package Image" style="width:100%; height:100%; object-fit:cover;">

    <!-- Dark Overlay -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45);">
    </div>

    <!-- Text -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">

        <p style="font-size:50px; ">
            Perfect Trips, Unforgettable Memories!
        </p>

    </div>

</div>
<div class="container py-5">
    <div class="row g-4">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!-- Package Card -->

            <div class="container my-5">

                <div class="card shadow border-0 rounded-4 mx-auto" style="max-width:900px;">

                    <div class="row g-0">

                        <!-- Image -->

                        <div class="col-md-5">

                            <img src="package_image/<?php echo $row['image']; ?>"
                                class="img-fluid h-100 w-100 rounded-start"
                                style="height:320px; object-fit:cover;">

                        </div>

                        <!-- Details -->

                        <div class="col-md-7">

                            <div class="card-body p-4">

                                <h2 class="fw-bold">
                                    <?php echo $row['package_name']; ?>
                                </h2>

                                <p class="text-warning mb-2">
                                    ★★★★★
                                </p>

                                <p class="mb-2">
                                    📍 India
                                </p>

                                <p class="mb-2">
                                    🕒 <?php echo $row['duration']; ?>
                                </p>

                                <h3 class="text-primary fw-bold mb-3">
                                    ₹<?php echo $row['price']; ?>
                                </h3>

                                <a href="booking.php?ID=<?php echo $row['ID']; ?>"
                                    class="btn btn-success px-4">
                                    Book Now
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
    </div>
<?php } ?>
</div>
</div>
</div>
</div>

<?php
include("footer.php");
?>