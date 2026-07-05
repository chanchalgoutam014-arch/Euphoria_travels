<?php

include("header.php");
include("config.php");

if (isset($_POST['send'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $query = "INSERT INTO enquiry (name, email, subject, message )
              VALUES('$name','$email','$subject','$message')";

  $result = mysqli_query($db, $query);

  if ($result) {
    echo "<script>alert('Enquiry Sent Successfully');</script>";
  } else {
    echo "<script>alert('Enquiry Not Sent');</script>";
  }
}

?>

<div class="position-relative" style="height:500px; overflow:hidden;">


  <img src="./images/pexels-jep-gambardella-7690080.jpg" alt="Package Image" style="width:100%; height:100%; object-fit:cover;">

  <!-- Dark Overlay -->
  <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45);">
  </div>

  <!-- Text -->
  <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">

    <p style="font-size:50px; ">
      Reach Out. We'll Take Care of the Rest!
    </p>

  </div>

</div>


<div class="container py-5">

  <div class="row g-5">

    <!-- Enquiry Form -->

    <div class="col-lg-8">

      <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-5">

          <h2 class="text-center mb-4">

            Send an Enquiry

          </h2>

          <form action="" method="POST">

            <div class="row">

              <div class="col-md-6 mb-3">

                <label class="form-label">

                  Full Name

                </label>

                <input type="text"

                  class="form-control"

                  name="name"

                  placeholder="Enter your name"

                  required>

              </div>

              <div class="col-md-6 mb-3">

                <label class="form-label">

                  Email

                </label>

                <input type="email"

                  class="form-control"

                  name="email"

                  placeholder="Enter your email"

                  required>

              </div>

            </div>

            <div class="mb-3">

              <label class="form-label">

                Subject

              </label>

              <input type="text"

                class="form-control"

                name="subject"

                placeholder="How can we help you?"

                required>

            </div>

            <div class="mb-4">

              <label class="form-label">

                Message

              </label>

              <textarea

                class="form-control"

                rows="6"

                name="message"

                placeholder="Write your message..."

                required></textarea>

            </div>

            <button

              class="btn btn-primary btn-lg w-100"

              name="send">

              Send Enquiry

            </button>

          </form>

        </div>

      </div>

    </div>





    <!-- Contact Card -->

    <div class="col-lg-4">

      <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-4">

          <h2 class="mb-4">

            Contact Information

          </h2>

          <hr>

          <h5>

            📍 Address

          </h5>

          <p>

            Euphoria Travels

            <br>

            New Delhi, India

          </p>

          <hr>

          <h5>

            📞 Phone

          </h5>

          <p>

            +91 9876543210

          </p>

          <hr>

          <h5>

            📧 Email

          </h5>

          <p>

            info@euphoriatravels.com

          </p>

          <hr>

          <h5>

            🕒 Working Hours

          </h5>

          <p>

            Monday - Saturday

            <br>

            9:00 AM - 7:00 PM

          </p>

          <hr>

          <h5>

            🌐 Follow Us

          </h5>

          <a href="#" class="btn btn-outline-primary me-2">

            Facebook

          </a>

          <a href="#" class="btn btn-outline-danger">

            Instagram

          </a>

        </div>

      </div>

    </div>

  </div>

</div>


<!-- Find Us Section -->

<div class="container py-5">

  <div class="text-center mb-5">

    <h2 class="fw-bold">Find Us</h2>

    <p class="text-muted">
      Visit our office or connect with us anytime.
    </p>

  </div>

  <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

    <iframe
      src="https://www.google.com/maps?q=New+Delhi,+India&output=embed"
      width="100%"
      height="450"
      style="border:0;"
      loading="lazy">
    </iframe>

  </div>

</div>



<!-- FAQ Section -->
<div class="container py-5">

  <div class="text-center mb-5">
    <h2 class="fw-bold">Frequently Asked Questions</h2>
    <p class="text-muted">
      Find answers to the most common travel questions.
    </p>
  </div>

  <div class="row g-4">

    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100 p-4 rounded-4">
        <h5 class="fw-bold">📌 How can I book a travel package?</h5>
        <p class="text-muted mb-0">
          Create an account, choose your destination, select a package, and complete your booking online.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100 p-4 rounded-4">
        <h5 class="fw-bold">❌ Can I cancel my booking?</h5>
        <p class="text-muted mb-0">
          Yes. You can cancel your booking if it is still in the pending stage from your profile page.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100 p-4 rounded-4">
        <h5 class="fw-bold">💳 Is online payment available?</h5>
        <p class="text-muted mb-0">
          Yes. We provide a secure online payment system for quick and hassle-free bookings.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100 p-4 rounded-4">
        <h5 class="fw-bold">🧳 What is included in the tour package?</h5>
        <p class="text-muted mb-0">
          Packages generally include accommodation, sightseeing, transportation, and other services based on the selected package.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100 p-4 rounded-4">
        <h5 class="fw-bold">⭐ Can I submit a review after my trip?</h5>
        <p class="text-muted mb-0">
          Yes. Once your trip is completed, you can share your experience by submitting a review from your profile.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100 p-4 rounded-4">
        <h5 class="fw-bold">📞 How can I contact Euphoria Travels?</h5>
        <p class="text-muted mb-0">
          You can contact us through the enquiry form, email, or phone number provided on this page.
        </p>
      </div>
    </div>

  </div>

</div>
<div class="untree_co-section testimonial-section mt-5 bg-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 text-center">
        <h2 class="section-title text-center mb-5">Testimonials</h2>

        <div class="owl-single owl-carousel no-nav">
          <div class="testimonial mx-auto">
            <figure class="img-wrap">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid">
            </figure>
            <h3 class="name">Adam Aderson</h3>
            <blockquote>
              <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
            </blockquote>
          </div>

          <div class="testimonial mx-auto">
            <figure class="img-wrap">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid">
            </figure>
            <h3 class="name">Lukas Devlin</h3>
            <blockquote>
              <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
            </blockquote>
          </div>

          <div class="testimonial mx-auto">
            <figure class="img-wrap">
              <img src="images/person_4.jpg" alt="Image" class="img-fluid">
            </figure>
            <h3 class="name">Kayla Bryant</h3>
            <blockquote>
              <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
            </blockquote>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
<?php

include("footer.php");

?>