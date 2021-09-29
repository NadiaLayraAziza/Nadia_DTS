<?php 
    include '../koneksi.php'; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 
    
    $idbuku = $_GET['id']; 
    
    mysqli_query($db,"DELETE FROM tbbuku WHERE idbuku = '$idbuku'"); 
    
    header("location:../index.php?p=buku"); 
?> 
