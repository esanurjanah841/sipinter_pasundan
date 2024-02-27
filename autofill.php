<form method="POST" action="">
    <div class="form-group col-lg-6">
        <label for="lingkar">Lingkar Perut</label><br>
        <input type="text" class="form-control-tes col-lg-12" id="lingkar" name="lingkar" onkeyup="isi_otomatis()" required><?php echo "&emsp;cm" ?>
    </div>
<button type="submit" name="hitung" id="hitung" value="Hitung" class="btn btn-success">Simpan</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var lingkar = $("#lingkar").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"nim="+nim ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);

                });
            }
        </script>