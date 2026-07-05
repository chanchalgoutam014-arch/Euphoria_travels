<?php
include("adminHeader.php");
include("../config.php");

if (!isset($_GET['id'])) {
    header("Location: manage_enquiry.php");
    exit();
}

$id = $_GET['id'];

$query = "SELECT * FROM enquiry WHERE ID='$id'";
$result = mysqli_query($db, $query);

$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Enquiry not found.");
}

if (isset($_POST['send_reply'])) {
    $reply = mysqli_real_escape_string($db, $_POST['reply']);

    $update = "UPDATE enquiry
               SET reply='$reply',
                   status='Replied'
               WHERE ID='$id'";

    if (mysqli_query($db, $update)) {
        echo "<script>
                alert('Reply sent successfully');
                window.location='manage_enquiry.php';
              </script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}
?>
<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <div class="intro-wrap">
          <h1 class="mb-0">Reply Enquiry</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h3>Reply Enquiry</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="form-group">
                    <label><b>Name</b></label>
                    <input type="text"
                        class="form-control"
                        value="<?php echo $row['name']; ?>"
                        readonly>
                </div>

                <div class="form-group">
                    <label><b>Email</b></label>
                    <input type="text"
                        class="form-control"
                        value="<?php echo $row['email']; ?>"
                        readonly>
                </div>

                <div class="form-group">
                    <label><b>Subject</b></label>
                    <input type="text"
                        class="form-control"
                        value="<?php echo $row['subject']; ?>"
                        readonly>
                </div>

                <div class="form-group">
                    <label><b>Message</b></label>
                    <textarea class="form-control"
                        rows="5"
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
                    class="btn btn-success">

                    Send Reply

                </button>

                <a
                    href="manage_enquiry.php"
                    class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

<?php
include("adminFooter.php");
?>