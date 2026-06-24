<?php
include("header.php");
include("config.php");


$id = $_GET["ID"];
$query = "SELECT * FROM tour_package WHERE ID=$id";
$result = mysqli_query($db, $query);
?>
<div class="container py-5">

    <h2 class="text-center mb-5">
        Available Packages
    </h2>

    <div class="row">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <div class="col-md-4 mb-4">

                <div class="card shadow h-100">

                    <img src="package_image/<?php echo $row['image']; ?>" class="card-img-top" style="height:280px; object-fit:cover;">

                    <div class="card-body">

                        <h5><?php echo $row['package_name']; ?></h5>

                        <p>
                            <?php echo substr($row['description'], 0, 100); ?>...
                        </p>

                        <p>
                            <strong>Duration:</strong>
                            <?php echo $row['duration']; ?>
                        </p>

                        <p>
                            <strong>₹<?php echo $row['price']; ?></strong>
                        </p>

                        <a href="package_details.php?ID=<?php echo $row['ID']; ?>" class="btn btn-primary">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

<?php include("footer.php"); ?>