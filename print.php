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
<html>
<head>
<?php
echo "<title>Mutasi ".$nama."</title>";
?>
</head>
<body>
    <div align="center">
    <h1 style="text-align:center;">Mutasi <?php echo $nama;?></h1>
    <h3 style="text-align:center;">Kode Gudang : <?php echo $id;?></h3>
    <h7>Stok Gudang : <?php echo $stok;?><br></h7>
    <h7>Kapasitas Gudang : <?php echo $kapas;?><br><br></h7>

    <div align="center">

    <h7>Daftar Transaksi</h7> <br>
    <table class="table" border="1" align="center">
        <thead>
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
              echo "<tr>";
              echo "<td>".$idtrans."</td>";
              echo "<td>".$trans[$a]['id_gudang']."</td>";
              echo "<td>".$trans[$a]['asal_barang']."</td>";
              echo "<td>".$trans[$a]['tujuan_barang']."</td>";
              echo "<td>".$trans[$a]['tanggal']."</td>";?>
              <?php
              echo "</tr>";}
            }?>
        </table>
        </div>
        <br>
        <div align="center">
        <h7 style="text-align:center;">Detail Transaksi</h7> <br>
        <table class="table" border="1" align="center">
          <thead>
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
              echo "<tr>";
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
        </div>
    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript">
	html2canvas(document.body).then(function(canvas) {

		var doc = new jsPDF("l","mm","a4");
		var img = canvas.toDataURL('image/png',10.0);
		img.width = 200;
		doc.addImage(img, 'JPEG', 0, 0,362.25,189);
		doc.save('Mutasi Gudang<?php echo $nama  ?>');
	});
</script>
<meta http-equiv="refresh" content="5;URL=mutasi.php" />

</html>
