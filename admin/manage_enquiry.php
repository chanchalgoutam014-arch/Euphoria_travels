<?php
include("header.php");
include("config.php");

$query = "SELECT * FROM enquiry ORDER BY id DESC";
$result = mysqli_query($db, $query);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Enquiries</h2>

    <table class="table table-bordered table-hover">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Reply</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>

                <td><?= $row['id']; ?></td>

                <td><?= $row['name']; ?></td>

                <td><?= $row['email']; ?></td>

                <td><?= $row['subject']; ?></td>

                <td><?= $row['message']; ?></td>

                <td>

                    <?php

                    if ($row['reply'] == "") {
                        echo "<span class='text-danger'>No Reply</span>";
                    } else {
                        echo $row['reply'];
                    }

                    ?>

                </td>

                <td><?= $row['status']; ?></td>

                <td>

                    <a href="reply_enquiry.php?id=<?= $row['id']; ?>"
                        class="btn btn-success btn-sm">
                        Reply
                    </a>

                    <a href="delete_enquiry.php?id=<?= $row['id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete enquiry?')">
                        Delete
                    </a>

                </td>

            </tr>

        <?php
        }
        ?>

    </table>

</div>