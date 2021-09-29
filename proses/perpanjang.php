<?php
	include '../koneksi.php'; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 

	$idtransaksi = $_GET['id'];
	$tglkembali = $_GET['tglkembali'];
	
	$hari_next = date('Y-m-d', strtotime('+7 days', strtotime($tglkembali)));

	mysqli_query($db,"UPDATE tbtransaksi SET tglkembali='$hari_next' where idtransaksi='$idtransaksi'");
	
?>
<script type="text/javascript">
	alert("Perpanjangan Berhasil");
	window.location.href = "../index.php?p=transaksi-peminjaman";
</script>
			
			
