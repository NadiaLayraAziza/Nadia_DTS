<?php 
    include '../koneksi.php'; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 
    
    $idbuku = $_POST['idbuku']; 
    $judul = $_POST['judul']; 
    $pengarang = $_POST['pengarang']; 
    $penerbit = $_POST['penerbit'];
    $jmlbuku = $_POST['jmlbuku'];
    $isbn = $_POST['isbn'];
    $thnterbit = $_POST['thnterbit'];
    $lokasi = $_POST['lokasi'];
    $cover = $_POST['cover'];
    
    if(isset($_POST['simpan'])) { // cek jika ada form yang di submit 
        extract($_POST); 
        $nama_file = $_FILES['cover']['name']; 
    
        if(!empty($nama_file)){ 
            // Baca lokasi file sementara dan nama file dari form (upload) 
            $lokasi_file = $_FILES['cover']['tmp_name']; 
            $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION); 
            $file_cover = $idbuku.".".$tipe_file; 
    
            $folder = "../images/$file_cover"; // Tentukan folder untuk menyimpan file 
            @unlink ("$folder"); // hapus foto yang lama, tanda @ untuk menyembunyikan pesan warning, jika file tidak ditemukan 
            move_uploaded_file($lokasi_file,"$folder"); // Apabila file berhasil di upload 
        } else {
            $file_cover=$cover_awal; 
        } 
    
        mysqli_query($db, "UPDATE tbbuku 
                            SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', 
                            jmlbuku='$jmlbuku', isbn='$isbn', thnterbit='$thnterbit', lokasi='$lokasi', cover='$file_cover' 
                            WHERE idbuku = '$idbuku'"); 
    
        header("location:../index.php?p=buku"); 
    }
?>