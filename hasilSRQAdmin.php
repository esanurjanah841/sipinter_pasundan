<?php 
include 'function.php';
if (isset($_SESSION['role'])) 
    if ($_SESSION['role'] == "pasien") {
        header("location: menupasien.php");
    }


setlocale(LC_ALL, 'id-ID', 'id_ID');
$tanggal= strftime("%A, %d %B %Y");

include 'sidebar.php';

$nik = $_POST['nik'];
$nama_lengkap = $_POST['nama_lengkap'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
?>



<main id="main">
<section class="test mt-5">
<div class="container-fluid">
                <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Diagnosa</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Diagnosa</h6>
    </div>
<div class="card-body">
    <div class="row">
        <div class="col align-self-center">
                <h3 style="font-family: poppins; margin-top: 20px";>HASIL DIAGNOSA</h3>
                <a style="font-family: poppins; margin-top: 20px";>Berdasarkan gejala yang Anda pilih, berikut adalah hasil Skrining Anda:</a>
        </div>
    </div>            
</div>
</section>

<?php	
if(empty($_POST['gejala'])){
$pesangejala = "Tidak ada gejala yang dipilih.";
$hasil['penyakit'] = "Dalam Batas Normal";
$pesan = "
Tetap jaga kesehatan jiwa dengan:
1. Bila Anda merasa ada keluhan, bicarakan keluhan dengan seseorang yang dapat dipercaya <br>
2. Melakukan kegiatan yang sesuai dengan minat dan kemampuan
3. Tenangkan pikiran dengan relaksasi
4. Kembangkan hobi bermanfaat
5. Meningkatkan ibadah, mendekatkan diri pada Tuhan
6. Selalu berpikir positif";
                                        
include 'hasilSRQAdminnon.php';
                                            
}elseif(isset($_POST['submit'])){
$gejala = $_POST['gejala'];
$jumlah_dipilih = count($gejala);
    if($jumlah_dipilih<6){
        for($x=0;$x<$jumlah_dipilih;$x++)
            $hasil['penyakit'] = "Dalam Batas Normal";
            $pesan = "
            Tetap jaga kesehatan jiwa dengan:
            1. Bila Anda merasa ada keluhan, bicarakan keluhan dengan seseorang yang dapat dipercaya
            2. Melakukan kegiatan yang sesuai dengan minat dan kemampuan
            3. Tenangkan pikiran dengan relaksasi
            4. Kembangkan hobi bermanfaat
            5. Meningkatkan ibadah, mendekatkan diri pada Tuhan
            6. Selalu berpikir positif";
                                                
    }else if($jumlah_dipilih>=6){
        for($x=0;$x<$jumlah_dipilih;$x++){
            $tampil ="SELECT DISTINCT p.id_penyakit, p.kode_penyakit, p.penyakit, g.gejala from relasi b, penyakit p, gejala g where b.id_gejala='$gejala[$x]' and p.id_penyakit=b.id_penyakit group by id_penyakit";
            $result = mysqli_query($koneksi, $tampil);
            $hasil  = mysqli_fetch_array($result);  
        }
        $pesan = "Segera konsultasikan kesehatan Anda dengan tenaga kesehatan di Fasilitas Pelayanan Kesehatan terdekat.";
                                                
    }
?>

<section id="detail">
<div class="">
        <div class="solid">
            <div class="form-row">
                <div class="panel-heading">
                    <h3 style="font-family: poppins; margin-top: 20px; text-align:center;">LAPORAN HASIL DIAGNOSA SRQ-29</h3>
                    <a style="font-family: poppins; margin-top: 20px"></a>
                </div>
                <div class="panel-body">
                <div class="box-body table-responsive">
                    <form action="function.php?act=tambahLaporanAdmin" id="tambah" method="POST" class="tambah_pasien">
                                <div class="form-group ">
                                    <label for="tanggal_pengisian">Tanggal Pengisian</label>
                                    <input type="text" class="form-control form-control-user" id="tanggal_pengisian" name="tanggal_pengisian"   value="<?php echo $tanggal?>"  required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $nik ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="ttl">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" id="ttl" name="ttl" value="<?= $ttl ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $alamat ?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="tlp">No. Telepon</label>
                                    <input type="text" class="form-control form-control-user" id="tlp" name="tlp" value="<?= $tlp ?>" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="gejala"><i>Daftar Gejala yang dipilih:</i></label>
                                    <?php foreach($_POST['gejala'] as $item)
                                                {
                                                    $tampil ="SELECT DISTINCT p.id_gejala, p.kode_gejala, p.gejala from relasi b, gejala p where b.id_gejala=p.id_gejala and p.id_gejala='$item' group by id_gejala";
                                                    $result = mysqli_query($koneksi, $tampil);
                                                    $read  = mysqli_fetch_array($result);
                                               ?>
                                               <input class="form-control form-control-user" id="gejala" name="gejala[]" style="border: none; outline: none; margin-bottom:-5px;font-size: 16px;" value="<?php echo $read['gejala']?>" readonly>
                                    <?php }?>
                                </div>
                                <br>
                                <i class="text">Berdasarkan dari gejala-gejala yang telah dipilih pasien di atas,</i>
                                <br>
                                <div class="form-group ">
                                    <label for="penyakit">Hasil skrining kesehatan jiwa Anda menunjukan</label>
                                    <input type="text" class="form-control form-control-user" id="penyakit" name="penyakit" style="font-size: 16px;" value="<?php echo $hasil['penyakit']?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <input type="hidden" id="feedback" name="feedback" style="font-size: 16px;" value="<?php echo $pesan?>" readonly>
                                    <p><?php echo $pesan ?></p>
                                </div>
                                <br>
                        <div class="modal-footer">
                            <button type="button" onclick="history.back();" class="btn btn-danger">Kembali</button>
                            <button type="submit" name="submit" id="tambah" value="tambah" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-warning" onclick="window.print()" style="color:white;"><i class="fas fa-print" > Print</i></button>
                        </div>
                    </form>
                </div>
                <?php } ?>
</section>    
</main><!-- End #main -->

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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
    .test, .modal-footer, .navbar, .logo, .main, header, .nav-item {
      display: none;
    }
}

.solid {
    border: solid;
    padding : 25px;
    margin : 20px;
    }


.form-group{
    font-family : "poppins";
    font-size: 16px;
    margin-top : 10px;
    
}

.label-text{
    margin-top:15px;
    margin-bottom : 10px;

}

.text {
    margin-top:30px;
    margin-bottom : 10px;
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

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>



