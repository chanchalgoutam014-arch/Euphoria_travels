<?php

include("adminHeader.php");
include("../config.php");

if (isset($_GET["delete_id"])) {
    $id = $_GET["delete_id"];
    $delete_query = "DELETE FROM `tour_package` WHERE ID = $id";
    mysqli_query($db, $delete_query);
}


$query = "SELECT * FROM `tour_package`";
$result = mysqli_query($db, $query);


?>
<div class="container mt-5">

    <h2 class="mb-4">Manage packages</h2>

    <table class="table table-bordered table-striped">

        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>decription</th>
            <th>duratin</th>
            <th>price</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>

                <td><?php echo $no ?></td>

                <td>
                    <img src="./package_image/<?php echo $row['image']; ?>" width="200">
                </td>

                <td><?php echo $row['package_name']; ?></td>

                <td><?php echo $row['description']; ?></td>

                <td><?php echo $row['duration']; ?></td>

                <td><?php echo $row['price']; ?></td>
                <td>
                    <button type="button" class="btn btn-outline-danger"><a href="?delete_id=<?php echo $row['ID']; ?>">Delete</a></button>
                </td>

                 <td>
                    <button type="button" class="btn btn-outline-primary"><a href="edit_destination.php?ID=<?php echo $row['ID']; ?>">Edit</a></button>
                </td>

            </tr>

        <?php
            $no++;
        } ?>

    </table>

</div>

<?php 

include("adminFooter.php");

?>