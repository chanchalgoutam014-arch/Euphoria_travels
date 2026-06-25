<?php

include("header.php");
include("config.php");

?>
<div class="position-relative text-white overflow-hidden" style="height:500px;">

    <!-- Background Image -->
    <img src="images/bg-image.jpg"; class="position-absolute top-0 start-0 w-100 h-200"  style="object-fit:cover; filter:blur(2px);">

    <!-- Dark Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>

    <!-- Content -->
    <div class="position-relative h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">

            <span class="badge bg-warning text-dark mb-3">
                ✈ Explore The World
            </span>

            <h1 class="display-3 fw-bold mb-3">
                Discover Amazing Destinations
            </h1>

            <p class="lead">
                Discover breathtaking domestic and international destinations
                for your next unforgettable journey.
            </p>

        </div>
    </div>

</div>
<!-- Domestic Destinations -->
<div class="container py-2">

  <h2 class="text-center mb-5 mt-5">Domestic Destinations</h2>

  <div class="row">

    <?php

    $query = "SELECT * FROM destinations WHERE category='Domestic'";

    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>

      <div class="col-md-4 mt-5 mb-5">
        <div class="card text-center shadow">
          <img src="/admin/destination_image/<?php echo $row['image']; ?>" class="card-img-top" style="height:280px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['destination_name']; ?></h5>
            <p class="card-text"><?php echo $row['description']; ?>...</p>
            <a href="destination_packages.php?ID=<?php echo $row['ID']; ?>" class="btn btn-primary"> View Packages </a>
          </div>
        </div>
      </div>

    <?php
    }
    ?>

  </div>
</div>

<!-- International Destinations -->
<div class="container py-2">

  <h2 class="text-center mb-5 mt-5">International Destinations</h2>

  <div class="row">

    <?php

    $query = "SELECT * FROM destinations WHERE category='International'";

    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>

      <div class="col-md-4 mt-5 mb-5">
        <div class="card text-center shadow">
          <img src="destination_image/<?php echo $row['image']; ?>" class="card-img-top" style="height:280px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['destination_name']; ?></h5>
            <p class="card-text"><?php echo substr($row['description'], 0, 100); ?>...</p>
            <a href="destination_packages.php?ID=<?php echo $row['ID']; ?>" class="btn btn-primary"> Explore </a>
          </div>
        </div>
      </div>

    <?php
    }
    ?>

  </div>
</div>

<?php

include("footer.php");

?>