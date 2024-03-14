<?php 
    include "function.php";
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "pasien") {
            header("location: menuPasien.php");
        }
    } else {
        header("location:index.php");
    }
    
    $filename = 'LaporanSkriningKesehatan'.date("Ymd").'.xls';
    header("Content-type: application/vnd-ms-excel");
    header("Content-disposition: attachment; filename=$filename");


    if (isset($_POST['filter'])) {
        $tgl_a = mysqli_real_escape_string($koneksi, $_POST['tgl_a']);
        $tgl_b = mysqli_real_escape_string($koneksi, $_POST['tgl_b']);
        $data = mysqli_query($koneksi, "SELECT * FROM ptm_hasil WHERE tanggal_pemeriksaan BETWEEN '$tgl_a' AND '$tgl_b'");
     } else{
        $data = mysqli_query($koneksi, "SELECT * FROM ptm_hasil");
     }
    
    while($lihat = mysqli_fetch_assoc($data)){

    
    // Ambil Tahun Laki-laki
    $ambil_ttl = mysqli_query($koneksi, "SELECT * FROM ptm_hasil where jenis_kelamin = 'Laki-laki'");
    while ($ttl_lahir = mysqli_fetch_assoc($ambil_ttl)){
    $ttl = $ttl_lahir['ttl'];

    $tahun_lahir = new DateTime($ttl);
    $sekarang = new Datetime('today');
    $thn = $sekarang->diff($tahun_lahir)->y;

    }

    // Ambil Tahun Perempuan
    $ambil_tahun = mysqli_query($koneksi, "SELECT * FROM ptm_hasil where jenis_kelamin = 'Perempuan'");
    while ($tahunlahir = mysqli_fetch_assoc($ambil_tahun)){
    $tahun = $tahunlahir['ttl'];

    $tahun = new DateTime($tahun);
    $sekarang = new Datetime('today');
    $thnlahir = $sekarang->diff($tahun)->y;
    }
    
    $no=0;
        
        // Jumlah Skrining 
        $jumlahPasienL = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and $thn <= 59");
        $Laki = mysqli_fetch_assoc($jumlahPasienL);
        $jumlahPasienP = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and $thnlahir <= 59 ");
        $Perempuan = mysqli_fetch_assoc($jumlahPasienP);

        $jumlahPasien60L = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and $thn >= 60");
        $Laki60 = mysqli_fetch_assoc($jumlahPasien60L);
        $jumlahPasien60P = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and $thnlahir >= 60 ");
        $Perempuan60 = mysqli_fetch_assoc($jumlahPasien60P);

        // Merokok
        $JumlahLakiMerokok = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and merokok = 'Ya' and $thn <= 59");
        $PasienLakiMerokok = mysqli_fetch_assoc($JumlahLakiMerokok);
        $JumlahPerempuanMerokok = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and merokok = 'Ya' and $thnlahir <= 59 ");
        $PasienPerempuanMerokok = mysqli_fetch_assoc($JumlahPerempuanMerokok);

        $JumlahLakiMerokok60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and merokok = 'Ya' and $thn >= 60");
        $PasienLakiMerokok60 = mysqli_fetch_assoc($JumlahLakiMerokok60);
        $JumlahPerempuanMerokok60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and merokok = 'Ya' and $thnlahir >= 60 ");
        $PasienPerempuanMerokok60 = mysqli_fetch_assoc($JumlahPerempuanMerokok60);

        // Aktivitas Fisik
        $JumlahLakiFisik = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and fisik = 'Ya' and $thn <= 59");
        $PasienLakiFisik = mysqli_fetch_assoc($JumlahLakiFisik);
        $JumlahPerempuanFisik = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and fisik = 'Ya' and $thnlahir <= 59 ");
        $PasienPerempuanFisik = mysqli_fetch_assoc($JumlahPerempuanFisik);

        $JumlahLakiFisik60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and fisik = 'Ya' and $thn >= 60");
        $PasienLakiFisik60 = mysqli_fetch_assoc($JumlahLakiFisik60);
        $JumlahPerempuanFisik60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and fisik = 'Ya' and $thnlahir >= 60");
        $PasienPerempuanFisik60 = mysqli_fetch_assoc($JumlahPerempuanFisik60);
    
        // Gula Berlebih
        $JumlahLakiGula = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and gula = 'Ya' and $thn <= 59");
        $PasienLakiGula = mysqli_fetch_assoc($JumlahLakiGula);
        $JumlahPerempuanGula = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and gula = 'Ya' and $thnlahir <= 59");
        $PasienPerempuanGula = mysqli_fetch_assoc($JumlahPerempuanGula);

        $JumlahLakiGula60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and gula = 'Ya' and $thn >= 60");
        $PasienLakiGula60 = mysqli_fetch_assoc($JumlahLakiGula60);
        $JumlahPerempuanGula60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and gula = 'Ya' and $thnlahir >= 60 ");
        $PasienPerempuanGula60 = mysqli_fetch_assoc($JumlahPerempuanGula60);
        
        // Garam Berlebih
        $JumlahLakiGaram = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and garam = 'Ya' and $thn <= 59");
        $PasienLakiGaram = mysqli_fetch_assoc($JumlahLakiGaram);
        $JumlahPerempuanGaram = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and garam = 'Ya' and $thnlahir <= 59");
        $PasienPerempuanGaram = mysqli_fetch_assoc($JumlahPerempuanGaram);

        $JumlahLakiGaram60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and garam = 'Ya' and $thn >= 60");
        $PasienLakiGaram60 = mysqli_fetch_assoc($JumlahLakiGaram60);
        $JumlahPerempuanGaram60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and garam = 'Ya' and $thnlahir >= 60");
        $PasienPerempuanGaram60 = mysqli_fetch_assoc($JumlahPerempuanGaram60);

        // Lemak Berlebih
        $JumlahLakiLemak = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and lemak = 'Ya' and $thn <= 59");
        $PasienLakiLemak = mysqli_fetch_assoc($JumlahLakiLemak);
        $JumlahPerempuanLemak = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and lemak = 'Ya' and $thnlahir <= 59");
        $PasienPerempuanLemak = mysqli_fetch_assoc($JumlahPerempuanLemak);

        $JumlahLakiLemak60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and lemak = 'Ya' and $thn >= 60");
        $PasienLakiLemak60 = mysqli_fetch_assoc($JumlahLakiLemak60);
        $JumlahPerempuanLemak60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and lemak = 'Ya' and $thnlahir >= 60");
        $PasienPerempuanLemak60 = mysqli_fetch_assoc($JumlahPerempuanLemak60);

        // Kurang Sayur & Buah
        $JumlahLakiSayur = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and sayur = 'Ya' and $thn <= 59");
        $PasienLakiSayur = mysqli_fetch_assoc($JumlahLakiSayur);
        $JumlahPerempuanSayur = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and sayur = 'Ya' and $thnlahir <= 59");
        $PasienPerempuanSayur = mysqli_fetch_assoc($JumlahPerempuanSayur);

        $JumlahLakiSayur60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and sayur = 'Ya' and $thn >= 60");
        $PasienLakiSayur60 = mysqli_fetch_assoc($JumlahLakiSayur60);
        $JumlahPerempuanSayur60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and sayur = 'Ya' and $thnlahir >= 60");
        $PasienPerempuanSayur60 = mysqli_fetch_assoc($JumlahPerempuanSayur60);

        // Konsumsi Alkohol
        $JumlahLakiAlkohol = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and alkohol = 'Ya' and $thn <= 59");
        $PasienLakiAlkohol = mysqli_fetch_assoc($JumlahLakiAlkohol);
        $JumlahPerempuanAlkohol = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and alkohol = 'Ya' and $thnlahir <= 59");
        $PasienPerempuanAlkohol = mysqli_fetch_assoc($JumlahPerempuanAlkohol);

        $JumlahLakiAlkohol60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and alkohol = 'Ya' and $thn >= 60");
        $PasienLakiAlkohol60 = mysqli_fetch_assoc($JumlahLakiAlkohol60);
        $JumlahPerempuanAlkohol60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and alkohol = 'Ya' and $thnlahir >= 60");
        $PasienPerempuanAlkohol60 = mysqli_fetch_assoc($JumlahPerempuanAlkohol60);

        // Tensi
            //Normal
            $JumlahLakiTensiN = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_tensi = 'normal' and $thn <= 59");
            $PasienLakiTensiN = mysqli_fetch_assoc($JumlahLakiTensiN);
            $JumlahPerempuanTensiN = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_tensi = 'normal' and $thnlahir <= 59");
            $PasienPerempuanTensiN = mysqli_fetch_assoc($JumlahPerempuanTensiN);

            $JumlahLakiTensiN60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_tensi = 'normal' and $thn >= 60");
            $PasienLakiTensiN60 = mysqli_fetch_assoc($JumlahLakiTensiN60);
            $JumlahPerempuanTensiN60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_tensi = 'normal' and $thnlahir >= 60");
            $PasienPerempuanTensiN60 = mysqli_fetch_assoc($JumlahPerempuanTensiN60);

            // Prehipertensi
            $JumlahLakiTensiP = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_tensi = 'prehipertensi' and $thn <= 59");
            $PasienLakiTensiP = mysqli_fetch_assoc($JumlahLakiTensiP);
            $JumlahPerempuanTensiP = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_tensi = 'prehipertensi' and $thnlahir <= 59");
            $PasienPerempuanTensiP = mysqli_fetch_assoc($JumlahPerempuanTensiP);

            $JumlahLakiTensiP60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_tensi = 'prehipertensi' and $thn >= 60");
            $PasienLakiTensiP60 = mysqli_fetch_assoc($JumlahLakiTensiP60);
            $JumlahPerempuanTensiP60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_tensi = 'prehipertensi' and $thnlahir >= 60");
            $PasienPerempuanTensiP60 = mysqli_fetch_assoc($JumlahPerempuanTensiP60);

            // Hipertensi
            $JumlahLakiTensiH = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_tensi = 'hipertensi' and $thn <= 59");
            $PasienLakiTensiH = mysqli_fetch_assoc($JumlahLakiTensiH);
            $JumlahPerempuanTensiH = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_tensi = 'hipertensi' and $thnlahir <= 59");
            $PasienPerempuanTensiH = mysqli_fetch_assoc($JumlahPerempuanTensiH);

            $JumlahLakiTensiH60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_tensi = 'hipertensi' and $thn >= 60");
            $PasienLakiTensiH60 = mysqli_fetch_assoc($JumlahLakiTensiH60);
            $JumlahPerempuanTensiH60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_tensi = 'hipertensi' and $thnlahir >= 60");
            $PasienPerempuanTensiH60 = mysqli_fetch_assoc($JumlahPerempuanTensiH60);

        // IMT
            // Obesitas
            $JumlahLakiIMTO = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'normal' and $thn <= 59");
            $PasienLakiIMTO = mysqli_fetch_assoc($JumlahLakiIMTO);
            $JumlahPerempuanIMTO = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'normal' and $thnlahir <= 59");
            $PasienPerempuanIMTO = mysqli_fetch_assoc($JumlahPerempuanIMTO);

            $JumlahLakiIMTO60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'normal' and $thn >= 60");
            $PasienLakiIMTO60 = mysqli_fetch_assoc($JumlahLakiIMTO60);
            $JumlahPerempuanIMTO60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'normal' and $thnlahir >= 60");
            $PasienPerempuanIMTO60 = mysqli_fetch_assoc($JumlahPerempuanIMTO60);

            // Gemuk
            $JumlahLakiIMTG = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'Gemuk' and $thn <= 59");
            $PasienLakiIMTG = mysqli_fetch_assoc($JumlahLakiIMTG);
            $JumlahPerempuanIMTG = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'Gemuk' and $thnlahir <= 59");
            $PasienPerempuanIMTG = mysqli_fetch_assoc($JumlahPerempuanIMTG);

            $JumlahLakiIMTG60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'Gemuk' and $thn >= 60");
            $PasienLakiIMTG60 = mysqli_fetch_assoc($JumlahLakiIMTG60);
            $JumlahPerempuanIMTG60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'Gemuk' and $thnlahir >= 60");
            $PasienPerempuanIMTG60 = mysqli_fetch_assoc($JumlahPerempuanIMTG60);

            // Normal
            $JumlahLakiIMTN = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'normal' and $thn <= 59");
            $PasienLakiIMTN = mysqli_fetch_assoc($JumlahLakiIMTN);
            $JumlahPerempuanIMTN = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'normal' and $thnlahir <= 59");
            $PasienPerempuanIMTN = mysqli_fetch_assoc($JumlahPerempuanIMTN);

            $JumlahLakiIMTN60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'normal' and $thn >= 60");
            $PasienLakiIMTN60 = mysqli_fetch_assoc($JumlahLakiIMTN60);
            $JumlahPerempuanIMTN60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'normal' and $thnlahir >= 60");
            $PasienPerempuanIMTN60 = mysqli_fetch_assoc($JumlahPerempuanIMTN60);

            // Kurus
            $JumlahLakiIMTK = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'Kurus' and $thn <= 59");
            $PasienLakiIMTK = mysqli_fetch_assoc($JumlahLakiIMTK);
            $JumlahPerempuanIMTK = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'Kurus' and $thnlahir <= 59");
            $PasienPerempuanIMTK = mysqli_fetch_assoc($JumlahPerempuanIMTK);
            
            $JumlahLakiIMTK60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'Kurus' and $thn >= 60");
            $PasienLakiIMTK60 = mysqli_fetch_assoc($JumlahLakiIMTK60);
            $JumlahPerempuanIMTK60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'Kurus' and $thnlahir >= 60");
            $PasienPerempuanIMTK60 = mysqli_fetch_assoc($JumlahPerempuanIMTK60);

            // Sangat Kurus
            $JumlahLakiIMTSK = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'Sangat Kurus' and $thn <= 59");
            $PasienLakiIMTSK = mysqli_fetch_assoc($JumlahLakiIMTSK);
            $JumlahPerempuanIMTSK = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'Sangat Kurus' and $thnlahir <= 59");
            $PasienPerempuanIMTSK = mysqli_fetch_assoc($JumlahPerempuanIMTSK);

            $JumlahLakiIMTSK60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and hasil_imt = 'Sangat Kurus' and $thn >= 60");
            $PasienLakiIMTSK60 = mysqli_fetch_assoc($JumlahLakiIMTSK60);
            $JumlahPerempuanIMTSK60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and hasil_imt = 'Sangat Kurus' and $thnlahir >= 60");
            $PasienPerempuanIMTSK60 = mysqli_fetch_assoc($JumlahPerempuanIMTSK60);


        // Lingkar Perut
            // Normal
        $JumlahLakiLingkar = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and lingkar < 90 and $thn <= 59");
        $PasienLakiLingkar = mysqli_fetch_assoc($JumlahLakiLingkar);
        $JumlahPerempuanLingkar = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and lingkar < 80 and $thnlahir <= 59");
        $PasienPerempuanLingkar = mysqli_fetch_assoc($JumlahPerempuanLingkar);

        $JumlahLakiLingkar60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and lingkar < 90 and $thn >= 60");
        $PasienLakiLingkar60 = mysqli_fetch_assoc($JumlahLakiLingkar60);
        $JumlahPerempuanLingkar60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and lingkar < 80 and $thnlahir >= 60");
        $PasienPerempuanLingkar60 = mysqli_fetch_assoc($JumlahPerempuanLingkar60);
        
            // Obesitas
        $JumlahLakiLingkarOb = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and lingkar > 90 and $thn <= 59");
        $PasienLakiLingkarOb = mysqli_fetch_assoc($JumlahLakiLingkarOb);
        $JumlahPerempuanLingkarOb = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and lingkar > 80 and $thnlahir <= 59");
        $PasienPerempuanLingkarOb = mysqli_fetch_assoc($JumlahPerempuanLingkarOb);

        $JumlahLakiLingkarOb60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and lingkar > 90 and $thn >= 60");
        $PasienLakiLingkarOb60 = mysqli_fetch_assoc($JumlahLakiLingkarOb60);
        $JumlahPerempuanLingkarOb60 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and lingkar > 80 and $thnlahir >= 60");
        $PasienPerempuanLingkarOb60 = mysqli_fetch_assoc($JumlahPerempuanLingkarOb60);

         // Gula Darah Sewaktu
            //  80 - 144 mg/dL
            $JumlahLakiGulaD1 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and periksa_gula < 145 and $thn <= 59");
            $LakiGulaD1 = mysqli_fetch_assoc($JumlahLakiGulaD1);
            $JumlahPerempuanGulaD1 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and periksa_gula < 145 and $thnlahir <= 59");
            $PerempuanGulaD1 = mysqli_fetch_assoc($JumlahPerempuanGulaD1);

            $JumlahLakiGulaD160 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and periksa_gula < 145 and $thn >= 60");
            $LakiGulaD160 = mysqli_fetch_assoc($JumlahLakiGulaD160);
            $JumlahPerempuanGulaD160 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and periksa_gula < 145 and $thnlahir >= 60");
            $PerempuanGulaD160 = mysqli_fetch_assoc($JumlahPerempuanGulaD160);

            //  145 - 199  mg/dL
            $JumlahLakiGulaD2 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and periksa_gula >= 145 and periksa_gula < 199 and $thn <= 59");
            $LakiGulaD2 = mysqli_fetch_assoc($JumlahLakiGulaD2);
            $JumlahPerempuanGulaD2 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and periksa_gula >= 145 and periksa_gula < 199 and $thnlahir <= 59");
            $PerempuanGulaD2 = mysqli_fetch_assoc($JumlahPerempuanGulaD2);

            $JumlahLakiGulaD260 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and periksa_gula >= 145 and periksa_gula < 199 and $thn >= 60");
            $LakiGulaD260 = mysqli_fetch_assoc($JumlahLakiGulaD260);
            $JumlahPerempuanGulaD260 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and periksa_gula >= 145 and periksa_gula < 199 and $thnlahir >= 60");
            $PerempuanGulaD260 = mysqli_fetch_assoc($JumlahPerempuanGulaD260);

            // > 200 mg/dL
            $JumlahLakiGulaD3 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and periksa_gula >= 200 and $thn <= 59");
            $LakiGulaD3 = mysqli_fetch_assoc($JumlahLakiGulaD3);
            $JumlahPerempuanGulaD3 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and periksa_gula >= 200 and $thnlahir <= 59");
            $PerempuanGulaD3 = mysqli_fetch_assoc($JumlahPerempuanGulaD3);

            $JumlahLakiGulaD360 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Laki-laki' and periksa_gula >= 200 and $thn >= 60");
            $LakiGulaD360 = mysqli_fetch_assoc($JumlahLakiGulaD360);
            $JumlahPerempuanGulaD360 = mysqli_query($koneksi, "SELECT COUNT('jenis_kelamin') as jml_pasien FROM ptm_hasil where jenis_kelamin = 'Perempuan' and periksa_gula >= 200 and $thnlahir >= 60");
            $PerempuanGulaD360 = mysqli_fetch_assoc($JumlahPerempuanGulaD360);
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Data PTM</h1>                    
        <div class="my-4"></div>
            <table border="1" width="100%" cellspacing="0" style="font-size: 12px;">
                <thead style="text-align:center">
                    <tr>
                        <th rowspan="2">NO</th>
                        <th rowspan="2">RENTANG USIA</th>
                        <th class="kuning" colspan="2">JUMLAH ORANG DI SKRINING</th>
                        <th class="kuning" colspan="2">MEROKOK</th>
                        <th class="kuning" colspan="2">KURANG AKTIVITAS FISIK</th>
                        <th class="kuning" colspan="2">GULA BERLEBIH</th>
                        <th class="kuning" colspan="2">GARAM BERLEBIH</th>
                        <th class="kuning" colspan="2">LEMAK BERLEBIH</th>
                        <th class="kuning" colspan="2">KURANG SAYUR & BUAH</th>
                        <th class="kuning" colspan="2">KONSUMSI ALKOHOL</th>
                        <th colspan="2"><?php echo "< 120 / 80 mmHg" ?></th>
                        <th colspan="2"><?php echo "120-139 /80-89 mmHg"?></th>
                        <th colspan="2"><?php echo ">139/90 mmHg"?></th>
                        <th colspan="2">IMT <br> >27,0</th>
                        <th colspan="2">IMT <br> 25.0 - 27.0	</th>
                        <th colspan="2">IMT <br> 18.5 - 25.0</th>
                        <th colspan="2">IMT <br> 17.0 - 18,5</th>
                        <th colspan="2">IMT<?php echo "< 17.0"?> </th>
                        <th colspan="2"><?php echo "LINGKAR PERUT <br> L:< 90 / P:< 80"?></th>
                        <th colspan="2"><?php echo "LINGKAR PERUT <br> L:>90 / P:>80"?></th>
                        <th colspan="2">GULA <br> 80 - 144 mg/dL</th>
                        <th colspan="2">GULA<br>145 - 199  mg/dL</th>
                        <th colspan="2"><?php echo "GULA <br> > 200 mg/dL"?></th>
                    </tr>
                    <tr>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no++; ?>
                    <tr>
                        <td rowspan="2"><?= $no ?></td>
                        <td>15-59</td>
                        <td><?php echo $Laki['jml_pasien'] ?></td>
                        <td><?php echo $Perempuan['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiMerokok['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanMerokok['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiFisik['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanFisik['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiGula['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanGula['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiGaram['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanGaram['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiLemak['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanLemak['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiSayur['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanSayur['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiAlkohol['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanAlkohol['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiTensiN['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanTensiN['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiTensiP['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanTensiP['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiTensiH['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanTensiH['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTO['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTO['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTG['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTG['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTN['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTN['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTK['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTK['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTSK['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTSK['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiLingkar['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanLingkar['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiLingkarOb['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanLingkarOb['jml_pasien'] ?></td>
                        <td><?php echo $LakiGulaD1['jml_pasien'] ?></td>
                        <td><?php echo $PerempuanGulaD1['jml_pasien'] ?></td>
                        <td><?php echo $LakiGulaD2['jml_pasien'] ?></td>
                        <td><?php echo $PerempuanGulaD2['jml_pasien'] ?></td>
                        <td><?php echo $LakiGulaD3['jml_pasien'] ?></td>
                        <td><?php echo $PerempuanGulaD3['jml_pasien'] ?></td>
                    </tr>
                    <tr>
                        
                        <td>60+</td>
                        <td><?php echo $Laki60['jml_pasien'] ?></td>
                        <td><?php echo $Perempuan60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiMerokok60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanMerokok60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiFisik60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanFisik60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiGula60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanGula60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiGaram60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanGaram60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiLemak60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanLemak60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiSayur60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanSayur60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiAlkohol60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanAlkohol60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiTensiN60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanTensiN60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiTensiP60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanTensiP60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiTensiH60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanTensiH60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTO60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTO60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTG60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTG60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTN60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTN60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTK60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTK60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiIMTSK60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanIMTSK60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiLingkar60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanLingkar60['jml_pasien'] ?></td>
                        <td><?php echo $PasienLakiLingkarOb60['jml_pasien'] ?></td>
                        <td><?php echo $PasienPerempuanLingkarOb60['jml_pasien'] ?></td>
                        <td><?php echo $LakiGulaD160['jml_pasien'] ?></td>
                        <td><?php echo $PerempuanGulaD160['jml_pasien'] ?></td>
                        <td><?php echo $LakiGulaD260['jml_pasien'] ?></td>
                        <td><?php echo $PerempuanGulaD260['jml_pasien'] ?></td>
                        <td><?php echo $LakiGulaD360['jml_pasien'] ?></td>
                        <td><?php echo $PerempuanGulaD360['jml_pasien'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>

<style>
    .cream{
        background : 'cream';
    }

    .kuning{
        background : yellow;
    }

</style>

</body>

</html>
