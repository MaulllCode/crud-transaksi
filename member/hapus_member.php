<?php

session_start();
if (!isset($_SESSION["role"]) == "admin") {
    echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="member"</script>';
    exit;
}

include "../conn.php";

if ($_GET) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_member WHERE id ='$id'";

    $result = mysqli_query($kon, $sql);

    if (!$result) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo '<script>alert("Data Berhasil Dihapus !!!"); window.location.href="member"</script>';
    }
} else {
    echo '<script>alert("Pilih data yang ingin dihapus terlebih dahulu !!!"); window.location.href="member"</script>';
}

?>