<?php

if(isset($_GET['id'])){
    include 'koneksi.php';
    $delete = mysqli_query($konek, "delete from user where id_user='".$_GET['id']."'");
    header("location:user.php");

}

?>