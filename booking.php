
<?php

include("header.php");
include("config.php");



$id = $_GET["id"];

$userid = $_SESSION["userId"];




    $category_id = $id;
    $user_id = $userid;
    $price = 300;


    $query = "INSERT INTO `booking`(`user_id`, `category_id`, `price`) VALUES ('$user_id','$category_id','$price')";

    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>window.location.assign('.php')</script>";
    } else {
        echo ("not added");
    }




?>




<?php

include("footer.php");
?>