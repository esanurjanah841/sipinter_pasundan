<?php

//membuat koneksi ke database


//variabel nim yang dikirimkan form.php
$lingkar = $_GET['lingkar'];

//mengambil data
if($lingkar < 90){
    echo  "Normal";
}else{
    echo "Obesitas";
}


//tampil data
echo json_encode($lingkar);
?>
