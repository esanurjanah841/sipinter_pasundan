<section id="detail">
<div>
        <div class="solid">
            <div class="form-row">
                <div class="panel-heading">
                    <h3 style="font-family: poppins; margin-top: 20px; text-align:center;">LAPORAN HASIL DIAGNOSA SRQ-29</h3>
                    <a style="font-family: poppins; margin-top: 20px"></a>
                </div>
                <div class="panel-body">
                <div class="box-body table-responsive">
                    <form action="function.php?act=tambahLaporanAdmin" id="tambah" method="POST" class="tambah_pasien">
                                <div class="form-group ">
                                    <label for="tanggal_pengisian">Tanggal Pengisian</label>
                                    <input type="text" class="form-control form-control-user" id="tanggal_pengisian" name="tanggal_pengisian"   value="<?php echo $tanggal?>"  required>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $nik ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="ttl">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" id="ttl" name="ttl" value="<?= $ttl ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $alamat ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?= $tlp ?>" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="gejala"><i>Daftar Gejala yang dipilih:</i></label>
                                    <input class="form-control form-control-user" id="gejala" name="gejala[]" style="border: none; outline: none; margin-bottom:-5px;font-size: 16px;" value="Tidak ada gejala yang dipilih" readonly>  
                                </div>
                                <br>
                                <i class="text">Berdasarkan dari gejala-gejala yang telah dipilih pasien di atas, </i>
                                <br>
                                <div class="form-group ">
                                    <label for="penyakit">Hasil skrining kesehatan jiwa Anda menunjukan</label>
                                    <input type="text" class="form-control form-control-user" id="penyakit" name="penyakit" style="font-size: 16px;" value="<?php echo $hasil['penyakit']?>" readonly>
                                </div>
                                <div class="form-group " style="font-size:14px">
                                <input type="hidden" class="form-control form-control-user" id="feedback" name="feedback" value="<?php echo $pesan?>"  readonly>
                                    <p><?php echo $pesan ?></p>
                                </div>
                                <br>
                        <div class="modal-footer">
                            <button type="button" onclick="history.back();" style="margin:5px" class="btn btn-danger">Kembali</button>
                            <button type="submit" name="submit" id="tambah" style="margin:5px" value="tambah" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-warning" style="margin:5px" onclick="window.print()" style="color:white;"><i class="fas fa-print" > Print</i></button>
                        </div>
                    </form>
                </div>
</section>              