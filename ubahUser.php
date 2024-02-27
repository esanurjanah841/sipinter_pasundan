<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }
    $id_user = $_GET["id_user"];

    $queryUser = mysqli_query($koneksi, "SELECT * FROM user where id_user = '$id_user'");
    $user = mysqli_fetch_assoc($queryUser);

    include 'sidebar.php';
   
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Ubah User</h1>                    
                                    <div class="my-4"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                        <div class="modal-body">
                        <form class="tambah_pasien" action="function.php?act=ubahPasien&id_user=<?= $user['id_user']; ?>" id="ubah" method="POST">
                                <div class="form-group ">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $user['nama']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $user['nik']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= $user['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                        <label for="ttl">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-user" name="ttl" id="ttl" value="<?= $user['ttl']; ?>" required>
                                </div>
                                <div class="form-group">
                                        <label for="tlp">No. Telepon</label>
                                        <input type="text" class="form-control form-control-user" name="tlp" id="tlp"  value="<?= $user['tlp']; ?>" placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" id="password" name="password" value="<?= $user['password']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option>Pilih Role</option>
                                        <option value="pasien" <?php if ($user['role'] == "pasien") echo "selected" ?>>Pasien</option>
                                        <option value="admin" <?php if ($user['role'] == "admin") echo "selected" ?>>Admin</option>
                                        <option value="administrator" <?php if ($user['role'] == "administrator") echo "selected" ?>>Administrator</option>
                                    </select>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="history.back();">Batal</button>
                            <button type="submit" name="ubah_btn" id="ubah" value="ubah" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Puskesmas Pasundan 2024.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Akan Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika kamu ingin mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>