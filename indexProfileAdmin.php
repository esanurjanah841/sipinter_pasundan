<?php
    include 'function.php';
    if (isset($_SESSION['role'])) {
        if ($_SESSION['id_user'] == "admin") {
            header("location: indexAdmin.php");
        }
    } else {
        header("location:index.php");
    }
    
    $tampiluser = mysqli_query($koneksi, "SELECT * FROM user where id_user = '$_SESSION[id_user]'");
    $tampil = mysqli_fetch_array($tampiluser);

    include 'sidebar.php';
?>

<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Halaman Profile</h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"></a></div>
    </div>
    <div class="my-4"></div>
    <div>
  		
    	

          <div class="tab-content">
            <div class="tab-pane active" id="home">
                
                    <form action="function.php?act=ubahAdmin&id_user=<?= $tampil['id_user']; ?>" id="ubah" method="POST">
                                <div class="form-group ">
                                    <label for="nama">Username</label>
                                    <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?=$tampil['nama']?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_lengkap">Nama</label>
                                    <input type="text" class="form-control form-control-user" name="nama_lengkap" id="nama_lengkap" value="<?=$tampil['nama_lengkap']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control form-control-user" name="email" id="email" value="<?=$tampil['email']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="ttl">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" name="ttl" id="ttl" value="<?=$tampil['ttl']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="number" class="form-control form-control-user" name="tlp" id="tlp" value="<?=$tampil['tlp']?>" required>
                                </div>
                                <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" name="password" id="password"  minlength="8" maxlength="15" value="<?=$tampil['password']?>" required>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning"><a href="indexAdmin.php" class="btn btn-warning btn-icon-split">Batal</a></button>
                            <button type="submit" name="ubah_btn" id="ubah" value="Ubah" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
              
             </div><!--/tab-pane-->
               
        </div><!--/tab-content-->

</div><!--/row-->

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
    <div class="modal fade" id="logoutModal" tabdashboard="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Akan Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika kamu ingin mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>