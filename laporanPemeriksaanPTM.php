<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }
    
    $queryPasien = mysqli_query($koneksi, "SELECT * FROM ptm_hasil");
    $no=0;

    include 'sidebar.php';

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Laporan Data PTM</h1>                    
                                    <div class="my-4"></div>
                                   

                    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data PTM Pemeriksaan</h6>
            </div>
            <div style="font-size: 14px;">
                <a href="PTMcsv.php" class=" btn btn-primary btn-icon-split" style="font-size 14px; margin:10px">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-csv"></i>
                    </span>
                    <span class="text">CSV</span>
                </a>
                <a href="LaporanPTM.php" target="_BLANK" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                </a>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" encytpe="multipart/form-data">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                                    <thead style="text-align:center">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pengisian</th>
                                            <th>Tanggal Pemeriksaan</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Provinsi</th>
                                            <th>Kota</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th>Pekerjaan</th>
                                            <th>Status Perkawinan</th>
                                            <th>Golongan Darah</th>
                                            <th>Riwayat Pada Keluarga 1</th>
                                            <th>Riwayat Pada Keluarga 2</th>
                                            <th>Riwayat Pada Keluarga 3</th>
                                            <th>Riwayat Pada Sendiri 1</th>
                                            <th>Riwayat Pada Sendiri 2</th>
                                            <th>Riwayat Pada Sendiri 3</th>
                                            <th>Merokok</th>
                                            <th>Aktivitas Fisik</th>
                                            <th>Konsumsi Gula</th>
                                            <th>>Konsumsi Garam</th>
                                            <th>Konsumsi Lemak</th>
                                            <th>Konsumsi sayur dan buah</th>
                                            <th>Konsumsi Alkohol</th>
                                            <th>Tinggi Badan</th>
                                            <th>Berat Badan</th>
                                            <th>Sistol</th>
                                            <th>Diastol</th>
                                            <th>Lingkar Perut</th>
                                            <th>Pemeriksaan Gula Darah Sewaktu</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($data = mysqli_fetch_assoc($queryPasien)) {
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['tanggal_pengisian']; ?></td>
                                            <td><?= $data['tanggal_pemeriksaan']; ?></td>
                                            <td><?= $data['nik']; ?></td>
                                            <td><?= $data['nama_lengkap']; ?></td>
                                            <td><?= $data['ttl']; ?></td>
                                            <td><?= $data['jenis_kelamin']; ?></td>
                                            <td><?= $data['provinsi']; ?></td>
                                            <td><?= $data['kota']; ?></td>
                                            <td><?= $data['alamat']; ?></td>
                                            <td><?= $data['tlp']; ?></td>
                                            <td><?= $data['pendidikan']; ?></td>
                                            <td><?= $data['pekerjaan']; ?></td>
                                            <td><?= $data['status']; ?></td>
                                            <td><?= $data['goldar']; ?></td>
                                            <td><?= $data['riwayatkeluarga1']; ?></td>
                                            <td><?= $data['riwayatkeluarga2']; ?></td>
                                            <td><?= $data['riwayatkeluarga3']; ?></td>
                                            <td><?= $data['riwayatsendiri1']; ?></td>
                                            <td><?= $data['riwayatsendiri2']; ?></td>
                                            <td><?= $data['riwayatsendiri3']; ?></td>
                                            <td><?= $data['merokok']; ?></td>
                                            <td><?= $data['fisik']; ?></td>
                                            <td><?= $data['gula']; ?></td>
                                            <td><?= $data['garam']; ?></td>
                                            <td><?= $data['lemak']; ?></td>
                                            <td><?= $data['sayur']; ?></td>
                                            <td><?= $data['alkohol']; ?></td>
                                            <td><?= $data['tinggi']; ?></td>
                                            <td><?= $data['berat']; ?></td>
                                            <td><?= $data['sistol']; ?></td>
                                            <td><?= $data['diastol']; ?></td>
                                            <td><?= $data['lingkar']; ?></td>
                                            <td><?= $data['periksa_gula']; ?></td>
                                            <td>
                                                <a href="function.php?act=hapusPemeriksaanPTM&id_ptm=<?= $data["id_ptm"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="btn btn-danger btn-icon-split" title="Hapus" style="margin:10px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                                <a href="lihatPemeriksaanPTM.php?id_ptm=<?php echo $data["id_ptm"]; ?>" class="btn btn-success btn-icon-split" title="Lihat" style="margin:10px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
