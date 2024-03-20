<?php

$host = "localhost";
$user = "sipinter_sipinter";
$pass = "r=(Q5MSxdjO&";
$db = "sipinter_db_skrining";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal : " . mysqli_connect_error();
}

session_start();
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    if ($act == "register") {
        register();
    } else if ($act == "login") {
        login();
    } else if ($act == "tambahUser") {
        tambahUser();
    } else if ($act == "tambahProfile") {
        tambahProfile();
    } else if ($act == "tambahProfilePasien") {
        tambahProfilePasien();
    } else if ($act == "tambahPTM") {
        tambahPTM();
    } else if ($act == "tambahPTMHasil") {
        tambahPTMHasil();
    } else if ($act == "tambahGejala") {
        tambahGejala();
    } else if ($act == "tambahPenyakit") {
        tambahPenyakit();
    } else if ($act == "tambahRelasi") {
        tambahRelasi();
    } else if ($act == "tambahLaporan") {
        tambahLaporan();
    } else if ($act == "tambahLaporanAdmin") {
        tambahLaporanAdmin();
    } else if ($act == "tambahSkrining") {
        tambahSkrining();
    } else if ($act == "hapusGejala") {
        $id_gejala = $_GET["id_gejala"];
        hapusGejala($id_gejala);
    } else if ($act == "hapusPenyakit") {
        $id_penyakit = $_GET["id_penyakit"];
        hapusPenyakit($id_penyakit);
    } else if ($act == "hapusPasien") {
        $id_user = $_GET["id_user"];
        hapusPasien($id_user);
    } else if ($act == "hapusProfile") {
        $id_user = $_GET["id_user"];
        hapusProfile($id_user);
    } else if ($act == "hapusRelasi") {
        $id_relasi = $_GET["id_relasi"];
        hapusRelasi($id_relasi);
    } else if ($act == "hapusRiwayat") {
        $id_riwayat = $_GET["id_riwayat"];
        hapusRiwayat($id_riwayat);
    } else if ($act == "hapusPTM") {
        $id_ptm = $_GET["id_ptm"];
        hapusPTM($id_ptm);
    } else if ($act == "hapusPemeriksaanPTM") {
        $id_ptm = $_GET["id_ptm"];
        hapusPemeriksaanPTM($id_ptm);
    } else if ($act == "ubahGejala") {
        $id_gejala = $_GET["id_gejala"];
        ubahGejala($id_gejala);
    } else if ($act == "ubahPasien") {
        $id_user = $_GET["id_user"];
        ubahPasien($id_user);
    } else if ($act == "ubahAdmin") {
        $id_user = $_GET["id_user"];
        ubahAdmin($id_user);
    } else if ($act == "ubahProfilePasien") {
        $id_user = $_GET["id_user"];
        ubahProfilePasien($id_user);
    } else if ($act == "ubahGeneralPasien") {
        $id_user = $_GET["id_user"];
        ubahGeneralPasien($id_user);
    } else if ($act == "ubahProfile") {
        $id_user = $_GET["id_user"];
        ubahProfile($id_user);
    } else if ($act == "ubahPakar") {
        $id_user = $_GET["id_user"];
        ubahPakar($id_user);
    } else if ($act == "ubahPassword") {
        $email = $_GET["email"];
        ubahPassword($email);
    } else if ($act == "ubahPenyakit") {
        $id_penyakit = $_GET["id_penyakit"];
        ubahPenyakit($id_penyakit);
    } else if ($act == "ubahRelasi") {
        $id_relasi = $_GET["id_relasi"];
        ubahRelasi($id_relasi);
    } else if ($act == "ubahPemeriksaanPTM") {
        $id_ptm = $_GET["id_ptm"];
        ubahPemeriksaanPTM($id_ptm);
    } else if ($act == "ubahPTM") {
        $id_ptm = $_GET["id_ptm"];
        ubahPTM($id_ptm);
    } else if($act == "ulang"){
        ulang();
    }
}

function ulang(){
    session_unset();
    session_destroy();
    header("location: test.php");
}




function register()
{
    global $koneksi;
    $ttl = $_POST['ttl'];
    $tahun_lahir = new DateTime($ttl);
    $sekarang = new Datetime('today');
    $thn = $sekarang->diff($tahun_lahir)->y;
  
    $tahun_lahir_err=""; 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['ttl'])){
        $tahun_lahir_err="tahun lahir tidak boleh kosong";
        //memanggil atau validasi umurnya
        }elseif($thn<15){
            echo "<script>
            alert('Maaf Umur Anda dibawah 15 tahun, Anda tidak bisa daftar!');
            document.location.href = 'register.php';
              </script>";
            
        
        }else{
        $nama = htmlspecialchars($_POST['nama']);
        $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
        $nik = htmlspecialchars($_POST['nik']);
        $email = htmlspecialchars($_POST['email']);
        $ttl=$_POST['ttl'];
        $tlp = htmlspecialchars($_POST['tlp']);
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        $query_user = "INSERT INTO user VALUES ('','pasien','$nama','$nama_lengkap', '$nik','$email',  '$ttl', '$tlp','$password')";
        $exe = mysqli_query($koneksi, $query_user);

            if (!$exe) {
                echo "<script>
                alert('Pendaftaran akun Anda gagal! NIK Anda sudah terdaftar!');
                document.location.href = 'index.php';</script>";
            } else {
                // echo "<script type='text/javascript'> success(); </script>";
                echo "<script>
                alert('Berhasil Registrasi! Silahkan Login');
                document.location.href = 'index.php';
                    </script>";
            }
        }
    }
}



