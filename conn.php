
<?php

$kon = mysqli_connect("localhost", "root", "", "crud-infinity");

if (!$kon) {
    die("Connection failed: " . mysqli_connect_error());
}