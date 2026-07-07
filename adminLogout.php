<?php
session_start();

session_destroy();
echo"<script>window.location.assign('adminLogin.php?msg=logout')</script>";

?>