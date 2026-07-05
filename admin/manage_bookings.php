<?php
include("adminHeader.php");
include("../config.php");

if (isset($_GET["delete_id"])) {
    $id = $_GET["delete_id"];
    $delete_query = "DELETE FROM `destinations` WHERE ID = $id";
    mysqli_query($db, $delete_query);
}



$query = "SELECT
bookings.*,
user.F_name,
user.L_name,
tour_package.package_name,
tour_package.image
FROM bookings
INNER JOIN user
ON bookings.user_id = user.ID
INNER JOIN tour_package
ON bookings.package_id = tour_package.ID
ORDER BY bookings.id DESC";

$result = mysqli_query($db, $query);

// update status

if(isset($_POST['update_status']))
{
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];

    $update = "UPDATE bookings
               SET status='$status'
               WHERE ID='$booking_id'";

    mysqli_query($db,$update);

    echo "<script>
            alert('Booking Status Updated Successfully');
            window.location='manage_bookings.php';
          </script>";
}
?>

<div class="container mt-5">

    <h2 class="text-center mb-4">Manage Bookings</h2>

    <table class="table table-bordered table-hover text-center">

        <thead class="table-dark">
            <tr>
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Package</th>
                <th>Price</th>
                <th>Status</th>
                <th>Booking Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

             <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>

                <td><?php echo $no ?></td>

                <td>
                    <img src="../package_image/<?php echo $row['image']; ?>" width="100">
                </td>
                    
                    <td><?php echo $row['F_name'] . " " . $row['L_name']; ?></td> 

                    <td><?php echo $row['package_name']; ?></td>

                    <td>₹<?php echo $row['price']; ?></td>

                    <td><?php echo $row['status']; ?></td>

                    <td><?php echo $row['booking_date']; ?></td>

                    <td>
                        <button type="button" class="btn btn-outline-danger"><a href="?delete_id=<?php echo $row['ID']; ?>">Delete</a></button>

                        <form method="POST" class="mt-2">
                            <input type="hidden" name="booking_id" value="<?php echo $row['ID']; ?>">
                            <select name="status" class="form-select mb-2">
                                <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                <option value="paid" <?php if ($row['status'] == 'paid') echo 'selected'; ?>>Paid</option>
                                <option value="confirmed" <?php if ($row['status'] == 'confirmed') echo 'selected'; ?>>Confirmed</option>
                                <option value="completed" <?php if ($row['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                                <option value="rejected" <?php if ($row['status'] == 'rejected') echo 'selected'; ?>>Rejected</option>
                            </select>
                            <button type="submit" name="update_status" class="btn btn-outline-primary">Update Status</button>
                        </form>
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