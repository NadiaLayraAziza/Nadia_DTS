<?php 
    require ("../vendor/autoload.php");    // load file autoload.php dari composer
    require ("../koneksi.php");            // load konfigurasi untuk koneksi ke DB

    use Dompdf\Dompdf;                  // panggil referensi namespace dari library Dompdf

    $html = '<h1>Data Buku Perpustakaan Umum</h1>';
    $html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Buku</th> 
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Jumlah Buku</th>
                    </tr>
                </thead>
                <tbody>';
    $nomor = 1; 
    $query = "SELECT * FROM tbbuku ORDER BY idbuku DESC"; 
    $q_tampil_buku = mysqli_query($db, $query); 

    if(mysqli_num_rows($q_tampil_buku) > 0) { 
        // looping semua data pada tabel tbbuku 
        while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)) { 
            if(empty($r_tampil_buku['cover']) or ($r_tampil_buku['cover'] == '-')) {
                $cover = "admin-no-photo.jpg"; 
            } else { 
                $cover = $r_tampil_buku['cover']; 
            }
            $html .= '<tr>
                        <td>'.$nomor.'</td>
                        <td>'.$r_tampil_buku['idbuku'].'</td>
                        <td>'.$r_tampil_buku['judul'].'</td>
                        <td>'.$r_tampil_buku['pengarang'].'</td>
                        <td>'.$r_tampil_buku['penerbit'].'</td>
                        <td>'.$r_tampil_buku['jmlbuku'].'</td>
                    </tr>';  
                    $nomor++; 
        } // end looping 
    } else {
            $html .= '<tr><td colspan="4" align="center">Tidak Ada Data</td></tr>';
    }         
            
    $html .= '</tbody></html>'; 
    // echo $html;
    
    $dompdf = new Dompdf();                         // instansiasi class Dompdf
    $dompdf->set_option('isRemoteEnabled', TRUE);
    $dompdf->loadHtml($html);                       // isi konten (format HTML) untuk dokumen pdf
    $dompdf->setPaper('a4','landscape');            // set ukuran dan orientasi dokumen pdf
    $dompdf->render();                              // vender kode HTML menjadi pdf
    $dompdf->stream();                              // stream pdf ke browser
?>       
    
