<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menuPasien.php");
        }
    } else {
        header("location:index.php");
    }

    if ($_SESSION['role'] == "administrator") {
        include "sidebar.php";
    
    }elseif ($_SESSION['role'] == "admin"){
        include "sidebarAdmin.php";
    }

    
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal= strftime("%A, %d %B %Y");
    



    $id_ptm = $_GET["id_ptm"];
    // Data Cek
    $tanggal_pengisian = $_GET['tanggal_pengisian'];
    $tanggal_pemeriksaan = $_GET['tanggal_pemeriksaan'];
    $nik = $_GET['nik'];
    $nama_lengkap = $_GET['nama_lengkap'];
    $ttl = $_GET['ttl'];
    $jenis_kelamin = $_GET['jenis_kelamin'];
    $alamat = $_GET['alamat'];
    $provinsi = $_GET['provinsi'];
    $kota = $_GET['kota'];
    $tlp = $_GET['tlp'];
    $pendidikan = $_GET['pendidikan'];
    $pekerjaan = $_GET['pekerjaan'];
    $status = $_GET['status'];
    $goldar = $_GET['goldar'];
    $riwayatkeluarga1 = $_GET['riwayatkeluarga1'];
    $riwayatkeluarga2 = $_GET['riwayatkeluarga2'];
    $riwayatkeluarga3 = $_GET['riwayatkeluarga3'];
    $riwayatsendiri1 = $_GET['riwayatsendiri1'];
    $riwayatsendiri2 = $_GET['riwayatsendiri2'];
    $riwayatsendiri3 = $_GET['riwayatsendiri3'];
    $merokok = $_GET['merokok'];
    $fisik = $_GET['fisik'];
    $gula = $_GET['gula'];
    $garam = $_GET['garam'];
    $lemak = $_GET['lemak'];
    $sayur = $_GET['sayur'];
    $alkohol = $_GET['alkohol'];
    $berat = $_GET['berat'];
    $tinggi = $_GET['tinggi'];
    $lingkar = $_GET['lingkar'];
    $sistol = $_GET['sistol'];
    $diastol = $_GET['diastol'];
    $periksa_gula = $_GET['periksa_gula'];

    $queryPTM = mysqli_query($koneksi, "SELECT * FROM ptm_hasil where id_ptm = '$id_ptm'");
    $user = mysqli_fetch_assoc($queryPTM);

    
    if(isset($_GET['hitung'])){
       
        // IMT dan Hasil
        $tinggi_meter = $tinggi / 100;
        $tinggi_kuadrat = $tinggi_meter * $tinggi_meter;
        $hasil_tinggi = number_format($tinggi_kuadrat, 2, '.', '');
        $hasil_imt = $berat/$hasil_tinggi;
        $hasil_akhir = number_format($hasil_imt,1, '.', '');

        $pesan = "";
        if($hasil_akhir < 17){
            $pesan = "Sangat Kurus";
        }else if($hasil_akhir <= 17){
            $pesan = "Kurus";
        }else if(($hasil_akhir >= 18.5) && ($hasil_akhir <= 25)){
            $pesan = "Normal";
        }else if(($hasil_akhir > 25) && ($hasil_akhir <=27)){
            $pesan = "Gemuk";
        }else if($hasil_akhir > 27){
            $pesan = "Obesitas";
        }

        // Tensi 
        $pesan_tensi = "";
        if(($sistol < 120) && ($diastol < 80)){
            $pesan_tensi = "Normal";
        }else if((($sistol >= 120) && ($sistol <= 139))  && (($diastol >= 80) && ($diastol <= 89))){
            $pesan_tensi = "Prehipertensi";
        }else if(($sistol >= 140) && ($diastol >= 90)){
            $pesan_tensi = "Hipertensi";
        }

        // Lingkar Perut
        $jenis_kelamin = $_GET['jenis_kelamin'];
        $jk = $jenis_kelamin;
        
        $pesan_lingkar = "";
    
        if(($jk = 'Laki-laki') && ($lingkar < 90)){
            $pesan_lingkar =  "Normal";
        }elseif(($jk = 'Laki-laki') && ($lingkar >= 90)){
            $pesan_lingkar = "Obesitas Central";
        }

        if(($jk = 'Perempuan') && ($lingkar < 80)){
            $pesan_lingkar =  "Normal";
        }elseif(($jk = 'Perempuan') && ($lingkar >= 80)){
            $pesan_lingkar = "Obesitas Central";
        }

        // Hasil Pemeriksaan Gula Darah
        $pesan_gula = "";
        if($periksa_gula < 80){
            $pesan_gula = "Hipoglikemi";
        }elseif(($periksa_gula >= 80) && ($periksa_gula <= 144)){
            $pesan_gula = "Normal";
        }else if(($periksa_gula >= 145) && ($periksa_gula <= 199)){
            $pesan_gula = "Prehiperglikemi";
        }else if($periksa_gula >= 200){
            $pesan_gula = "Hiperglikemi";
        }}
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
                        <form action="function.php?act=ubahPemeriksaanPTM&id_ptm=<?= $user['id_ptm']; ?>" id="tambah" method="POST">
                                <div class="form-group ">
                                    <label for="tanggal_pengisian">Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control form-control-user" id="tanggal_pengisian" name="tanggal_pengisian"   value="<?= $tanggal_pengisian ?>">
                                </div>
                                <div class="form-group ">
                                    <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control form-control-user" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" value="<?php echo $tanggal_pemeriksaan?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $nik ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="ttl">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-user" id="ttl" name="ttl" value="<?= $ttl ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin" value="<?= $jenis_kelamin ?>" readonly>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" value="<?= $provinsi ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="kota">Kota/Kabupaten</label>
                                        <input type="text" class="form-control form-control-user" id="kota" name="kota" value="<?= $kota ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $alamat ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?= $tlp ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                        <input type="text" class="form-control form-control-user" id="pendidikan" name="pendidikan" value="<?= $pendidikan ?>" readonly>
                                    </div> 
                                    <div class="form-group col-lg-6">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" value="<?= $pekerjaan ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="status">Status Perkawinan</label>
                                        <input type="text" class="form-control form-control-user" id="status" name="status" value="<?= $status ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="goldar">Golongan Darah</label>
                                        <input type="text" class="form-control form-control-user" id="goldar" name="goldar" value="<?= $goldar ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga1">Riwayat Pada Keluarga</label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatkeluarga1" name="riwayatkeluarga1" value="<?= $riwayatkeluarga1 ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga2"></label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatkeluarga2" name="riwayatkeluarga2" value="<?= $riwayatkeluarga2 ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga3"></label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatkeluarga3" name="riwayatkeluarga3" value="<?= $riwayatkeluarga3 ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri1">Riwayat Pada Diri Sendiri</label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatsendiri1" name="riwayatsendiri1" value="<?= $riwayatsendiri1 ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri2"></label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatsendiri2" name="riwayatsendiri2" value="<?= $riwayatsendiri2 ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri3"></label><br>
                                        <input type="text" class="form-control form-control-user" id="riwayatsendiri3" name="riwayatsendiri3" value="<?= $riwayatsendiri3 ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="merokok">Merokok</label>
                                    <input type="text" class="form-control form-control-user" id="merokok" name="merokok" value="<?= $merokok ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="fisik">Aktivitas Fisik < 150 Menit/Minggu</label>
                                    <input type="text" class="form-control form-control-user" id="fisik" name="fisik" value="<?= $fisik ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="gula">Konsumsi Gula >4 Sendok Makan / Hari</label>
                                    <input type="text" class="form-control form-control-user" id="gula" name="gula" value="<?= $gula ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="garam">Konsumsi Garam >1 Sendok Teh/ Hari</label>
                                    <input type="text" class="form-control form-control-user" id="garam" name="garam" value="<?= $garam ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="lemak">Konsumsi Lemak >5 Sendok Makan / Hari </label>
                                    <input type="text" class="form-control form-control-user" id="lemak" name="lemak" value="<?= $lemak ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="sayur">Konsumsi sayur dan buah ≤5 porsi/Hari</label>
                                    <input type="text" class="form-control form-control-user" id="sayur" name="sayur" value="<?= $sayur ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="alkohol">Konsumsi Alkohol</label>
                                    <input type="text" class="form-control form-control-user" id="alkohol" name="alkohol" value="<?= $alkohol ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="tinggi">Tinggi Badan</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="tinggi" name="tinggi" value="<?= $tinggi?>" required><?php echo "&emsp;cm" ?>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="berat">Berat Badan</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="berat" name="berat" value="<?= $berat ?>" required> <?php echo "&emsp;kg" ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                            <label for="imt">IMT</label><br>
                                            <input type="text" class="form-control-tes col-lg-12" id="imt" name="imt" value="<?= $hasil_akhir?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="hasil_imt">Hasil IMT</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="hasil_imt" name="hasil_imt" value="<?= $pesan?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="sistol">Tekanan Darah Sistol</label><br>
                                        <input type="text" class="form-control-tes col-lg-8" id="sistol" name="sistol" value="<?= $sistol ?>" required><?php echo "&emsp;mmHg (<140/90)" ?>
                                    </div>
                                    
                                    <div class="form-group col-lg-6">
                                        <label for="diastol">Tekanan Darah Diastol</label><br>
                                        <input type="text" class="form-control-tes col-lg-8" id="diastol" name="diastol" value="<?= $diastol ?>" required><?php echo "&emsp;mmHg (<140/90)" ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="hasil_tensi">Hasil Tensi</label>
                                    <input type="text" class="form-control form-control-user" id="hasil_tensi" name="hasil_tensi" value="<?= $pesan_tensi ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="lingkar">Lingkar Perut</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="lingkar" name="lingkar" value="<?= $lingkar ?>" required><?php echo "&emsp;cm" ?>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="periksa_gula">Pemeriksaan Gula Darah Sewaktu</label>
                                        <input type="text" class="form-control-tes col-lg-9" id="periksa_gula" name="periksa_gula" value="<?= $periksa_gula ?>" required><?php echo "&emsp;mg/dl (<200)" ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="hasil_lingkar">Hasil Pengukuran Lingkar Perut</label><br>
                                        <input type="text" class="form-control form-control-user" id="hasil_lingkar" name="hasil_lingkar" value="<?= $pesan_lingkar ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="hasilperiksa_gula">Hasi Pemeriksaan Gula Darah Sewaktu</label>
                                        <input type="text" class="form-control form-control-user" id="hasilperiksa_gula" name="hasilperiksa_gula" value="<?= $pesan_gula ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="feedback">Rekomendasi Dokter</label>
                                    <textarea class="form-control form-control-user" id="feedback" name="feedback" value="<?= $user['feedback']; ?>" required><?= $user['feedback']; ?></textarea>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="history.back();">Batal</button>
                            <button type="submit" id="ubah" name="ubah" value="Simpan Data" class="btn btn-success">Simpan</button>
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