<?php
include("adminHeader.php");
include("../config.php");

$query = "SELECT * FROM enquiry ORDER BY ID DESC";
$result = mysqli_query($db, $query);


if (isset($_POST['send_reply'])) {

    $id = $_POST['enquiry_id'];

    $reply = mysqli_real_escape_string($db, $_POST['reply']);

    $query = "UPDATE enquiry
            SET reply='$reply',
                status='Replied'
            WHERE ID='$id'";

    mysqli_query($db, $query);

    echo "<script>
            alert('Reply Sent Successfully');
            window.location='manage_enquiry.php';
          </script>";
}


?>
<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <div class="intro-wrap">
          <h1 class="mb-0">Manage Enquiries</h1>
        </div>
      </div>
    </div>
  </div>
</div>
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
            <th colspan="2">Action</th>
        </tr>

        <?php

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>

                <td><?= $row['ID']; ?></td>

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

                    <a href="reply_enquiry.php?id=<?php echo $row['ID']; ?>" class="btn btn-success btn-sm">
                        Reply
                    </a>
                </td>

                <td>
                    <a href="delete_enquiry.php?id=<?php echo $row['ID']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this enquiry?')">
                        Delete
                    </a>

                </td>

            </tr>

        <?php
        }
        ?>

    </table>

</div>