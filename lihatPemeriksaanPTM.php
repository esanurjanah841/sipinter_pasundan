<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }
    $id_ptm = $_GET["id_ptm"];

    $queryPTM = mysqli_query($koneksi, "SELECT * FROM ptm_hasil where id_ptm = '$id_ptm'");
    $user = mysqli_fetch_assoc($queryPTM);


    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal= strftime("%A, %d %B %Y");
    
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
                                    <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                                    <input type="text" class="form-control form-control-user" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" value="<?= $user['tanggal_pemeriksaan']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $user['nik']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="ttl">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-user" id="ttl" name="ttl" value="<?= $user['ttl']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" value="<?= $user['provinsi']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="kota">Kota/Kabupaten</label>
                                        <input type="text" class="form-control form-control-user" id="kota" name="kota" value="<?= $user['kota']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $user['alamat']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?= $user['tlp']; ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                        <input type="text" class="form-control form-control-user" id="pendidikan" name="pendidikan" value="<?= $user['pendidikan']; ?>" readonly>
                                    </div> 
                                    <div class="form-group col-lg-6">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" value="<?= $user['pekerjaan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="status">Status Perkawinan</label>
                                        <input type="text" class="form-control form-control-user" id="status" name="status" value="<?= $user['status']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="goldar">Golongan Darah</label>
                                        <input type="text" class="form-control form-control-user" id="goldar" name="goldar" value="<?= $user['goldar']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga1">Riwayat Pada Keluarga</label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatkeluarga1" name="riwayatkeluarga1" value="<?= $user['riwayatkeluarga1']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga2"></label><br>
                                        <input type="text" class="form-control form-control-user " id="riwayatkeluarga2" name="riwayatkeluarga2" value="<?= $user['riwayatkeluarga2']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga3"></label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatkeluarga3" name="riwayatkeluarga3" value="<?= $user['riwayatkeluarga3']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri1">Riwayat Pada Diri Sendiri</label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatsendiri1" name="riwayatsendiri1" value="<?= $user['riwayatsendiri1']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri2"></label><br>
                                        <input type="text" class="form-control form-control-user " id="riwayatsendiri2" name="riwayatsendiri2" value="<?= $user['riwayatsendiri2']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri3"></label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatsendiri3" name="riwayatsendiri3" value="<?= $user['riwayatsendiri3']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="merokok">Merokok</label>
                                    <input type="text" class="form-control form-control-user" id="merokok" name="merokok" value="<?= $user['merokok']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="fisik">Aktivitas Fisik < 150 Menit/Minggu</label>
                                    <input type="text" class="form-control form-control-user" id="fisik" name="fisik" value="<?= $user['fisik']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="gula">Konsumsi Gula >4 Sendok Makan / Hari</label>
                                    <input type="text" class="form-control form-control-user" id="gula" name="gula" value="<?= $user['gula']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="garam">Konsumsi Garam >1 Sendok Teh/ Hari</label>
                                    <input type="text" class="form-control form-control-user" id="garam" name="garam" value="<?= $user['garam']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="lemak">Konsumsi Lemak >5 Sendok Makan / Hari </label>
                                    <input type="text" class="form-control form-control-user" id="lemak" name="lemak" value="<?= $user['lemak']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="sayur">Konsumsi sayur dan buah ≤5 porsi/Hari</label>
                                    <input type="text" class="form-control form-control-user" id="sayur" name="sayur" value="<?= $user['sayur']; ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="alkohol">Konsumsi Alkohol</label>
                                    <input type="text" class="form-control form-control-user" id="alkohol" name="alkohol" value="<?= $user['alkohol']; ?>" readonly>
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-6">
                                        <label for="tinggi">Tinggi Badan</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" style="background-color: #eaecf4;" id="tinggi" name="tinggi" value="<?= $user['tinggi']; ?>" readonly><?php echo "&emsp;cm" ?>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="berat">Berat Badan</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" style="background-color: #eaecf4;" id="berat" name="berat" value="<?= $user['berat']; ?>" readonly> <?php echo "&emsp;kg" ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="sistol">Tekanan Darah Sistol</label><br>
                                        <input type="text" class="form-control-tes col-lg-8" style="background-color: #eaecf4;" id="sistol" name="sistol" value="<?= $user['sistol']; ?>" readonly><?php echo "&emsp;mmHg (<140/90)" ?>
                                    </div>
                                    
                                    <div class="form-group col-lg-6">
                                        <label for="diastol">Tekanan Darah Diastol</label><br>
                                        <input type="text" class="form-control-tes col-lg-8" style="background-color: #eaecf4;" id="diastol" name="diastol" value="<?= $user['diastol']; ?>" readonly><?php echo "&emsp;mmHg (<140/90)" ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="lingkar">Lingkar Perut</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" style="background-color: #eaecf4;" id="lingkar" name="lingkar" value="<?= $user['lingkar']; ?>" readonly><?php echo "&emsp;cm" ?>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="periksa_gula">Pemeriksaan Gula Darah Sewaktu</label>
                                        <input type="text" class="form-control-tes col-lg-9" style="background-color: #eaecf4;" id="periksa_gula" name="periksa_gula" value="<?= $user['periksa_gula']; ?>" readonly><?php echo "&emsp;mg/dl (<200)" ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <h6>Teks Template</h6>
                                    <p></p>
                                </div>
                                <div class="form-group ">
                                    <label for="feedback">Rekomendasi Dokter</label>
                                    <textarea class="form-control form-control-user" id="feedback" name="feedback" value="<?= $user['feedback']; ?>" readonly><?= $user['feedback']; ?></textarea>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="history.back();">Batal</button>
                            <a href="ubahPemeriksaanPTM.php?id_ptm=<?php echo $user["id_ptm"]; ?>" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                                </span>
                                 <span class="text">Edit</span>
                            </a>
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