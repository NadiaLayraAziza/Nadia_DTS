<?php 
    include "../koneksi.php"; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 
?> 
<link rel="stylesheet" type="text/css" href="../style.css"> 
<h3>Data Peminjaman Buku</h3> 
<div id="content"> 
    <table border="1" id="tabel-tampil">
        <thead> 
            <tr> 
                <th id="label-tampil-no">No</td>
				<th>ID Transaksi</th>
				<th>Nama</th>
				<th>Judul Buku</th>
				<th>Tgl Pinjam</th>
                <th>Tgl Kembali</th> 
                <th>Status</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php 
                $nomor = 1; 
                $query = "SELECT tbtransaksi.idtransaksi, tbanggota.nama, tbbuku.judul, tbtransaksi.tglpinjam, 
                        tbtransaksi.tglkembali, tbtransaksi.status_transaksi FROM tbtransaksi
                        INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota
                        INNER JOIN tbbuku ON tbtransaksi.idbuku = tbbuku.idbuku 
                        WHERE tbtransaksi.status_transaksi = 'Pinjam' ORDER BY idtransaksi DESC"; 
                $q_tampil_transaksi = mysqli_query($db, $query); 

                if(mysqli_num_rows($q_tampil_transaksi) > 0) { 
                    // looping semua data pada tabel tbtransaksi 
                    while($r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi)) { 
            ?>
            <tr>
                <td><?php echo $nomor; ?></td> 
                <td><?php echo $r_tampil_transaksi['idtransaksi']; ?></td> 
                <td><?php echo $r_tampil_transaksi['nama']; ?></td>
				<td><?php echo $r_tampil_transaksi['judul']; ?></td>
				<td><?php echo $r_tampil_transaksi['tglpinjam']; ?></td>
                <td><?php echo $r_tampil_transaksi['tglkembali']; ?></td>
                <td><?php echo $r_tampil_transaksi['status_transaksi']; ?></td>
            </tr> 
            <?php 
                        $nomor++; 
                    } // end looping 
                } // end if 
            ?> 
    </table> 
    <script> 
        window.print(); 
    </script> 
</div> 

