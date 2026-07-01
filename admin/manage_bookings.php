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

                        <a href="edit_Bookings.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
                            Edit
                        </a>

                        <button type="button" class="btn btn-outline-danger"><a href="?delete_id=<?php echo $row['ID']; ?>">Delete</a></button>
                    

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