<?php
include 'header.php';
$id_barang = $_GET['id_barang'];
$barang = mysqli_query($konek, "select * from barang where id_barang='$id_barang'");
$row = mysqli_fetch_array($barang);
//print_r($row);
?>

<div class="container">
<h3>Edit Data Mie</h3>
<form action="update_mie.php" method="POST">
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Id Barang</label>
  <div class="col-sm-10">
    <input readonly="" type="text" value="<?php echo $row['id_barang']?>" name="id_barang" placeholder="Masukan Id Barang" class="form-control">
  </div>
</div>


<form action="" method="">
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Nama Barang</label>
  <div class="col-sm-10">
    <input type="text" value="<?php echo $row['nama_barang']?>" name="nama_barang" placeholder="Masukan Nama Barang" class="form-control">
  </div>
</div>



<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Harga</label>
  <div class="col-sm-10">
    <input type="text" value="<?php echo $row['harga']?>" name="harga" placeholder="Masukan Harga" class="form-control">
  </div>
</div>

<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Nama Brand</label>
  <div class="col-sm-10">
    <select name="brand" class="form-control">
      <?php
      $brand = mysqli_query($konek, "select * from brand");
      while ($b = mysqli_fetch_array($brand)){
        echo "<option value='$b[id_brand]' ";
        if($row['id_brand']==$b['id_brand']){
            echo "selected";
        }
        echo">$b[nama_brand]</option>";
      }
      ?>
    </select>
  </div>
</div>


<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Kategori</label>
  <div class="col-sm-10">
    <select name="kategori" class="form-control">
      <?php
      $kategori = mysqli_query($konek, "select * from kategori");
      while ($k = mysqli_fetch_array($kategori)){
        echo "<option value='$k[id_kategori]' ";
        echo $row['id_kategori']==$k['id_kategori']?'selected':'';
        echo">$k[nama_kategori]</option>";
      }
      ?>
    </select>
  </div>
</div>


<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Deskripsi</label>
  <div class="col-sm-10">
   <textarea name="deskripsi" class="form-control"><?php echo $row['deskripsi']?></textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-2 col-form-label"></label>
  <div class="col-sm-10">
   <button type="submit" class="btn btn-secondary">Simpan Data</button>
   <a href="index.php" class="btn btn-primary">Batal</a>
  </div>
</div>
</form>
    </div>

<?php
include 'footer.php';
?>
