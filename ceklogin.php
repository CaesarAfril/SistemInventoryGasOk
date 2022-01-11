<?php
    include 'controller/function.php';
    $idgudang = $_POST['idgudang'];
    $pass = $_POST['pass'];

    $gudang = getGudangM();
    for ($i=0; $i < count($gudang); $i++) { 
        if ($gudang[$i]['id_gudang']==$idgudang){
            if ($pass == $gudang[$i]['pass']) {
                session_start();
                $_SESSION['id_gudang'] = $idgudang;
                $_SESSION['nama'] = $gudang[$i]['nama_gudang'];
                $_SESSION['stok'] = $gudang[$i]['stok'];
                $_SESSION['kapasitas'] = $gudang[$i]['kapasitas'];
                header('refresh:0 ; home.php');	
            }else{
                $message = "username / password salah";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('refresh:0 ; index.php');
            }
        }
    }
?>