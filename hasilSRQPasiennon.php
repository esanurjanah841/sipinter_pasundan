<section id="detail">
<div class="">
        <div class="solid">
            <div class="form-row">
                <div class="panel-heading">
                    <h3 style="font-family: poppins; margin-top: 20px; text-align:center;">LAPORAN HASIL DIAGNOSA SRQ-29</h3>
                    <a style="font-family: poppins; margin-top: 20px"></a>
                </div>
                <div class="panel-body">
                <div class="box-body table-responsive">
                    <form action="function.php?act=tambahLaporan" id="tambah" method="POST" class="tambah_pasien">
                                <div class="form-group ">
                                    <label for="tanggal_pengisian">Tanggal Pengisian</label>
                                    <input type="text" class="form-control form-control-user" id="tanggal_pengisian" name="tanggal_pengisian"   value="<?php echo $tanggal?>"  readonly>
                                </div>
                                <?php 
                                    $tampiluser = mysqli_query($koneksi, "SELECT DISTINCT p.id_user, p.nama_lengkap, p.nik, p.ttl, p.jenis_kelamin, p.alamat, p.kota, p.provinsi, p.tlp, p.pendidikan, p.pekerjaan, p.status, p.goldar from user b, profil_user p where b.nik=p.nik and b.id_user='$_SESSION[id_user]' group by nik");
                                    $tampil = mysqli_fetch_array($tampiluser);
                                        $alamat = $tampil['alamat'];
                                        $kota = $tampil['kota'];
                                        $provinsi = $tampil['provinsi'];
                                ?>
                                
                                <input type="hidden" id="id_user" name="id_user" value="<?php echo $tampil['id_user']?>">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik"  value="<?php echo $tampil['nik']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap"  value="<?php echo $tampil['nama_lengkap']?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="ttl">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" id="ttl" name="ttl"  value="<?php echo $tampil['ttl']?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat"  value="<?php echo "$alamat, "; echo "$kota, "; echo "$provinsi, ";?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?php echo $tampil['tlp']?>" readonly>
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
                                <div class="form-group ">
                                    
                                    <textarea class="form-control form-control-user" id="penyakit" name="penyakit" style="font-size: 16px;" readonly>Segera konsultasikan kesehatan Anda dengan tenaga kesehatan di Fasilitas Pelayanan Kesehatan terdekat.</textarea>
                                </div>
                                <br>
                        <div class="modal-footer">
                            <button type="button" onclick="history.back();" class="btn btn-danger">Kembali</button>
                            <button type="submit" name="submit" id="tambah" value="tambah" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-warning" onclick="window.print()" style="color:white;"><i class="fas fa-print" > Print</i></button>
                        </div>
                    </form>
                </div>