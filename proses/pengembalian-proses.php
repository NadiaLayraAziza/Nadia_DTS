<?php
    include '../koneksi.php'; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 

    $idtransaksi = $_GET['id'];
    $judul = $_GET['judul'];
    $nama = $_GET['nama'];
    $tgl = date('Y-m-d'); 

    mysqli_query($db,"UPDATE tbtransaksi SET status_transaksi='Kembali', tglkembali='$tgl' WHERE idtransaksi ='$idtransaksi'"); 
    mysqli_query($db,"UPDATE tbbuku SET jmlbuku=(jmlbuku+1) where judul ='$judul'"); 
    mysqli_query($db,"UPDATE tbanggota SET status='Tidak Meminjam' where nama ='$nama'"); 
 
?> 
<script type="text/javascript">
	alert("Proses Pengembalian Buku Berhasil");
    window.location.href = "../index.php?p=transaksi-peminjaman";
</script>