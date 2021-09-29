<?php 
    require ("../vendor/autoload.php");    // load file autoload.php dari composer
    require ("../koneksi.php");            // load konfigurasi untuk koneksi ke DB

    use PhpOffice\PhpSpreadsheet\Spreadsheet;   // panggil referensi namespace dari library Spreadsheet
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $spreadsheet = new Spreadsheet();       // instansiasi class Spreadsheet
    $spreadsheet->setActiveSheetIndex(0)    // set aktif sheet pada excel
    ->setCellValue('A1', 'Data Peminjaman')     // isi data excel sesuai baris dan kolom
    ->setCellValue('A3', 'No')
    ->setCellValue('B3', 'ID Transaksi')
    ->setCellValue('C3', 'Nama')
    ->setCellValue('D3', 'Judul')
    ->setCellValue('E3', 'Tgl Pinjam')
    ->setCellValue('F3', 'Tgl Kembali')
    ->setCellValue('G3', 'Status');

    $sheet = $spreadsheet->getActiveSheet();

    $index = 4;     // baris mulai isi data dinamis, mulai baris 4

    $query = "SELECT tbtransaksi.idtransaksi, tbanggota.nama, tbbuku.judul, tbtransaksi.tglpinjam, 
    tbtransaksi.tglkembali, tbtransaksi.status_transaksi FROM tbtransaksi
    INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota
    INNER JOIN tbbuku ON tbtransaksi.idbuku = tbbuku.idbuku 
    WHERE tbtransaksi.status_transaksi = 'Pinjam' ORDER BY idtransaksi DESC"; 
    $q_tampil_transaksi = mysqli_query($db, $query); 
    $idx = 0;

    if(mysqli_num_rows($q_tampil_transaksi) > 0) { 
        // looping semua data pada tabel tbtransaksi 
        while($r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi)) { 
            $idx++;

            $sheet->setCellValue('A'.$index, $idx);
            $sheet->setCellValue('B'.$index, $r_tampil_transaksi['idtransaksi']);
            $sheet->setCellValue('C'.$index, $r_tampil_transaksi['nama']);
            $sheet->setCellValue('D'.$index, $r_tampil_transaksi['judul']);
            $sheet->setCellValue('E'.$index, $r_tampil_transaksi['tglpinjam']);
            $sheet->setCellValue('F'.$index, $r_tampil_transaksi['tglkembali']);
            $sheet->setCellValue('G'.$index, $r_tampil_transaksi['status_transaksi']);

            $index++;
        } // end looping 
    }

    $sheet->setTitle('Data Peminjaman Buku');
    $spreadsheet->setActiveSheetIndex(0);

    $filename = 'Data-Peminjaman-Perpus.xlsx';

    ob_end_clean();     // antuk mengatasi excel cannot open the file format or file extension is not valid

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: cache, must-revalidate');
    header('Pragma: public');

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit();
?>