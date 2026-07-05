<?php

include("adminHeader.php");
include("../config.php");


// Total Destinations
$totalDestination = mysqli_num_rows(mysqli_query($db, "SELECT * FROM destinations"));

// Total Packages
$totalPackage = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tour_package"));

// Total Users
$totalUser = mysqli_num_rows(mysqli_query($db, "SELECT * FROM user"));

// Booking Status
$pending = mysqli_num_rows(mysqli_query($db, "SELECT * FROM bookings WHERE status='pending'"));

$paid = mysqli_num_rows(mysqli_query($db, "SELECT * FROM bookings WHERE status='paid'"));

$confirmed = mysqli_num_rows(mysqli_query($db, "SELECT * FROM bookings WHERE status='confirmed'"));

$completed = mysqli_num_rows(mysqli_query($db, "SELECT * FROM bookings WHERE status='completed'"));

$rejected = mysqli_num_rows(mysqli_query($db, "SELECT * FROM bookings WHERE status='rejected'"));

?>


<div class="position-relative" style="height:500px; overflow:hidden;">


    <img src="../images/pexels-philevenphotos-37632742.jpg" alt="Package Image" style="width:100%; height:100%; object-fit:cover;">

    <!-- Dark Overlay -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.45);">
    </div>

    <!-- Text -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">

        <p style="font-size:50px; ">
            Admin Dashboard!
        </p>

    </div>

</div>

<div class="container-fluid py-4">

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 text-center">
                <div class="card-body">
                    <h5>Total Destinations</h5>
                    <h2 class="text-primary"><?php echo $totalDestination; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 text-center">
                <div class="card-body">
                    <h5>Total Packages</h5>
                    <h2 class="text-success"><?php echo $totalPackage; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 text-center">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h2 class="text-warning"><?php echo $totalUser; ?></h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-2 mb-4">
            <div class="card bg-warning text-white shadow border-0 text-center">
                <div class="card-body">
                    <h6>Pending</h6>
                    <h2><?php echo $pending; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-2 mb-4">
            <div class="card bg-info text-white shadow border-0 text-center">
                <div class="card-body">
                    <h6>Paid</h6>
                    <h2><?php echo $paid; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white shadow border-0 text-center">
                <div class="card-body">
                    <h6>Confirmed</h6>
                    <h2><?php echo $confirmed; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white shadow border-0 text-center">
                <div class="card-body">
                    <h6>Completed</h6>
                    <h2><?php echo $completed; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-2 mb-4">
            <div class="card bg-danger text-white shadow border-0 text-center">
                <div class="card-body">
                    <h6>Rejected</h6>
                    <h2><?php echo $rejected; ?></h2>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- Recent Bookings -->

<div class="card shadow mt-4">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Recent Bookings</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Booking Date</th>
                    <th>Travel Date</th>
                    <th>No of persons</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                <?php

                $query = mysqli_query($db, "SELECT * FROM bookings ORDER BY ID DESC LIMIT 10");

                while ($row = mysqli_fetch_assoc($query)) {
                ?>

                    <tr>

                        <td><?php echo $row['ID']; ?></td>

                        <td><?php echo $row['booking_date']; ?></td>

                        <td><?php echo $row['travel_date']; ?></td>

                        <td><?php echo $row['no_of_persons']; ?></td>

                        <td>₹<?php echo $row['total_amount']; ?></td>

                        <td><?php echo $row['status']; ?></td>
                    </tr>

                <?php
                }
                ?>

            </tbody>

        </table>

    </div>

</div>

<?php

include("adminFooter.php");

?>