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

    $id_ptm = $_GET["id_ptm"];

    $queryPTM = mysqli_query($koneksi, "SELECT * FROM ptm_hasil where id_ptm = '$id_ptm'");
    $user = mysqli_fetch_assoc($queryPTM);


    $dt = new DateTime();
    

   
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
                        <form action="ubahPemeriksaanPTMCek.php?id_ptm=<?php echo $user["id_ptm"]; ?>" method="GET">
                        
                        <input type="hidden" id="id_ptm" name="id_ptm"   value="<?= $user['id_ptm']; ?>">
                                <div class="form-group ">
                                    <label for="tanggal_pengisian">Tanggal Pengisian</label>
                                    <input type="date" class="form-control form-control-user" id="tanggal_pengisian" name="tanggal_pengisian"   value="<?= $user['tanggal_pengisian']; ?>">
                                </div>
                                <div class="form-group ">
                                    <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control form-control-user" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" value="<?= $user['tanggal_pemeriksaan']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $user['nik']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="ttl">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-user" id="ttl" name="ttl" value="<?= $user['ttl']; ?>" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-user" aria-label="Default select example" required>
                                            <option selected>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" <?php if ($user['jenis_kelamin'] == "Laki-laki") echo "selected" ?>>Laki-laki</option>
                                            <option value="Perempuan" <?php if ($user['jenis_kelamin'] == "Perempuan") echo "selected" ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" value="<?= $user['provinsi']; ?>" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="kota">Kota/Kabupaten</label>
                                        <input type="text" class="form-control form-control-user" id="kota" name="kota" value="<?= $user['kota']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $user['alamat']; ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?= $user['tlp']; ?>" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
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
                                    <div class="form-group col-lg-6">
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
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="status">Status Perkawinan</label>
                                        <select name="status" id="status" class="form-control form-control-user" aria-label="Default select example" required>
                                            <option selected>Pilih Status Perkawinan</option>
                                            <option value="Menikah" <?php if ($user['status'] == "Menikah") echo "selected" ?>>Menikah</option>
                                            <option value="Belum Menikah" <?php if ($user['status'] == "Belum Menikah") echo "selected" ?>>Belum Menikah</option>
                                            <option value="Janda/Duda" <?php if ($user['status'] == "Janda/Duda") echo "selected" ?>>Janda/Duda</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="goldar">Golongan Darah</label>
                                        <select name="goldar" id="goldar" class="form-control form-control-user" aria-label="Default select example" required>
                                            <option selected>Pilih Golongan Darah</option>
                                            <option value="A" <?php if ($user['goldar'] == "A") echo "selected" ?>>A</option>
                                            <option value="B" <?php if ($user['goldar'] == "B") echo "selected" ?>>B</option>
                                            <option value="AB" <?php if ($user['goldar'] == "AB") echo "selected" ?>>AB</option>
                                            <option value="O" <?php if ($user['goldar'] == "O") echo "selected" ?>>O</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga1">Riwayat Pada Keluarga</label><br>
                                        <select name="riwayatkeluarga1" id="riwayatkeluarga1" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Tidak Ada" <?php if ($user['riwayatkeluarga1'] == "Tidak Ada") echo "selected" ?>>Tidak Ada</option>
                                            <option value="Penyakit Diabetes" <?php if ($user['riwayatkeluarga1'] == "Penyakit Diabetes") echo "selected" ?>>Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi" <?php if ($user['riwayatkeluarga1'] == "Penyakit Hipertensi") echo "selected" ?>>Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma" <?php if ($user['riwayatkeluarga1'] == "Penyakit Asma") echo "selected" ?>>Penyakit Asma</option>
                                            <option value="Penyakit Jantung" <?php if ($user['riwayatkeluarga1'] == "Penyakit Jantung") echo "selected" ?>>Penyakit Jantung</option>
                                            <option value="Penyakit Stroke" <?php if ($user['riwayatkeluarga1'] == "Penyakit Stroke") echo "selected" ?>>Penyakit Stroke</option>
                                            <option value="Penyakit Kanker" <?php if ($user['riwayatkeluarga1'] == "Penyakit Kanker") echo "selected" ?>>Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol" <?php if ($user['riwayatkeluarga1'] == "Penyakit Kolesterol") echo "selected" ?>>Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga2"></label><br>
                                        <select name="riwayatkeluarga2" id="riwayatkeluarga2" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Tidak Ada" <?php if ($user['riwayatkeluarga2'] == "Tidak Ada") echo "selected" ?>>Tidak Ada</option>
                                            <option value="Penyakit Diabetes" <?php if ($user['riwayatkeluarga2'] == "Penyakit Diabetes") echo "selected" ?>>Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi" <?php if ($user['riwayatkeluarga2'] == "Penyakit Hipertensi") echo "selected" ?>>Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma" <?php if ($user['riwayatkeluarga2'] == "Penyakit Asma") echo "selected" ?>>Penyakit Asma</option>
                                            <option value="Penyakit Jantung" <?php if ($user['riwayatkeluarga2'] == "Penyakit Jantung") echo "selected" ?>>Penyakit Jantung</option>
                                            <option value="Penyakit Stroke" <?php if ($user['riwayatkeluarga2'] == "Penyakit Stroke") echo "selected" ?>>Penyakit Stroke</option>
                                            <option value="Penyakit Kanker" <?php if ($user['riwayatkeluarga2'] == "Penyakit Kanker") echo "selected" ?>>Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol" <?php if ($user['riwayatkeluarga2'] == "Penyakit Kolesterol") echo "selected" ?>>Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatkeluarga3"></label><br>
                                        <select name="riwayatkeluarga3" id="riwayatkeluarga3" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Tidak Ada" <?php if ($user['riwayatkeluarga3'] == "Tidak Ada") echo "selected" ?>>Tidak Ada</option>
                                            <option value="Penyakit Diabetes" <?php if ($user['riwayatkeluarga3'] == "Penyakit Diabetes") echo "selected" ?>>Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi" <?php if ($user['riwayatkeluarga3'] == "Penyakit Hipertensi") echo "selected" ?>>Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma" <?php if ($user['riwayatkeluarga3'] == "Penyakit Asma") echo "selected" ?>>Penyakit Asma</option>
                                            <option value="Penyakit Jantung" <?php if ($user['riwayatkeluarga3'] == "Penyakit Jantung") echo "selected" ?>>Penyakit Jantung</option>
                                            <option value="Penyakit Stroke" <?php if ($user['riwayatkeluarga3'] == "Penyakit Stroke") echo "selected" ?>>Penyakit Stroke</option>
                                            <option value="Penyakit Kanker" <?php if ($user['riwayatkeluarga3'] == "Penyakit Kanker") echo "selected" ?>>Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol" <?php if ($user['riwayatkeluarga3'] == "Penyakit Kolesterol") echo "selected" ?>>Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri1">Riwayat Pada Diri Sendiri</label><br>
                                        <select name="riwayatsendiri1" id="riwayatsendiri1" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Tidak Ada" <?php if ($user['riwayatsendiri1'] == "Tidak Ada") echo "selected" ?>>Tidak Ada</option>
                                            <option value="Penyakit Diabetes" <?php if ($user['riwayatsendiri1'] == "Penyakit Diabetes") echo "selected" ?>>Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi" <?php if ($user['riwayatsendiri1'] == "Penyakit Hipertensi") echo "selected" ?>>Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma" <?php if ($user['riwayatsendiri1'] == "Penyakit Asma") echo "selected" ?>>Penyakit Asma</option>
                                            <option value="Penyakit Jantung" <?php if ($user['riwayatsendiri1'] == "Penyakit Jantung") echo "selected" ?>>Penyakit Jantung</option>
                                            <option value="Penyakit Stroke" <?php if ($user['riwayatsendiri1'] == "Penyakit Stroke") echo "selected" ?>>Penyakit Stroke</option>
                                            <option value="Penyakit Kanker" <?php if ($user['riwayatsendiri1'] == "Penyakit Kanker") echo "selected" ?>>Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol" <?php if ($user['riwayatsendiri1'] == "Penyakit Kolesterol") echo "selected" ?>>Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri2"></label><br>
                                        <select name="riwayatsendiri2" id="riwayatsendiri2" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Tidak Ada" <?php if ($user['riwayatsendiri2'] == "Tidak Ada") echo "selected" ?>>Tidak Ada</option>
                                            <option value="Penyakit Diabetes" <?php if ($user['riwayatsendiri2'] == "Penyakit Diabetes") echo "selected" ?>>Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi" <?php if ($user['riwayatsendiri2'] == "Penyakit Hipertensi") echo "selected" ?>>Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma" <?php if ($user['riwayatsendiri2'] == "Penyakit Asma") echo "selected" ?>>Penyakit Asma</option>
                                            <option value="Penyakit Jantung" <?php if ($user['riwayatsendiri2'] == "Penyakit Jantung") echo "selected" ?>>Penyakit Jantung</option>
                                            <option value="Penyakit Stroke" <?php if ($user['riwayatsendiri2'] == "Penyakit Stroke") echo "selected" ?>>Penyakit Stroke</option>
                                            <option value="Penyakit Kanker" <?php if ($user['riwayatsendiri2'] == "Penyakit Kanker") echo "selected" ?>>Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol" <?php if ($user['riwayatsendiri2'] == "Penyakit Kolesterol") echo "selected" ?>>Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="riwayatsendiri3"></label><br>
                                        <select name="riwayatsendiri3" id="riwayatsendiri3" class="form-control form-control-user" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Tidak Ada" <?php if ($user['riwayatsendiri3'] == "Tidak Ada") echo "selected" ?>>Tidak Ada</option>
                                            <option value="Penyakit Diabetes" <?php if ($user['riwayatsendiri3'] == "Penyakit Diabetes") echo "selected" ?>>Penyakit Diabetes</option>
                                            <option value="Penyakit Hipertensi" <?php if ($user['riwayatsendiri3'] == "Penyakit Hipertensi") echo "selected" ?>>Penyakit Hipertensi</option>
                                            <option value="Penyakit Asma" <?php if ($user['riwayatsendiri3'] == "Penyakit Asma") echo "selected" ?>>Penyakit Asma</option>
                                            <option value="Penyakit Jantung" <?php if ($user['riwayatsendiri3'] == "Penyakit Jantung") echo "selected" ?>>Penyakit Jantung</option>
                                            <option value="Penyakit Stroke" <?php if ($user['riwayatsendiri3'] == "Penyakit Stroke") echo "selected" ?>>Penyakit Stroke</option>
                                            <option value="Penyakit Kanker" <?php if ($user['riwayatsendiri3'] == "Penyakit Kanker") echo "selected" ?>>Penyakit Kanker</option>
                                            <option value="Penyakit Kolesterol" <?php if ($user['riwayatsendiri3'] == "Penyakit Kolesterol") echo "selected" ?>>Penyakit Kolesterol</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="merokok">Merokok</label>
                                    <select name="merokok" id="merokok" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Jawaban</option>
                                        <option value="Ya" <?php if ($user['merokok'] == "Ya") echo "selected" ?>>Ya</option>
                                        <option value="Tidak" <?php if ($user['merokok'] == "Tidak") echo "selected" ?>>Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                <label for="fisik">Aktivitas Fisik < 150 Menit/Minggu</label>
                                <select name="fisik" id="fisik" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya" <?php if ($user['fisik'] == "Ya") echo "selected" ?>>Ya</option>
                                    <option value="Tidak" <?php if ($user['fisik'] == "Tidak") echo "selected" ?>>Tidak</option>
                                </select>
                                </div>
                                <div class="form-group ">
                                    <label for="gula">Konsumsi Gula >4 Sendok Makan / Hari</label>
                                    <select name="gula" id="gula" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Jawaban</option>
                                        <option value="Ya" <?php if ($user['gula'] == "Ya") echo "selected" ?>>Ya</option>
                                        <option value="Tidak" <?php if ($user['gula'] == "Tidak") echo "selected" ?>>Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                <label for="garam">Konsumsi Garam >1 Sendok Teh/ Hari</label>
                                <select name="garam" id="garam" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya" <?php if ($user['garam'] == "Ya") echo "selected" ?>>Ya</option>
                                    <option value="Tidak" <?php if ($user['garam'] == "Tidak") echo "selected" ?>>Tidak</option>
                                </select>
                                </div>
                                <div class="form-group ">
                                <label for="lemak">Konsumsi Lemak >5 Sendok Makan / Hari </label>
                                <select name="lemak" id="lemak" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya" <?php if ($user['lemak'] == "Ya") echo "selected" ?>>Ya</option>
                                    <option value="Tidak" <?php if ($user['lemak'] == "Tidak") echo "selected" ?>>Tidak</option>
                                </select>
                                </div>
                                <div class="form-group ">
                                <label for="sayur">Konsumsi sayur dan buah ≤5 porsi/Hari</label>
                                <select name="sayur" id="sayur" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya" <?php if ($user['sayur'] == "Ya") echo "selected" ?>>Ya</option>
                                    <option value="Tidak" <?php if ($user['sayur'] == "Tidak") echo "selected" ?>>Tidak</option>
                                </select>
                                </div>
                                <div class="form-group ">
                                <label for="alkohol">Konsumsi Alkohol</label>
                                <select name="alkohol" id="alkohol" class="form-control form-control-user" aria-label="Default select example" required>
                                    <option selected>Pilih Jawaban</option>
                                    <option value="Ya" <?php if ($user['alkohol'] == "Ya") echo "selected" ?>>Ya</option>
                                    <option value="Tidak" <?php if ($user['alkohol'] == "Tidak") echo "selected" ?>>Tidak</option>
                                </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="tinggi">Tinggi Badan</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="tinggi" name="tinggi" value="<?= $user['tinggi']; ?>" required><?php echo "&emsp;cm" ?>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="berat">Berat Badan</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="berat" name="berat" value="<?= $user['berat']; ?>" required> <?php echo "&emsp;kg" ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                            <label for="imt">IMT</label><br>
                                            <input type="text" class="form-control form-control-user" id="imt" name="imt" value="<?= $user['imt']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="hasil_imt">Hasil IMT</label><br>
                                        <input type="text" class="form-control form-control-user" id="hasil_imt" name="hasil_imt" value="<?= $user['hasil_imt']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="sistol">Tekanan Darah Sistol</label><br>
                                        <input type="text" class="form-control-tes col-lg-8" id="sistol" name="sistol" value="<?= $user['sistol']; ?>" required><?php echo "&emsp;mmHg (<140/90)" ?>
                                    </div>
                                    
                                    <div class="form-group col-lg-6">
                                        <label for="diastol">Tekanan Darah Diastol</label><br>
                                        <input type="text" class="form-control-tes col-lg-8" id="diastol" name="diastol" value="<?= $user['diastol']; ?>" required><?php echo "&emsp;mmHg (<140/90)" ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="hasil_tensi">Hasil Tensi</label>
                                    <input type="text" class="form-control form-control-user" id="hasil_tensi" name="hasil_tensi" value="<?= $user['hasil_tensi']; ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="lingkar">Lingkar Perut</label><br>
                                        <input type="text" class="form-control-tes col-lg-12" id="lingkar" name="lingkar" value="<?= $user['lingkar']; ?>" required><?php echo "&emsp;cm" ?>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="periksa_gula">Pemeriksaan Gula Darah Sewaktu</label>
                                        <input type="text" class="form-control-tes col-lg-9" id="periksa_gula" name="periksa_gula" value="<?= $user['periksa_gula']; ?>" required><?php echo "&emsp;mg/dl (<200)" ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="hasil_lingkar">Hasil Pengukuran Lingkar Perut</label><br>
                                        <input type="text" class="form-control form-control-user" id="hasil_lingkar" name="hasil_lingkar" value="<?= $user['hasil_lingkar']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="hasilperiksa_gula">Hasi Pemeriksaan Gula Darah Sewaktu</label>
                                        <input type="text" class="form-control form-control-user" id="hasilperiksa_gula" name="hasilperiksa_gula" value="<?= $user['hasilperiksa_gula']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <input type="checkbox" id="h_imt" name="h_imt" value="IMT" <?php if ($user['h_imt'] == "IMT") echo "checked" ?> disabled>
                                    <label for="h_imt">IMT</label><br>
        
                                    <input type="checkbox" id="h_hipertensi" name="h_hipertensi" value="Hipertensi" <?php if($user['h_hipertensi'] == "Hipertensi") echo "checked" ?> disabled>
                                    <label for="h_hipertensi"> Hipertensi</label><br>
                                    
                                    <input type="checkbox" id="h_obc" name="h_obc" value="Obesitas Central" <?php if ($user['h_obc'] == "Obesitas Central") echo "checked" ?> disabled>
                                    <label for="h_obc">Obesitas Central</label><br>
                                    
                                    <input type="checkbox" id="h_gm" name="h_gm" value="Diabetes Melitus" <?php if ($user['h_gm'] == "Diabetes Melitus") echo "checked" ?> disabled>
                                    <label for="h_gm">Diabetes Melitus</label><br>

                                    <input type="checkbox" id="h_normal" name="h_normal" value="Normal" <?php if ($user['h_normal'] == "Normal") echo "checked" ?> >
                                    <label for="h_normal"> Normal</label><br>
                                </div>
                                <div class="form-group ">
                                    <label for="feedback">Rekomendasi Dokter</label>
                                    <textarea class="form-control form-control-user" id="feedback" name="feedback" value="<?= $user['feedback']; ?>"><?= $user['feedback']; ?></textarea>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="history.back();">Batal</button>
                            <button type="submit" id="hitung" name="hitung" value="hitung" class="btn btn-success">Cek</button>
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