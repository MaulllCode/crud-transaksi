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
            echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="member"</script>';
            exit;
        }

        include "../conn.php";
        // Proses ubah
        if (isset($_POST['ubah'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tlp = $_POST['tlp'];

            $sql = "UPDATE tb_member SET nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tlp='$tlp' WHERE id ='$id'";

            $result = mysqli_query($kon, $sql);

            if (!$result) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="member"</script>';
            }
        }

        // Ambil data dari database
        include "../conn.php";
        $query = mysqli_query($kon, "SELECT * FROM tb_member WHERE id='" . $_GET['id'] . "'");
        $row = mysqli_fetch_array($query);
        ?>

    </div>

    <div id="form" class="container py-3">

        <!-- Content Wrapper. Contains page content -->
        <div class="card">
            <!-- Content Header (Page header) -->
            <section class="card-header">
                <h1>
                    UBAH MEMBER
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
                                        <label>NAMA</label>
                                        <input type="text" name="nama" class="form-control" placeholder="NAMA" required value="<?php echo $row['nama']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>ALAMAT</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="ALAMAT" required value="<?php echo $row['alamat']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>JENIS KELAMIN</label>
                                        <select class="form-control" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>">- Pilihan JENIS KELAMIN -</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>NO TELEPON</label>
                                        <input type="text" name="tlp" class="form-control" placeholder="NO TELEPON" required value="<?php echo $row['tlp']; ?>">
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="ubah" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                    <a href="member" class="btn btn-success"> Kembali</a>
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