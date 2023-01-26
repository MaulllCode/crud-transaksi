<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
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
        // if (!isset($_SESSION["id_user"])) {
        //     echo '<script>alert("Hanya Admin yang dapat mengakses halaman ini !!!"); window.location.href="index"</script>';
        //     exit;
        // }

        // Proses tambah
        include "conn.php";
        if (isset($_POST['kontak'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
            $pesan = $_POST['pesan'];

            $sql = "INSERT INTO pesan VALUES (NULL, '$nama', '$email', '$no_hp', '$pesan')";

            $result = mysqli_query($kon, $sql);

            if (!$result) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="index"</script>';
            }
        }
        ?>

    </div>

    <?php
    // Tombol login dan logout
    if (isset($_SESSION['id_user'])) {
    ?>
        <div id="form" class="container py-3">
            <!-- Content Wrapper. Contains page content -->
            <div class="card">
                <!-- Content Header (Page header) -->
                <section class="card-header">
                    <h1>
                        DAFTAR PESAN
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
                                <div class="container">
                                    <div class="box-body table-responsive">
                                        <table id="myTable" class="table table-bordered table-hover pt-2">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA</th>
                                                    <th>EMAIL</th>
                                                    <th>NO HP</th>
                                                    <th>PESAN</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                include "conn.php";
                                                // Ambil data untuk index
                                                $no = 1;
                                                $query = mysqli_query($kon, "SELECT * FROM pesan");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $row['nama']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['no_hp']; ?></td>
                                                        <td><?php echo $row['pesan']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <div class="box-footer mb-3">
                                                <a href="index" class="btn btn-success"> Kembali</a>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    <?php
    } else {
    ?>
        <div id="form" class="container py-3">
            <!-- Content Wrapper. Contains page content -->
            <div class="card">
                <!-- Content Header (Page header) -->
                <section class="card-header">
                    <h1>
                        KONTAK KAMI
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
                                        <div class="form-group">
                                            <label>NAMA</label>
                                            <input type="text" name="nama" class="form-control" placeholder="NAMA" required>
                                        </div>
                                        <div class="form-group">
                                            <label>EMAIL</label>
                                            <input type="email" name="email" class="form-control" placeholder="EMAIL" required>
                                        </div>
                                        <div class="form-group">
                                            <label>NO HP</label>
                                            <input type="number" name="no_hp" class="form-control" placeholder="NO HP" required>
                                        </div>
                                        <div class="form-group">
                                            <label>PESAN</label>
                                            <input type="text" name="pesan" class="form-control" placeholder="PESAN" required>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer pt-3">
                                        <button type="submit" class="btn btn-primary" name="kontak" title="Kirim Pesan"> <i class="glyphicon glyphicon-floppy-disk"></i> Kirim Pesan</button>
                                        <a href="index" class="btn btn-success"> Kembali</a>
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
    <?php
    }
    ?>
</body>

</html>