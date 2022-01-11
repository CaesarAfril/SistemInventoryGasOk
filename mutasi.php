<?php
include 'controller/function.php';
  session_start();
  $id = $_SESSION['id_gudang'];
  $nama = $_SESSION['nama'];
  $stok = $_SESSION['stok'];
  $kapas = $_SESSION['kapasitas'];

  $detail = getDetailM();
  $trans = getTransaksiM();
  $gudang = getGudangM();

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
        <h1 class="display-5 mb-4">Mutasi Barang</h1>
        <h5>Transaksi</h5>
        <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">ID Transaksi</th>
              <th scope="col">ID Gudang</th>
              <th scope="col">Asal Barang</th>
              <th scope="col">Tujuan Barang</th>
              <th scope="col">Tanggal</th>
              </tr>
          </thead>
          <tbody>
            <?php
            
            for ($a=0; $a < count($trans); $a++) {
              if ($trans[$a]['id_gudang'] == $id || $trans[$a]['tujuan_barang'] == $id){
              $idtrans = $trans[$a]['id_transaksi'];
              echo "<td>".$idtrans."</td>";
              echo "<td>".$trans[$a]['id_gudang']."</td>";
              echo "<td>".$trans[$a]['asal_barang']."</td>";
              echo "<td>".$trans[$a]['tujuan_barang']."</td>";
              echo "<td>".$trans[$a]['tanggal']."</td>";?>
              <?php
              echo "</tr>";}
            }?>
        </table>
        <h5>Detail Transaksi</h5>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID Transaksi</th>
              <th scope="col">ID Detail</th>
              <th scope="col">ID Gudang</th>
              <th scope="col">Nama Gudang</th>
              <th scope="col">ID Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Jumlah Barang</th>
              </tr>
          </thead>
          <tbody>
            <?php
            
            for ($a=0; $a < count($detail); $a++) {
              if ($detail[$a]['id_gudang'] == $id){
              echo "<td>".$detail[$a]['id_transaksi']."</td>";
              echo "<td>".$detail[$a]['id_detail']."</td>";
              echo "<td>".$detail[$a]['id_gudang']."</td>";
              echo "<td>".$detail[$a]['nama_gudang']."</td>";
              echo "<td>".$detail[$a]['id_barang']."</td>";
              echo "<td>".$detail[$a]['nama_barang']."</td>";
              echo "<td>".$detail[$a]['jumlah_barang']."</td>";
              echo "</tr>";}
            }
            ?>
          </tbody>
        </table>
        <form action="print.php"><input type="submit" class="btn btn-primary" value="print"></form>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>