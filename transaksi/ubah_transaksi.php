<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/d0157de78d.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>

    <div id="kode">

        <?php
        // Session
        session_start();
        if (!isset($_SESSION["role"]) == "admin") {
            echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="transaksi"</script>';
            exit;
        }

        include "../conn.php";
        // Proses ubah
        if (isset($_POST['ubah'])) {
            $id = $_POST['id'];
            $id_outlet = $_POST['id_outlet'];
            $kode_invoice = $_POST['kode_invoice'];
            $id_member = $_POST['id_member'];
            $tgl = $_POST['tgl'];
            $batas_waktu = $_POST['batas_waktu'];
            $tgl_bayar = $_POST['tgl_bayar'];
            $biaya_tambahan = $_POST['biaya_tambahan'];
            $diskon = $_POST['diskon'];
            $pajak = $_POST['pajak'];
            $status = $_POST['status'];
            $dibayar = $_POST['dibayar'];
            $id_user = $_POST['id_user'];

            $sql = "UPDATE tb_transaksi SET id_outlet='$id_outlet', kode_invoice='$kode_invoice',id_member='$id_member', tgl='$tgl', batas_waktu='$batas_waktu', tgl_bayar='$tgl_bayar', biaya_tambahan='$biaya_tambahan', diskon='$diskon', pajak='$pajak', status='$status', dibayar='$dibayar', id_user='$id_user' WHERE id ='$id'";

            $result = mysqli_query($kon, $sql);

            if (!$result) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="transaksi"</script>';
            }
        }

        // Ambil data dari database
        include "../conn.php";
        $query = mysqli_query($kon, "SELECT * FROM tb_transaksi WHERE id='" . $_GET['id'] . "'");
        $row = mysqli_fetch_array($query);
        ?>

    </div>

    <div id="form" class="container py-3">

        <!-- Content Wrapper. Contains page content -->
        <div class="card">
            <!-- Content Header (Page header) -->
            <section class="card-header">
                <h1>
                    UBAH TRANSAKSI
                </h1>
            </section>

            <!-- Main content -->
            <section class="card-body">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="">
                                <div class="box-body">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="mb-3">
                                        <label>ID OUTLET</label>
                                        <input type="text" name="id_outlet" class="form-control" placeholder="ID OUTLET" required value="<?php echo $row['id_outlet']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>KODE INVOICE</label>
                                        <input type="text" name="kode_invoice" class="form-control" placeholder="KODE INVOICE" required value="<?php echo $row['kode_invoice']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>ID MEMBER</label>
                                        <input type="text" name="id_member" class="form-control" placeholder="ID MEMBER" required value="<?php echo $row['id_member']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>TANGGAL</label>
                                        <input type="date" name="tgl" class="form-control" placeholder="TANGGAL" required value="<?php echo $row['tgl']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>BATAS WAKTU</label>
                                        <input type="date" name="batas_waktu" class="form-control" placeholder="BATAS WAKTU" required value="<?php echo $row['batas_waktu']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>TANGGAL BAYAR</label>
                                        <input type="date" name="tgl_bayar" class="form-control" placeholder="TANGGAL BAYAR" required value="<?php echo $row['tgl_bayar']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>BIAYA TAMBAHAN</label>
                                        <input type="text" name="biaya_tambahan" class="form-control" placeholder="BIAYA TAMBAHAN" required value="<?php echo $row['biaya_tambahan']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>DISKON</label>
                                        <input type="text" name="diskon" class="form-control" placeholder="DISKON" required value="<?php echo $row['diskon']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>PAJAK</label>
                                        <input type="text" name="pajak" class="form-control" placeholder="PAJAK" required value="<?php echo $row['pajak']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>STATUS</label>
                                        <select class="form-control" name="status" value="<?php echo $row['status']; ?>>" <option value="">- Pilihan Status -</option>
                                            <option value="Baru">Baru</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai">Selesai</option>
                                            <option value="Diambil">Diambil</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>DIBAYAR</label>
                                        <select class="form-control" name="dibayar" value="<?php echo $row['dibayar']; ?>>">- Pilihan -</option>
                                            <option value="Dibayar">Dibayar</option>
                                            <option value="Belum_dibayar">Belum dibayar</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>ID USER</label>
                                        <input type="text" name="id_user" class="form-control" placeholder="ID USER" required value="<?php echo $row['id_user']; ?>">
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="ubah" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                    <a href="transaksi" class="btn btn-success"> Kembali</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</body>

</html>