function login() {
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $input_pass = htmlspecialchars($_POST['password']);
    // var_dump($nama, $input_pass);
    $query = mysqli_query($koneksi, "SELECT * FROM user where nama = '$nama'");
    $data = mysqli_fetch_assoc($query);
    
    $password = $data['password'];
    $role = $data['role'];

    if($data) {
        
        if(password_verify($input_pass, $password)) {
            if($role =="pasien") {
                $_SESSION['role'] = "pasien";
                $_SESSION['id_user'] = $data['id_user'];
                echo "<script>
                alert('Berhasil Login! Silahkan isi Profile');
                document.location.href = 'menuPasien.php';
                </script>";
            } elseif($role =="administrator") {
                $_SESSION['role'] = "administrator";
                $_SESSION['id_user'] = $data['id_user'];
                echo "<script>
                document.location.href = 'indexAdmin.php';
                </script>";
            
            } elseif($role =="admin") {
                $_SESSION['role'] = "admin";
                $_SESSION['id_user'] = $data['id_user'];
                echo "<script>
                document.location.href = 'indexAdmin.php';
                </script>";
            }
        }
    }else {
            echo "<script>
                alert('Username atau password kosong/salah!');
                document.location.href = 'index.php';
                </script>";
    }
}


function tambahUser()
{
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $nik = htmlspecialchars($_POST['nik']);
    $email = htmlspecialchars($_POST['email']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $role = htmlspecialchars($_POST['role']);
    $queryUser = "INSERT INTO user VALUES ('','$role','$nama','$nama_lengkap', '$nik','$email','$ttl', '$tlp', '$password')";
    
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
            alert('User gagal ditambahkan! NIK sudah terdaftar!');
            document.location.href = 'indexUser.php'</script>";
    }
            echo "<script>
            alert('User berhasil ditambahkan');
            document.location.href = 'indexUser.php'</script>";
}

