<?php 
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == "administrator") {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == "pasien") {
        header("location: menuPasien.php");
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
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Username" minlength="8" required>
                        <div class="valid-feedback">
                            Bagus!
                        </div>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    </div>
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
                </div>
                <div class="form-row">
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
                    <p>Sudah punya akun? <a data-bs-toggle="modal" data-bs-target="#feedbackModal">Log In</a></p>
                <!-- Modal -->
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Login Modal-->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Login Aplikasi SIPINTER</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                            <!-- Name input-->
                      <div class="modal-body">
                        <form class="tambah_pasien" id="login-form" action="function.php?act=login" method="POST">
                            <div class="form-group ">
                              <label for="nama">Username</label>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                  placeholder="Username" required>
                            </div>
                            <div class="my-4"></div>
                              <div class="form-group">
                                <label for="pass">Password</label>
                                  <input type="password" class="form-control form-control-user" id="password" name="password"
                                    placeholder="Password" required>
                              </div>
                              <a href="#" data-bs-toggle="modal" data-bs-target="#LupaPassword" style="font-size:14px">Lupa Password?</a>
                              <div class="my-4"></div>
                              <div class="modal-footer">
                                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                                <button type="submit" name="login_btn" id="login" value="Login" class="btn btn-success">Log In</button>
                              </div>
                        </form>
                      </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <!-- Lupa Password Modal-->
          <div class="modal fade" id="LupaPassword" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Lupa Password</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                            <!-- Name input-->
                      <div class="modal-body">
                        <form class="tambah_pasien" id="login-form" action="cekforget.php" method="POST">
                          <div class="form-group">
                            <label for="email">Inputkan Email Anda</label>
                              <input type="text" class="form-control form-control-user" id="email" name="email"
                                  placeholder="Email" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                            <button type="submit" name="submit_email" id="login" value="Login" class="btn btn-success">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
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