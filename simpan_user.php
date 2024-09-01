<?php
//menyimpan hasil inputan kedalam variabel
$username    = $_POST['username'];
$options     = array("cost"=>4);
$pass        = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);


include 'koneksi.php';
//sintaks sql untuk insert data
$sql = "insert into user SET username='$username',password='$pass'";

//perintah mengeksekusi query di atas
$insert = mysqli_query($konek, $sql);
/*
if($insert){
    echo "insert data berhasil";
}else{
    echo "insert data gagal";
}
*/
header("location:user.php");
?>