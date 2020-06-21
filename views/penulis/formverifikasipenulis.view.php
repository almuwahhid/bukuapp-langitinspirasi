<!DOCTYPE html>
<html lang="en">
<head>
  <title>Konfirmasi Akun Penulis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-light" style="background-color: #2CBD92;text-align: center; color: white">
    <h3>
      KONFIRMASI AKUN MANAGE BUKU APP
    </h3>
  </nav>
  <?php
        if(isset($_GET["success"])){
            // include (ROOT_PATH.'views/bodyview/alert.php');
            ?>
            <center><?= $_SESSION['SUCCESS_MESSAGE'] ?></center>
            <?php
        }
    ?>
  <?php
  if($data['result']){
  ?>
<div class="container">
  <form action="index.php?hal=penulisauth&action=konfirmasiakun" method="post" enctype="multipart/form-data">
    <input type="hidden" id="hash" value="<?= $data['hash'] ?>">
    <div class="col-md-12">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header">Token Registrasi : </div>
        <div class="card-body">
          <h5 class="card-title"><?= $data['hash'] ?></h5>
        </div>
      </div>
    </div>
    <div class="col-md-12" id = "lay2">
      <input name="hash" id="inputText3" type="hidden" class="form-control" value="<?= $data['penulis']->hash ?>"/>
      <div class="form-group">
        <label for="exampleInputPassword1">Masukkan username Anda :</label>
        <input required name="username" type="text" class="form-control" id="ulangipassword" placeholder="Username">
      </div>
    </div>
    <div class="col-md-12" id = "lay1">
      <div class="form-group">
         <label for="exampleInputPassword1">Masukkan Password Baru :</label>
         <input required name="password" type="password" class="form-control" id="passwordbaru" placeholder="Password Baru">
       </div>
    </div>
    <div class="col-md-12" style="text-align: center">
      <input type="submit" id="btn" class="btn btn-primary btn-lg" value="Konfirmasi Akun"></input>
    </div>
  </form>
</div>
  <?php
  } else {
    ?>
    <h4>
      <center>Hash tidak dikenali</center>
    </h4>
    <?php
  }
  ?>
</div>
</body>
</html>
