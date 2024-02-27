<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }

    include 'sidebar.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Tambah Relasi</h1>                    
                                    <div class="my-4"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Relasi</h6>
                        </div>
                        <div class="card-body">
                        <form class="tambah_relasi" action="function.php?act=tambahRelasi" id="tambah" method="POST">
                                <div class="form-group ">
                                    <label for="id_penyakit">Penyakit :</label>
                                    <select name="id_penyakit" id="id_penyakit" class="form-control form-control-user" aria-label="Default select example" required>
                                       <?php 
                                       $queryPenyakit = mysqli_query($koneksi, "SELECT * FROM penyakit");
                                        while ($data = mysqli_fetch_array($queryPenyakit)){ ?>
                                            <option value="<?= $q['id_penyakit']; ?>"><?= $data['kode_penyakit']; ?> - <?= $data['penyakit']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="id_gejala">Gejala : </label>
                                    <select name=" id_gejala" id="id_gejala" class="form-control form-control-user" aria-label="Default select example" required>
                                    <?php 
                                       $queryGejala = mysqli_query($koneksi, "SELECT * FROM gejala");
                                        while ($data = mysqli_fetch_array($queryGejala)){ ?>
                                            <option value="<?= $q['id_gejala']; ?>"><?= $data['kode_gejala']; ?> - <?= $data['gejala']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning"><a href="indexRelasi.php" class="btn btn-warning btn-icon-split">Batal</a></button>
                            <button type="submit" name="tambah_btn" id="tambah" value="tambah" class="btn btn-success">Simpan</button>
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
