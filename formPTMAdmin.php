<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }


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
                        <form action="function.php?act=tambahPTMHasil" id="tambah" method="POST">
                            <input type="hidden" id="tanggal_pengisian" name="tanggal_pengisian"   value="<?php echo $tanggal;?>">
                            <input type="hidden" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan"   value="<?php echo $tanggal;?>" >
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="ttl">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-user" id="ttl" name="ttl" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-user" aria-label="Default select example" required>
                                            <option selected>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="kota">Kota/Kabupaten</label>
                                        <input type="text" class="form-control form-control-user" id="kota" name="kota" required>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" required>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control form-control-user" aria-label="Default select example" required>
                                            <option>Pilih Pendidikan Terakhir</option>
                                            <option value="Tidak sekolah">Tidak Sekolah</option>
                                            <option value="SD/SLTP">SD/SLTP</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Sarjana">Sarjana</option>
                                            <option value="Pascasarjana">Pascasarjana</option>
                                        </select>
                                    </div> 
                                    <div class="form-group col-lg-6">
                                        <label for="pekerjaan">Pekerjaan</label>
                                            <select name="pekerjaan" id="pekerjaan" class="form-control form-control-user" aria-label="Default select example" required>
                                            <option selected>Pilih Pekerjaan</option>
                                            <option value="Petani">Petani</option>
                                            <option value="Pedagang / Wiraswasta">Pedagang / Wiraswasta</option>
                                            <option value="Nelayan">Nelayan</option>
                                            <option value="Pendidikan">Pendidikan</option>
                                            <option value="Pengemudi">Pengemudi</option>
                                            <option value="Pensiunan">Pensiunan</option>
                                            <option value="TNI/Polri">TNI/Polri</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Dosen/Guru">Dosen/Guru</option>
                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                            <option value="Karyawan / Pegawai">Karyawan / Pegawai</option>
                                            <option value="Belum Bekerja">Belum Bekerja</option>
                                            <option value="Dokter/Bidan">Dokter/Bidan</option>
                                            <option value="Pelajar">Pelajar</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="status">Status Perkawinan</label>
                                        <select name="status" id="status" class="form-control form-control-user" aria-label="Default select example" required>
                                            <option selected>Pilih Status Perkawinan</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Janda/Duda">Janda/Duda</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="goldar">Golongan Darah</label>
                                        <select name="goldar" id="goldar" class="form-control form-control-user" aria-label="Default select example" required>
                                            <option selected>Pilih Golongan Darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga1">Riwayat Pada Keluarga</label><br>
                                        <select name="riwayatkeluarga1" id="riwayatkeluarga1" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma">Penyakit Asma</option>
                                            <option value="Penyakit Jantung">Penyakit Jantung</option>
                                            <option value="Penyakit Stroke">Penyakit Stroke</option>
                                            <option value="Penyakit Kanker">Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga2"></label><br>
                                        <select name="riwayatkeluarga2" id="riwayatkeluarga2" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma">Penyakit Asma</option>
                                            <option value="Penyakit Jantung">Penyakit Jantung</option>
                                            <option value="Penyakit Stroke">Penyakit Stroke</option>
                                            <option value="Penyakit Kanker">Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga3"></label><br>
                                        <select name="riwayatkeluarga3" id="riwayatkeluarga3" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma">Penyakit Asma</option>
                                            <option value="Penyakit Jantung">Penyakit Jantung</option>
                                            <option value="Penyakit Stroke">Penyakit Stroke</option>
                                            <option value="Penyakit Kanker">Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri1">Riwayat Pada Diri Sendiri</label><br>
                                        <select name="riwayatsendiri1" id="riwayatsendiri1" class="form-control form-control-user" aria-label="Default select example">
                                        <option selected></option>
                                            <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma">Penyakit Asma</option>
                                            <option value="Penyakit Jantung">Penyakit Jantung</option>
                                            <option value="Penyakit Stroke">Penyakit Stroke</option>
                                            <option value="Penyakit Kanker">Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri2"></label><br>
                                        <select name="riwayatsendiri2" id="riwayatsendiri2" class="form-control form-control-user" aria-label="Default select example">
                                        <option selected></option>
                                            <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma">Penyakit Asma</option>
                                            <option value="Penyakit Jantung">Penyakit Jantung</option>
                                            <option value="Penyakit Stroke">Penyakit Stroke</option>
                                            <option value="Penyakit Kanker">Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri3"></label><br>
                                        <select name="riwayatsendiri3" id="riwayatsendiri3" class="form-control form-control-user" aria-label="Default select example">
                                        <option selected></option>
                                            <option value="Penyakit Diabetes">Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi">Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma">Penyakit Asma</option>
                                            <option value="Penyakit Jantung">Penyakit Jantung</option>
                                            <option value="Penyakit Stroke">Penyakit Stroke</option>
                                            <option value="Penyakit Kanker">Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol">Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="merokok">Merokok</label>
                                    <select name="merokok" id="merokok" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Jawaban</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                <label for="fisik">Aktivitas Fisik < 150 Menit/Minggu</label>
                                <select name="fisik" id="fisik" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </div>
                                <div class="form-group ">
                                    <label for="gula">Konsumsi Gula >4 Sendok Makan / Hari</label>
                                    <select name="gula" id="gula" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Jawaban</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                <label for="garam">Konsumsi Garam >1 Sendok Teh/ Hari</label>
                                <select name="garam" id="garam" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </div>
                                <div class="form-group ">
                                <label for="lemak">Konsumsi Lemak >5 Sendok Makan / Hari </label>
                                <select name="lemak" id="lemak" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </div>
                                <div class="form-group ">
                                <label for="sayur">Konsumsi sayur dan buah ≤5 porsi/Hari</label>
                                <select name="sayur" id="sayur" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </div>
                                <div class="form-group ">
                                <label for="alkohol">Konsumsi Alkohol</label>
                                <select name="alkohol" id="alkohol" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="tinggi">Tinggi Badan</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="tinggi" name="tinggi" required><?php echo "&emsp;cm" ?>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="berat">Berat Badan</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="berat" name="berat" required> <?php echo "&emsp;kg" ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="sistol">Tekanan Darah Sistol</label><br>
                                        <input type="text" class="form-control-tes col-lg-8" id="sistol" name="sistol" required><?php echo "&emsp;mmHg (<140/90)" ?>
                                    </div>
                                    
                                    <div class="form-group col-lg-6">
                                        <label for="diastol">Tekanan Darah Diastol</label><br>
                                        <input type="text" class="form-control-tes col-lg-8" id="diastol" name="diastol" required><?php echo "&emsp;mmHg (<140/90)" ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="lingkar">Lingkar Perut</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="lingkar" name="lingkar" required><?php echo "&emsp;cm" ?>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="periksa_gula">Pemeriksaan Gula Darah Sewaktu</label>
                                        <input type="text" class="form-control-tes col-lg-9" id="periksa_gula" name="periksa_gula" required><?php echo "&emsp;mg/dl (<200)" ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="feedback">Rekomendasi Dokter</label>
                                    <textarea class="form-control form-control-user" id="feedback" name="feedback" required></textarea>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="history.back();">Batal</button>
                            <button type="submit" id="tambah" value="tambah" class="btn btn-success">Simpan</button>
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