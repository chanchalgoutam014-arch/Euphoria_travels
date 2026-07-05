<?php
include("adminHeader.php");
include("../config.php");

$query = "SELECT * FROM enquiry ORDER BY ID DESC";
$result = mysqli_query($db, $query);


if(isset($_POST['send_reply']))
{

    $id=$_POST['enquiry_id'];

    $reply=mysqli_real_escape_string($db,$_POST['reply']);

    $query="UPDATE enquiry
            SET reply='$reply',
                status='Replied'
            WHERE ID='$id'";

    mysqli_query($db,$query);

    echo "<script>
            alert('Reply Sent Successfully');
            window.location='manage_enquiry.php';
          </script>";

}


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

                    <button
                        class='btn btn-success btn-sm'
                        data-toggle='modal'
                        data-target='#replyModal<?php echo $row['ID']; ?>'>

                        Reply

                    </button>
                    <div class="modal fade"
                        id="replyModal<?php echo $row['ID']; ?>">

                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">

                                <div class="modal-header bg-success text-white">

                                    <h5 class="modal-title">
                                        Reply Enquiry
                                    </h5>

                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal">

                                        &times;

                                    </button>

                                </div>

                                <div class="modal-body">

                                    <form method="POST">

                                        <input
                                            type="hidden"
                                            name="enquiry_id"
                                            value="<?php echo $row['id']; ?>">

                                        <div class="form-group">

                                            <label><b>Name</b></label>

                                            <input
                                                type="text"
                                                class="form-control"
                                                value="<?php echo $row['name']; ?>"
                                                readonly>

                                        </div>

                                        <div class="form-group">

                                            <label><b>Email</b></label>

                                            <input
                                                type="text"
                                                class="form-control"
                                                value="<?php echo $row['email']; ?>"
                                                readonly>

                                        </div>

                                        <div class="form-group">

                                            <label><b>Subject</b></label>

                                            <input
                                                type="text"
                                                class="form-control"
                                                value="<?php echo $row['subject']; ?>"
                                                readonly>

                                        </div>

                                        <div class="form-group">

                                            <label><b>Message</b></label>

                                            <textarea
                                                class="form-control"
                                                rows="4"
                                                readonly><?php echo $row['message']; ?></textarea>

                                        </div>

                                        <div class="form-group">

                                            <label><b>Reply</b></label>

                                            <textarea
                                                name="reply"
                                                class="form-control"
                                                rows="5"
                                                required><?php echo $row['reply']; ?></textarea>

                                        </div>

                                        <button
                                            type="submit"
                                            name="send_reply"
                                            class="btn btn-success btn-block">

                                            Send Reply

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                    <a href='delete_enquiry.php?id=<?= $row['ID']; ?>'
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