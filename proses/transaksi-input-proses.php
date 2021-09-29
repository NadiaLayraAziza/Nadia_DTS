<?php
include '../koneksi.php'; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 

$idtransaksi=$_POST['idtransaksi'];
$idanggota=$_POST['idanggota'];
$idbuku=$_POST['idbuku'];
$tglpinjam=$_POST['tglpinjam'];
$tglkembali=$_POST['tglkembali'];
$status_transaksi="Pinjam";
$status="Meminjam";


if(isset($_POST['simpan'])){
    extract($_POST); 

	$sql_1 = "INSERT INTO tbtransaksi
		VALUES('$idtransaksi','$idanggota','$idbuku','$tglpinjam','$tglkembali','$status_transaksi')";
    $query = mysqli_query($db, $sql_1); 

    $sql_2 = "UPDATE tbbuku set jmlbuku=(jmlbuku-1) WHERE idbuku ='$idbuku'";
    $query = mysqli_query($db, $sql_2); 

    $sql_3 = "UPDATE tbanggota SET status='$status' WHERE idanggota ='$idanggota'";
    $query = mysqli_query($db, $sql_3); 
	

	header("location:../index.php?p=transaksi-peminjaman");
}
?>