<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }
    $id_riwayat = $_GET["id_riwayat"];

    $queryRiwayat = mysqli_query($koneksi, "SELECT * FROM riwayat where id_riwayat = '$id_riwayat'");
    $user = mysqli_fetch_assoc($queryRiwayat);
    
    include 'sidebar.php';
   
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Pemeriksaan PTM</h1>                    
                                    <div class="my-4"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data PTM</h6>
                        </div>
                        <div class="card-body">
                        <div class="modal-body">
                        <form action="" id="ubah" method="POST">
                            <div class="form-group ">
                                    <label for="nik">Tanggal Pengisian</label>
                                    <input type="text" class="form-control form-control-user" id="tanggal_pengisian" name="tanggal_pengisian" value="<?= $user['tanggal_pengisian']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $user['nik']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="bpjs">No. BPJS</label>
                                    <input type="text" class="form-control form-control-user" id="bpjs" name="bpjs" value="<?= $user['bpjs']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                        <label for="ttl">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-user" id="ttl" name="ttl" value="<?= $user['ttl']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $user['alamat']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?= $user['tlp']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">Daftar Gejala yang dipilih:</label>
                                    <textarea type="text" class="form-control form-control-user" id="gejala" name="gejala" value="<?= $user['gejala']; ?>" readonly><?= $user['gejala']; ?></textarea>
                                </div>            
                                <br>
                                <i class="text">Berdasarkan dari gejala-gejala yang telah dipilih pasien di atas, hasil menunjukan:</i>
                                <br>
                                <div class="form-group ">
                                    <label for="penyakit">Pasien Mengalami</label>
                                    <input type="text" class="form-control form-control-user" id="penyakit" name="penyakit" style="font-size: 16px;" value="<?php echo $user['penyakit']?>" readonly>
                                </div>
                                <br>                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="history.back();">Batal</button>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalazz</button>
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