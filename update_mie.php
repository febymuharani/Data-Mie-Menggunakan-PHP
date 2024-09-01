<?php
//menyimpan hasil inputan kedalam variabel
$id_barang    = $_POST['id_barang'];
$nama_barang  = $_POST['nama_barang'];
$harga        = $_POST['harga'];
$brand        = $_POST['brand'];
$kategori     = $_POST['kategori'];
$deskripsi    = $_POST['deskripsi'];


include 'koneksi.php';
//sintaks sql untuk insert data
$sql = "update barang SET nama_barang='$nama_barang',harga='$harga',
     id_brand='$brand',id_kategori='$kategori',deskripsi='$deskripsi'
     where id_barang=$id_barang";

//perintah mengeksekusi query di atas
$update = mysqli_query($konek, $sql);
/*
if($insert){
    echo "insert data berhasil";
}else{
    echo "insert data gagal";
}
*/
header("location:index.php");
?>