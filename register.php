<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == "pasien") {
        header("location: menupasien.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="gambar/favicon.ico" rel="icon">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="custom.css" />

<!--Font-->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap"rel="stylesheet"/>
<script src="https://kit.fontawesome.com/yourcode.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<title>Si Pinter</title>
</head>

<body>
<div class="container">
    <div class="card text-center">
        <div class="card-title">
            <h1 class="card-title">REGISTRASI AKUN</h1>
        </div>
        <div class="card-body">
            <form id="registrationForm" method="POST" action="function.php?act=register" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col">
                        <label class="papan" for="nama">Username</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Username" required>
                        <div class="valid-feedback">
                            Bagus!
                        </div>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    </div>
                    <div class="col">
                        <label class="papan" for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
                        <div class="valid-feedback">
                            Bagus!
                        </div>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                        <label class="papan" for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="32xxxxxxxxxxxxxx" minlength="16" required>
                        <div class="valid-feedback">
                            Bagus!
                        </div>
                        <div class="invalid-feedback">
                        Min. 16 karakter
                        </div>
                    </div>
                    <div class="col">
                        <label class="papan" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <div class="valid-feedback">
                            Bagus!
                        </div>
                        <div class="invalid-feedback">
                            Email tidak valid
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col">
                        <label class="papan" for="ttl">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="ttl" name="ttl" required>
                        
                        <div class="valid-feedback">
                             Bagus!
                        </div>
                        <div class="invalid-feedback">
                        
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="papan" for="tlp">No. Telepon</label>
                        <input type="text" class="form-control" id="tlp" name="tlp" minlength="10" placeholder="08xxxxxxxxxx" required>
                        <div class="valid-feedback">
                            Bagus!
                        </div>
                        <div class="invalid-feedback">
                            No telepon tidak valid
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="papan" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" minlength="8" placeholder="Password" required>
                        <div class="valid-feedback">
                            Bagus!
                        </div>
                        <div class="invalid-feedback">
                            Password min. 8 karakter
                        </div>
                    </div>
                </div>
                <button type="submit" name="submitButton" id="submitButton" class="registerbtn btn btn-primary">Register</button>
                <br>
                <div class="container signin">
                    <p>Sudah punya akun? <a href="index.php">Log In</a></p>
                <!-- Modal -->
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
    }
    form.classList.add('was-validated');
    }, false);
});
}, false);
})();
</script>
</body>

</html>