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
<div id="label-page"><h3>Detail Data Buku <?php echo $r_tampil_buku['judul']; ?></h3></div> 
<div id="content"> 
    <table id="tabel-input"> 
        <tr> 
            <td class="label-formulir">Cover Buku</td> 
            <td class="isian-formulir"><img src="images/<?php echo $cover; ?>" width="70px" height="100px"></td> 
        </tr> 
        <tr>
            <td class="label-formulir">ID Buku</td> 
            <td class="isian-formulir"><?php echo $r_tampil_buku['idbuku']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Judul</td> 
            <td class="isian-formulir"><?php echo $r_tampil_buku['judul']; ?></td> 
        </tr>
        <tr> 
            <td class="label-formulir">Pengarang</td> 
            <td class="isian-formulir"><?php echo $r_tampil_buku['pengarang']; ?></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">Penerbit</td> 
            <td class="isian-formulir"><?php echo $r_tampil_buku['penerbit']; ?></td> 
        </tr>
        <tr> 
            <td class="label-formulir">Tahun Terbit</td> 
            <td class="isian-formulir"><?php echo $r_tampil_buku['thnterbit']; ?></td> 
        </tr>
        <tr> 
            <td class="label-formulir">ISBN</td> 
            <td class="isian-formulir"><?php echo $r_tampil_buku['isbn']; ?></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">Jumlah Buku</td> 
            <td class="isian-formulir"><?php echo $r_tampil_buku['jmlbuku']; ?></td> 
        </tr>
        <tr> 
            <td class="label-formulir">Lokasi</td> 
            <td class="isian-formulir"><?php echo $r_tampil_buku['lokasi']; ?></td> 
        </tr>
    </table>
</div> 
            