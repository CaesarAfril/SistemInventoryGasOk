<?php
$file = "Data/transaksi.json";

$transaksi = file_get_contents($file);

$data = json_decode($transaksi, true);

$data [] = array(
    'id_transaksi'     => 4,
    'id_gudang'   => 'WR002',
    'asal_barang' => 'WR002',
    'tujuan_barang' => 'WR1',
    'tanggal' => '2020-06-05'
    );

$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

$transaksi = file_put_contents($file, $jsonfile);