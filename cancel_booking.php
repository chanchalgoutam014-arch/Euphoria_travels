<?php
include("header.php");
include("config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    die("Invalid Request");
}

$id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];

// Booking Fetch
$query = mysqli_query($db, "SELECT b.*, p.package_name, p.image
FROM bookings b
JOIN tour_package p ON b.package_id = p.id
WHERE b.ID='$id' AND b.user_id='$user_id'
");

if(mysqli_num_rows($query)==0){
    die("Booking not found.");
}

$row = mysqli_fetch_assoc($query);

// Cancel Booking

if(isset($_POST['cancel_booking']))
{
    $query = mysqli_query($db,"
    UPDATE bookings
    SET status='cancelled'
    WHERE ID='$id'
    AND user_id='$user_id'
    ");

    if($query)
    {
        echo "<script>
        alert('Booking Cancelled Successfully');
        window.location='userprofile.php';
        </script>";
    }
    else
    {
        echo "<script>alert('Something went wrong');</script>";
    }
}
?>
<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <div class="intro-wrap">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container py-5">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-danger text-white">
            <h3 class="mb-0">Cancel Booking</h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <img src="package_image/<?php echo $row['image']; ?>"
                    class="img-fluid rounded"
                    style="height:250px;width:100%;object-fit:cover;">

                </div>

                <div class="col-md-8">

                    <h3 class="text-success mb-3">
                        <?php echo $row['package_name']; ?>
                    </h3>

                    <p><strong>Booking Date :</strong>
                        <?php echo $row['booking_date']; ?>
                    </p>

                    <p><strong>Travel Date :</strong>
                        <?php echo $row['travel_date']; ?>
                    </p>

                    <p><strong>Persons :</strong>
                        <?php echo $row['no_of_persons']; ?>
                    </p>

                    <p><strong>Total Amount :</strong>
                        ₹ <?php echo $row['total_amount']; ?>
                    </p>

                    <p>
                        <strong>Status :</strong>

                        <span class="badge bg-warning text-dark">
                            <?php echo ucfirst($row['status']); ?>
                        </span>
                    </p>

                    <hr>

                    <div class="alert alert-warning">

                        <strong>Note:</strong>

                        Are you sure you want to cancel this booking?
                        This action cannot be undone.

                    </div>

                    <form method="POST">

                        <button
                        type="submit"
                        name="cancel_booking"
                        class="btn btn-danger">

                        Yes, Cancel Booking

                        </button>

                        <a href="userprofile.php"
                        class="btn btn-secondary">

                        Go Back

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>