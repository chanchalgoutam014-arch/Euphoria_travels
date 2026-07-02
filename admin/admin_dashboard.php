<?php

include("adminHeader.php");
include("../config.php");

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

        <!-- Destinations -->
        <div class="col-md-3 mb-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <h5>Total Destinations</h5>

                    <?php
                    $query = mysqli_query($db,"SELECT * FROM destinations");
                    $totalDestination = mysqli_num_rows($query);
                    ?>

                    <h1 class="text-primary"><?php echo $totalDestination; ?></h1>
                </div>
            </div>
        </div>

        <!-- Packages -->
        <div class="col-md-3 mb-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <h5>Total Packages</h5>

                    <?php
                    $query = mysqli_query($db,"SELECT * FROM tour_package");
                    $totalPackage = mysqli_num_rows($query);
                    ?>

                    <h1 class="text-success"><?php echo $totalPackage; ?></h1>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-md-3 mb-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <h5>Total Users</h5>

                    <?php
                    $query = mysqli_query($db,"SELECT * FROM user");
                    $totalUser = mysqli_num_rows($query);
                    ?>

                    <h1 class="text-warning"><?php echo $totalUser; ?></h1>
                </div>
            </div>
        </div>

        <!-- Bookings -->
        <div class="col-md-3 mb-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <h5>Total Bookings</h5>

                    <?php
                    $query = mysqli_query($db,"SELECT * FROM bookings");
                    $totalBooking = mysqli_num_rows($query);
                    ?>

                    <h1 class="text-danger"><?php echo $totalBooking; ?></h1>
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
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Package ID</th>
                        <th>Travel Date</th>
                        <th>Booking Date</th>
                        <th>No of Persons</th>
                        <th>Total Amount</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    $query = mysqli_query($db,"SELECT bookings.ID, bookings.user_id, bookings.package_id, bookings.travel_date, bookings.booking_date, bookings.no_of_persons, bookings.total_amount, user.F_name, user.L_name, user.email FROM bookings JOIN user ON bookings.user_id = user.ID ORDER BY bookings.ID DESC LIMIT 5");

                    while($row=mysqli_fetch_assoc($query))
                    {
                    ?>

                    <tr>

                        <td><?php echo $row['ID']; ?></td>

                        <td><?php echo $row['user_id']; ?></td>

                        <td><?php echo $row['F_name'] . " " . $row['L_name']; ?></td>

                        <td><?php echo $row['package_id']; ?></td>

                        <td><?php echo $row['travel_date']; ?></td>

                        <td><?php echo $row['booking_date']; ?></td>

                        <td><?php echo $row['no_of_persons']; ?></td>

                        <td>₹<?php echo $row['total_amount']; ?></td>

                    </tr>

                    <?php
                    }
                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php

include("adminFooter.php");

?>