<?php
    include "cruduser.php";

    if (array_key_exists('hapus', $_POST)) {
        $kode_customer = $_POST['hapus'];
        hapusUser($kode_customer);
        header("Location: m_customer.php");
    }
?>