//Admin
function tambahProfile()
{
    global $koneksi;
    $nik = htmlspecialchars($_POST['nik']);
    $bpjs = htmlspecialchars($_POST['bpjs']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $kelurahan = htmlspecialchars($_POST['kelurahan']);
    $kecamatan = htmlspecialchars($_POST['kecamatan']);
    $kota = htmlspecialchars($_POST['kota']);    
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $status = htmlspecialchars($_POST['status']);
    $goldar = htmlspecialchars($_POST['goldar']);
    // $penyakit = $_POST['id_penyakit'];
    $queryPasien = "INSERT INTO profil_user VALUES ('','$nik','$bpjs', '$nama_lengkap', '$ttl', '$jenis_kelamin', '$alamat', '$kelurahan', '$kecamatan', '$kota', '$provinsi', '$tlp', '$pendidikan', '$pekerjaan', '$status', '$goldar')";
    $exe = mysqli_query($koneksi, $queryPasien);
    if (!$exe) {
        echo "<script>
            alert('Data Profile gagal ditambahkan!');
            document.location.href = 'indexProfile.php'</script>";
    }
            echo "<script>
            alert('Data Profile berhasil ditambahkan!');
            document.location.href = 'indexProfile.php'</script>";
}

//user
function tambahProfilePasien()
{
    global $koneksi;
    $id_user = htmlspecialchars($_POST['id_user']);
    $nik = htmlspecialchars($_POST['nik']);
    $bpjs = htmlspecialchars($_POST['bpjs']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $kota = htmlspecialchars($_POST['kota']);    
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $status = htmlspecialchars($_POST['status']);
    $goldar = htmlspecialchars($_POST['goldar']);
    // $penyakit = $_POST['id_penyakit'];
    $queryPasien = "INSERT INTO profil_user VALUES ('$id_user', '$nik', '$bpjs', '$nama_lengkap', '$ttl', '$jenis_kelamin', '$alamat', '$kota', '$provinsi', '$tlp', '$pendidikan', '$pekerjaan', '$status', '$goldar')";
    $exe = mysqli_query($koneksi, $queryPasien);
    if (!$exe) {
        echo "<script>
            alert('Data Profile gagal ditambahkan! 
            NIK Anda sudah terdaftar!');
            document.location.href = 'menuPasien.php'</script>";
    }
            echo "<script>
            alert('Data Profile berhasil ditambahkan!');
            document.location.href = 'menuPasien.php'</script>";
}

function tambahGejala()
{
    global $koneksi;
    $kode_gejala = htmlspecialchars($_POST['kode_gejala']);
    $gejala = htmlspecialchars($_POST['gejala']);
    $queryGejala = "INSERT INTO gejala VALUES ('','$kode_gejala', '$gejala')";
    
    $exe = mysqli_query($koneksi, $queryGejala);
    if (!$exe) {
        echo "<script>
            alert('Gejala gagal ditambahkan');
            document.location.href = 'indexgejala.php'</script>";
    }
            echo "<script>
            alert('Gejala berhasil ditambahkan');
            document.location.href = 'indexgejala.php'</script>";
}


function tambahPenyakit()
{
    global $koneksi;
    $kode_penyakit = htmlspecialchars($_POST['kode_penyakit']);
    $penyakit = htmlspecialchars($_POST['penyakit']);
    // $penyakit = $_POST['id_penyakit'];
    $queryPenyakit = "INSERT INTO penyakit VALUES ('','$kode_penyakit','$penyakit')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryPenyakit);
    if (!$exe) {
        echo "<script>
            alert('Penyakit gagal ditambahkan');
            document.location.href = 'indexPenyakit.php'</script>";
    }
            echo "<script>
            alert('Penyakit berhasil ditambahkan');
            document.location.href = 'indexPenyakit.php'</script>";
}

function tambahSolusi()
{
    global $koneksi;
    $solusi = htmlspecialchars($_POST['namaSolusi']);
    $id_penyakit = htmlspecialchars($_POST['id_penyakit']);
    // $penyakit = $_POST['id_penyakit'];
    $querySolusi = "INSERT INTO solusi VALUES ('', '$id_penyakit', '$solusi')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $querySolusi);
    if (!$exe) {
        die('Error pada database');
    }
            echo "<script>
            alert('Solusi berhasil ditambahkan');
            document.location.href = 'indexSolusi.php'</script>";
}

function tambahRelasi()
{
    global $koneksi;
    $id_gejala = htmlspecialchars($_POST['id_gejala']);
    $id_penyakit = htmlspecialchars($_POST['id_penyakit']);
    // $penyakit = $_POST['id_penyakit'];
    $queryPenyakit = "INSERT INTO relasi VALUES ('','$id_gejala','$id_penyakit')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryPenyakit);
    if (!$exe) {
        echo "<script>
        alert('Relasi gagal ditambahkan');
        document.location.href = 'indexRelasi.php'</script>";
    }
            echo "<script>
            alert('Relasi berhasil ditambahkan');
            document.location.href = 'indexRelasi.php'</script>";
}

function tambahLaporan()
{
    global $koneksi;
    
    $tanggal_pengisian = htmlspecialchars($_POST['tanggal_pengisian']);
    $tanggal_pemeriksaan = htmlspecialchars($_POST['tanggal_pemeriksaan']);
    $nik = htmlspecialchars($_POST['nik']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $penyakit = htmlspecialchars($_POST['penyakit']);
    $gejala = implode(", ", $_POST['gejala']);
    $feedback = htmlspecialchars($_POST['feedback']);
    // $penyakit = $_POST['id_penyakit'];
    $queryLaporan = "INSERT INTO riwayat VALUES ('','$tanggal_pengisian','$tanggal_pemeriksaan','$nik', '$nama_lengkap', '$ttl', '$alamat', '$tlp', '$penyakit', '$gejala', '$feedback')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryLaporan);
    if (!$exe) {
        echo "<script>
            alert('Hasil gagal ditambahkan');
            document.location.href = 'riwayat.php'</script>";
    }
            echo "<script>
            alert('Hasil berhasil ditambahkan');
            document.location.href = 'riwayat.php'</script>";
}

function tambahLaporanAdmin()
{
    global $koneksi;
   
    $tanggal_pengisian = htmlspecialchars($_POST['tanggal_pengisian']);
    $tanggal_pemeriksaan = htmlspecialchars($_POST['tanggal_pemeriksaan']);
    $nik = htmlspecialchars($_POST['nik']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $penyakit = htmlspecialchars($_POST['penyakit']);
    $gejala = implode(", ", $_POST['gejala']);
    $feedback = htmlspecialchars($_POST['feedback']);
    // $penyakit = $_POST['id_penyakit'];
    $queryLaporan = "INSERT INTO riwayat VALUES ('','$tanggal_pengisian', '$tanggal_pemeriksaan', '$nik', '$nama_lengkap', '$ttl', '$alamat', '$tlp', '$penyakit', '$gejala', '$feedback')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryLaporan);
    if (!$exe) {
        echo "<script>
            alert('Hasil gagal ditambahkan');
            document.location.href = 'indexLaporan.php'</script>";
    }
            echo "<script>
            alert('Hasil berhasil ditambahkan');
            document.location.href = 'indexLaporan.php'</script>";
}

// User Menambahkan data skrining
function tambahPTM()
{
    global $koneksi;
    $id_user = htmlspecialchars($_POST['id_user']);
    $tanggal_pengisian = htmlspecialchars($_POST['tanggal_pengisian']);
    $nik = htmlspecialchars($_POST['nik']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $kota = htmlspecialchars($_POST['kota']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $status = htmlspecialchars($_POST['status']);
    $goldar = htmlspecialchars($_POST['goldar']);
    $riwayatkeluarga1 = htmlspecialchars($_POST['riwayatkeluarga1']);
    $riwayatkeluarga2 = htmlspecialchars($_POST['riwayatkeluarga2']);
    $riwayatkeluarga3 = htmlspecialchars($_POST['riwayatkeluarga3']);
    $riwayatsendiri1 = htmlspecialchars($_POST['riwayatsendiri1']);
    $riwayatsendiri2 = htmlspecialchars($_POST['riwayatsendiri2']);
    $riwayatsendiri3 = htmlspecialchars($_POST['riwayatsendiri3']);
    $merokok = htmlspecialchars($_POST['merokok']);
    $fisik = htmlspecialchars($_POST['fisik']);
    $gula = htmlspecialchars($_POST['gula']);
    $garam = htmlspecialchars($_POST['garam']);
    $lemak = htmlspecialchars($_POST['lemak']);
    $sayur = htmlspecialchars($_POST['sayur']);
    $alkohol = htmlspecialchars($_POST['alkohol']);
    $berat = htmlspecialchars($_POST['berat']);
    $tinggi = htmlspecialchars($_POST['tinggi']);
    $status_post = htmlspecialchars($_POST['status_post']);
    
    // $penyakit = $_POST['id_penyakit'];
    $queryPTM = "INSERT INTO ptm_pasien VALUES ('', '$id_user','$tanggal_pengisian','$nik','$nama_lengkap', '$ttl', '$jenis_kelamin', '$alamat', '$provinsi', '$kota', '$tlp', '$pendidikan', '$pekerjaan', '$status', '$goldar', '$riwayatkeluarga1', '$riwayatkeluarga2', '$riwayatkeluarga3', '$riwayatsendiri1', '$riwayatsendiri2', '$riwayatsendiri3','$merokok', '$fisik', '$gula', '$garam', '$lemak', '$sayur', '$alkohol', '$berat', '$tinggi', '$status_post')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryPTM);
    if (!$exe) {
        echo "<script>
            alert('Data gagal dikirimkan! Cek kembali, harap melengkapi semua data!');
            document.location.href = 'formPTMPasien.php'</script>";
    }
            echo "<script>
            alert('Data berhasil dikirimkan! Terima kasih sudah melakukan skrining kesehatan secara mandiri, silahkan kunjungi Puskesmas atau Fasilitas Pelayanan Kesehatan terdekat untuk mendapatkan pemeriksaan dan konsultasi kesehatan lebih lanjut');
            document.location.href = 'riwayat.php'</script>";
}

function tambahPTMHasil()
{
    global $koneksi;
    $tanggal_pengisian = htmlspecialchars($_POST['tanggal_pengisian']);
    $tanggal_pemeriksaan = htmlspecialchars($_POST['tanggal_pemeriksaan']);
    $nik = htmlspecialchars($_POST['nik']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $kota = htmlspecialchars($_POST['kota']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $status = htmlspecialchars($_POST['status']);
    $goldar = htmlspecialchars($_POST['goldar']);
    $riwayatkeluarga1 = htmlspecialchars($_POST['riwayatkeluarga1']);
    $riwayatkeluarga2 = htmlspecialchars($_POST['riwayatkeluarga2']);
    $riwayatkeluarga3 = htmlspecialchars($_POST['riwayatkeluarga3']);
    $riwayatsendiri1 = htmlspecialchars($_POST['riwayatsendiri1']);
    $riwayatsendiri2 = htmlspecialchars($_POST['riwayatsendiri2']);
    $riwayatsendiri3 = htmlspecialchars($_POST['riwayatsendiri3']);
    $merokok = htmlspecialchars($_POST['merokok']);
    $fisik = htmlspecialchars($_POST['fisik']);
    $gula = htmlspecialchars($_POST['gula']);
    $garam = htmlspecialchars($_POST['garam']);
    $lemak = htmlspecialchars($_POST['lemak']);
    $sayur = htmlspecialchars($_POST['sayur']);
    $alkohol = htmlspecialchars($_POST['alkohol']);
    $berat = htmlspecialchars($_POST['berat']);
    $tinggi = htmlspecialchars($_POST['tinggi']);
    $lingkar = htmlspecialchars($_POST['lingkar']);
    $sistol = htmlspecialchars($_POST['sistol']);
    $diastol = htmlspecialchars($_POST['diastol']);
    $periksa_gula = htmlspecialchars($_POST['periksa_gula']);
    $feedback = htmlspecialchars($_POST['feedback']);
    $imt = htmlspecialchars($_POST['imt']);
    $hasil_imt = htmlspecialchars($_POST['hasil_imt']);
    $hasil_tensi = htmlspecialchars($_POST['hasil_tensi']);
    $hasil_lingkar = htmlspecialchars($_POST['hasil_lingkar']);
    $hasilperiksa_gula = htmlspecialchars($_POST['hasilperiksa_gula']);
    $h_imt = htmlspecialchars($_POST['h_imt']);
    $h_hipertensi = htmlspecialchars($_POST['h_hipertensi']);
    $h_obc = htmlspecialchars($_POST['h_obc']);
    $h_gm = htmlspecialchars($_POST['h_gm']);
    $h_normal = htmlspecialchars($_POST['h_normal']);
    
    // $penyakit = $_POST['id_penyakit'];
    $queryPTM = "INSERT INTO ptm_hasil VALUES ('', '$tanggal_pengisian','$tanggal_pemeriksaan','$nik','$nama_lengkap', '$ttl', '$jenis_kelamin', '$alamat', '$provinsi', '$kota', '$tlp', '$pendidikan', '$pekerjaan', '$status', '$goldar', '$riwayatkeluarga1', '$riwayatkeluarga2', '$riwayatkeluarga3', '$riwayatsendiri1', '$riwayatsendiri2', '$riwayatsendiri3', '$merokok', '$fisik', '$gula', '$garam', '$lemak', '$sayur', '$alkohol', '$berat', '$tinggi', '$lingkar', '$sistol', '$diastol', '$periksa_gula', '$feedback', '$imt', '$hasil_imt', '$hasil_tensi', '$hasil_lingkar', '$hasilperiksa_gula', '$h_imt', '$h_hipertensi', '$h_obc', '$h_gm', '$h_normal')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryPTM);
    if (!$exe) {
        echo "<script>
            alert('Hasil Pemeriksaan gagal ditambahkan! Periksa kembali, diharapkan melengkapi semua data.');
            document.location.href = 'indexPTM.php'</script>";
    }
            echo "<script>
            alert('Hasil Pemeriksaan berhasil ditambahkan dan dikirimkan ke pasien!');
            document.location.href = 'indexPTM.php'</script>";
}

function ubahGejala($id_gejala)
{
    global $koneksi;
    $kode_gejala = htmlspecialchars($_POST['kode_gejala']);
    $gejala = htmlspecialchars($_POST['gejala']);
    $queryGejala = "UPDATE gejala SET gejala = '$gejala' WHERE id_gejala = '$id_gejala'";
    $exe = mysqli_query($koneksi, $queryGejala);
    if (!$exe) {
        echo "<script>
        alert('Data Gejala gagal diubah');
        document.location.href = 'indexGejala.php'</script>";
    }  
        echo "<script>
        alert('Data Gejala berhasil diubah');
        document.location.href = 'indexGejala.php'</script>";
}

function ubahSolusi($id_solusi)
{
    global $koneksi;
    $solusi = htmlspecialchars($_POST['namaSolusi']);
    $id_penyakit = htmlspecialchars($_POST['id_penyakit']);
    // $penyakit = $_POST['id_penyakit'];
    $querySolusi = "UPDATE solusi SET solusi = '$solusi', id_penyakit = '$id_penyakit' WHERE id_solusi = '$id_solusi'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $querySolusi);
    if (!$exe) {
        die('Error pada database');
    }
            echo "<script>
            alert('Data Solusi berhasil diubah!');
            document.location.href = 'indexSolusi.php'</script>";
}

function ubahPenyakit($id_penyakit)
{
    global $koneksi;
    $kode_penyakit = htmlspecialchars($_POST['kode_penyakit']);
    $penyakit = htmlspecialchars($_POST['penyakit']);
    // $penyakit = $_POST['id_penyakit'];
    $queryPenyakit = "UPDATE penyakit SET penyakit = '$penyakit' WHERE id_penyakit = '$id_penyakit'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryPenyakit);
    if (!$exe) {
        echo "<script>
        alert('Data Penyakit gagal diubah!');
        document.location.href = 'indexPenyakit.php'</script>";
    }
            echo "<script>
            alert('Data Penyakit berhasil diubah!');
            document.location.href = 'indexPenyakit.php'</script>";
}

function ubahRelasi($id_relasi)
{
    global $koneksi;
    $id_gejala = htmlspecialchars($_POST['id_gejala']);
    $id_penyakit = htmlspecialchars($_POST['id_penyakit']);
    // $penyakit = $_POST['id_penyakit'];
    $queryRelasi = "UPDATE relasi SET id_gejala = '$id_gejala', id_penyakit = '$id_penyakit' WHERE id_relasi = '$id_relasi'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryRelasi);
    if (!$exe) {
        echo "<script>
            alert('Data Relasi gagal diubah!');
            document.location.href = 'indexRelasi.php'</script>";
    }
            echo "<script>
            alert('Data Relasi berhasil diubah!');
            document.location.href = 'indexRelasi.php'</script>";
}

//Admin
function ubahPasien($id_user)
{
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $email = htmlspecialchars($_POST['email']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $role = htmlspecialchars($_POST['role']);
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE user SET nama = '$nama', nama_lengkap = '$nama_lengkap', email = '$email', ttl = '$ttl', tlp = '$tlp', password = '$password', role = '$role' WHERE id_user = '$id_user'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
            alert('Data Pasien gagal diubah!');
            document.location.href = 'indexUser.php'</script>";
    }
            echo "<script>
            alert('Data Pasien berhasil diubah!');
            document.location.href = 'indexUser.php'</script>";
}

//User
function ubahGeneralPasien($id_user)
{
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $email = htmlspecialchars($_POST['email']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $role = htmlspecialchars($_POST['role']);
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE user SET nama = '$nama', nama_lengkap = '$nama_lengkap', email = '$email', ttl = '$ttl', tlp = '$tlp', password = '$password', role = '$role' WHERE id_user = '$id_user'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
        alert('Data Pasien gagal diubah!');
        document.location.href = 'indexUser.php'</script>";
    }
            echo "<script>
            alert('Data Pasien berhasil diubah!');
            document.location.href = 'indexUser.php'</script>";
}

function ubahAdmin($id_user)
{
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $email = htmlspecialchars($_POST['email']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE user SET nama = '$nama', nama_lengkap = '$nama_lengkap', email = '$email', ttl = '$ttl', tlp = '$tlp', password = '$password' WHERE id_user = '$id_user'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
        alert('Data Admin gagal diubah!');
        document.location.href = 'indexProfileAdmin.php'</script>";
    }
            echo "<script>
            alert('Data Admin berhasil diubah!');
            document.location.href = 'indexProfileAdmin.php'</script>";
}


// Admin
function ubahProfile($id_user)
{
    global $koneksi;
    $nik = htmlspecialchars($_POST['nik']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $kota = htmlspecialchars($_POST['kota']);    
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $status = htmlspecialchars($_POST['status']);
    $goldar = htmlspecialchars($_POST['goldar']);
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE profil_user SET nik = '$nik', nama_lengkap = '$nama_lengkap', ttl = '$ttl', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', kota = '$kota', provinsi = '$provinsi', tlp = '$tlp', pendidikan = '$pendidikan', pekerjaan = '$pekerjaan', status = '$status', goldar = '$goldar'
     WHERE id_user = '$id_user'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
        alert('Data Profile gagal diubah!');
        document.location.href = 'indexProfile.php'</script>";
    }
            echo "<script>
            alert('Data Profile berhasil diubah!');
            document.location.href = 'indexProfile.php'</script>";
}

//User
function ubahProfilePasien($id_user)
{
    global $koneksi;
    $nik = htmlspecialchars($_POST['nik']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $kota = htmlspecialchars($_POST['kota']);    
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $status = htmlspecialchars($_POST['status']);
    $goldar = htmlspecialchars($_POST['goldar']);
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE profil_user SET nik = '$nik', nama_lengkap = '$nama_lengkap', ttl = '$ttl', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', kota = '$kota', provinsi = '$provinsi', tlp = '$tlp', pendidikan = '$pendidikan', pekerjaan = '$pekerjaan', status = '$status', goldar = '$goldar'
     WHERE id_user = '$id_user'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
        alert('Data Profile gagal diubah!');
        document.location.href = 'user_profile.php'</script>";
    }
            echo "<script>
            alert('Data Profile berhasil diubah!');
            document.location.href = 'user_profile.php'</script>";
}

function ubahPakar($id_user)
{
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE user SET nama = '$nama', username = '$username', email = '$email', password = '$password', role = '$role' WHERE id_user = '$id_user'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
        alert('Data Profile gagal diubah!');
        document.location.href = 'indexPakar.php'</script>";
    }
            echo "<script>
            alert('Data Pakar berhasil diubah!');
            document.location.href = 'indexPakar.php'</script>";
}

function ubahPTM($id_ptm)
{
    global $koneksi;
    $tanggal_pengisian = htmlspecialchars($_POST['tanggal_pengisian']);
    $nik = htmlspecialchars($_POST['nik']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $kota = htmlspecialchars($_POST['kota']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $status = htmlspecialchars($_POST['status']);
    $goldar = htmlspecialchars($_POST['goldar']);
    $riwayatkeluarga1 = htmlspecialchars($_POST['riwayatkeluarga1']);
    $riwayatkeluarga2 = htmlspecialchars($_POST['riwayatkeluarga2']);
    $riwayatkeluarga3 = htmlspecialchars($_POST['riwayatkeluarga3']);
    $riwayatsendiri1 = htmlspecialchars($_POST['riwayatsendiri1']);
    $riwayatsendiri2 = htmlspecialchars($_POST['riwayatsendiri2']);
    $riwayatsendiri3 = htmlspecialchars($_POST['riwayatsendiri3']);
    $merokok = htmlspecialchars($_POST['merokok']);
    $fisik = htmlspecialchars($_POST['fisik']);
    $gula = htmlspecialchars($_POST['gula']);
    $garam = htmlspecialchars($_POST['garam']);
    $lemak = htmlspecialchars($_POST['lemak']);
    $sayur = htmlspecialchars($_POST['sayur']);
    $alkohol = htmlspecialchars($_POST['alkohol']);
    $berat = htmlspecialchars($_POST['berat']);
    $tinggi = htmlspecialchars($_POST['tinggi']);
    $status_post = htmlspecialchars($_POST['status_post']);
    
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE ptm_pasien SET tanggal_pengisian = '$tanggal_pengisian', nik = '$nik', nama_lengkap = '$nama_lengkap', ttl = '$ttl', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', provinsi = '$provinsi', kota = '$kota', tlp = '$tlp', pendidikan = '$pendidikan', pekerjaan = '$pekerjaan', status = '$status', goldar = '$goldar', riwayatkeluarga1 = '$riwayatkeluarga1', riwayatkeluarga2 = '$riwayatkeluarga2', riwayatkeluarga3 = '$riwayatkeluarga3', riwayatsendiri1 = '$riwayatsendiri1', riwayatsendiri2 = '$riwayatsendiri2', riwayatsendiri3 = '$riwayatsendiri3', merokok = '$merokok', fisik = '$fisik', gula = '$gula', garam = '$garam', lemak = '$lemak', sayur = '$sayur', alkohol = '$alkohol', berat = '$berat', tinggi = '$tinggi', status_post = '$status_post'
     WHERE id_ptm = '$id_ptm'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
        alert('Data Validasi gagal diubah!');
        document.location.href = 'indexPeriksaPTM.php?id_ptm=$id_ptm'</script>";
    }
            echo "<script>
            alert('Data Validasi berhasil diubah!');
            document.location.href = 'indexPeriksaPTM.php?id_ptm=$id_ptm'</script>";
}

// Admin
function ubahPemeriksaanPTM($id_ptm)
{
    global $koneksi;
    $tanggal_pengisian = htmlspecialchars($_POST['tanggal_pengisian']);
    $tanggal_pemeriksaan = htmlspecialchars($_POST['tanggal_pemeriksaan']);
    $nik = htmlspecialchars($_POST['nik']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $kota = htmlspecialchars($_POST['kota']);
    $tlp = htmlspecialchars($_POST['tlp']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $status = htmlspecialchars($_POST['status']);
    $goldar = htmlspecialchars($_POST['goldar']);
    $riwayatkeluarga1 = htmlspecialchars($_POST['riwayatkeluarga1']);
    $riwayatkeluarga2 = htmlspecialchars($_POST['riwayatkeluarga2']);
    $riwayatkeluarga3 = htmlspecialchars($_POST['riwayatkeluarga3']);
    $riwayatsendiri1 = htmlspecialchars($_POST['riwayatsendiri1']);
    $riwayatsendiri2 = htmlspecialchars($_POST['riwayatsendiri2']);
    $riwayatsendiri3 = htmlspecialchars($_POST['riwayatsendiri3']);
    $merokok = htmlspecialchars($_POST['merokok']);
    $fisik = htmlspecialchars($_POST['fisik']);
    $gula = htmlspecialchars($_POST['gula']);
    $garam = htmlspecialchars($_POST['garam']);
    $lemak = htmlspecialchars($_POST['lemak']);
    $sayur = htmlspecialchars($_POST['sayur']);
    $alkohol = htmlspecialchars($_POST['alkohol']);
    $berat = htmlspecialchars($_POST['berat']);
    $tinggi = htmlspecialchars($_POST['tinggi']);
    $lingkar = htmlspecialchars($_POST['lingkar']);
    $sistol = htmlspecialchars($_POST['sistol']);
    $diastol = htmlspecialchars($_POST['diastol']);
    $periksa_gula = htmlspecialchars($_POST['periksa_gula']);
    $feedback = htmlspecialchars($_POST['feedback']);
    $imt = htmlspecialchars($_POST['imt']);
    $hasil_imt = htmlspecialchars($_POST['hasil_imt']);
    $hasil_tensi = htmlspecialchars($_POST['hasil_tensi']);
    $hasil_lingkar = htmlspecialchars($_POST['hasil_lingkar']);
    $hasilperiksa_gula = htmlspecialchars($_POST['hasilperiksa_gula']);
    $h_imt = htmlspecialchars($_POST['h_imt']);
    $h_hipertensi = htmlspecialchars($_POST['h_hipertensi']);
    $h_obc = htmlspecialchars($_POST['h_obc']);
    $h_gm = htmlspecialchars($_POST['h_gm']);
    $h_normal = htmlspecialchars($_POST['h_normal']);
    
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE ptm_hasil SET tanggal_pengisian = '$tanggal_pengisian', tanggal_pemeriksaan = '$tanggal_pemeriksaan', nik = '$nik', nama_lengkap = '$nama_lengkap', ttl = '$ttl', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', provinsi = '$provinsi', kota = '$kota', tlp = '$tlp', pendidikan = '$pendidikan', pekerjaan = '$pekerjaan', status = '$status', goldar = '$goldar', riwayatkeluarga1 = '$riwayatkeluarga1', riwayatkeluarga2 = '$riwayatkeluarga2', riwayatkeluarga3 = '$riwayatkeluarga3', riwayatsendiri1 = '$riwayatsendiri1', riwayatsendiri2 = '$riwayatsendiri2', riwayatsendiri3 = '$riwayatsendiri3', merokok = '$merokok', fisik = '$fisik', gula = '$gula', garam = '$garam', lemak = '$lemak', sayur = '$sayur', alkohol = '$alkohol', berat = '$berat', tinggi = '$tinggi', lingkar = '$lingkar', sistol = '$sistol', diastol = '$diastol', periksa_gula = '$periksa_gula',  feedback = '$feedback', imt = '$imt', hasil_imt = '$hasil_imt', hasil_tensi = '$hasil_tensi', hasil_lingkar = '$hasil_lingkar', hasilperiksa_gula = '$hasilperiksa_gula', h_imt = '$h_imt', h_hipertensi = '$h_hipertensi', h_obc = '$h_obc', h_gm = '$h_gm', h_normal = '$h_normal'
     WHERE id_ptm = '$id_ptm'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')" 
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
        alert('Data Pemeriksaan PTM gagal diubah!');
        document.location.href = 'indexPTM.php'</script>";
    }
            echo "<script>
            alert('Data Pemeriksaan PTM berhasil diubah!');
            document.location.href = 'indexPTM.php'</script>";
}

function hapusGejala($id_gejala)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM gejala WHERE id_gejala = $id_gejala");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Gejala berhasil dihapus!');
                document.location.href = 'indexGejala.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                alert('Gejala gagal dihapus, karena masih terikat dengan penyakit!');
                document.location.href = 'indexGejala.php';
            </script>	
        ";
    }
}

function hapusPasien($id_user)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_user");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Akun Pasien berhasil dihapus!');
                document.location.href = 'indexUser.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Akun Pasien gagal dihapus!');
                    document.location.href = 'indexUser.php';
            </script>	
        ";
    }
}

function hapusProfile($id_user)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM profil_user WHERE id_user = $id_user");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Profile Pasien berhasil dihapus!');
                document.location.href = 'indexProfile.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Profile Pasien gagal dihapus!');
                    document.location.href = 'indexProfile.php';
            </script>	
        ";
    }
}

function hapusPakar($id_user)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_user");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Akun Pakar berhasil dihapus!');
                document.location.href = 'indexPakar.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Akun Pakar gagal dihapus!');
                    document.location.href = 'indexPakar.php';
            </script>	
        ";
    }
}

