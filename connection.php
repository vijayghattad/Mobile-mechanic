<?php
$conn = mysqli_connect("localhost", "root", "", "mm");

if (!$conn) {
    die('error' . mysqli_error($conn));
}
?>