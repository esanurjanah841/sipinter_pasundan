<!-- Pasien Tambah-->
<div class="modal fade" id="TambahProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Profile</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="function.php?act=tambahProfile" id="tambah" method="POST" class="tambah_pasien">
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control form-control-user" id="nik" name="nik" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" required>
                                </div>
                                <div class="form-group ">
                                    <label for="ttl">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" id="ttl" name="ttl" required>
                                </div>
                                <div class="form-group ">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" required>
                                </div>
                                <div class="form-group ">
                                    <label for="kelurahan">Kelurahan</label>
                                    <input type="text" class="form-control form-control-user" id="kelurahan" name="kelurahan" required>
                                </div>
                                <div class="form-group ">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control form-control-user" id="kecamatan" name="kecamatan" required>
                                </div>
                                <div class="form-group ">
                                    <label for="kota">Kota/Kab</label>
                                    <input type="text" class="form-control form-control-user" id="kota" name="kota" required>
                                </div>
                                <div class="form-group ">
                                    <label for="provinsi">Provinsi
                                    <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" required>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="number" class="form-control form-control-user" id="tlp" name="tlp" required>
                                </div>
                                <div class="form-group ">
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                    <select name="pendidikan" id="pendidikan" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option>Pilih Pendidikan Terakhir</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                        <option value="SD">SD/SLTP</option>
                                        <option value="SLTA">SLTA</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Sarjana">Sarjana</option>
                                        <option value="Pascasarjana">Pascasarjana</option>
                                    </select>
                                </div> 
                                <div class="form-group">
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
                                <div class="form-group ">
                                    <label for="status">Status Perkawinan</label>
                                    <select name="status" id="status" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option>Pilih Status Perkawinan</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Janda/Duda">Janda/Duda</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="goldar">Golongan Darah</label>
                                    <select name="goldar" id="goldar" class="form-control form-control-user" aria-label="Default select example" required>
                                        <option>Pilih Golongan Darah</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success" id="tambah" value="Tambah">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
