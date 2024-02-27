<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }
    
    $queryPasien = mysqli_query($koneksi, "SELECT * FROM user");
    $no=0;

    include 'sidebar.php';
    include 'tambahUser.php';   
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Data User</h1>                    
                                    <div class="my-4"></div>
                                    <a href="" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#TambahPasien">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                        <span class="text">Tambah User</span>
                                    </a>
                                    <div class="my-4"></div>

                    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" encytpe="multipart/form-data">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th style="width: 50px; text-align: center;">Username</th>
                                            <th style="width: 200px; text-align: center;">Nama Lengkap</th>
                                            <th style="width: 200px; text-align: center;">NIK</th>
                                            <th style="width: 100px; text-align: center;">E-mail</th>
                                            <th style="width: 20px; text-align: center;">Tanggal Lahir</th>
                                            <th style="width: 20px; text-align: center;">No. Telepon</th>
                                            <th style="width: 40px; text-align: center;">Role</th>
                                            <th style="width: 100px; text-align: center;">Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($data = mysqli_fetch_assoc($queryPasien)) { 
                                        $no++;?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['nama_lengkap']; ?></td>
                                            <td><?= $data['nik']; ?></td>
                                            <td><?= $data['email']; ?></td>
                                            <td><?= $data['ttl']; ?></td>
                                            <td><?= $data['tlp']; ?></td>
                                            <td><?= $data['role']; ?></td>
                                            <td>
                                                <a href="function.php?act=hapusPasien&id_user=<?= $data["id_user"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="btn btn-danger btn-icon-split" title="Hapus" style="margin:10px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    
                                                </a>
                                                <a href="ubahUser.php?id_user=<?php echo $data["id_user"]; ?>" class="btn btn-warning btn-icon-split" title="Edit" style="margin:10px">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-pen"></i>
                                                    </span>
                                                
                                                </a>
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
