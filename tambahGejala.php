
<!-- Pasien Tambah-->
<div class="modal fade" id="TambahGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Gejala</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="function.php?act=tambahGejala" id="tambah" method="POST" class="tambah_pasien">
                                <div class="form-group ">
                                    <label for="kode_gejala">Kode Gejala</label>
                                    <input type="text" class="form-control form-control-user" id="kode_gejala" name="kode_gejala" value="<?php echo $kodegejala?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gejala">Nama Gejala</label>
                                    <input type="text" class="form-control form-control-user" id="gejala" name="gejala" placeholder="Nama Gejala" required>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="submit" id="tambah" value="tambah" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>