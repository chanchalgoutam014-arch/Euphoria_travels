<?php

include("adminHeader.php");
include("../config.php");

if (isset($_POST['submit'])) {
    $destination_id = $_POST['destination_id'];
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "../package_image/" . $image);

    $query = "INSERT INTO tour_package(destination_id, package_name, image, description, duration, price) VALUES ('$destination_id','$package_name','$image','$description','$duration','$price')";

    mysqli_query($db, $query);

    echo "<script>alert('Package Added Successfully');</script>";
}

?>
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Add Tour Package</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Destination</label>

            <select name="destination_id" class="form-control" required>

                <option value="">Select Destination</option>

                <?php

                $destination_query = "SELECT * FROM destinations";
                $destination_result = mysqli_query($db, $destination_query);

                while ($destination = mysqli_fetch_assoc($destination_result)) {
                ?>

                    <option value="<?php echo $destination['ID']; ?>">
                        <?php echo $destination['destination_name']; ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Package Name</label>
            <input type="text" name="package_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Package Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" placeholder="5 Days 4 Nights">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select name="status" class="form-control">

                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>

            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">
            Add Package
        </button>

    </form>

</div>

<?php 

include("adminFooter.php");

?>