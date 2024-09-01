<?php
include 'header.php';
?>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <h3>Data Buku</h3>
        </div>
        <div class="col-4">
        <form method="POST" class="form-inline" action="<?php $_SERVER['PHP_SELF']?>">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="text" class="form-control" name="keyword" placeholder="Masukkan Keyword">
  </div>
  <button name="pencarian" type="submit" class="btn btn-primary mb-2">Cari Data</button>
</form>
        </div>
      </div>
      <dic class="row">
        <div class="col-12">
        <table class="table table-bordered">
  <tr><th>ID BARANG</th><th>NAMA BARANG</th><th>HARGA</th><th>DESKRIPSI</th><th>NAMA BRAND</th><th>NAMA KATEGORI</th><th width='160px;'>AKSI</th></tr>
  <?php
  $batas   = 3;
  $halaman = isset($_GET['hal'])?$_GET['hal']:0;
  if(isset($_POST['pencarian'])){
    //query pencarian data
    $keyword = $_POST['keyword'];
    $sql = "SELECT b.id_barang,b.nama_barang,b.harga,b.deskripsi,d.nama_brand,k.nama_kategori
    FROM barang as b,brand as d,kategori as k
    WHERE b.id_brand=d.id_brand and k.id_kategori=b.id_kategori and b.nama_barang like '%$keyword%' order by b.id_barang ASC limit $halaman,$batas";
  } else{
    // query menampilkan data biasa
  $sql = "SELECT b.id_barang,b.nama_barang,b.harga,b.deskripsi,d.nama_brand,k.nama_kategori
          FROM barang as b,brand as d,kategori as k
          WHERE b.id_brand=d.id_brand and k.id_kategori=b.id_kategori order by b.id_barang ASC limit $halaman,$batas";
  }
  $barang = mysqli_query($konek, $sql);
  while ($row = mysqli_fetch_array($barang)){
    echo "<tr>
    <td>$row[id_barang]</td>
    <td>$row[nama_barang]</td>
    <td>$row[harga]</td>
    <td>$row[deskripsi]</td>
    <td>$row[nama_brand]</td>
    <td>$row[nama_kategori]</td>
    <td>
      <a href='edit_mie.php?id_barang=$row[id_barang]' class='btn btn-success btn-sm'>EDIT</a>
      <a href='delete_mie.php?id_barang=$row[id_barang]' class='btn btn-info btn-sm'>DELETE</a>
    </td>
    </tr>";
  }
  ?>
</table>
<div class="float-right">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php
    if((!isset($_GET['hal'])) or ($_GET['hal']==1)) {
      $prev = 1;
    }else{
      $prev = $_GET['hal']-1;
    }

    ?>
    <li class="page-item"><a class="page-link" href="index.php?hal=<?php echo $prev;?>">Previous</a></li>
    <?php
    //sql untuk menghitung jumlah data untuk paging
     $sql2 = mysqli_query($konek, "SELECT b.id_barang,b.nama_barang,b.harga,b.deskripsi,d.nama_brand,k.nama_kategori
     FROM barang as b,brand as d,kategori as k
     WHERE b.id_brand=d.id_brand and k.id_kategori=b.id_kategori order by b.id_barang ASC");

     //menghitung jumlah data
    $jml_data    = mysqli_num_rows($sql2);

    //menghitung jumlah halaman
    $jml_halaman = ceil($jml_data/$batas);

    //untuk membuat pagging
    for($hal=1;$hal<=$jml_halaman;$hal++){
      echo "<li class='page-item'><a class='page-link' href='index.php?hal=$hal'>$hal</a></li>";
    }
    ?>

    <li class="page-item"><a class="page-link" href="index.php?hal=<?php echo $halaman+1;?>">Next</a></li>
  </ul>
</nav>
</div>
<a href="input_mie.php" class="btn btn-danger btn-sm">Input Data</a>
        </div>
      </div>
    </div>

<?php
include 'footer.php';
?>
