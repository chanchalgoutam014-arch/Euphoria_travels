<?php
include("adminHeader.php");
include("../config.php");

$query = "SELECT
bookings.*,
user.F_name,
user.L_name,
tour_package.package_name
FROM bookings
INNER JOIN user
ON bookings.user_id = user.ID
INNER JOIN tour_package
ON bookings.package_id = tour_package.ID
ORDER BY bookings.id DESC";

$result = mysqli_query($db, $query);
?>

<div class="container mt-5">

    <h2 class="text-center mb-4">Manage Bookings</h2>

    <table class="table table-bordered table-hover text-center">

        <thead class="table-dark">
            <tr>
                <th>Booking ID</th>
                <th>User Name</th>
                <th>Destination</th>
                <th>Price</th>
                <th>Status</th>
                <th>Booking Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['F_name']." ".$row['L_name']; ?></td>

                    <td><?php echo $row['destination_name']; ?></td>

                    <td>₹<?php echo $row['price']; ?></td>

                    <td><?php echo $row['status']; ?></td>

                    <td><?php echo $row['booking_date']; ?></td>

                    <td>

                        <a href="editBooking.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
                            Edit
                        </a>

                        <a href="deleteBooking.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
                            Delete
                        </a>

                    </td>

                </tr>

            <?php
            }
            ?>

        </tbody>

    </table>

</div>

<?php
include("adminFooter.php");
?>