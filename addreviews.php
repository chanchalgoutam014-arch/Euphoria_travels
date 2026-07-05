<?php

include("header.php");
include("config.php");

// Login Check
if (!isset($_SESSION['user_id'])) {
    header("Location:login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Package ID Check
if (!isset($_GET['package_id'])) {
    echo "<script>
    alert('Invalid Request');
    window.location='userprofile.php';
    </script>";
    exit();
}

$package_id = $_GET['package_id'];


// Save Review
if (isset($_POST['submit_review'])) {

    $rating = $_POST['rating'];
    $review = mysqli_real_escape_string($db, $_POST['review']);

    $check = mysqli_query($db, "
    SELECT *
    FROM review
    WHERE user_id='$user_id'
    AND package_id='$package_id'
    ");

    if (mysqli_num_rows($check) > 0) {

        echo "<script>
        alert('You have already reviewed this package.');
        </script>";
    } else {

        mysqli_query($db, "
        INSERT INTO review
        (user_id,package_id,rating,review,status)

        VALUES

        ('$user_id',
        '$package_id',
        '$rating',
        '$review',
        'active')
        ");

        echo "<script>
        alert('Review Added Successfully');
        window.location='userprofile.php';
        </script>";
    }
}

?>


<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded">

                <div class="card-header bg-success text-white">

                    <h3 class="mb-0">

                        ⭐ Add Review

                    </h3>

                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="form-group">

                            <label>

                                Rating

                            </label>

                            <select
                                class="form-control"
                                name="rating"
                                required>

                                <option value="">Choose Rating</option>

                                <option value="5">⭐⭐⭐⭐⭐ Excellent</option>

                                <option value="4">⭐⭐⭐⭐ Very Good</option>

                                <option value="3">⭐⭐⭐ Good</option>

                                <option value="2">⭐⭐ Fair</option>

                                <option value="1">⭐ Poor</option>

                            </select>

                        </div>

                        <div class="form-group mt-3">

                            <label>

                                Write Review

                            </label>

                            <textarea
                                name="review"
                                class="form-control"
                                rows="6"
                                placeholder="Share your travel experience..."
                                required>

</textarea>

                        </div>

                        <div class="mt-4 text-center">

                            <button
                                type="submit"
                                name="submit_review"
                                class="btn btn-success btn-lg">

                                Submit Review

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include("footer.php"); ?>