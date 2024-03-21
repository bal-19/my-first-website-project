<?php
    include "crudproduk.php";

    if (array_key_exists('delete', $_POST)) {
        $kode_produk = $_POST['delete'];
        hapusProduk($kode_produk);
        header("Location: m_produk.php");
    }
?>