function hapusPenyakit($id_penyakit)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM penyakit WHERE id_penyakit = $id_penyakit");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Penyakit berhasil dihapus!');
                document.location.href = 'indexPenyakit.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Penyakit gagal dihapus!');
                    document.location.href = 'indexPenyakit.php';
            </script>	
        ";
    }
}

function hapusRelasi($id_relasi)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM relasi WHERE id_relasi = $id_relasi");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Relasi berhasil dihapus!');
                document.location.href = 'indexRelasi.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Relasi gagal dihapus!');
                    document.location.href = 'indexRelasi.php';
            </script>	
        ";
    }
}

function hapusRiwayat($id_riwayat)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM riwayat WHERE id_riwayat = $id_riwayat");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Riwayat berhasil dihapus!');
                document.location.href = 'riwayat.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Riwayat gagal dihapus!');
                    document.location.href = 'riwayat.php';
            </script>	
        ";
    }
}

function hapusPTM($id_ptm)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM ptm_pasien WHERE id_ptm = $id_ptm");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Data PTM berhasil dihapus!');
                document.location.href = 'riwayat.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Data PTM gagal dihapus!');
                    document.location.href = 'riwayat.php';
            </script>	
        ";
    }
}

function hapusPemeriksaanPTM($id_ptm)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM ptm_hasil WHERE id_ptm = $id_ptm");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Data Pemeriksaan PTM berhasil dihapus!');
                document.location.href = 'indexPTM.php';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Data Pemeriksaan PTM gagal dihapus!');
                    document.location.href = 'indexPTM.php';
            </script>	
        ";
    }
}

function ubahPassword($email)
{
    global $koneksi;
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE user SET password = '$password' WHERE email = '$email'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        echo "<script>
            alert('Password gagal diubah!');
            document.location.href = 'index.php'</script>";
    }
            echo "<script>
            alert('Password berhasil diubah, silahkan login kembali!');
            document.location.href = 'index.php'</script>";
}

?>