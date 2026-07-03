<?php

include("header.php");
include("config.php");

// // Login Check
// if (!isset($_SESSION['user_id'])) {
//     header("Location:login.php");
//     exit();
// }

$user_id = $_SESSION['user_id'];

// User Details
$userQuery = "SELECT * FROM user WHERE ID='$user_id'";
$userResult = mysqli_query($db, $userQuery);
$user = mysqli_fetch_assoc($userResult);

// Booking Details
$bookingQuery = "SELECT
bookings.*,
tour_package.package_name,
tour_package.image

FROM bookings

INNER JOIN tour_package
ON bookings.package_id=tour_package.ID

WHERE bookings.user_id='$user_id'

ORDER BY bookings.ID DESC";

$bookingResult = mysqli_query($db, $bookingQuery);

?>
<div class="position-relative" style="height:500px; overflow:hidden;">


    <img src="./images/pexels-shubhamdhage-37898617.jpg" alt="Package Image" style="width:100%; height:100%; object-fit:cover;">

    <!-- Dark Overlay -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45);">
    </div>

    <!-- Text -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">

        <p style="font-size:50px; ">
            Welcome, <?php echo $user['F_name'] . " " . $user['L_name']; ?>!
        </p>

    </div>

</div>


<div class="container py-5">

    <h2 class="text-center fw-bold mb-5">

        My Profile

    </h2>

    <div class="row">

        <div class="col-lg-4">

            <div class="card profile-card shadow">

                <div class="card-body text-center">

                    <img src="images/user.png" class="profile-img">

                    <h3 class="mt-3">

                        <?php echo $user['F_name'] . " " . $user['L_name']; ?>

                    </h3>

                    <hr>

                    <p>

                        <b>Email</b>

                        <br>

                        <?php echo $user['email']; ?>

                    </p>

                    <p>

                        <b>Contact</b>

                        <br>

                        <?php echo $user['contact']; ?>

                    </p>

                    <p>

                        <b>Status :</b>

                        <?php

                        if ($user['status'] == "active") {
                            echo "<span class='badge bg-success'>Active</span>";
                        } else {
                            echo "<span class='badge bg-danger'>Inactive</span>";
                        }

                        ?>

                    </p>

                    <a href="edit_profile.php" class="btn btn-warning w-100 mb-2">

                        Edit Profile

                    </a>

                    <a href="logout.php" class="btn btn-danger w-100">

                        Logout

                    </a>

                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4>

                        My Bookings

                    </h4>

                </div>

                <div class="card-body">
                    <?php

                    if (mysqli_num_rows($bookingResult) > 0) {

                        while ($row = mysqli_fetch_assoc($bookingResult)) {
                            

                    ?>

                            <div class="card booking-card mb-4 shadow-sm">

                                <div class="row g-0">

                                    <div class="col-md-4">

                                        <img src="<?php echo $row['image']; ?>"
                                            class="img-fluid rounded-start"
                                            style="height:250px;width:100%;object-fit:cover;">

                                    </div>

                                    <div class="col-md-8">

                                        <div class="card-body">

                                            <h4 class="fw-bold">

                                                <?php echo $row['package_name']; ?>

                                            </h4>

                                            <hr>

                                            <p>

                                                <strong>Booking ID :</strong>

                                                <?php echo $row['ID']; ?>

                                            </p>

                                            <p>

                                                <strong>Booking Date :</strong>

                                                <?php echo $row['booking_date']; ?>

                                            </p>

                                            <p>

                                                <strong>Travel Date :</strong>

                                                <?php echo $row['travel_date']; ?>

                                            </p>

                                            <p>

                                                <strong>No. of Persons :</strong>

                                                <?php echo $row['no_of_persons']; ?>

                                            </p>

                                            <p>

                                                <strong>Total Amount :</strong>

                                                ₹ <?php echo $row['total_amount']; ?>

                                            </p>

                                            <p>

                                                <strong>Status :</strong>

                                                <?php

                                                if ($row['status'] == "active") {
                                                    echo "<span class='badge bg-success'>Confirmed</span>";
                                                } elseif ($row['status'] == "pending") {
                                                    echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                                } elseif ($row['status'] == "completed") {
                                                    echo "<span class='badge bg-primary'>Completed</span>";
                                                } else {
                                                    echo "<span class='badge bg-danger'>Cancelled</span>";
                                                }

                                                ?>

                                            </p>

                                            <div class="mt-3">

                                                <a href="booking_details.php?id=<?php echo $row['ID']; ?>"
                                                    class="btn btn-primary btn-sm">

                                                    View Details

                                                </a>

                                                <?php

                                                if ($row['status'] == "completed") {

                                                ?>

                                                    <a href="addreviews.php?id=<?php echo $row['package_id']; ?>"
                                                        class="btn btn-success btn-sm">

                                                        Add Review

                                                    </a>

                                                <?php

                                                }

                                                ?>

                                                <?php

                                                if ($row['status'] == "pending") {

                                                ?>

                                                    <a href="cancel_booking.php?id=<?php echo $row['ID']; ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Cancel this booking?')">

                                                        Cancel Booking

                                                    </a>

                                                <?php

                                                }

                                                ?>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php

                        }
                    } else {

                        ?>

                        <div class="alert alert-info text-center">

                            <h4>No Bookings Found</h4>

                            <p>You haven't booked any package yet.</p>

                            <a href="tour_packages.php" class="btn btn-primary">

                                Explore Packages

                            </a>

                        </div>

                    <?php

                    }

                    ?>

                </div>

            </div>

        </div>

    </div>

</div>
<?php
include("footer.php");
?>