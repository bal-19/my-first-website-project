<?php
    include 'crudproduk.php';

    $gambar = $_FILES["file"]["name"];
    $kode_produk = $_POST["kodeProduk"];
    $nama = $_POST["namaProduk"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];

    $hasil = editProduk($kode_produk, $nama, $gambar, $deskripsi, $harga);
    if($hasil != 0) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "../image/produk/" . $_FILES["file"]["name"]);
        echo "<script type='text/javascript'>
                alert('Berhasil di Edit');
                window.location='m_produk.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Gagal di Edit');
            window.location='edit_produk.php';  
        </script>";
    }
?>