<?php
    session_start();
    include "../koneksi.php";
    include "../crudproduk.php";

    $kd_cs = $_SESSION['kd_cs'];
    $nama = $_POST['nama'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $kodepos = $_POST['kodepos'];
    $koneksi = koneksiToko();
    $hasil = 0;

    foreach(bacaSemuaKeranjang() as $data) {
        $kode_cs = $data['kode_customer'];
        $harga = $data['harga'];
        $qty = $data['qty'];
        $total = $harga * $qty;
    }
    $koneksi->query("INSERT INTO checkout (id_checkout, kode_customer, total, nama, provinsi, kota, alamat, kodepos) SELECT 0, '$kd_cs', $total, '$nama', '$provinsi', '$kota', '$alamat', '$kodepos' FROM keranjang WHERE kode_customer='$kd_cs'");

    $koneksi->query("DELETE FROM keranjang WHERE kode_customer='".$kd_cs."'");
    $hasil = 1;

    if($hasil != 0) {
        echo "
        <script type='text/javascript'>
            alert('Berhasil Checkout Mohon Ditunggu :)');
            window.location='../index.php';
        </script>";
    } else {
        echo "
        <script type='text/javascript'>
            alert('Gagal Checkout');
            window.location='../checkout.php';
        </script>";
    }
    
    mysqli_close($koneksi);
?>