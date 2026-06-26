<?php

include("header.php");
include("config.php");

?>
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Destinations</h1>
                </div>
            </div>
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