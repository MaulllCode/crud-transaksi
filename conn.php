
<?php
// local, user, password, database
$kon = mysqli_connect("localhost", "root", "", "crud-infinity");

if (!$kon) {
    // jika error
    die("Connection failed: " . mysqli_connect_error());
}