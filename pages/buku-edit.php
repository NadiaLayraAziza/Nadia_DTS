<?php 
    $idbuku = $_GET['id']; 
    $q_tampil_buku = mysqli_query($db,"SELECT * FROM tbbuku WHERE idbuku = '$idbuku'"); 
    $r_tampil_buku = mysqli_fetch_array($q_tampil_buku); 

    if(empty($r_tampil_buku['cover']) or ($r_tampil_buku['cover'] == '-')) { 
        $cover = "admin-no-photo.jpg"; 
    } else { 
        $cover = $r_tampil_buku['cover'];
    }
?> 
<div id="label-page"><h3>Edit Data Buku</h3></div> 
<div id="content"> 
    <form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data"> 
        <table id="tabel-input"> 
            <tr> 
                <td class="label-formulir">Cover</td> 
                <td class="isian-formulir"> 
                    <img src="images/<?php echo $cover; ?>" width=70px height=75px> 
                    <input type="file" name="cover" class="isian-formulir isian-formulir-border"> 
                    <input type="hidden" name="cover_awal" value="<?php echo $r_tampil_buku['cover']; ?>"> 
                </td> 
            </tr> 
            <tr> 
                <td class="label-formulir">ID Buku</td> 
                <td class="isian-formulir"><input type="text" name="idbuku" value="<?php echo $r_tampil_buku['idbuku']; ?>" readonly="readonly" 
                class="isian-formulir isian-formnlir-border warna-formulir-disabled"></td> 
            </tr> 
            <tr> 
                <td class="label-formulir">Judul</td> 
                <td class="isian-formulir"><input type="text" name="judul" value="<?php echo $r_tampil_buku['judul']; ?>" class="isian-formulir isian-formulir-border"></td> 
            </tr> 
            <tr> 
                <td class="label-formulir">Pengarang</td> 
                <td class="isian-formulir"><input type="text" name="pengarang" value="<?php echo $r_tampil_buku['pengarang']; ?>" class="isian-formulir isian-formulir-border"></td> 
            </tr> 
            <tr> 
                <td class="label-formulir">Penerbit</td> 
                <td class="isian-formulir"><input type="text" name="penerbit" value="<?php echo $r_tampil_buku['penerbit']; ?>" class="isian-formulir isian-formulir-border"></td> 
            </tr>
            <tr> 
                <td class="label-formulir">Tahun Terbit</td> 
                <td class="isian-formulir"><input type="number" name="thnterbit" value="<?php echo $r_tampil_buku['thnterbit']; ?>" class="isian-formulir isian-formulir-border"></td> 
            </tr>
            <tr> 
                <td class="label-formulir">ISBN</td> 
                <td class="isian-formulir"><input type="text" name="isbn" value="<?php echo $r_tampil_buku['isbn']; ?>" class="isian-formulir isian-formulir-border"></td> 
            </tr> 
            <tr> 
                <td class="label-formulir">Jumlah Buku</td> 
                <td class="isian-formulir"><input type="number" name="jmlbuku" value="<?php echo $r_tampil_buku['jmlbuku']; ?>" class="isian-formulir isian-formulir-border"></td> 
            </tr>
            <tr> 
                <td class="label-formulir">Lokasi</td> 
                <td class="isian-formulir">
                <select class="form-control" name="lokasi">
                    <option value="rak1" <?php if ($r_tampil_buku['lokasi']=='rak1') {
                        echo "selected";} ?>>Rak 1</option>
                    <option value="rak2" <?php if ($r_tampil_buku['lokasi']=='rak2') {
                        echo "selected";} ?>>Rak 2</option>
                    <option value="rak3" <?php if ($r_tampil_buku['lokasi']=='rak3') {
                        echo "selected";} ?>>Rak 3</option>
                </select>
                </td> 
            </tr>
            <tr> 
                <td class="label-formulir"></td> 
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td> 
            </tr> 
        </table> 
    </form> 
</div> 
            