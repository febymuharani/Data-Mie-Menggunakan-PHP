<?php
//menyimpan hasil inputan kedalam variabel
$username    = $_POST['username'];
$options     = array("cost"=>4);
$pass        = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
$id_user     = $_POST['id_user'];


include 'koneksi.php';
//sintaks sql untuk insert data


if(empty($pass)){
    $sql = "update user SET username='$username' where id_user='$id_user'";
}else{
    $sql = "update user SET username='$username',password='$pass' where id_user='$id_user'";
}




//perintah mengeksekusi query di atas
$update = mysqli_query($konek, $sql);
/*
if($insert){
    echo "insert data berhasil";
}else{
    echo "insert data gagal";
}
*/
header("location:user.php");
?>