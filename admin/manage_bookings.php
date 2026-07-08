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

if (isset($_POST['update_status'])) {
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];

    $update = "UPDATE bookings
               SET status='$status'
               WHERE ID='$booking_id'";

    mysqli_query($db, $update);

    echo "<script>
            alert('Booking Status Updated Successfully');
            window.location='manage_bookings.php';
          </script>";
}
?>
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Manage Bookings</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 ml-0 mr-0">

    <table class="table table-bordered table-hover text-center" style="width:134%;">

        <thead class="table-dark">
            <tr>
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Package Image</th>
                <th>Package Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Booking Date</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>

                    <td><?php echo $no ?></td>

                    <td><?php echo $row['F_name'] . " " . $row['L_name']; ?></td>
                    <td>
                        <img src="../package_image/<?php echo $row['image']; ?>" width="200">
                    </td>

                    <td><?php echo $row['package_name']; ?></td>

                    <td>₹<?php echo $row['total_amount']; ?></td>

                    <td><?php echo $row['status']; ?></td>

                    <td><?php echo $row['booking_date']; ?></td>

                    <td>
                        <button type="button" class="btn btn-outline-danger"><a href="?delete_id=<?php echo $row['ID']; ?>">Delete</a></button>


                    </td>
                    <td>
                        <form method="POST" class="d-flex align-items-center">

                            <input type="hidden"
                                name="booking_id"
                                value="<?php echo $row['ID']; ?>">

                            <select name="status" class="form-control form-control-sm mr-2" style="width:140px;">

                                <option value="<?php echo $row['status']; ?>" selected>
                                    <?php echo ucfirst($row['status']); ?>
                                </option>

                                <?php
                                if ($row['status'] == 'pending') {
                                    echo '<option value="paid">Paid</option>';
                                    echo '<option value="confirmed">Confirmed</option>';
                                    echo '<option value="rejected">Rejected</option>';
                                } elseif ($row['status'] == 'paid') {
                                    echo '<option value="confirmed">Confirmed</option>';
                                    echo '<option value="rejected">Rejected</option>';
                                } elseif ($row['status'] == 'confirmed') {
                                    echo '<option value="completed">Completed</option>';
                                }
                                elseif ($row['status'] == 'cancelled') {
                                    echo '<option value="completed">Completed</option>';
                                }
                                ?>

                            </select>

                            <button class="btn btn-success btn-sm"
                                name="update_status">

                                <i class="fa fa-check"></i> Update

                            </button>

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