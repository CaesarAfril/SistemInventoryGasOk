<?php
include 'controller/function.php';
  session_start();
  $id = $_SESSION['id_gudang'];
  $nama = $_SESSION['nama'];
  $stok = $_SESSION['stok'];
  $kapas = $_SESSION['kapasitas'];

  $barang = getBarangI();
  $gudang = getGudangcek();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SISTEM INVENTORY GUDANG GAS OK</title>
  </head>
  <body>
    <nav class="navbar navbar-expand navbar-dark bg-primary">
      <a class="navbar-brand" href="home.php"><i class="fa fa-code-branch"></i>SISTEM INVENTORY GUDANG GAS OK</a>
    </nav>
    <div class="d-flex align-items-stretch">
      <div class="sidebar bg-dark">
        <div class="profile" align="center">
          <img src="images/gasikk.png"> <br> <br>
        </div>
        <div class="idgudangg" align="center">
          <h7><?php echo $id ?></h7> <br>
          <h7><?php echo $nama?></h7> <br>
          <h7>Stok gudang : <?php echo $stok?> </h7> <br>
          <h7>Kapasitas gudang : <?php echo $kapas?> </h7>
          <hr>
        </div>
        <div>
          <ul class="list-unstyled">
            <li>
              <a href="#submenu1" data-toggle="collapse"> Mengelola Data Barang</a>
              <ul id="submenu1" class="list-unstyled collapse">
                <li><a href="barang_masuk.php">Barang Masuk</a></li>
                <li><a href="barang_keluar.php">Barang Keluar</a></li>
              </ul>
            </li>
            <li><a href="mutasi.php"><i class="fa fa-fw fa-angle-right"></i> Mutasi Barang</a></li>
            <li><a href="index.php"><i class="fa fa-fw fa-link"></i> Logout</a></li>
          </ul>
        </div>
      </div>
      <div class="content p-4">
        <h1 class="display-5 mb-4">Barang Masuk</h1> <br>
        <div class="form_masuk">
          <form role="form" id="insertForm" method="POST" action="Controller/insertmasuk.php" enctype="multipart/form-data">
            <div class="form-group">
              <label>ID Barang</label>
              <select class="form-control" name="id_barang" id="id_barang">
              <?php
                for ($a=0; $a < count($barang); $a++) {
                  echo "<option>".$barang[$a]['id_barang']."</option>";
                } 
              ?>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah Barang</label>
              <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang">
            </div>
            <div class="form-group">
              <label>Asal Barang</label>
              <select class="form-control" name="asal_barang" id="asal_barang">
                <option>Produsen</option>
                <?php
                for ($a=0; $a < count($gudang); $a++) {
                  echo "<option>".$gudang[$a]['id_gudang']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Masuk</label>
              <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk">
            </div>
            <input type="submit" class="btn btn-primary"></input>
          </form>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>