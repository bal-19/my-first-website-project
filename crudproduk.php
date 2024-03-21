<?php
    function bacaSemuaProduk() {
        require_once "koneksi.php";
        $koneksi = koneksiToko();

        $data = array();
        $sql = "SELECT * FROM produk";
        $hasil = mysqli_query($koneksi, $sql);
        $i = 0;

        while ($baris = mysqli_fetch_assoc($hasil)) {
            $data [$i]['kode_produk'] = $baris['kode_produk'];
            $data [$i]['nama'] = $baris['nama'];
            $data [$i]['image'] = $baris['image'];
            $data [$i]['deskripsi'] = $baris['deskripsi'];
            $data [$i]['harga'] = $baris['harga'];
            $i++;
        }
        mysqli_close($koneksi);
        return $data;
    }

    function bacaSemuaKeranjang() {
        require_once "koneksi.php";
        $koneksi = koneksiToko();

        $data = array();
        $sql = "SELECT * FROM keranjang";
        $hasil = mysqli_query($koneksi, $sql);
        $i = 0;

        while ($baris = mysqli_fetch_assoc($hasil)) {
            $data [$i]['id_keranjang'] = $baris['id_keranjang'];
            $data [$i]['kode_customer'] = $baris['kode_customer'];
            $data [$i]['kode_produk'] = $baris['kode_produk'];
            $data [$i]['nama_produk'] = $baris['nama_produk'];
            $data [$i]['qty'] = $baris['qty'];
            $data [$i]['harga'] = $baris['harga'];
            $i++;
        }
        mysqli_close($koneksi);
        return $data;
    }
?>