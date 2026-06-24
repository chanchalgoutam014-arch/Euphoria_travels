<?php

include("header.php");
include("./config.php");


if (isset($_POST["add_destination"])) {



  $destination_name = $_POST["destination_name"];
  $image = $_FILES["image"]["name"];
  $tmp_name = $_FILES["image"]["tmp_name"];
  $new_name = rand() . $image;
  $description = $_POST["description"];
  $category = $_POST["Category"];

  $query = "INSERT INTO `destinations`(`destination_name`,`image`,`description`,`category`) VALUES ('$destination_name','$new_name','$description','$category')";

  $result = mysqli_query($db, $query);

  if ($result) {

    move_uploaded_file($tmp_name, "destination_image/" . $new_name);

    echo "<script>window.location.assign('destinations.php?msg=addedsucessfully')</script>";
  } else {
    echo ("not added");
  }
}
?>
<!-- Hero Section -->
<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <div class="intro-wrap">
          <h1 class="mb-0">Add New Destinations</h1>
          <p class="text-white">
            Discover breathtaking domestic and international destinations for your next unforgettable journey.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">

  <div class="card shadow">

    <div class="card-header d-flex justify-content-center">
      <h3>Add Destination</h3>
    </div>

    <div class="card-body">

      <form action="" method="POST" enctype="multipart/form-data">

        <!-- Destination Name -->
        <div class="mb-3">
          <label class="form-label">Destination Name</label>
          <input type="text" name="destination_name" class="form-control" required>
        </div>

        <!-- Destination Image -->
        <div class="mb-3">
          <label class="form-label">Destination Image</label>
          <input type="file" name="image" class="form-control" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
          <label>Category</label>
          <select name="Category" class="form-control">
            <option value="">Select Category</option>
            <option value="Domestic">Domestic</option>
            <option value="International">International</option>
          </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" name="add_destination" class="btn btn-primary"> Add Destination </button>

      </form>

    </div>

  </div>

</div>

<?php
include("footer.php");
?>