<?php

include("header.php");
include("config.php");

$query = mysqli_query($db, "SELECT reviewa.*, user.F_name, user.L_name
FROM reviewa
INNER JOIN user ON reviewa.user_id = user.id
ORDER BY reviewa.ID DESC");

$query1 = mysqli_query($db, "SELECT image FROM destinations ORDER BY ID DESC LIMIT 6");
?>

<div class="position-relative" style="height:500px; overflow:hidden;">


  <img src="./images/pexels-padrinan-2882509.jpg" alt="Package Image" style="width:100%; height:100%; object-fit:cover;">

  <!-- Dark Overlay -->
  <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45);">
  </div>

  <!-- Text -->
  <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">

    <p style="font-size:50px; ">
      Your Trusted Travel Partner!
    </p>

  </div>

</div>

<div class="untree_co-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="owl-single dots-absolute owl-carousel">
         <?php while($row = mysqli_fetch_assoc($query1)) { ?>

        <img src="./destination_image/<?php echo $row['image']; ?>"
             class="img-fluid rounded-4"
             style="height:600px; width:100%; object-fit:cover;">

    <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container py-5">
  <div class="row g-4">

    <?php while ($row = mysqli_fetch_assoc($query)) { ?>

      <div class="col-lg-4 col-md-6">

        <div class="card h-100 shadow border-0"
          style="border-radius:15px; transition:.3s;">

          <div class="card-body text-center">

            <!-- User Icon -->
            <div style="width:70px;height:70px;background:#0d6efd;color:#fff;
                    border-radius:50%;display:flex;align-items:center;
                    justify-content:center;font-size:28px;margin:auto;">
              <i class="fas fa-user"></i>
            </div>

            <h5 class="mt-3 mb-1">
              <?php echo htmlspecialchars($row['F_name'] . ' ' . $row['L_name']); ?>
            </h5>

            <!-- Rating -->
            <div class="mb-3">

              <?php
              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $row['rating'])
                  echo '<i class="fas fa-star text-warning"></i>';
                else
                  echo '<i class="far fa-star text-warning"></i>';
              }
              ?>

            </div>

            <p class="text-muted fst-italic">
              "<?php echo htmlspecialchars($row['review']); ?>"
            </p>

          </div>

          <div class="card-footer bg-white text-center border-0">
            <small class="text-secondary">
              <?php echo date("d M Y", strtotime($row['created_at'])); ?>
            </small>
          </div>

        </div>

      </div>

    <?php } ?>

  </div>
</div>

<div class="untree_co-section">
  <div class="container">
    <div class="row justify-content-between align-items-center">

      <div class="col-lg-6">
        <figure class="img-play-video">
          <a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=mwtbEGNABWU" data-fancybox>
            <span></span>
          </a>
          <img src="images/hero-slider-2.jpg" alt="Image" class="img-fluid rounded-20">
        </figure>
      </div>

      <div class="col-lg-5">
        <h2 class="section-title text-left mb-4">Take a look at Tour Video</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>

        <ul class="list-unstyled two-col clearfix">
          <li>Outdoor recreation activities</li>
          <li>Airlines</li>
          <li>Car Rentals</li>
          <li>Cruise Lines</li>
          <li>Hotels</li>
          <li>Railways</li>
          <li>Travel Insurance</li>
          <li>Package Tours</li>
          <li>Insurance</li>
          <li>Guide Books</li>
        </ul>

        <p><a href="./destinations.php" class="btn btn-primary">Get Started</a></p>


      </div>
    </div>
  </div>
</div>

<div class="py-5 cta-section">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
        <p class="mb-0"><a href="./contact.php" class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
      </div>
    </div>
  </div>
</div>
<?php

include("footer.php");

?>