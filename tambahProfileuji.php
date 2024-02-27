<section id="contact" class="d-flex align-items-center">
<div class="main-content">
    <!-- Page Heading -->
    <div class="container-fluid mt--7">
        <h1 class="mb-0 text-gray-800">Tambah Profile</h1>
            <div class="my-4"></div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
            </div>
            <div class="button-center">
                
            </div>
            <div class="text-center">
                <h3>
                <?=$lihat['nama_lengkap']?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>
                </div>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2">Masukan data dengan lengkap dan benar, data yang Anda masukan akan tersimpan dan menjadi informasi pasien di Puskesmas Pasundan.</i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-judul bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Profile</h3>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <form action="function.php?act=tambahProfilePasien" id="tambah" method="POST" class="tambah_pasien">
                <h6 class="heading-small text-muted mb-4">Profile informasi</h6>
                <div class="pl-lg-4">
                <input type="hidden" id="id_user" name="id_user" value="<?php echo $lihat['id_user']?>">    
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control form-control-alternative" minlength="16" maxlength="16" value="<?=$lihat['nik']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="bpjs">No. BPJS</label>
                        <input type="text" id="bpjs" name="bpjs" class="form-control form-control-alternative" minlength="13" maxlength="13" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nama_lengkap">Nama Lengkap</label>
                        <input id="nama_lengkap" name="nama_lengkap" class="form-control form-control-alternative" type="text" value="<?=$lihat['nama_lengkap']?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="ttl">Tanggal Lahir</label>
                        <input type="date" id="ttl" name="ttl" class="form-control form-control-alternative" value="<?=$lihat['ttl']?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">Pilih salah satu</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="alamat">Alamat Lengkap</label>
                        <input id="alamat" name="alamat" class="form-control form-control-alternative" type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="provinsi">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" class="form-control form-control-alternative" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="kota">Kota/Kabupaten</label>
                        <input type="text" id="kota" name="kota" class="form-control form-control-alternative" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="tlp">No. Telepon</label>
                        <input type="text" id="tlp" name="tlp" class="form-control form-control-alternative" value="<?=$lihat['tlp']?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="pendidikan">Pendidikan Terakhir</label>
                        <select name="pendidikan" id="pendidikan" class="form-control form-control-user" aria-label="Default select example" required>
                        <option selected>Pilih Pendidikan Terakhir</option>
                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                        <option value="SD/SLTP">SD/SLTP</option>
                        <option value="SLTA">SLTA</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Pascasarjana">Pascasarjana</option>
                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                      <label class="form-control-label" for="pendidikan">Pekerjaan</label>
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
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="status">Status Perkawinan</label>
                        <select name="status" id="status" class="form-control form-control-user" aria-label="Default select example" required>
                          <option selected>Pilih Status Perkawinan</option>
                          <option value="Menikah">Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                          <option value="Janda/Duda">Janda/Duda</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="goldar">Golongan Darah</label>
                        <select name="goldar" id="goldar" class="form-control form-control-user" aria-label="Default select example" required>
                        <option selected>Pilih Golongan Darah</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" id="tambah" value="Tambah" class="registerbtn btn btn-primary">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>