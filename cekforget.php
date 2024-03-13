<?php
include 'function.php';

function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
  $forgetCetak="";
  $email="";
      if($_SERVER['REQUEST_METHOD'] == "POST") {

        if($_POST["email"]) 
        {
                   $email=test_input($_POST["email"]);
		    }

if(isset($_POST) & !empty($_POST['email'])){

	$email = mysqli_real_escape_string($koneksi, $_POST['email']);
	$sql = "SELECT * FROM user WHERE email = '$email'";
	$res = mysqli_query($koneksi, $sql);
	$count = mysqli_num_rows($res);
  
	if($count == 1){
	    
	}else{
	     echo "<script> alert('Email anda belum terdaftar'); </script>";
	     
	}
}
$r = mysqli_fetch_assoc($res);
$password = $r['password'];
$to = $r['email'];
$subject = "Your Recovered Password";
 
$message = "Klik link berikut untuk reset Password, <a href='http://sipinter-pasundan.id/resetPassword.php?email=$email'>Tekan Link Ini<a>";
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: 	admin@sipinter-pasundan.id' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
if(mail($to, $subject, $message, $headers)){
echo "<script> alert('Silahkan cek email untuk mereset password'); 
document.location.href = 'index.php'
</script>";
}else{
echo "<script> alert('Gagal mengirim ke email'); </script>";
}
      }
?>