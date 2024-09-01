<?php
include 'header.php';
?>

<div class="container">
<h3>Form Input User</h3>
<form action="simpan_user.php" method="POST">
<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Username</label>
  <div class="col-sm-10">
    <input type="text" name="username" placeholder="Masukan Username" class="form-control">
  </div>
</div>

<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Password</label>
  <div class="col-sm-10">
    <input type="password" name="password" placeholder="Masukan Password" class="form-control">
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
