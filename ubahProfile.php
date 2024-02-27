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

    $queryUser = mysqli_query($koneksi, "SELECT * FROM profil_user where id_user = '$id_user'");
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
                        <form action="function.php?act=ubahProfile&id_user=<?= $user['id_user']; ?>" id="ubah" method="POST">
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $user['nik']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="bpjs">No. BPJS</label>
                                    <input type="text" class="form-control form-control-user" id="bpjs" name="bpjs" value="<?= $user['bpjs']; ?>" minlength="13" maxlength="13">
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="ttl">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" id="ttl" name="ttl" value="<?= $user['ttl']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" <?php if ($user['jenis_kelamin'] == "Laki-laki") echo "selected" ?>>Laki-laki</option>
                                        <option value="Perempuan" <?php if ($user['jenis_kelamin'] == "Perempuan") echo "selected" ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $user['alamat']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" value="<?= $user['provinsi']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="kota">Kota/Kabupaten</label>
                                    <input type="text" class="form-control form-control-user" id="kota" name="kota" value="<?= $user['kota']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?= $user['tlp']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                    <select name="pendidikan" id="pendidikan" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option>Pilih Pendidikan Terakhir</option>
                                        <option value="Tidak sekolah" <?php if ($user['pendidikan'] == "Tidak sekolah") echo "selected" ?>>Tidak Sekolah</option>
                                        <option value="SD/SLTP" <?php if ($user['pendidikan'] == "SD/SLTP") echo "selected" ?>>SD/SLTP</option>
                                        <option value="SLTA" <?php if ($user['pendidikan'] == "SLTA") echo "selected" ?>>SLTA</option>
                                        <option value="Diploma" <?php if ($user['pendidikan'] == "Diploma") echo "selected" ?>>Diploma</option>
                                        <option value="Sarjana" <?php if ($user['pendidikan'] == "Sarjana") echo "selected" ?>>Sarjana</option>
                                        <option value="Pascasarjana" <?php if ($user['pendidikan'] == "Pascasarjana") echo "selected" ?>>Pascasarjana</option>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <select name="pekerjaan" id="pekerjaan" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Pekerjaan</option>
                                        <option value="Petani" <?php if ($user['pekerjaan'] == "Petani") echo "selected" ?>>Petani</option>
                                        <option value="Pedagang / Wiraswasta" <?php if ($user['pekerjaan'] == "Pedagang / Wiraswasta") echo "selected" ?>>Pedagang / Wiraswasta</option>
                                        <option value="Nelayan" <?php if ($user['pekerjaan'] == "Nelayan") echo "selected" ?>>Nelayan</option>
                                        <option value="Pendidikan" <?php if ($user['pekerjaan'] == "Pendidikan") echo "selected" ?>>Pendidikan</option>
                                        <option value="Pengemudi" <?php if ($user['pekerjaan'] == "Pengemudi") echo "selected" ?>>Pengemudi</option>
                                        <option value="Pensiunan" <?php if ($user['pekerjaan'] == "Pensiunan") echo "selected" ?>>Pensiunan</option>
                                        <option value="TNI/Polri" <?php if ($user['pekerjaan'] == "TNI/Polri") echo "selected" ?>>TNI/Polri</option>
                                        <option value="PNS" <?php if ($user['pekerjaan'] == "PNS") echo "selected" ?>>PNS</option>
                                        <option value="Buruh" <?php if ($user['pekerjaan'] == "Buruh") echo "selected" ?>>Buruh</option>
                                        <option value="Dosen/Guru" <?php if ($user['pekerjaan'] == "Dosen/Guru") echo "selected" ?>>Dosen/Guru</option>
                                        <option value="Ibu Rumah Tangga" <?php if ($user['pekerjaan'] == "Ibu Rumah Tangga") echo "selected" ?>>Ibu Rumah Tangga</option>
                                        <option value="Karyawan / Pegawai" <?php if ($user['pekerjaan'] == "Karyawan / Pegawai") echo "selected" ?>>Karyawan / Pegawai</option>
                                        <option value="Belum Bekerja" <?php if ($user['pekerjaan'] == "Belum Bekerja") echo "selected" ?>>Belum Bekerja</option>
                                        <option value="Dokter/Bidan" <?php if ($user['pekerjaan'] == "Dokter/Bidan") echo "selected" ?>>Dokter/Bidan</option>
                                        <option value="Pelajar" <?php if ($user['pekerjaan'] == "Pelajar") echo "selected" ?>>Pelajar</option>
                                        <option value="Lainnya" <?php if ($user['pekerjaan'] == "Lainnya") echo "selected" ?>>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="status">Status Perkawinan</label>
                                    <select name="status" id="status" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Status Perkawinan</option>
                                        <option value="Menikah" <?php if ($user['status'] == "Menikah") echo "selected" ?>>Menikah</option>
                                        <option value="Belum Menikah" <?php if ($user['status'] == "Belum Menikah") echo "selected" ?>>Belum Menikah</option>
                                        <option value="Janda/Duda" <?php if ($user['status'] == "Janda/Duda") echo "selected" ?>>Janda/Duda</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="goldar">Golongan Darah</label>
                                    <select name="goldar" id="goldar" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Golongan Darah</option>
                                        <option value="A" <?php if ($user['goldar'] == "A") echo "selected" ?>>A</option>
                                        <option value="B" <?php if ($user['goldar'] == "B") echo "selected" ?>>B</option>
                                        <option value="AB" <?php if ($user['goldar'] == "AB") echo "selected" ?>>AB</option>
                                        <option value="O" <?php if ($user['goldar'] == "O") echo "selected" ?>>O</option>
                                    </select>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="indexProfile.php" class="btn btn-danger btn-icon-split">Batal</a></button>
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
    
<script>
var pageSelector = document.getElementById('pageSelector');
var customInput = document.getElementById('customInput');

pageSelector.addEventListener('change', function(){
    if(this.value == "custom") {
        customInput.classList.remove('hide');
    } else {
        customInput.classList.add('hide');
    }
})

</script>

<style>
    .hide {
    width: 0;
    height: 0;
    opacity: 0;
}
</style>


</body>

</html>