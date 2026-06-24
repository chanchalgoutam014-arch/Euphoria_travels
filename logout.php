<?php

session_destroy();
echo"<script>window.location.assign('login.php?msg=logout')</script>";

?>