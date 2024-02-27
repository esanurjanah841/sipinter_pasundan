<!-- Pasien Tambah-->
<div class="modal fade" id="TambahPasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Pasien</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="function.php?act=tambahUser" id="tambah" method="POST" class="tambah_pasien">
                                <div class="form-group ">
                                    <label for="nama">Username</label>
                                    <input type="text" class="form-control form-control-user" name="nama" id="nama"  placeholder="username" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" name="nik" id="nik" placeholder="32xxxxxxxxxxxxxx" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Alamat Email" required>
                                </div>
                                <div class="form-group">
                                        <label for="ttl">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-user" name="ttl" id="ttl"  required>
                                </div>
                                <div class="form-group">
                                        <label for="tlp">No. Telepon</label>
                                        <input type="text" class="form-control form-control-user" name="tlp" id="tlp"  placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" name="password" id="password"  minlength="8" maxlength="15" placeholder="Password" required>
                                </div>
                                <div class="form-group ">
                                    <label for="role">Role</label>
                                    <select class="form-control form-control-user" name="role" id="role" aria-label="Default select example" required>
                                        <option selected>Pilih Role</option>
                                        <option value="pasien">Pasien</option>
                                        <option value="admin">Admin</option>
                                        <option value="administrator">Administrator</option>
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