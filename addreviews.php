<?php

include("header.php");
include("config.php");

$user_id=$_SESSION['user_id'];
$package_id=$_GET['package_id'];

if(isset($_POST['submit'])){

$rating=$_POST['rating'];

$review=$_POST['review'];

$query="INSERT INTO reviewa ( user_id, package_id, rating, review)

VALUES('$user_id','$package_id','$rating','$review')";

mysqli_query($db,$query);

header("location:userprofile.php");

}

?>

<form method="POST">

<h3>Add Review</h3>

<label>Rating</label>

<select name="rating" class="form-control">

<option value="5">⭐⭐⭐⭐⭐</option>

<option value="4">⭐⭐⭐⭐</option>

<option value="3">⭐⭐⭐</option>

<option value="2">⭐⭐</option>

<option value="1">⭐</option>

</select>

<br>

<textarea name="review"

class="form-control"

placeholder="Write your review..."

required>

</textarea>

<br>

<input type="submit"

name="submit"

value="Submit Review"

class="btn btn-success">

</form>
