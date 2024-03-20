<section id="contact" class="d-flex align-items-center">
<div class="main-content">
    <!-- Page Heading -->
    <div class="container-fluid mt--7">
        <h1 class="mb-0 text-gray-800">Profile User</h1>
            <div class="my-4"></div>
        <a href="user_profile.php" class="btn btn-primary btn-icon-split">
            <span class="text">Profile User</span>
        </a>
        <a href="user_generalProfile.php" class="btn btn-info btn-icon-split">
            <span class="text">General User</span>
        </a>
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
                <?php
                      $tampillokasi = mysqli_query($koneksi, "SELECT DISTINCT p.id_user, p.nama_lengkap, p.nik, p.ttl, p.jenis_kelamin, p.alamat,  p.kota, p.provinsi, p.tlp, p.pendidikan, p.pekerjaan, p.status, p.goldar from user b, profil_user p where b.id_user=p.id_user and p.id_user='$_SESSION[id_user]' group by id_user");
                      while ($tampil = mysqli_fetch_array($tampillokasi)){
                      
                      ?>
                <?=$tampil['nama_lengkap']?><span class="font-weight-light"></span>
                </h3>
                
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"><?=$tampil['kota']?>, <?=$tampil['provinsi']?></i>
                </div>
                <?php } ?>
               
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2">Anda bisa mengubah profile yang sudah Anda tambahkan. Ubahlah data dengan lengkap dan benar karena semua kelengkapan data Anda akan tersimpan di database Puskesmas sebagai informasi pasien.</i>
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
                <div class="col-4 text-right">
                <a href="user_ubahProfile.php" class="btn btn-sm btn-primary">
                    <span class="icon text-white-20">
                        <i class="fas fa-file"></i>
                    </span>
                    <span class="text">Edit Profile</span>
                </a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Informasi Profile</h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <?php
                      $tampiluser = mysqli_query($koneksi, "SELECT DISTINCT p.id_user, p.nama_lengkap, p.nik, p.ttl, p.jenis_kelamin, p.alamat, p.kota, p.provinsi, p.tlp, p.pendidikan, p.pekerjaan, p.status, p.goldar, p.bpjs from user b, profil_user p where  b.nik=p.nik and b.id_user='$_SESSION[id_user]' group by nik");
                      while ($tampil = mysqli_fetch_array($tampiluser)){
                      
                      ?>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control form-control-alternative" value="<?=$tampil['nik']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="bpjs">No. BPJS</label>
                        <input type="text" id="bpjs" name="bpjs" class="form-control form-control-alternative" value="<?=$tampil['bpjs']?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nama_lengkap">Nama Lengkap</label>
                        <input id="nama_lengkap" name="nama_lengkap" class="form-control form-control-alternative" value="<?=$tampil['nama_lengkap']?>" type="text" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="ttl">Tanggal Lahir</label>
                        <input type="text" id="ttl" name="ttl" class="form-control form-control-alternative" value="<?=$tampil['ttl']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control form-control-alternative" value="<?=$tampil['jenis_kelamin']?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="alamat">Alamat Lengkap</label>
                        <input id="alamat" name="alamat" class="form-control form-control-alternative" value="<?=$tampil['alamat']?>" type="text" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="provinsi">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" class="form-control form-control-alternative" value="<?=$tampil['provinsi']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="kota">Kota/Kabupaten</label>
                        <input type="text" id="kota" name="kota" class="form-control form-control-alternative" value="<?=$tampil['kota']?>" readonly>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="tlp">No. Telepon</label>
                        <input type="text" id="tlp" name="tlp" class="form-control form-control-alternative" value="<?=$tampil['tlp']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="pendidikan">Pendidikan Terakhir</label>
                        <input type="text" id="pendidikan" name="pendidikan" class="form-control form-control-alternative" value="<?=$tampil['pendidikan']?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="pekerjaan">Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control form-control-alternative" value="<?=$tampil['pekerjaan']?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="status">Status Perkawinan</label>
                        <input type="text" id="status" name="status" class="form-control form-control-alternative" value="<?=$tampil['status']?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="goldar">Golongan Darah</label>
                        <input type="text" id="goldar" name="goldar" class="form-control form-control-alternative" value="<?=$tampil['goldar']?>"readonly>
                      </div>
                    </div>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
