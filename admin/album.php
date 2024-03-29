<?php
session_start();
include("../config/koneksi.php");
if ($_SESSION['status'] != 'login') {
    echo "<script>
            alert('Anda belum login!'); 
            location.href='../index.php';
        </script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galery Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- ===================================== MENU NAVIGASI ============================================== -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
                <div class="navbar-nav me-auto">
                <a href="home.php" class="btn btn-outline-primary">Home</a>
                    <a href="album.php" class="btn btn-outline-info">Album</a>
                    <a href="foto.php" class="btn btn-outline-success">Foto</a>
                </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
            </div>
        </div>
    </nav>
    <!-- =========================================================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-4"><!-- ===================== MENGISI DATA ALBUM =========================== -->
                <div class="card mt-2">
                    <div class="card-header">Tambah Album</div>
                    <div class="card-body">
                        <form action="../config/aksi_album.php" method="post">
                            <label class="form-label">Nama Album</label>
                            <input type="text" name="namaalbum" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div><!-- ========================================================= -->
            <div class="col-md-8"><!-- ========================= MENAMPILKAN DATA ALBUM ==================== -->
                <div class="card mt-2">
                    <div class="card-header">Data Album</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Album</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");

                                while ($data = mysqli_fetch_array($sql)) {

                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $data['namaalbum'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['deskripsi'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['tanggaldibuat'] ?>
                                        </td>
                                        <td><!-- ====== Awal Button Edit ===== -->
                                            <button type="button" class="btn btn-primary bi bi-pencil-square" data-bs-toggle="modal"
                                                data-bs-target="#edit<?php echo $data['albumid'] ?>">
                                            
                                            </button>
                                            <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_album.php" method="post">
                                                                <input type="hidden" name="albumid"
                                                                    value="<?php echo $data['albumid'] ?>">
                                                                <label class="form-label">Nama Album</label>
                                                                <input type="text" name="namaalbum"
                                                                    value="<?php echo $data['namaalbum'] ?>"
                                                                    class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi" required>
                                                                            <?php echo $data['deskripsi']; ?>
                                                                        </textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-primary">Edit
                                                                Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td><!-- ====== Akhir Button Edit ===== -->
                                        <td><!-- ====== Awal Button Hapus ===== -->
                                            <button type="button" class="btn btn-danger bi bi-trash3" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?php echo $data['albumid'] ?>">
                                            
                                            </button>
                                            <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_album.php" method="post">
                                                                <input type="hidden" name="albumid"
                                                                    value="<?php echo $data['albumid'] ?>">
                                                                Apakah Anda yakin akan menghapus data <strong>
                                                                    <?php echo $data['namaalbum'] ?>
                                                                </strong> ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-danger">Hapus
                                                                Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td><!-- ====== Akhir Button Hapus ===== -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- ========================================================= -->
        </div>
    </div>
    <!-- =========================================================================================== -->

    <!-- ==========================================FOOTER================================================= -->
    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UKK RPL 2024</p>
    </footer>

    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>

</html>