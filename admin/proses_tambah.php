<?php
    include 'crudproduk.php';

    $gambar = $_FILES["file"]["name"];
    $kode_produk = $_POST["kodeProduk"];
    $nama = $_POST["namaProduk"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];

    $hasil = tambahProduk($kode_produk, $nama, $gambar, $deskripsi, $harga);
    if($hasil != 0) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "../image/produk/" .$_FILES["file"]["name"]);
        echo "<script type='text/javascript'>
                alert('Berhasil di Tambah');
                window.location='m_produk.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Gagal di Tambah');
            window.location='tambahproduk.php';  
        </script>";
    }
?>