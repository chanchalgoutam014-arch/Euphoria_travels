<?php

include("adminHeader.php");
include("../config.php");

if (isset($_GET["delete_id"])) {
    $id = $_GET["delete_id"];
    $delete_query = "DELETE FROM `destinations` WHERE ID = $id";
    mysqli_query($db, $delete_query);
}


$query = "SELECT * FROM `destinations`";
$result = mysqli_query($db, $query);


?>
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Manage Destinations</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">

    <table class="table table-bordered table-striped">

        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th colspan="2" class="text-center">Actions</th>
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