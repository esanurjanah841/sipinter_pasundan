<?php
include "function.php";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "pasien") {
        header("location: menupasien.php");
    }
} else {
    header("location:index.php");
}

setlocale(LC_ALL, 'id-ID', 'id_ID');
$tanggal= strftime("%A, %d %B %Y");

include 'sidebar.php';
        

?>
                <!-- Begin Page Content -->
<div class="container-fluid">
                <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Diagnosa</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pertanyaan</h6>
        </div>
<div class="card-body">
    <div class="row">
        <div class="col align-self-center">
            <form action="hasilSRQAdmin.php" method="POST" enctype="multipart/form-data" role="form">
                
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr style="text-align:center";>
                                <th>NO</th>
                                <th>Pertanyaan</th>
                                <th>Ceklis</th>
                            </tr>
                        </thead>
                        <?php 
                            $no = 0;
                            $tampil = "SELECT * From gejala";
                            $query= mysqli_query($koneksi,$tampil);
                            while ($hasil = mysqli_fetch_array($query)) {
                                $no ++;
                                echo"  <tr>  
                                <td>$no</td>
                                <td>Apakah Anda ".$hasil['gejala']." ?</td>  
                                <td><input type='checkbox' value='".$hasil['id_gejala']."' name='gejala[]' /> </td>
                            
                            </tr> ";      
                            }
                            ?>             
                    </table><br>
                    <button type="submit" name ="submit" onclick="return checkDiagnosa()" class="btn btn-primary">CEK HASIL</button><br><br>
                
                </div>    
            </form>
        </div>
    </div>
</div>
</div>



                                            </div>          <!-- Footer -->
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
function checkDiagnosa(){
    return confirm('Apakah sudah benar gejalanya?');
}

</script>
 
<style>
    @media print {
    .container, .modal-footer {
      display: none;
    }
}
</style> 
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