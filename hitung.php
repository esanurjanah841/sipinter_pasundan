

<form method="POST" action="">
<div class="row">
    <div class="form-group col-lg-6">
    <label for="tinggi">Tinggi Badan</label><br>
        <input type="text" class="form-control-tes col-lg-12" id="tinggi" name="tinggi" required><?php echo "&emsp;cm" ?>
    </div>
    <div class="form-group col-lg-6">
        <label for="berat">Berat Badan</label><br>
        <input type="text" class="form-control-tes col-lg-12" id="berat" name="berat" required> <?php echo "&emsp;kg" ?>
    </div>
    <div class="form-group col-lg-6">
        <label for="imt">IMT</label><br>
        <input type="text" class="form-control-tes col-lg-12" id="imt" name="imt"  ><?php echo "&emsp;kg" ?>
    </div>
    <div class="form-group col-lg-6">
        <label for="lingkar">Lingkar Perut</label><br>
        <input type="text" class="form-control-tes col-lg-12" id="lingkar" name="lingkar" onkeyup="isi_otomatis()" required><?php echo "&emsp;cm" ?>
    </div>
</div>
<button type="submit" name="hitung" id="hitung" value="Hitung" class="btn btn-success">Simpan</button>
</form>

<?php
    if(isset($_POST['hitung'])){
        $berat = $_POST['berat'];
        $tinggi = $_POST['tinggi']/100;

        $tinggi_kuadrat = $tinggi * $tinggi;
        $hasil_tinggi = number_format($tinggi_kuadrat, 2, '.', '');
        $hasil_imt = $berat/$hasil_tinggi;
        $hasil_akhir = number_format($hasil_imt,1, '.', '');
        
        echo "Tinggi Badan Anda : ".$_POST['tinggi']."<br>";
        echo "Berat Badan Anda : ".$_POST['berat']."<br>";
        echo "Index Masa Tubuh Anda : $hasil_akhir<br>";

        if($hasil_akhir < 17){
            echo "Sangat Kurus";
        }else if($hasil_akhir <= 17){
            echo "Kurus";
        }else if(($hasil_akhir >= 18.5) && ($hasil_akhir <= 25)){
            echo "Normal";
        }else if(($hasil_akhir > 25) && ($hasil_akhir <=27)){
            echo "Gemuk";
        }else if($hasil_akhir > 27){
            echo "Obesitas";
        }

        $lingkar = $_POST['lingkar'];
        if($lingkar < 90){
            echo  "Normal";
        }else{
            echo "Obesitas";
        }

    }

?>
