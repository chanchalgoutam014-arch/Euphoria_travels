<?php

include("header.php");
include("config.php");

if (isset($_GET["delete_id"])) {
    $id = $_GET["delete_id"];
    $delete_query = "DELETE FROM `destinations` WHERE ID = $id";
    mysqli_query($db, $delete_query);
}


$query = "SELECT * FROM `destinations`";
$result = mysqli_query($db, $query);


?>
<div class="container mt-5">

    <h2 class="mb-4">Manage Destinations</h2>

    <table class="table table-bordered table-striped">

        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>

                <td><?php echo $no ?></td>

                <td>
                    <img src="destination_image/<?php echo $row['image']; ?>" width="100">
                </td>

                <td><?php echo $row['destination_name']; ?></td>

                <td><?php echo $row['category']; ?></td>

                <td>
                    <button type="button" class="btn btn-outline-danger"><a href="?delete_id=<?php echo $row['ID']; ?>">Delete</a></button>
                </td>

            </tr>

        <?php
            $no++;
        } ?>

    </table>

</div>