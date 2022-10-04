<?php
$con = mysqli_connect('localhost', 'root', '', 'food_order_system');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
