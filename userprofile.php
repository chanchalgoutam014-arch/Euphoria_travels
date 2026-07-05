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


// review query

$reviewQuery = "SELECT reviewa.*,
tour_package.package_name

FROM reviewa

INNER JOIN tour_package

ON reviewa.package_id = tour_package.ID

WHERE reviewa.user_id='$user_id'

ORDER BY reviewa.ID DESC";

$reviewResult = mysqli_query($db, $reviewQuery);


// add review

if (isset($_POST['submit_review'])) {

    $user_id = $_POST['user_id'];

    $package_id = $_POST['package_id'];

    $rating = $_POST['rating'];

    $review = mysqli_real_escape_string($db, $_POST['review']);

    $check = mysqli_query($db, "
SELECT *
FROM reviewa
WHERE user_id='$user_id'
AND package_id='$package_id'
");

    if (mysqli_num_rows($check) > 0) {

        echo "<script>alert('You have already reviewed this package');</script>";
    } else {

        mysqli_query($db, "
INSERT INTO reviewa
(user_id,package_id,rating,review,status)

VALUES

('$user_id',
'$package_id',
'$rating',
'$review',
'active')
");

        echo "<script>

alert('Review Submitted Successfully');

window.location='userprofile.php';

</script>";
    }
}


// enquiry query
$enquiryQuery = "SELECT *

FROM enquiry

WHERE email='" . $user['email'] . "'

ORDER BY ID DESC";

$enquiryResult = mysqli_query($db, $enquiryQuery);

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

        <!-- Left Sidebar -->

        <div class="col-lg-3">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center">

                    <img src="images/user.png"
                        class="rounded-circle mb-3"
                        width="120"
                        height="120"
                        style="object-fit:cover; border:4px solid #0d6efd;">

                    <h4 class="fw-bold">
                        <?php echo $user['F_name'] . " " . $user['L_name']; ?>
                    </h4>

                    <p class="text-muted">
                        <?php echo $user['email']; ?>
                    </p>

                    <hr>

                    <div class="list-group">

                        <a href="#profile"
                            class="list-group-item list-group-item-action active"
                            data-toggle="tab">

                            👤 Profile

                        </a>

                        <a href="#bookings"
                            class="list-group-item list-group-item-action"
                            data-toggle="tab">

                            📋 My Bookings

                        </a>

                        <a href="#reviews"
                            class="list-group-item list-group-item-action"
                            data-toggle="tab">

                            ⭐ My Reviews

                        </a>

                        <a href="#enquiries"
                            class="list-group-item list-group-item-action"
                            data-toggle="tab">

                            📩 My Enquiries

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- Right Content -->

        <div class="col-lg-9">

            <div class="tab-content">

                <!-- Profile -->

                <div class="tab-pane fade show active"
                    id="profile">

                    <div class="card shadow border-0 rounded-4">

                        <div class="card-header bg-primary text-white">

                            <h4 class="mb-0">

                                Profile Details

                            </h4>

                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">

                                <tr>
                                    <th width="30%">Full Name</th>
                                    <td><?php echo $user['F_name'] . " " . $user['L_name']; ?></td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $user['email']; ?></td>
                                </tr>

                                <tr>
                                    <th>Contact</th>
                                    <td><?php echo $user['contact']; ?></td>
                                </tr>

                                <tr>
                                    <th>Address</th>
                                    <td><?php echo $user['address']; ?></td>
                                </tr>

                                <tr>
                                    <th>Account Status</th>
                                    <td>

                                        <?php

                                        if ($user['status'] == "active") {
                                            echo "<span class='badge bg-success'>Active</span>";
                                        } else {
                                            echo "<span class='badge bg-danger'>Inactive</span>";
                                        }

                                        ?>

                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

                <!-- Bookings -->

                <div class="tab-pane fade"
                    id="bookings">

                    <div class="card shadow border-0 rounded-4">

                        <div class="card-header bg-success text-white">

                            <h4 class="mb-0">

                                My Bookings

                            </h4>

                        </div>

                        <div class="card-body">

                            <div class="alert alert-info">

                                <?php

                                if (mysqli_num_rows($bookingResult) > 0) {

                                    while ($row = mysqli_fetch_assoc($bookingResult)) {

                                ?>

                                        <div class="card shadow border-0 rounded-4 mb-4">

                                            <div class="row g-0">

                                                <div class="col-md-4">

                                                    <img src="package_image/<?php echo $row['image']; ?>"
                                                        class="img-fluid rounded-start"
                                                        style="height:250px;width:100%;object-fit:cover;">

                                                </div>

                                                <div class="col-md-8">

                                                    <div class="card-body">

                                                        <h3 class="fw-bold mb-3">

                                                            <?php echo $row['package_name']; ?>

                                                        </h3>

                                                        <div class="row">

                                                            <div class="col-md-6">

                                                                <p>

                                                                    <strong>📅 Booking Date :</strong>

                                                                    <?php echo $row['booking_date']; ?>

                                                                </p>

                                                                <p>

                                                                    <strong>✈ Travel Date :</strong>

                                                                    <?php echo $row['travel_date']; ?>

                                                                </p>

                                                                <p>

                                                                    <strong>👥 Persons :</strong>

                                                                    <?php echo $row['no_of_persons']; ?>

                                                                </p>

                                                            </div>

                                                            <div class="col-md-6">

                                                                <p>

                                                                    <strong>💰 Total Amount :</strong>

                                                                    ₹ <?php echo $row['total_amount']; ?>

                                                                </p>

                                                                <p>

                                                                    <strong>Status :</strong>

                                                                    <?php

                                                                    if ($row['status'] == "active") {
                                                                        echo '<span class="badge bg-success">Confirmed</span>';
                                                                    } elseif ($row['status'] == "pending") {
                                                                        echo '<span class="badge bg-warning text-dark">Pending</span>';
                                                                    } elseif ($row['status'] == "completed") {
                                                                        echo '<span class="badge bg-primary">Completed</span>';
                                                                    } else {
                                                                        echo '<span class="badge bg-danger">Cancelled</span>';
                                                                    }

                                                                    ?>

                                                                </p>

                                                            </div>

                                                        </div>

                                                        <hr>

                                                        <div class="d-flex flex-wrap gap-2 mt-3">

                                                            <?php if ($row['status'] == "pending") { ?>

                                                                <a href="cancel_booking.php?id=<?php echo $row['ID']; ?>"
                                                                    class="btn btn-danger"
                                                                    onclick="return confirm('Are you sure you want to cancel this booking?')">

                                                                    Cancel Booking

                                                                </a>

                                                            <?php } ?>

                                                            <?php if ($row['status'] == "completed") { ?>

                                                                <button
                                                                    class="btn btn-success btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#reviewModal<?php echo $row['ID']; ?>">

                                                                    Add Review

                                                                </button>
                                                                <div class="modal fade"
                                                                    id="reviewModal<?php echo $row['ID']; ?>">

                                                                    <div class="modal-dialog">

                                                                        <div class="modal-content">

                                                                            <div class="modal-header bg-success text-white">

                                                                                <h5 class="modal-title">

                                                                                    ⭐ Add Review

                                                                                </h5>

                                                                                <button
                                                                                    type="button"
                                                                                    class="close"
                                                                                    data-dismiss="modal">

                                                                                    &times;

                                                                                </button>

                                                                            </div>

                                                                            <div class="modal-body">

                                                                                <form method="POST">

                                                                                    <input
                                                                                        type="hidden"
                                                                                        name="package_id"
                                                                                        value="<?php echo $row['package_id']; ?>">

                                                                                    <input
                                                                                        type="hidden"
                                                                                        name="user_id"
                                                                                        value="<?php echo $_SESSION['user_id']; ?>">

                                                                                    <div class="form-group">

                                                                                        <label>Rating</label>

                                                                                        <select
                                                                                            name="rating"
                                                                                            class="form-control"
                                                                                            required>

                                                                                            <option value="">Select Rating</option>

                                                                                            <option value="5">⭐⭐⭐⭐⭐</option>
                                                                                            <option value="4">⭐⭐⭐⭐</option>
                                                                                            <option value="3">⭐⭐⭐</option>
                                                                                            <option value="2">⭐⭐</option>
                                                                                            <option value="1">⭐</option>

                                                                                        </select>

                                                                                    </div>

                                                                                    <div class="form-group">

                                                                                        <label>Review</label>

                                                                                        <textarea
                                                                                            name="review"
                                                                                            class="form-control"
                                                                                            rows="5"
                                                                                            required></textarea>

                                                                                    </div>

                                                                                    <button
                                                                                        type="submit"
                                                                                        name="submit_review"
                                                                                        class="btn btn-success w-100">

                                                                                        Submit Review

                                                                                    </button>

                                                                                </form>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            <?php } ?>

                                                        </div>

                                                    <?php

                                                }

                                                    ?>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    <?php

                                } else {

                                    ?>

                                        <div class="alert alert-info text-center">

                                            <h4>No Bookings Yet</h4>

                                            <p>Looks like you haven't booked any travel package.</p>

                                            <a href="packages.php"
                                                class="btn btn-primary">

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

                <!-- Reviews -->

                <div class="tab-pane fade"
                    id="reviews">

                    <div class="card shadow border-0 rounded-4">

                        <div class="card-header bg-warning">

                            <h4 class="mb-0">

                                My Reviews

                            </h4>

                        </div>

                        <div class="card-body">

                            <div class="alert alert-info">

                                <?php

                                if (mysqli_num_rows($reviewResult) > 0) {

                                    while ($row = mysqli_fetch_assoc($reviewResult)) {

                                ?>

                                        <div class="card mb-3 shadow-sm border-0">

                                            <div class="card-body">

                                                <h5 class="fw-bold">

                                                    <?php echo $row['package_name']; ?>

                                                </h5>

                                                <p>

                                                    <strong>Rating :</strong>

                                                    <?php

                                                    for ($i = 1; $i <= $row['rating']; $i++) {
                                                        echo "⭐";
                                                    }

                                                    ?>

                                                </p>

                                                <p>

                                                    <strong>Review :</strong>

                                                    <?php echo $row['review']; ?>

                                                </p>

                                                <small class="text-muted">

                                                    <?php echo $row['created_at']; ?>

                                                </small>

                                            </div>

                                        </div>

                                    <?php

                                    }
                                } else {

                                    ?>

                                    <div class="alert alert-info">

                                        No Reviews Yet.

                                    </div>

                                <?php

                                }

                                ?>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Enquiries -->

                <div class="tab-pane fade"
                    id="enquiries">

                    <div class="card shadow border-0 rounded-4">

                        <div class="card-header bg-dark text-white">

                            <h4 class="mb-0">

                                My Enquiries

                            </h4>

                        </div>

                        <div class="card-body">

                            <div class="alert alert-info">

                                <?php

                                if (mysqli_num_rows($enquiryResult) > 0) {

                                    while ($row = mysqli_fetch_assoc($enquiryResult)) {

                                ?>

                                        <div class="card mb-3 shadow-sm border-0">

                                            <div class="card-body">

                                                <h5>

                                                    <?php echo $row['subject']; ?>

                                                </h5>

                                                <p>

                                                    <?php echo $row['message']; ?>

                                                </p>

                                                <p>

                                                    <strong>Status :</strong>

                                                    <?php

                                                    if ($row['status'] == "pending") {
                                                        echo "<span class='badge bg-warning'>Pending</span>";
                                                    } elseif ($row['status'] == "replied") {
                                                        echo "<span class='badge bg-success'>Replied</span>";
                                                    } else {
                                                        echo "<span class='badge bg-secondary'>" . $row['status'] . "</span>";
                                                    }

                                                    ?>

                                                </p>
                                                <p>
                                                    <strong>Admin Reply :</strong><br>

                                                    <?php

                                                    if (!empty($row['reply'])) {

                                                        echo "<div class='alert alert-success mt-2 mb-0'>"
                                                            . nl2br(htmlspecialchars($row['reply'])) .
                                                            "</div>";
                                                    } else {

                                                        echo "<div class='alert alert-warning mt-2 mb-0'>
                Waiting for Admin Reply...
              </div>";
                                                    }

                                                    ?>

                                                </p>

                                                <small class="text-muted">

                                                    <?php echo $row['created_at']; ?>

                                                </small>

                                            </div>

                                        </div>

                                    <?php

                                    }
                                } else {

                                    ?>

                                    <div class="alert alert-info">

                                        No Enquiries Found.

                                    </div>

                                <?php

                                }

                                ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<?php
include("footer.php");
?>