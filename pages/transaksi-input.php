<div id="label-page"><h3>Input Transaksi Peminjaman</h3></div>
<div id="content">
	<form action="proses/transaksi-input-proses.php" method="post">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Transaksi</td>
			<td class="isian-formulir"><input type="text" name="idtransaksi" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Anggota</td>
			<td class="isian-formulir">
				<select name="idanggota" class="isian-formulir isian-formulir-border">
					<option value="" select="selected">~ Pilih Anggota ~</option>
					<?php
						$query = "SELECT * FROM tbanggota
								WHERE status='Tidak Meminjam'
								ORDER BY idanggota";

						//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC"; 
						$q_tampil_anggota = mysqli_query($db, $query); 

						while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)) {
							echo"<option value=$r_tampil_anggota[idanggota]>$r_tampil_anggota[idanggota] | $r_tampil_anggota[nama]</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="label-formulir">Buku</td>
			<td class="isian-formulir">
				<select name="idbuku" class="isian-formulir isian-formulir-border">
					<option value="" select="selected">~ Pilih Buku ~</option>
					<?php
						$query = "SELECT * FROM tbbuku
							WHERE jmlbuku > 0
							ORDER BY idbuku";

						//$sql="SELECT * FROM tbbuku ORDER BY idbuku DESC"; 
						$q_tampil_buku = mysqli_query($db, $query); 

						while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)) {
							echo"<option value=$r_tampil_buku[idbuku]>$r_tampil_buku[idbuku] | $r_tampil_buku[judul]</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr> 
			<td class="label-formulir">Tanggal Pinjam</td>
			<td class="isian-formulir"><input type="text" name="tglpinjam" value="<?php echo $tgl; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Kembali</td>
			<td class="isian-formulir"><input type="text" name="tglkembali" value="<?php echo $kembali; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>