<?php 
    require ("../vendor/autoload.php");    // load file autoload.php dari composer
    require ("../koneksi.php");            // load konfigurasi untuk koneksi ke DB

    use Dompdf\Dompdf;                  // panggil referensi namespace dari library Dompdf

    $html = '<h1>Data Peminjaman Buku</h1>';
    $html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Nama</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>';
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
            $html .= '<tr>
                        <td>'.$nomor.'</td>
                        <td>'.$r_tampil_transaksi['idtransaksi'].'</td>
                        <td>'.$r_tampil_transaksi['nama'].'</td>
                        <td>'.$r_tampil_transaksi['judul'].'</td>
                        <td>'.$r_tampil_transaksi['tglpinjam'].'</td>
                        <td>'.$r_tampil_transaksi['tglkembali'].'</td>
                        <td>'.$r_tampil_transaksi['status_transaksi'].'</td>
                    </tr>';  
                    $nomor++; 
        } // end looping 
    } else {
            $html .= '<tr><td colspan="4" align="center">Tidak Ada Data</td></tr>';
    }         
            
    $html .= '</tbody></html>'; 
    // echo $html;
    
    // $pdfOptions = new Options();
    // $pdfOptions->setIsRemoteEnabled(true);
    $dompdf = new Dompdf();                         // instansiasi class Dompdf
    $dompdf->set_option('isRemoteEnabled', TRUE);
    $dompdf->loadHtml($html);                       // isi konten (format HTML) untuk dokumen pdf
    $dompdf->setPaper('a4','landscape');            // set ukuran dan orientasi dokumen pdf
    $dompdf->render();                              // vender kode HTML menjadi pdf
    $dompdf->stream();                              // stream pdf ke browser
?>       
    
