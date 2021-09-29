<div id="label-page"><h3>Input Data Buku</h3></div>
<div id="content"> 
    <form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
    
    <table id="tabel-input">
        <tr> 
            <td class="label-formulir">Cover</td> 
            <td class="isian-formulir"><input type="file" name="cover" class="isian-formulir isian-formulir-border"></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">ID Buku</td> 
            <td class="isian-formulir"><input type="text" name="idbuku" class="isian-formulir isian-formulir-border"></td> 
        </tr>
        <tr> 
            <td class="label-formulir">Judul</td> 
            <td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border"></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">Pengarang</td> 
            <td class="isian-formulir"><input type="text" name="pengarang" class="isian-formulir isian-formulir-border"></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">Penerbit</td> 
            <td class="isian-formulir"><input type="text" name="penerbit" class="isian-formulir isian-formulir-border"></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">Tahun Terbit</td> 
            <td class="isian-formulir"><input type="number" name="thnterbit" class="isian-formulir isian-formulir-border"></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">ISBN</td> 
            <td class="isian-formulir"><input type="text" name="isbn" class="isian-formulir isian-formulir-border"></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">Jumlah Buku</td> 
            <td class="isian-formulir"><input type="number" name="jmlbuku" class="isian-formulir isian-formulir-border"></td> 
        </tr> 
        <tr> 
            <td class="label-formulir">Lokasi</td> 
            <td class="isian-formulir">
            <select name="lokasi" required="">
                <option value=""></option>
                <option value="rak1">Rak 1</option>
                <option value="rak2">Rak 2</option>
                <option value="rak3">Rak 3</option>
            </select>
            </td>
        </tr> 
        <tr> 
            <td class="label-formulir"></td> 
            <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td> 
        </tr> 
    </table> 
    </form> 
</div> 
