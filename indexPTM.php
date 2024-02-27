<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menupasien.php");
        }
    } else {
        header("location:index.php");
    }
    
    

    include 'sidebar.php';
?>
    <div class="container-fluid">
                <!-- Begin Page Content -->
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Data PTM</h1>                    
                                    <div class="my-4"></div>
                                    <a href="formPTMAdmin.php" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                        <span class="text">Tambah PTM</span>
                                    </a>
                                    <div class="my-4"></div>
                                    <div class="tab">
                                        <button class="tablinks" onclick="openCity(event, 'PTM')" id="defaultOpen">Belum Diperiksa</button>
                                        <button class="tablinks" onclick="openCity(event, 'PeriksaPTM')">Sudah Diperiksa</button>
                                    </div>
                    

                    <!-- DataTales Example -->
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data PTM</h6>
            </div>
            <div id="PTM" class="tabcontent">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" encytpe="multipart/form-data">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                                    <thead style="text-align:center">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pengisian</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>No. Telepon</th>
                                            <th>Status</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $queryPasien = mysqli_query($koneksi, "SELECT * FROM ptm_pasien");
                                        $no=0;
                                        while ($data = mysqli_fetch_assoc($queryPasien)) {
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['tanggal_pengisian']; ?></td>
                                            <td><?= $data['nik']; ?></td>
                                            <td><?= $data['nama_lengkap']; ?></td>
                                            <td><?= $data['tlp']; ?></td>
                                            <td>
                                                <?php
                                                $status_post = $data['status_post'];
                                                if($status_post == "Menunggu Validasi"){
                                                    
                                                    echo "<a class=\"btn btn-danger btn-icon-split\" style=\"font-size:12px; padding:5px\">
                                                    <span>
                                                    $status_post
                                                    </span>
                                                    
                                                </a>";
                                                }elseif($status_post == "Sudah Validasi"){
                                                    echo "<a class=\"btn btn-success btn-icon-split\" style=\"font-size:12px; padding:5px\">
                                                    <span>
                                                    $status_post
                                                    </span>
                                                    
                                                </a>";
                                                }
                                                ?>
                                            
                                            <td>
                                                <a style="margin-top: 10px; margin-left: 5px" href="function.php?act=hapusPTM&id_ptm=<?= $data["id_ptm"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="btn btn-danger btn-icon-split" title="Hapus">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                   
                                                </a>
                                                <a style="margin-top: 10px; margin-left: 5px" href="lihatDataPTM.php?id_ptm=<?php echo $data["id_ptm"]; ?>" class="btn btn-success btn-icon-split" title="Lihat">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    
                                                </a>
                                                <a style="margin-top: 10px; margin-left: 5px" href="indexPeriksaPTM.php?id_ptm=<?php echo $data["id_ptm"]; ?>" class="btn btn-warning btn-icon-split" title="Periksa">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-pen"></i>
                                                    </span>
                                                   
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </form>
                    </div>
                </div>
            </div>
            <div id="PeriksaPTM" class="tabcontent">
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
                                            <th>No. Telepon</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $queryPasien = mysqli_query($koneksi, "SELECT * FROM ptm_hasil");
                                        $no=0;
                                        while ($hasil = mysqli_fetch_assoc($queryPasien)) {
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $hasil['tanggal_pengisian']; ?></td>
                                            <td><?= $hasil['tanggal_pemeriksaan']; ?></td>
                                            <td><?= $hasil['nik']; ?></td>
                                            <td><?= $hasil['nama_lengkap']; ?></td>
                                            <td><?= $hasil['tlp']; ?></td>
                                            <td>
                                                <a style="margin-top: 10px; margin-left: 5px" href="function.php?act=hapusPemeriksaanPTM&id_ptm=<?= $hasil["id_ptm"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="btn btn-danger btn-icon-split" title="Hapus">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    
                                                </a>
                                                <a style="margin-top: 10px; margin-left: 5px" href="lihatPemeriksaanPTM.php?id_ptm=<?php echo $hasil["id_ptm"]; ?>" class="btn btn-success btn-icon-split" title="Lihat">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-eye"></i>
                                                    </span>
                                                    
                                                </a>
                                                <a style="margin-top: 10px; margin-left: 5px" href="ubahPemeriksaanPTM.php?id_ptm=<?php echo $hasil["id_ptm"]; ?>" class="btn btn-warning btn-icon-split" title="Edit">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-pen"></i>
                                                    </span>
                                                    
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
                <!-- /.container-fluid -->


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

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
  
}

document.getElementById("defaultOpen").click();
</script>

<style>
body {font-family: "nunito";}

/* Style the tab */
.tab {
  overflow: hidden;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: whitesmoke;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 10px 12px;
  transition: 0.3s;
  font-size: 14px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    color:white;
    background-color: #D80032;
}

/* Style the tab content */
.tabcontent {
  display: none;
  -webkit-animation: fadeEffect 1s;
  animation: fadeEffect 1s;
}

/* Fade in tabs */
@-webkit-keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
</style>
</body>

</html>