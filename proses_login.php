<?php
//untuk menyimpan imputan dari halaman login
$username  = $_POST['username'];
$pass      = $_POST['password'];

//mem
include 'koneksi.php';

//perintah SQL untuk check data ke database
$sql  = "select * from user where username='$username'";
$user = mysqli_query($konek, $sql);

//menghitung jumlah data yang ketemu
if(mysqli_num_rows($user)>0) {
    //kalau berhasil di alihkan ke halaman index
    session_start();
    $userData = mysqli_fetch_array($user);
    if(password_verify($pass,$userData['password'])){
        //password benar
        $_SESSION['status_login']="sudah_login";
        $_SESSION['nama_user']   = $userData['username'];
        header("location:index.php");
    }else{
        header("location:login.php");
    }

}else{
    //kalau gagal maka balik ke halaman login
    header("location:login.php");
}

?>