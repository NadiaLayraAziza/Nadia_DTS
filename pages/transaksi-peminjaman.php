<div id="label-page"><h3>Transaksi Peminjaman</h3></div>
<div id="content">
	<p id="tombol-tambah-container">
        <a href="index.php?p=transaksi-input" class="tombol">Tambah Transaksi</a>
        <a target="_blank" href="pages/cetak_transaksi.php"><img src="print.png" height="50px" height="50px"></a>
        <a target="_blank" href="ekspor/transaksi_pdf.php"><img src="pdf.png" height="50px" height="50px"></a>
        <a target="_blank" href="ekspor/transaksi_excel.php"><img src="excel.png" height="50px" height="50px"></a> 
        <div class="form-inline"> 
            <div align="right"> 
                <form method=post> 
                    <input type="text" name="pencarian"> 
                    <input type="submit" name="search" value="search" class="tombol"> 
                </form> 
            </div> 
        </div>
    </p>
	<table id="tabel-tampil">
		<thead>
			<tr>
				<th id="label-tampil-no">No</td>
				<th>ID Transaksi</th>
				<th>Nama</th>
				<th>Judul Buku</th>
				<th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
				<th id="label-opsi">Opsi</th> 
			</tr>
		</thead>
		<tbody> 
            <?php 
                $batas = 5;
                extract($_GET); 
                if(empty($hal)) { 
                    $posisi = 0; 
                    $hal = 1; 
                    $nomor = 1; 
                }else { 
                    $posisi = ($hal - 1) * $batas; 
                    $nomor = $posisi+1; 
                }

                if($_SERVER['REQUEST_METHOD'] == "POST") { 
                    $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian'])); 
                    if($pencarian != "") { 
                        $sql = "SELECT tbtransaksi.idtransaksi, tbanggota.nama, tbbuku.judul, tbtransaksi.tglpinjam, 
                                tbtransaksi.tglkembali, tbtransaksi.status_transaksi FROM tbtransaksi 
                                INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota
                                INNER JOIN tbbuku ON tbtransaksi.idbuku = tbbuku.idbuku
								WHERE tbtransaksi.idtransaksi LIKE '%$pencarian%' 
                                OR tbtransaksi.tglpinjam LIKE '%$pencarian%'
                                OR tbtransaksi.tglkembali LIKE '%$pencarian%'
                                OR tbtransaksi.status_transaksi LIKE '%$pencarian%'
								OR tbanggota.nama LIKE '%$pencarian%'
								OR tbbuku.judul LIKE '%$pencarian%'"; 
                        $query = $sql; 
                        $queryJml = $sql; 

                    } else { 
                        $query = "SELECT tbtransaksi.idtransaksi, tbanggota.nama, tbbuku.judul, tbtransaksi.tglpinjam, 
                                tbtransaksi.tglkembali, tbtransaksi.status_transaksi FROM tbtransaksi 
                                INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota
                                INNER JOIN tbbuku ON tbtransaksi.idbuku = tbbuku.idbuku
                                WHERE tbtransaksi.status_transaksi = 'Pinjam'
								ORDER BY tbtransaksi.idtransaksi DESC 
								LIMIT $posisi, $batas"; 
                        $queryJml = "SELECT * FROM tbtransaksi WHERE tbtransaksi.status_transaksi = 'Pinjam'"; 
                        $no = $posisi * 1; 
                    }
                }
                else { 
                    $query = "SELECT tbtransaksi.idtransaksi, tbanggota.nama, tbbuku.judul, tbtransaksi.tglpinjam, 
                            tbtransaksi.tglkembali, tbtransaksi.status_transaksi FROM tbtransaksi 
                            INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota
                            INNER JOIN tbbuku ON tbtransaksi.idbuku = tbbuku.idbuku
                            WHERE tbtransaksi.status_transaksi = 'Pinjam'
                            ORDER BY tbtransaksi.idtransaksi DESC
							LIMIT $posisi, $batas"; 
                    $queryJml = "SELECT * FROM tbtransaksi WHERE tbtransaksi.status_transaksi = 'Pinjam'"; 
                    $no = $posisi * 1; 
                }

                //$sql="SELECT * FROM tbtransaksi ORDER BY idtransaksi DESC"; 
                $q_tampil_transaksi = mysqli_query($db, $query); 

                /* Pengecekan apakah terdapat data di database, jika ada, tampilkan*/ 
                if(mysqli_num_rows($q_tampil_transaksi) > 0) { 

                    /* looping data transaksi sesuai yang ada di database */
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
                <td>
                    <div class="tombol-opsi-container"><a href="proses/pengembalian-proses.php?&id=<?php echo $r_tampil_transaksi['idtransaksi'];?>&judul=<?php echo $r_tampil_transaksi['judul']; ?>&tglkembali=<?php echo $r_tampil_transaksi['tglkembali']; ?>
                    &nama=<?php echo $r_tampil_transaksi['nama']; ?>" onclick = "return confirm ('Apakah Anda Yakin ingin mengembalikan Buku ini ?')" class="tombol">Kembalikan</a></div>
					<div class="tombol-opsi-container"><a href="proses/perpanjang.php?&id=<?php echo $r_tampil_transaksi['idtransaksi']; ?>&tglkembali=<?php echo $r_tampil_transaksi['tglkembali']; ?>" 
                    onclick = "return confirm ('Apakah Anda Yakin ingin memperpanjang peminjaman ?')" class="tombol">Perpanjang</a></div>
                </td>
            </tr>
            <?php 
                        $nomor++;  
                    }   // selesai looping while 
                } 
                else { 
                    echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>"; 
                }
            ?> 
        </tbody>
	</table>

    <?php 
    if(isset($_POST['pencarian'])) { 
        if($_POST['pencarian']!='') { 
            echo "<div style=\"float:left;\">"; 
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml)); 
            echo "Data Hasil Pencarian: <b>$jml</b>"; 
            echo "</div>"; 
        }
    } else { 
    ?> 
        <div style="float: left;"> 
        <?php 
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml)); 
            echo "Jumlah Data : <b>$jml</b>"; 
        ?> 
        </div>
        <div class="pagination" style="float: right;"> 
            <?php 
                $jml_hal = ceil($jml / $batas); 
                for($i = 1; $i <= $jml_hal; $i++) { 
                    if($i != $hal) { 
                        echo "<a href=\"?p=transaksi-peminjaman&hal=$i\">$i</a>"; 
                    } else { 
                        echo "<a class=\"active\">$i</a>"; 
                    } 
                }
            ?>
        </div> 
    <?php 
    } 
    ?> 
</div> 