<?php

include("header.php");
include("config.php");


$id = $_GET["ID"];

$query = "SELECT * FROM `destinations` WHERE ID=$id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);





if (isset($_POST["Update"])) {



  $destination_name = $_POST["destination_name"];
  $description = $_POST["description"];
  $category = $_POST["Category"];
  $imageName = $_FILES["image"]["name"];
  $tmp_name = $_FILES["image"]["tmp_name"];

  if ($imageName != "") {
    $new_name = rand() . $imageName;

    $updatequery = "UPDATE `destinations` SET `destination_name`='$destination_name',`description`='$description',`category_image`='$new_name' WHERE ID=$id";
    move_uploaded_file($tmp_name, "category_image/" . $new_name);
  } else {
    $updatequery = "UPDATE `destinations` SET `destination_name`='$destination_name',`description`='$description' WHERE ID=$id";
  }

  $result1 = mysqli_query($db, $updatequery);


  echo "<script>window.location.assign('destinations.php?msg=editsucessfully')</script>";
}




?>
<!-- Hero Section -->
<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <div class="intro-wrap">
          <h1 class="mb-0">Edit Destinations</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">

  <div class="card-body">

    <form action="" method="POST" enctype="multipart/form-data">

      <!-- Destination Name -->
      <div class="mb-3">
        <label class="form-label">Destination Name</label>
        <input type="text" name="destination_name" value="<?php echo $row["destination_name"]; ?>" class="form-control">
      </div>

      <!-- Destination Image -->
      <div class="mb-3">
        <input type="file" class="form-control" name="category_image" id="password" placeholder="Your Image">
        <img src="./destination_image/<?php echo $row["image"] ?>" alt="" class="rounded mx-auto d-block" width="450px">

      </div>

      <!-- Description -->
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="5"><?php echo $row['description']; ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="Category" value="<?php echo $row['category']; ?>" class="form-control">
      </div>


      <!-- Submit Button -->
      <button type="submit" name="Update" class="btn btn-primary"> Update </button>

    </form>

  </div>

</div>

</div>

<?php
include("footer.php");
?>