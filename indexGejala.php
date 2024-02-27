<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }

    $queryGejala = mysqli_query($koneksi, "SELECT * FROM gejala");
    $no=0;

    $query = mysqli_query($koneksi, "SELECT max(kode_gejala) as kodeTerbesar FROM gejala");
    $gejala = mysqli_fetch_array($query);
    $kodegejala = $gejala['kodeTerbesar'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kodegejala, 2, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "G";
	$kodegejala = $huruf . sprintf("%03s", $urutan);

    include 'sidebar.php';
    include 'tambahGejala.php';
   
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Gejala</h1>                    
                                    <div class="my-4"></div>
                                    <a href="" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#TambahGejala">
                                        <span class="text">Tambah Data Gejala</span>
                                    </a>
                                    <div class="my-4"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Gejala</h6>
                        </div>
                        <div class="card-body">
                        <form method="post" encytpe="multipart/form-data">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px; text-align: center;">Id</th>
                                            <th style="width: 40px; text-align: center;">Kode Gejala</th>
                                            <th style="width: 400px; text-align: center;">Nama Gejala</th>
                                            <th style="width: 70px; text-align: center;">Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php while ($data = mysqli_fetch_assoc($queryGejala)) {
                                            $no ++; ?>
                                        <tr>
                                            <td><?= $no?></td>
                                            <td><?= $data['kode_gejala']; ?></td>
                                            <td><?= $data['gejala']; ?></td>
                                            <td>
                                                <a href="function.php?act=hapusGejala&id_gejala=<?= $data['id_gejala']; ?>" onclick="return confirm('Yakin ingin menghapus data?');"class="btn btn-danger btn-icon-split">
                                                    <span class="text">Hapus</span>
                                                </a>
                                                <a href="ubahGejala.php?id_gejala=<?php echo $data["id_gejala"]; ?>" class="btn btn-warning btn-icon-split">
                                                    <span class="text">Edit</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>
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