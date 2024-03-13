<?php 
include 'function.php';

$email = $_POST[$email];

$select = mysqli_query($koneksi, "SELECT * FROM user where email = '$email'");
$tampil = mysqli_fetch_array($select);
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
            <h1 class="card-title">RESET PASSWORD</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="function.php?act=ubahPassword&email=<?= $tampil['email']; ?>" id="ubah" >
                <div class="form-row">
                    <label class="papan" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $tampil['email']?>" readonly>
                </div>
                <div class="form-row">
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
                <button type="submit" name="ubah" id="ubah" class="registerbtn btn btn-primary">Update</button>
                <br>
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


</body>

</html>