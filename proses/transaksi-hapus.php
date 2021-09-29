<?php 
    include '../koneksi.php'; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 
    
    $idtransaksi = $_GET['id']; 
    
    mysqli_query($db,"DELETE FROM tbtransaksi WHERE idtransaksi = '$idtransaksi'"); 
    
    header("location:../index.php?p=transaksi-pengembalian"); 
?> 
