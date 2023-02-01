<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type">
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

        include 'conn.php';

        // Session
        session_start();
        if (isset($_SESSION["role"])) {
            echo '<script>alert("Anda telah melakukan login !!!"); window.location.href="index"</script>';
            exit;
        }

        // Proses
        if (isset($_POST['register'])) {

            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $id_outlet = $_POST['id_outlet'];
            $role = $_POST['role'];
            $password = md5($_POST['password']);
            $cpassword = md5($_POST['cpassword']);

            if ($password == $cpassword) {

                $sql = "INSERT INTO tb_user VALUES (NULL, '$nama', '$username', '$password', '$id_outlet', '$role')";

                $result = mysqli_query($kon, $sql);
                if ($result) {
                    echo "<script>alert('Selamat, Registrasi berhasil!');window.location.href='login';</script>";
                    $username = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Maaf, Registrasi gagal!');window.location.href='login';</script>";
                }
            } else {
                echo "<script>alert('Mohon masukan password dengan sesuai!')</script>";
            }
        }
        ?>
    </div>

    <div id="form" class="container py-3">
        <!-- Content Wrapper. Contains page content -->
        <div class="card">
            <!-- Content Header (Page header) -->
            <section class="card-header">
                <h1>
                    FORM REGISTER
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
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label>NAMA</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama lengkap dengan benar')" oninput="setCustomValidity('')">
                                </div>
                                <div class="mb-3">
                                    <label>USERNAME</label>
                                    <input type="text" class="form-control" name="username" placeholder="Nama lengkap" required pattern="[a-zA-Z\s]{1,50}" oninvalid="this.setCustomValidity('Masukan Nama lengkap dengan benar')" oninput="setCustomValidity('')">
                                </div>
                                <div class="mb-3">
                                    <label>KATA SANDI</label>
                                    <input type="password" class="form-control" name="password" placeholder="Kata sandi" required oninvalid="this.setCustomValidity('Masukan Kata sandi dengan benar')" oninput="setCustomValidity('')" min="10">
                                </div>
                                <div class="mb-3">
                                    <label>KONFIRMASI KATA SANDI</label>
                                    <input type="password" class="form-control" name="cpassword" placeholder="Kata sandi" required oninvalid="this.setCustomValidity('Masukan kata sandi dengan benar')" oninput="setCustomValidity('')">
                                </div>
                                <div class="mb-3">
                                    <label>ID OUTLET</label>
                                    <input type="text" class="form-control" name="id_outlet" placeholder="Masukan Id Outlet" required>
                                </div>
                                <div class="mb-3">
                                    <label>ROLE</label>
                                    <select class="form-control" id="" name="role" placeholder="Masukan Role" required>
                                        <option value="">-- Pilihan Role --</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                        <option value="owner">Owner</option>
                                    </select>
                                </div>

                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary" name="register" value="Registrasi">
                                </div>
                                <hr>
                                <div class="text-center">
                                    <p>Anda sudah punya akun? <a href="login">Masuk</a></p>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
            </section>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>

</html>