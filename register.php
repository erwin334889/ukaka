<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website galeri foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">WEBSITE GALERI FOTO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">

                </div>
                <a href="register.php" class="btn btn-outline-primary m-1">DAFTAR</a>
                <a href="login.php" class="btn btn-outline-success m-1">MASUK</a>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>DAFTAR AKUN BARU</h5>
                        </div>
                        <form action="config/aksi_register.php" method="POST">
                            <label class="form-label">USERNAME</label>
                            <input type="text" name="username" class="form-control" required>
                            <label class="form-label">PASSWORD</label>
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">EMAIL</label>
                            <input type="text" name="email" class="form-control" required>
                            <label class="form-label">NAMA LENGKAP</label>
                            <input type="text" name="namalengkap" class="form-control" required>
                            <label class="form-label">ALAMAT</label>
                            <input type="text" name="alamat" class="form-control" required>
                            <label class="form-label">NO HP</label>
                            <input type="text" name="nomerhp" class="form-control" required>
                            <div class="d-grid mt-2">
                                <button class="btn btn-primary" type="submit" name="kirim">MASUK</button>
                            </div>
                        </form>
                        <p>Sudah Punya Akun? <a href="login.php">LOGIN DISINI</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UKK RPL 2024 | Erwin Maulana</p>
    </footer>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>