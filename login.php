<?php
session_start();
if (isset($_SESSION['login_username'])) {
    header("location:admin_depan.php");
}
include("inc_koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "Silakan masukkan username dan password";
    }
    if (empty($err)) {
        $sql1 = "SELECT * FROM user WHERE username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_assoc($q1);
        if (!isset($r1['password']) || $r1['password'] != md5($password)) {
            $err .= "Username atau password salah";
        }
    }
    // KONDISI LOGIN SUKSES
    if (empty($err)) {
        if($r1['role'] == "admin") {
            $_SESSION['user'] = $r1;
            // var_dump($_SESSION['user']);
            // die();
            header("location:admin_depan.php");
        }else{
            $_SESSION['user'] = $r1;
            header("location:profil.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="https://placehold.co/600x400" class="img-fluid mt-5">
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <?php if(!empty($err)) : ?>
                                                <div class="alert alert-danger" role="alert"><?= $err ?></div>
                                            <?php endif; ?>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" type="text" placeholder="Masukan username" value="admin" autofocus />
                                                <label>Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" type="password" placeholder="Masukan password" value="admin" />
                                                <label>Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Belum punya akun? Daftar sekarang!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer mt-3">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>
</html>
